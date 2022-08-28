<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FederalEntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('federal_entities')->insert([
            'key' =>  random_int(1, 1500),
            'name' => Str::random(10),
            'code' => ''
        ]);
    }
}
