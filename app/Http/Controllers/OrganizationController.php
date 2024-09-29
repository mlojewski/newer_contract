<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Language;
use App\Models\OrganizationLogo;
use App\Models\Organization;
use App\Models\OrganizationType;
use App\Models\User;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function create()
    {
        $user = User::where('id', auth()->id())->first();
        $organizationTypes = OrganizationType::all();
        $languages = Language::all();

        return view('organization.create', [
            'user' => $user,
            'organization_types' => $organizationTypes,
            'languages' => $languages
        ]);
    }

    public function store(Request $request)
    {
        $user = User::where('id', auth()->id())->first();

        $organization = new Organization();

        $organization->name = $user->name;
        $organization->fb_url = $request->fb_url;
        $organization->ig_url = $request->ig_url;
        $organization->li_url = $request->li_url;
        $organization->www_url = $request->www_url;
        $organization->location = $request->location;
        $organization->description = $request->description;
        $organization->tax_id = $request->tax_id;
        $organization->billing_address = $request->billing_address;
        $organization->organization_type_id = $request->organization_type;

        $organization->save();
        $user->organization_id = $organization->id;
        $user->save();

        $organization->languages()->attach($request -> language);

        $path = $request->logo->store('public/organization_logos');

        $logo = new OrganizationLogo();
        $logo->path = $path;
        $logo->organization_id = $organization->id;
        $logo->save();

        return redirect('/');
    }

    public function delete($id)
    {
        Organization::destroy($id);
        return redirect('/admin/organization_panel');
    }

    public function edit($id)
    {
        $organizationTypes = OrganizationType::all();
        $organization = Organization::find($id);
        $languages = Language::all();

        return view('organization.edit', [
            'organization' => $organization,
            'organization_types' => $organizationTypes,
            'languages' => $languages
        ]);
    }

    public function update($id, Request $request)
    {
        $organization = Organization::find($id);

        $organization->fb_url = $request->fb_url;
        $organization->ig_url = $request->ig_url;

        $organization->li_url = $request->li_url;
        $organization->www_url = $request->www_url;
        $organization->description = $request->description;
        $organization->location = $request->location;
        $organization->tax_id = $request->tax_id;
        $organization->billing_address = $request->billing_address;
        $organization->organization_type_id = $request->organization_type;

        $organization->save();

        $organization->languages()->detach();
        $organization->languages()->attach($request->language);

        if ($request->logo) {
            $logo = OrganizationLogo::where('organization_id', $organization->id)->first();
            $path = $request->logo->store('public/organization_logos');
            $logo->path = $path;
            $logo->save();
        }

        $user = User::where('id', auth()->id())->first();
        if ($user->is_admin == 1) {
            return redirect('/admin/organization_panel');
        }
        return redirect('/');
    }

    public function adsManagement($id)
    {
        $user = User::with('Organization')->where('id', $id)->first();

        $ads = Ad::where('user_id', $id)->orderBy('is_valid', 'DESC')->get();

        return view('organization.ads', ['ads' => $ads, 'user' => $user]);
    }
}
