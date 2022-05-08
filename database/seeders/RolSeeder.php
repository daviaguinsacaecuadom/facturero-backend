<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'name' => 'admin',
                'guard_name' => 'web',
            ],
            [
                'id' => 2,
                'name' => 'edit',
                'guard_name' => 'web',
            ],
            [
                'id' => 3,
                'name' => 'client',
                'guard_name' => 'web',
            ]
        ];

        foreach ($data as $permission) {
            Role::create($permission);
        }

    }
}
