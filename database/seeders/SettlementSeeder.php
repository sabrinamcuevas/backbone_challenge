<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettlementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settlements')->insert([
            'key' =>  random_int(1, 1500),
            'name' => Str::random(10),
            'zone_type' => Str::random(10),
            'settlement_type_id' => 1,
            'municipality_id' => 1,
            'zip_code_id' => 1
        ]);
    }
}
