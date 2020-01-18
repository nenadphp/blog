<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [   'id' => 1,
                'role' => 'admin'
            ],
            [
                'id' => 2,
                'role' => 'author'
            ],
            [
                'id' => 3,
                'role' => 'guest'
            ]
        ]);
    }
}
