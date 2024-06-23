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
        // mengisi data user
        DB::table("users")->insert(            
            [
            'name' => 'admin',
            'email'=> 'admin@gmail.com',
            'roles' => 'admin',
            'password'=> bcrypt('123456'),
            ]);

        DB::table("users")->insert(            
            [
            'name' => 'user',
            'email'=> 'user@gmail.com',
            'roles' => 'user',
            'password'=> bcrypt('123456'),
            ]);



    }
}
