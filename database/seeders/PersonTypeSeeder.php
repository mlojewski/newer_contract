<?php

namespace Database\Seeders;

use App\Models\PersonType;
use App\Models\PersonTypeIcon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PersonType::factory(10)->create();
        PersonTypeIcon::factory(10)->create();

        $personTypeIcons = PersonTypeIcon::all();

        foreach ($personTypeIcons as $icon) {
            $icon->person_type_id = $icon->id;
            $icon->save();
        }
    }
}
