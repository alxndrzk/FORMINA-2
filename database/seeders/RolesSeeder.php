<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = ['admin','costumer'];

        foreach($role as $item){
            DB::table('roles')->insert([
                'role_name' => $item
            ]);
        }
    }
}
