<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function create()
    {
        $countries = Country::all();

        return view ('city.create', [
            'countries' => $countries
            ]);
    }

    public function store(Request $request)
    {
        $city = new City();
        $city->name = $request->name;
        $city->country_id = $request->country;

        $city->save();

        return redirect('/admin/panel');
    }

    public function delete($id)
    {
        City::destroy($id);

        return redirect('/admin/panel');
    }

    public function edit($id)
    {
        $countries = Country::all();
        $city = City::find($id);

        return view('city.edit', [
            'city' => $city,
            'countries' => $countries
        ]);
    }

    public function update($id, Request $request)
    {
        $city = City::find($id);

        $city->name = $request->name;
        $city->country_id = $request->country;

        $city->save();

        return redirect('/admin/city_panel');

    }
}
