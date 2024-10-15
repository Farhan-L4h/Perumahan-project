<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('agens')->insert([
            ['name' => 'Agen 1', 'username' => 'agen1', 'contact' => '123456789', 'company' => 'Company 1', 'alamat' => 'Address 1'],
            ['name' => 'Agen 2', 'username' => 'agen2', 'contact' => '987654321', 'company' => 'Company 2', 'alamat' => 'Address 2'],
            ['name' => 'Agen 3', 'username' => 'agen3', 'contact' => '456123789', 'company' => 'Company 3', 'alamat' => 'Address 3'],
            ['name' => 'Agen 4', 'username' => 'agen4', 'contact' => '789456123', 'company' => 'Company 4', 'alamat' => 'Address 4'],
        ]);
    }
}
