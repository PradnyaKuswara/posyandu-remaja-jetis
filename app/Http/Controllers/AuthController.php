<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use App\Models\Gambar;
use Session;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
use Carbon;

class AuthController extends Controller
{   
    public function index(){
        $data = Gambar::all();
        if(Auth::check()){
            return redirect()->intended('dashboard/main');
        }
        return view('login')->with([
            'gambar' => $data,
        ]);
    }

    public function login(Request $request){
        $this->validate($request,[
            'email' => ['required','email:rfc,dns'],
            'password' => ['required'],
        ],[
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email harus menggunakan format email (@)',
            'password' => 'Password tidak boleh kosong'
        ]);
        
        $credential = $request->only('email','password');

        if(Auth::attempt($credential)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user) {
                return redirect()->intended('dashboard/main');
            }
        }
        return redirect()->intended('login')->with('error','Invalid Credential');
    }

    public function logout(Request $request){
        Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            
            return redirect('login')->with('success','You have successfully logged out');
    }

    public function forgotpass_index(){
        $data = Gambar::all();
        return view('forgot_password')->with([
            'gambar' => $data,
        ]);
    }

    public function linkforgot(Request $request){
        $this->validate($request,[
            'email' => ['required','email:rfc,dns'],
        ],[
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email harus menggunakan format email (@)',
        ]);
        
        $check_email = User::where('email',$request->email)->exists();
        
        // if(!$check_email){
        //     return redirect()->back()->with('error','Email not found');
        // }
        // return redirect()->back()->with('success','Email found');
        $status = Password::sendResetLink(
            $request->only('email')
        );

        Session::put('email',$request->email);

        return $status === Password::RESET_LINK_SENT
        ? back()->with(['success' => __($status)])
        : back()->withErrors(['email' => __($status)]);
    }

    public function resetPassIndex(string $token){
        $data = Gambar::all();
        return view('reset_password', [
            'token' => $token,
            'gambar' => $data,
        ]);
    }

    public function updatePass(Request $request){
        $request->validate([
            'email' => 'required',
            'token' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8'
        ],[
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email harus menggunakan format email (@)',
            'password' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Password tidak sama dengan konfirmasi password',
            'password_confirmation.required' => 'Konfirmasi password tidak boleh kosong',
            'password_confirmation.min' => 'Konfirmasi password minimal 8 karakter',
            'token.required' => 'Link reset dan token password sudah kadaluarsa'
        ]);
    
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => bcrypt($password)
                ])->setRememberToken(Str::random(60));
    
                $user->save();
    
                event(new PasswordReset($user));
            }
        );

        Session::forget('email');
    
        return $status === Password::PASSWORD_RESET
        ? redirect()->intended('login')->with('success', __($status))
        : back()->withErrors(['email' => [__($status)]]);
    }
}