<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Gambar;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('UserLogin');
    }
    
    public function index(){
        $gambar = Gambar::all();
        return view('main_dashboard')->with([
            'user' => Auth::user(),
            'gambar' => $gambar,
        ]);
    }
}