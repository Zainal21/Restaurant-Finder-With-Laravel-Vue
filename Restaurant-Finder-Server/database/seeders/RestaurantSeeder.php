<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurant')->insert([
                'name' => 'Resto BuDi',
                'address' => 'Mojogedang',
                'rating' => 10
            ],
        );
        
        DB::table('restaurant')->insert(
            [
                'name' => 'Resto Busri',
                'address' => 'Karangpandan',
                'rating' => 9
            ] 
        );
        DB::table('restaurant')->insert(
            [
                'name' => 'Resto BuD',
                'address' => 'Karanganyar',
                'rating' => 2
            ]
        );
    }
}
