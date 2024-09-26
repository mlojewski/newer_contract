<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Flag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::factory(10)->create();
        Flag::factory(10)->create();

        $flags = Flag::all();

        foreach ($flags as $flag) {
            $flag->country_id = $flag->id;
            $flag->save();
        }
    }
}
