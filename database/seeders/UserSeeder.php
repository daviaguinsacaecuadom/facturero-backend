<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name'=>'admin',
            'email'=>'admin@demo.com',
            'phone'=>'593987654321',
            'password'=>Hash::make('admin'),
       ]);
    }
}
