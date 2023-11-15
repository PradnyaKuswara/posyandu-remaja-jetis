<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Jadwal;
use App\Models\Gambar;
use Carbon\Carbon;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('Admin12345!'),
        ]);

        User::create([
            'name' => 'Karang Taruna',
            'email' => 'posyanduremajajetis@gmail.com',
            'password' => bcrypt('Jetisposyandu1!'),
        ]);

        Jadwal::create([
           'tanggal_terlaksana' => Carbon::now()->addDays(1), 
           'jam_mulai' => Carbon::now()->addDays(2)->format('H:i:s'),
           'jam_selesai' => Carbon::now()->addDays(2)->format('H:i:s'),
           'lokasi' => 'Paud',
           'link_gmaps' => 'https://goo.gl/maps/CLEW5cRBH19d5E538'
        ]);

        
    }
}