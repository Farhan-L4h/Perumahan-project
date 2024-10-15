<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategoris')->insert([
            ['nama_kategori' => 'Rumah'],
            ['nama_kategori' => 'Ruko'],
            ['nama_kategori' => 'Tanah'],
            ['nama_kategori' => 'Kost'],
        ]);
    }
}
