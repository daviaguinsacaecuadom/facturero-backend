<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
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
                'name' => 'index',
                'guard_name' => 'web',
            ],
            [
                'id' => 2,
                'name' => 'show',
                'guard_name' => 'web',
            ],
            [
                'id' => 3,
                'name' => 'edit',
                'guard_name' => 'web',
            ],
            [
                'id' => 4,
                'name' => 'delete',
                'guard_name' => 'web',
            ]
        ];

        foreach ($data as $permission) {
            Permission::create($permission);
        }

        // DB::table('permissions')->insert([
        //     'id' => 1,
        //     'name' => 'admin',
        //     'guard_name' => 'web',
        // ]);
        // DB::table('permissions')->insert([
        //     'id' => 2,
        //     'name' => 'show',
        //     'guard_name' => 'web',
        // ]);
        // DB::table('permissions')->insert([
        //     'id' => 3,
        //     'name' => 'edit',
        //     'guard_name' => 'web',
        // ]);
        // DB::table('permissions')->insert([
        //     'id' => 4,
        //     'name' => 'delete',
        //     'guard_name' => 'web',
        // ]);
    }
}
