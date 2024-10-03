<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Blog;
use App\Models\City;
use App\Models\Country;
use App\Models\Gender;
use App\Models\Home;
use App\Models\Language;
use App\Models\Organization;
use App\Models\OrganizationType;
use App\Models\Person;
use App\Models\PersonType;
use App\Models\Sport;

class AdminPanelController extends Controller
{
    public function index()
    {
        $sports = Sport::all();
        $genders = Gender::all();
        $organizationTypes = OrganizationType::all();
        $personTypes = PersonType::all();
        $languages = Language::all();

        return view('admin.panel', [
            'sports' => $sports,
            'genders' => $genders,
            'organization_types' => $organizationTypes,
            'person_types' => $personTypes,
            'languages' => $languages
        ]);
    }

    public function blogManagement()
    {
        $blogs = Blog::all();

        return view('admin.blog_panel', [
            'blogs' => $blogs,
        ]);
    }

    public function countryManagement()
    {
        $countries = Country::with('flag')->get();
        return view('admin.country_panel', [
            'countries' => $countries
        ]);
    }

    public function cityManagement()
    {
        $cities = City::all();

        return view('admin.city_panel', [
            'cities' => $cities,
        ]);
    }
    public function peopleManagement()
    {
        $people = Person::with('Photo')->get();

        return view('admin.player_panel', [
            'people' => $people
        ]);
    }

    public function organizationManagement()
    {
        $organizations = Organization::with('Logo')->get();

        return view('admin.organization_panel', [
            'organizations' => $organizations
        ]);
    }

    public function sportManagement()
    {
        $sports = Sport::with('SportLogo')->get();

        return view('admin.sport_panel', [
            'sports' => $sports
        ]);
    }

    public function adManagement()
    {
        $ads = Ad::with('User')->orderBy('created_at', 'desc')->get();

        return view('admin.ad_panel', ['ads' => $ads]);
    }

    public function contentManagement()
    {
        return view('admin.content_panel');
    }
}
