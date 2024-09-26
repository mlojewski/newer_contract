<?php

namespace App\Http\Controllers;

use App\Models\OrganizationType;
use Illuminate\Http\Request;

class OrganizationTypeController extends Controller
{
    public function create()
    {
        return view('organization_type.create');
    }

    public function store(Request $request)
    {

        $type = new OrganizationType();

        $type->name = $request->name;
        $type->save();

        return redirect('/admin/panel');
    }

    public function delete($id)
    {
        OrganizationType::destroy($id);

        return redirect('/admin/panel');
    }

    public function edit($id)
    {
        $organizationType = OrganizationType::find($id);

        return view('organization_type.edit', ['organization_type' => $organizationType]);
    }

    public function update($id, Request $request)
    {
        $organizationType = OrganizationType::find($id);

        $organizationType->name = $request->name;

        $organizationType->save();

        return redirect('/admin/panel');

    }
}
