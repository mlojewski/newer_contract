<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\City;
use App\Models\Country;
use App\Models\PersonType;
use App\Models\Sport;
use App\Models\User;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index()
    {
        $ads = Ad::with('PersonTypes')->with(['User' => ['Organization' => ['logo']]])->with(['city' => ['country']])->with('Sport' )->get();
        $sports = Sport::all();
        $countries = Country::all();
        $personTypes = PersonType::all();

        return view ('ad.index', [
            'ads' => $ads,
            'sports' => $sports,
            'countries' => $countries,
            'person_types' => $personTypes,
        ]);
    }

    public function show($id)
    {
        $ad = Ad::with(['User' => ['Organization' => ['logo', 'OrganizationType']]])->with(['city' => ['country']])->with(['sport' => ['sportLogo']])->with('PersonTypes')->find($id);

        $featured = Ad::where('is_promoted', 1)->get();

        return view ('ad.single', ['ad' => $ad, 'featured' => $featured]);
    }

    public function create()
    {
        $cities = City::with('country')->get();
        $sports = Sport::all();
        $personTypes = PersonType::all();

        return view('ad.create', [
            'cities' => $cities,
            'sports' => $sports,
            'person_types' => $personTypes
        ]);
    }

    public function store(Request $request)
    {

        $ad = new Ad();

        $ad->is_promoted = false;
        $ad->is_author_hidden = false;
        $ad->ad_content = $request->ad_content;
        $ad->title = $request->title;
        $ad->requirements = $request->requirements;
        $ad->salary = $request->salary;
        $ad->salary_per = $request->salary_per;
        $ad->is_valid = false;
        $ad->city_id = $request->city;
        $ad->sport_id = $request->sport;
        $ad->user_id = auth()->id();

        $ad->save();

        $ad->PersonTypes()->attach($request->person_type);

        return redirect('/profile');
    }

    public function delete($id)
    {
        Ad::destroy($id);

        return redirect('/admin/ad_panel');
    }

    public function edit($id)
    {
        $ad = Ad::with('PersonTypes')->where('id', $id)->first();
        $cities = City::with('country')->get();
        $sports = Sport::all();
        $personTypes = PersonType::all();

        return view('ad.edit', [
            'ad' => $ad,
            'cities' => $cities,
            'sports' => $sports,
            'person_types' => $personTypes
        ]);
    }

    public function update($id, Request $request)
    {

        $ad = Ad::find($id);

        $ad->ad_content = $request->ad_content;
        $ad->requirements = $request->requirements;
        $ad->salary = $request->salary;
        $ad->title = $request->title;
        $ad->sport_id = $request->sport;

        if ($request->salary_per) {
            $ad->salary_per = $request->salary_per;
        }
        if ($request->is_author_hidden) {
            $ad->is_author_hidden = $request->is_author_hidden;
        }
        if ($request->is_promoted) {
            $ad->is_promoted = $request->is_promoted;
        }
        if ($request->is_valid) {
            $ad->is_valid = $request->is_valid;
        }
        $ad->city_id = $request->city;

        $ad->PersonTypes()->detach();
        $ad->PersonTypes()->attach($request->person_type);


        $ad->save();

        $user = User::where('id', auth()->id())->first();
        if ($user->is_admin == 1) {
            return redirect('/admin/ad_panel');
        }
        return redirect('profile');
    }

    public function promoted()
    {
        return Ad::with(['PersonTypes' => ['Icon']])->where('is_promoted', 1)->get();
    }

    public function matchAuthor()
    {
        $ads = Ad::all();

        foreach ($ads as $ad) {
            $ad->user_id = 2;
            $ad->save();
        }
        return;
    }
}
