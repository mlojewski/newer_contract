<?php

namespace Database\Seeders;

use App\Models\Sport;
use App\Models\SportLogo;
use Database\Factories\SportLogoFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *created_at
     * @return void
     */
    public function run()
    {
        Sport::factory(10)->create();
        SportLogo::factory(10)->create();

        $sportLogos = SportLogo::all();

        foreach ($sportLogos as $logo) {
            $logo->sport_id = $logo->id;
            $logo->save();
        }

    }
}
