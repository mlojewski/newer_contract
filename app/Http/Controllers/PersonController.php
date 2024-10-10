<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Gender;
use App\Models\Language;
use App\Models\Person;
use App\Models\PersonPhoto;
use App\Models\PersonType;
use App\Models\Sport;
use App\Models\User;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function create()
    {
        $user = User::where('id', auth()->id())->first();
        $sports = Sport::all();
        $countries = Country::all();
        $genders = Gender::all();
        $languages = Language::all();
        $types = PersonType::all();

        return view('person.create', [
            'user' => $user,
            'sports' => $sports,
            'countries' => $countries,
            'genders' => $genders,
            'languages' => $languages,
            'person_types' => $types
        ]);
    }

    public function store(Request $request)
    {

        $user = User::where('id', auth()->id())->first();
        $person = new Person();

        $person->name = $user->name;
        $person->last_name = $request->last_name;
        $person->residence = $request->residence;
        $person->birth_date = $request->birth_date;
        $person->video_url = $request->video_url;
        $person->fb_url = $request->fb_url;
        $person->ig_url = $request->ig_url;
        $person->gender_id = $request->gender;
        $person->sport_id = $request->sport;
        $person->country_id = $request->country;
        $person->career = $request->career;

        if ($request->sport_additional) {
            $person->sport_additional = $request->sport_additional;
        }

        $person->achievements = $request->achievements;
        $person->tax_id = $request->tax_id;
        $person->billing_address = $request->billing_address;
        $person->person_type_id = $request->type;
        $person->save();

        $person->languages()->attach($request->language);

        $user->person_id = $person->id;
        $user->save();

        $path = $request->photo->store('public/photos');

        $photo = new PersonPhoto();
        $photo->path = $path;
        $photo->person_id = $person->id;

        $photo->save();
        return redirect('/');

    }

    public function delete($id)
    {
        Person::destroy($id);

        return redirect('/admin/player_panel');
    }
    public function edit($id)
    {
        $sports = Sport::all();
        $countries = Country::all();
        $genders = Gender::all();
        $person = Person::with('Languages')->where('id',$id)->first();
        $personTypes = PersonType::all();
        $languages = Language::all();


        return view('person.edit', [
            'person' => $person,
            'person_types' => $personTypes,
            'sports' => $sports,
            'countries' => $countries,
            'genders' => $genders,
            'languages' => $languages
        ]);
    }

    public function update($id, Request $request)
    {

        $person = Person::find($id);

        $person->last_name = $request->last_name;
        $person->residence = $request->residence;
        $person->birth_date = $request->birth_date;
        $person->video_url = $request->video_url;
        $person->fb_url = $request->fb_url;
        $person->ig_url = $request->ig_url;
        $person->gender_id = $request->gender;
        $person->sport_id = $request->sport;
        $person->country_id = $request->country;
        $person->career = $request->career;
        $person->person_type_id = $request->type;

        if ($request->sport_additional) {
            $person->sport_additional = $request->sport_additional;
        }
        $person->achievements = $request->achievements;
        $person->tax_id = $request->tax_id;
        $person->billing_address = $request->billing_address;

        $person->save();
        $person->languages()->detach();
        $person->languages()->attach($request->language);

        if ($request->photo) {
            $photo = PersonPhoto::where('person_id', $person->id)->first();
            $path = $request->photo->store('public/photos');
            $photo->path = $path;
            $photo->save();
        }
        $user = User::where('id', auth()->id())->first();

        if ($user->is_admin == 1) {
            return redirect('/admin/player_panel');
        }
         return redirect('/');

    }

    public function index()
    {
        $users = User::with(['Person' => ['Sport', 'Gender', 'Languages', 'Country', 'PersonType']])->whereNotNull('person_id')->get();
        $people = $users->pluck('Person');

        $sports = Sport::all();
        $genders = Gender::all();
        $countries = Country::all();
        $personTypes = PersonType::all();
        $languages = Language::all();

        return view ('person.index', [
            'people' => $people,
            'sports' => $sports,
            'genders' => $genders,
            'countries' => $countries,
            'person_types' => $personTypes,
            'languages' => $languages
        ]);
    }

    public function show($id)
    {
        echo "dupa";
    }
}
