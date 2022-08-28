<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ZipCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('zip_codes')->insert([
            'zip_code' =>  '01110',
            'locality' => Str::random(10),
            'federal_entity_id' => 1
        ]);
    }
}
