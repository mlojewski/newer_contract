<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\DualCareer;
use App\Models\Home;
use App\Models\Language;
use App\Models\Message;
use App\Models\Organization;
use App\Models\OrganizationType;
use App\Models\Person;
use App\Models\PersonPhoto;
use App\Models\OrganizationLogo;
use Database\Factories\DualCareerFactory;
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
        $this->call([BlogSeeder::class]);
        $this->call([CountrySeeder::class]);
        City::factory(5)->create();
        OrganizationType::factory(5)->create();
        $this->call([PersonTypeSeeder::class]);
        Language::factory(5)->create();
        $this->call([SportSeeder::class]);
        $this->call([AdSeeder::class]);
        $this->call([GenderSeeder::class]);
        Person::factory(1)->create();
        Organization::factory(1)->create();
        PersonPhoto::factory(1)->create();
        OrganizationLogo::factory(1)->create();
        DualCareer::factory(1)->create();
        Message::factory(3)->create();

        Home::factory(1)->create();
    }
}
