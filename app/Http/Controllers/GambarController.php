<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gambar;
use File;

class GambarController extends Controller
{
    public function index(){
        $data = Gambar::orderBy('id','asc')->paginate(15);
        $gambar = Gambar::all();
        return view('view_image/index')->with([
            'data' => $data,
            'gambar' => $gambar,
        ]);
    }

    public function edit($id){
        $data = Gambar::where('id',decrypt($id))->first();
        $gambar = Gambar::all();
        
        if($data){
            return view('view_image/edit')->with([
                'data' => $data, 
                'gambar' => $gambar
            ]);
        }
    }
    
    public function update(Request $request, $id){
        $this->validate($request,[
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ],[
            'image.required' => 'Kolom data gambar tidak boleh kosong'
        ]);

        $imageName = 'image'.decrypt($id).'.'.$request->image->extension();

        $path = $request->file('image')->storeAs('public/images',$imageName);

        // $image_path = '/image/'.$imageName;
        // if(File::exists($image_path)) {
        //     File::delete($image_path);
        // }

        // $request->image->move(\public_path('image'),$imageName);

        $data = Gambar::where('id',decrypt($id))->first();
        
        if($data){
            $data->path = $imageName;
            $data->update();

            return redirect()->intended('dashboard/gambar')->with(['success' => 'Berhasil mengganti gambar']);
        }
        return redirect()->intended('dashboard/gambar')->with(['error' => 'gagal mengganti gambar']);
        
    }
}