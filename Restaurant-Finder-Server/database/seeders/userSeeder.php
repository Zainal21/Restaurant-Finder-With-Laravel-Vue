<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'zainal',
                'email' => 'user@zain.com',
                'password' => bcrypt('password')
            ]
        );        
    }
}
