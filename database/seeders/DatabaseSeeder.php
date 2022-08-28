<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\FederalEntity;
use App\Models\Municipality;
use App\Models\Settlement;
use App\Models\SettlementType;
use App\Models\ZipCode;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         ZipCode::factory()->create();
         FederalEntity::factory()->create();
         Municipality::factory(5)->create();
         SettlementType::factory(6)->create();
         Settlement::factory(3)->create();
    }
}
