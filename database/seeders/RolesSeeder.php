<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ['id' => 1, 'name' => 'RSE'],
            ['id' => 2, 'name' => 'RSENV'],
            ['id' => 3, 'name' => 'RPM'],
            ['id' => 4, 'name' => 'RAF'],
            ['id' => 5, 'name' => 'RAI'],
            ['id' => 6, 'name' => 'CP'],
            ['id' => 7, 'name' => 'DP'],
            ['id' => 8, 'name' => 'Autres'],
            ['id' => 9, 'name' => 'CPT'],
        ]);
    }
}
