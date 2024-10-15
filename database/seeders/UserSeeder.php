<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            ['id' => 1, 'level' => 'admin', 'username' => 'admin','name' => 'Administrator', 'email' => 'admin@gmail.com', 'password' => bcrypt('12345')],
            ['id' => 2, 'level' => 'user', 'username' => 'user','name' => 'User','email' => 'user@gmail.com', 'password' => bcrypt('12345')],
        ]);
    }
}
