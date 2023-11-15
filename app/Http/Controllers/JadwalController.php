<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Jadwal;
use App\Models\Gambar;
use App\Models\Konten;
use App\Models\GambarPengukuran;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function index(){
        $data = Jadwal::orderby('id','desc')->paginate(10);
        $gambar = Gambar::all();
        
        return view('jadwals/index')->with([
            'user' => Auth::user(),
            'data' => $data, 
            'gambar' => $gambar,
            
        ]);
    }
    
    public function index_general(){
        $data = Jadwal::whereMonth('tanggal_terlaksana',Carbon::now()->format('m'))
        ->whereYear('tanggal_terlaksana',Carbon::now()->format('Y'))
        ->where('tanggal_terlaksana','>=',Carbon::now()->format('Y-m-d'))
        ->orderby('tanggal_terlaksana')
        ->get();
        $konten = Konten::all();
        $gambar = Gambar::all();
        $gambar_pengukuran = GambarPengukuran::all();
        return view('informasi')->with([
            'data' => $data,
            'konten' => $konten,
            'gambar' => $gambar,
            'gambar_pengukuran' => $gambar_pengukuran,
        ]);
    }

    public function create(){
        $gambar = Gambar::all();
        
        return view('jadwals/create')->with([
            'gambar' => $gambar,
        ]);
    }

    public function store(Request $request){
        $this->validate($request,[
             'tanggal_terlaksana' => ['required'],
             'jam_mulai' => ['required'],
             'jam_selesai' => ['required'],
             'lokasi' => ['required'],
             'link_gmaps' => ['required'],
        ],[
            'tanggal_terlaksana.required' => 'Kolom tanggal tidak boleh kosong',
            'jam_mulai.required' => 'Kolom jam mulai tidak boleh kosong',
            'jam_selesai.required' => 'Kolom jam selesai tidak boleh kosong',
            'lokasi.required' => 'Kolom lokasi tidak boleh kosong',
            'link_gmaps.required' => 'Kolom link untuk gmaps tidak boleh kosong'  
        ]);
        
        $check = Jadwal::where('tanggal_terlaksana',$request->tanggal_terlaksana)->exists();
        
        if($check){
            return redirect()->back()->with(['error' => 'Anda sudah membuat jadwal di tanggal ini']);
        }

        if($request->tanggal_terlaksana < Carbon::now()->format('Y-m-d') || $request->tanggal_terlaksana == Carbon::now()->format('Y-m-d') && $request->jam_mulai < Carbon::now()->format('H:i:s')) {
            return redirect()->back()->with(['error' => 'Anda tidak dapat membuat jadwal menggunakan tanggal dan waktu sebelum saat ini']);
        }
        
        $data_jadwal = Jadwal::create([
            'tanggal_terlaksana' => $request->tanggal_terlaksana, 
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'lokasi' => $request->lokasi,
            'link_gmaps' => $request->link_gmaps
        ]);

        if($data_jadwal){
            return redirect()->intended('dashboard/jadwal')->with([
                'success' => 'Data jadwal berhasil ditambah'
            ]);
        }
        return redirect()->intended('dashboard/jadwal')->with([
            'error' => 'Data jadwal gagal ditambah'
        ]);
    }

    public function edit($id){
        $data = Jadwal::where('id',decrypt($id))->first();
        $gambar = Gambar::all();
        
        if($data){
            return view('jadwals/edit')->with([
                'user' => Auth::user(),
                'data' => $data,
                'gambar' => $gambar, 
            ]);
        }
    }
    
    public function update(Request $request,$id){
        $data = Jadwal::where('id',decrypt($id))->first();

        if($request->tanggal_terlaksana != $data->tanggal_terlaksana){
            $check = Jadwal::where('tanggal_terlaksana',$request->tanggal_terlaksana)->first();

            if($check){
                return redirect()->back()->with(['error' => 'Anda sudah membuat jadwal di tanggal ini']);
            }

            if($request->tanggal_terlaksana < Carbon::now()->format('Y-m-d') || $request->tanggal_terlaksana == Carbon::now()->format('Y-m-d') && $request->jam_mulai < Carbon::now()->format('H:i:s')) {
                return redirect()->back()->with(['error' => 'Anda tidak dapat membuat jadwal menggunakan tanggal dan waktu sebelum saat ini']);
            }
        }

        if($request->tanggal_terlaksana){
            $data->tanggal_terlaksana = $request->tanggal_terlaksana;
        }
        if($request->jam_mulai){
            $data->jam_mulai = $request->jam_mulai;
        }
        if($request->jam_selesai){
            $data->jam_selesai = $request->jam_selesai;
        }
        if($request->lokasi){
            $data->lokasi = $request->lokasi;
        }
        if($request->link_gmaps){
            $data->link_gmaps = $request->link_gmaps;
        }
        
        $update_data = $data->update();

        if($update_data){
            return redirect()->intended('dashboard/jadwal')->with(['success' => 'Berhasil mengedit data jadwal']);
        }
        return redirect()->back()->with(['error' => 'Gagal mengedit data jadwal']);
    }

    public function destroy($id){
        $data = Jadwal::where('id',decrypt($id))->first();

        if($data){
            $data->delete();
            return redirect()->intended('dashboard/jadwal')->with(['success' => 'Berhasil menghapus data jadwal']);
        }
        return redirect()->intended('dashboard/jadwal')->with(['error' => 'Gagal menghapus data jadwal']);
    }

    public function search(Request $request){
        $gambar = Gambar::all();
        $data = Jadwal::where('id', 'like','%'.$request->search.'%')
        ->orWhere('tanggal_terlaksana', 'like','%'.$request->search.'%')
        ->orWhere('jam_mulai', 'like','%'.$request->search.'%')
        ->orWhere('jam_selesai', 'like','%'.$request->search.'%')
        ->orWhere('lokasi', 'like','%'.$request->search.'%')
        ->orWhere('link_gmaps', 'like','%'.$request->search.'%')
        ->paginate(10);
        $data->appends(['search' => $request->search]);

        return view('jadwals/index')->with([
            'user' => Auth::user(),
            'data' => $data, 
            'gambar' => $gambar,
        ]);
    }

    
}