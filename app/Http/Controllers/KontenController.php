<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konten;
use App\Models\Gambar;

class KontenController extends Controller
{
    public function index(){
        $data = Konten::orderBy('id','asc')->paginate(15);
        $gambar = Gambar::all();

        return view('view_konten/index')->with([
            'data' => $data,
            'gambar' => $gambar,
        ]);
    }

    public function edit($id){
        $data = Konten::where('id',decrypt($id))->first();
        $gambar = Gambar::all();
        
        return view('view_konten/edit')->with([
            'data' => $data,
            'gambar' => $gambar,
        ]);
    }

    public function update(Request $request, $id){
        $data = Konten::where('id',decrypt($id))->first();
        
        // if($request->nama_konten){
        //     $data->nama_konten = $request->nama_konten;
        // }
        if($request->konten){
            $data->konten = $request->konten;
        }
        

        $update_data = $data->update();

        if($update_data){
            return redirect()->intended('dashboard/konten')->with(['success' => 'Berhasil mengedit konten']);
        }
        return redirect()->back()->with('Gagal mengedit konten');
    }
}