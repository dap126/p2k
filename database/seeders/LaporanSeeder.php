<?php

namespace Database\Seeders;

use DB;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('laporans')->insert([
            'nama' => 'Eshi Aulia',
            'tanggal_melapor' => Carbon::parse('2025-06-20'),
            'lokasi_kerusakan' => 'Ruang Lab 2',
            'deskripsi_kerusakan' => 'Proyektor tidak menyala.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
