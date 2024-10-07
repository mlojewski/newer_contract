<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Country;
use App\Models\Gender;
use App\Models\Language;
use App\Models\Message;
use App\Models\OrganizationType;
use App\Models\PersonType;
use App\Models\Sport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganizationPanelController extends Controller
{
    public function index()
    {
        $organization = User::where('id',Auth::id())->with(['organization' => ['logo']])->first();
        $sports = Sport::all();
        $genders = Gender::all();
        $organizationTypes = OrganizationType::all();
        $personTypes = PersonType::all();
        $languages = Language::all();
        $countries = Country::all();
        $ads = Ad::where('user_id',$organization->id)->get();

        return view('organization_panel.panel', [
            'organization' => $organization,
            'ads' => $ads,
            'countries' => $countries,
            'sports' => $sports,
            'genders' => $genders,
            'organization_types' => $organizationTypes,
            'person_types' => $personTypes,
            'languages' => $languages
        ]);
    }
    public function adManagement()
    {
        $ads = Ad::where('user_id',Auth::id())->get();
        return view('organization_panel.ad_panel', [
            'ads' => $ads,
        ]);
    }

    public function messageManagement() {
        $received = Message::where('recipient_id',Auth::id())->with(['sender'])->orderBy('created_at', 'DESC')->get();

        $sent = Message::where('sender_id',Auth::id())->orderBy('created_at', 'DESC')->get();

        return view('organization_panel.message_panel', [
            'received' => $received,
            'sent' => $sent
        ]);
    }
}
