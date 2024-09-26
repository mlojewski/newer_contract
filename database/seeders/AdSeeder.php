<?php

namespace Database\Seeders;

use App\Models\Ad;
use App\Models\PersonType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ad::factory(37)->create();

        foreach (Ad::all() as $ad) {

            foreach (PersonType::all() as $type) {
                if (rand(1, 100) > 70) {
                    $ad->PersonTypes()->attach($type->id);
                }
            }
            $ad->save();
        }
    }
}
