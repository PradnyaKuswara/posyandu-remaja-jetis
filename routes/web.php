<?php

use Illuminate\Support\Facades\Route;
use App\Models\Jadwal;
use App\Models\Konten;
use App\Models\Gambar;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $konten = Konten::all();
    $gambar = Gambar::all();
    return view('home')->with([
        'konten' => $konten,
        'gambar' => $gambar
    ]);
});

Route::controller(App\Http\Controllers\JadwalController::class)->group(function(){
    Route::get('/informasi','index_general');
});

Route::controller(App\Http\Controllers\AuthController::class)->group(function(){
    Route::get('login','index');
    Route::post('login-process','login');
    Route::get('password/reset','forgotpass_index');
    Route::post('password/email','linkforgot');
    Route::get('password/reset/{token}','resetPassIndex')->name('password.reset');
    Route::post('password/update','updatePass');
});

Route::group(['middleware' => ['UserLogin']],function(){
    Route::get('dashboard/main','App\Http\Controllers\DashboardController@index');
    Route::get('dashboard/logout',[App\Http\Controllers\AuthController::class,'logout']);

    Route::controller(App\Http\Controllers\JadwalController::class)->group(function(){
        Route::get('dashboard/jadwal','index');
        Route::get('dashboard/tambah-jadwal','create');
        Route::post('dashboard/tambah-jadwal-process','store');
        Route::get('dashboard/edit-jadwal/{id}','edit');
        Route::put('dashboard/update-jadwal/{id}','update');
        Route::delete('dashboard/delete-jadwal/{id}','destroy');
        Route::get('dashboard/search-jadwal','search');
    });

    Route::controller(App\Http\Controllers\GambarController::class)->group(function(){
        Route::get('dashboard/gambar','index');
        Route::put('dashboard/update-gambar/{id}','update');
        Route::get('dashboard/edit-gambar/{id}','edit');
    });

    Route::controller(App\Http\Controllers\KontenController::class)->group(function(){
        Route::get('dashboard/konten','index');
        Route::get('dashboard/edit-konten/{id}','edit');
        Route::put('dashboard/update-konten/{id}','update');
    });

    Route::controller(App\Http\Controllers\GambarPengukuranController::class)->group(function(){
        Route::get('dashboard/pengukuran','index');
        Route::get('dashboard/tambah-pengukuran','create');
        Route::post('dashboard/tambah-pengukuran-process','store');
        Route::get('dashboard/edit-pengukuran/{id}','edit');
        Route::put('dashboard/update-pengukuran/{id}','update');
        Route::delete('dashboard/delete-pengukuran/{id}','destroy');
    });
});

Route::get('/config-clear', function() {
    Artisan::call('config:clear'); 
    return 'Configuration cache cleared!';
});

Route::get('/config-cache', function() {
    Artisan::call('config:cache');
    return 'Configuration cache cleared! <br> Configuration cached successfully!';
});

Route::get('/cache-clear', function() {
    Artisan::call('cache:clear');
    return 'Application cache cleared!';
});

Route::get('/view-cache', function() {
    Artisan::call('view:cache');
    return 'Compiled views cleared! <br> Blade templates cached successfully!';
});

Route::get('/view-clear', function() {
    Artisan::call('view:clear');
    return 'Compiled views cleared!';
});

Route::get('/route-cache', function() {
    Artisan::call('route:cache');
    return 'Route cache cleared! <br> Routes cached successfully!';
});

Route::get('/route-clear', function() {
    Artisan::call('route:clear');
    return 'Route cache cleared!';
});