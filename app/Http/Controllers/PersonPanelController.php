<?php

namespace App\Http\Controllers;

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

class PersonPanelController extends Controller
{
    public function index()
    {
        $person = User::where('id',Auth::id())->with(['person' => ['photo']])->first();
        $sports = Sport::all();
        $genders = Gender::all();
        $organizationTypes = OrganizationType::all();
        $personTypes = PersonType::all();
        $languages = Language::all();
        $countries = Country::all();

        return view('person_panel.panel', [
            'person' => $person,
            'countries' => $countries,
            'sports' => $sports,
            'genders' => $genders,
            'organization_types' => $organizationTypes,
            'person_types' => $personTypes,
            'languages' => $languages
        ]);
    }
    public function messageManagement() {
        $received = Message::where('recipient',Auth::id())->orderBy('created_at', 'DESC')->get();

        $sent = Message::where('sender',Auth::id())->orderBy('created_at', 'DESC')->get();

        return view('person_panel.message_panel', [
            'received' => $received,
            'sent' => $sent
        ]);
    }
}
