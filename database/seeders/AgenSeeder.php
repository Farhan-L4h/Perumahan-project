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
        ]);
    }
}
