<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class BillingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //     DB::table('billings')->insert([
    //         'ruc' =>Str::random(13),
    //         'type'=>rand('Efectivo', 'Cheque'),
    //         'isPay'=>rand(true,false),
    //         'email'=>'admin@demo.com',
    //    ]);
    }
}
