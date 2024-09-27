<?php

namespace App\Http\Controllers;


use App\Models\Ad;
use App\Models\Country;
use App\Models\PersonType;
use App\Models\Sport;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function adFilter(Request $request)
    {

    $ads = Ad::with('PersonTypes')->with(['User' => ['Organization' => ['logo']]])->with(['city' => ['country']])->get();

       if ($request->sport || $request->sport != 0) {
           foreach ($ads as $key => $ad) {
               if ($ad->sport_id != $request->sport) {
                   unset($ads[$key]);
               }
           }
       }

        if ($request->is_promoted || $request->is_promoted != 0) {
            foreach ($ads as $key => $ad) {
                if ($ad->is_promoted != $request->is_promoted) {
                    unset($ads[$key]);
                }
            }
        }


        if ($request->person_type || $request->person_type != 0) {
            $type = PersonType::where('name', $request->person_type)->first();

            foreach ($ads as $key => $ad) {
                if(!$ad->personTypes->contains(PersonType::find($type->id))) {
                    unset($ads[$key]);
                }
            }
        }

       if ($request->city) {

           foreach ($ads as $key => $ad) {
               if ($ad->city_id != $request->city) {
                   unset($ads[$key]);
               }
           }
       }

       if ($request->country) {
           foreach ($ads as $key => $ad) {
               if ($ad->city->country->name !== $request->country) {
                   unset($ads[$key]);
               }
           }
       }

       if ($request->min_salary) {
           foreach ($ads as $key => $ad) {
               if ($ad->salary < $request->min_salary) {
                   unset($ads[$key]);
               }
           }
       }

        if ($request->max_salary) {
            foreach ($ads as $key => $ad) {
                if ($ad->salary > $request->max_salary) {
                    unset($ads[$key]);
                }
            }
        }

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
}
