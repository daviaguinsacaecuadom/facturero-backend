<?php

namespace Database\Seeders;

use App\Models\Billing;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            RolSeeder::class,
            UserSeeder::class,
            HasRoleSeeder::class,
            BillingSeeder::class,
            PermissionSeeder::class
        ]);
        User::factory(10)->create();

        Billing::factory(10)->create();

    }
}
