<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = ["Admin", "Doctor", "Patient"] ;

        foreach ($role as $s) {
            DB::table('user_roles')->insert([
                'role' => $s,
                'created_at' => now(),
                'updated_at' => now() 
            ]);
        }
    }
}
