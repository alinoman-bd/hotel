<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'surname' => 'SA',
            'phone' => '0123456789',
            'email' => 'admin@hotel.com',
            'address' => 'ABC/ 333 ZYX',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'is_admin' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'User',
            'surname' => 'SA',
            'phone' => '0123456789',
            'email' => 'user@hotel.com',
            'address' => 'ABC/ 333 ZYX',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'is_admin' => 0
        ]);
    }
}
