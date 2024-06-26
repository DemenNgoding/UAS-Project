<?php

// namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;

// class UserSeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      */
//     public function run(): void
//     {
//         // mengisi data user
//         DB::table("users")->insert(            
//             [
//             'name' => 'admin',
//             'email'=> 'admin@gmail.com',
//             'roles' => 'admin',
//             'password'=> bcrypt('123456'),
//             ]);

//         DB::table("users")->insert(            
//             [
//             'name' => 'user',
//             'email'=> 'user@gmail.com',
//             'roles' => 'user',
//             'password'=> bcrypt('123456'),
//             ]);
//     }
// }


namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        // Seed command: php artisan db:seed --class=UsersSeeder
        User::create([
            'id' => 1,
            'name' => 'bebek',
            'email' => 'bebek@example.com',
            'email_verified_at' => date("Y-m-d H:i:s"),
            'password' => bcrypt('12345678'),
            // 'password' => '12345678',
            // 'city' => 'Tangerang',
            // 'bio' => 'Ini Punya bebek',
            // 'birth_date' => date("Y-m-d H:i:s"),
            // 'gender' => 'Male',
            // 'registration_date' => date("Y-m-d H:i:s"),
        ]);
    }
}

