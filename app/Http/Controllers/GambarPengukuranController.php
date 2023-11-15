<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GambarPengukuran;
use App\Models\Gambar;
use File;
use Illuminate\Support\Facades\Storage;

class GambarPengukuranController extends Controller
{
    public function index(){
        $data = GambarPengukuran::orderBy('id','asc')->paginate(15);
        $gambar = Gambar::all();
        
        return view('view_pengukuran/index')->with([
            'data' => $data,
            'gambar' => $gambar,
        ]);
    }

    public function create(){
        $gambar = Gambar::all();

        return view('view_pengukuran/create')->with([
            'gambar' => $gambar,
        ]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'judul_gambar' => ['required'],
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'deskripsi' => ['required'],
        ],[
            'judul_gambar.required' => 'Kolom judul pengukuran tidak boleh kosong',
            'image.required' => 'Kolom data gambar tidak boleh kosong',
            'deskripsi' => 'Kolom deskripsi tidak boleh kosong'
        ]);

        
        $data = GambarPengukuran::create([
            'judul_gambar' => $request->judul_gambar,
            'path' => '',
            'deskripsi' => $request->deskripsi
        ]);

        $imageName = 'pengukuran'.$data->id.'.'.$request->image->extension();

        $path = $request->file('image')->storeAs('public/images',$imageName);
        
        // $image_path = '/image/'.$imageName;
        // if(File::exists($image_path)) {
        //     File::delete($image_path);
        // }

        // $request->image->move(\public_path('image'),$imageName);

        $data->path = $imageName;
        $data->update();

        if($data){
            return redirect()->intended('dashboard/pengukuran')->with(['success' => 'Berhasil menambah data pengukuran']);
        }
        return redirect()->back()->with(['error' => 'Gagal menambah data pengukuran']);
    }

    public function edit($id){
        $gambar = Gambar::all();
        $data = GambarPengukuran::where('id',decrypt($id))->first();

        return view('view_pengukuran/edit')->with([
            'gambar' => $gambar,
            'data' => $data,
        ]);
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ],[
            'image.required' => 'Kolom data gambar tidak boleh kosong'
        ]);

        $imageName = 'pengukuran'.decrypt($id).'.'.$request->image->extension();

        $path = $request->file('image')->storeAs('public/images',$imageName);
        // $imageName = 'pengukuran'.decrypt($id).'.'.$request->image->extension();
        // $image_path = '/image/'.$imageName;
        // if(File::exists($image_path)) {
        //     File::delete($image_path);
        // }

        // $request->image->move(\public_path('image'),$imageName);

        $data = GambarPengukuran::where('id',decrypt($id))->first();
        
        if($data){
            if($request->judul_gambar){
                $data->judul_gambar = $request->judul_gambar;
            }
            if($request->deskripsi){
                $data->deskripsi = $request->deskripsi;
            }
            $data->path = $imageName;
            $data->update();

            return redirect()->intended('dashboard/pengukuran')->with(['success' => 'Berhasil mengganti data pengukuran']);
        }
        return redirect()->intended('dashboard/pengukuran')->with(['error' => 'Gagal mengganti data pengukuran']);
        
    }

    public function destroy($id){
        $data = GambarPengukuran::where('id',decrypt($id))->first();

        if($data){
            Storage::delete('public/images/'.$data->path);
            $data->delete();
            return redirect()->intended('dashboard/pengukuran')->with(['success' => 'Berhasil menghapus data pengukuran']);
        }
        return redirect()->intended('dashboard/pengukuran')->with(['success' => 'Berhasil menghapus data pengukuran']);
    }
}