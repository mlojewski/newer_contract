<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Blog;
use App\Models\City;
use App\Models\DualCareer;
use App\Models\Home;
use App\Models\PersonType;
use App\Models\Sport;
use App\Models\User;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{

    public function index()
    {
        $content = Home::first();
        $dual = DualCareer::first();
        $blogs = HomeController::blogs();
        $promotedAds = (new AdController)->promoted();
        $personTypes  = PersonType::with(['Ads' => ['Sport'], 'Icon'])->withCount('Ads')->get();
        $sports = Sport::with(['Ads' => ['PersonTypes'], 'SportLogo'])
            ->withCount('ads')
            ->has('Ads')
            ->orderBy('ads_count', 'desc')
            ->limit(8)->get();

        $sportSortedAds = $this->collectAdsForSports($sports, $personTypes);
        $organizationsForHome = $this->collectPartnersWithLatestAds();
        $countriesForHome = $this->getCountriesWithmostAds();

        return view('index', [
            'content' => $content,
            'dual' => $dual,
            'blogs' => $blogs,
            'promoted_ads' => $promotedAds,
            'person_types' => $personTypes,
            'sports' => $sports,
            'sportSortedAds' => $sportSortedAds,
            'partners' => $organizationsForHome,
            'countries' => $countriesForHome
        ]);
    }

    public function edit()
    {
        $content = Home::first();

        return view('home.edit', ['content' => $content]);
    }

    public function blogs()
    {
        return Blog::with('blog_photos')->orderBy('created_at', 'desc')->limit(5)->get();
    }

    function collectAdsForSports($sports, $personTypes)
    {

        // Loop through each sport
        $adCounts = $sports->map(function ($sport) use ($personTypes) {
            // Count the number of ads related to this sport
            $adCount = Ad::where('sport_id', $sport->id)->count();

            // Create an array with the sport name and total ad count
            $result = [
                'sport' => $sport->name,
                'sport_id' => $sport->id,
                'total' => $adCount,
                'personTypes' => [],
            ];

            // Loop through each person type
            foreach ($personTypes as $personType) {
                // Count the number of ads related to this sport and person type
                $adPersonTypeCount = Ad::where('sport_id', $sport->id)
                    ->whereHas('personTypes', function ($query) use ($personType) {
                        $query->where('person_types.id', $personType->id);
                    })->count();

                // Add the person type and ad count to the result array
                $result['personTypes'][] = [
                    'name' => $personType->name,
                    'count' => $adPersonTypeCount,
                ];
            }

            return $result;
        });

        return $adCounts;
    }

    public function collectPartnersWithLatestAds()
    {
        return User::with(['Ads' => function($query) {
            $query->orderBy('created_at', 'desc')->take(1);
        }, 'Organization' => ['Logo']])
            ->has('ads')
            ->limit(5)
            ->withCount('ads')
            ->orderBy('ads_count')
            ->get();
    }

    public function getCountriesWithmostAds()
    {
        $cities = City::withCount(['Ads'])->orderByDesc('ads_count')->limit(6)->get();
        $adsByCountry = [];

        foreach ($cities as $city) {
            $country = $city->country;
            if (!isset($adsByCountry[$country->id])) {
                $adsByCountry[$country->id] = [
                    'country' => $country,
                    'ads_count' => 0
                ];
            }
            $adsByCountry[$country->id]['ads_count'] += $city->ads_count;
        }

        // Sort the array by ads_count in descending order
        usort($adsByCountry, function ($a, $b) {
            return $b['ads_count'] - $a['ads_count'];
        });

        return $adsByCountry;
    }

    public function update (Request $request) {
        $home = Home::first();

        $home->featured_title = $request->featured_title;
        $home->featured_content = $request->featured_content;
        $home->top_sports_title = $request->top_sports_title;
        $home->top_sports_content = $request->top_sports_content;
        $home->partners_title = $request->partners_title;
        $home->partners_content = $request->partners_content;
        $home->top_countries_title = $request->top_countries_title;
        $home->top_countries_content = $request->top_countries_content;
        $home->blog_title = $request->blog_title;
        $home->blog_content = $request->blog_content;
        $home->dual_title = $request->dual_title;
        $home->dual_content = $request->dual_content;
        $home->pricing_title = $request->pricing_title;
        $home->pricing_content = $request->pricing_content;
        $home->save();

        return redirect('/admin/panel');
    }
}
