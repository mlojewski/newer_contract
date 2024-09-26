<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Flag;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function create()
    {
        return view('country.create');
    }

    public function store(Request $request)
    {
        $country = new Country();
        $country->name = $request->name;
        $country->save();

        $path = $request->flag->store('public/flags');

        $flag = new Flag();
        $flag->path = $path;
        $flag->country_id = $country->id;
        $flag->save();

        return redirect('/admin/country_panel');
    }

    public function delete($id)
    {
        Country::destroy($id);

        return redirect('/admin/country_panel');
    }
    public function edit($id)
    {
        $country = Country::find($id);

        return view('country.edit', ['country' => $country]);
    }

    public function update($id, Request $request)
    {
        $country = Country::with('flag')->where('id', $id)->first();
        $country->name = $request->name;

        $country->save();

        if ($request->flag) {
            $path = $request->flag->store('public/flags');
            $flag = Flag::where('country_id', $country->id)->first();
            $flag->path = $path;
            $flag->country_id = $country->id;
            $flag->save();
        }

        return redirect('/admin/country_panel');
    }
}
