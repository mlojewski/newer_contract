<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\PersonType;
use App\Models\PersonTypeIcon;
use Illuminate\Http\Request;

class PersonTypeController extends Controller
{
    public function create()
    {
        return view('person_type.create');
    }

    public function store(Request $request)
    {
        $type = new PersonType();

        $type->name = $request->name;
        $type->save();

        $path = $request->icon->store('public/person_type_icons');
        $icon = new PersonTypeIcon();
        $icon->path = $path;
        $icon->person_type_id = $type->id;
        $icon->save();
        return redirect('/admin/panel');
    }

    public function delete($id)
    {
        PersonType::destroy($id);
        return redirect('/admin/panel');
    }

    public function edit($id)
    {
        $personType = PersonType::find($id);

        return view('person_type.edit', ['person_type' => $personType]);
    }

    public function update($id, Request $request)
    {

        $personType = PersonType::find($id);

        $personType->name = $request->name;

        $personType->save();
        if ($request->icon){
            $path = $request->icon->store('public/person_type_icons');

            $icon = PersonTypeIcon::where('person_type_id', $personType->id)->first();
            $icon->path = $path;
            $icon->person_type_id = $personType->id;

            $icon->save();
        }

        return redirect('/admin/panel');

    }
}
