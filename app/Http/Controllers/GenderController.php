<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use Illuminate\Http\Request;

class GenderController extends Controller
{
    public function create()
    {
        return view ('gender.create');
    }

    public function store(Request $request)
    {
        $gender = new Gender();
        $gender->name = $request->name;

        $gender->save();

        return redirect('/admin/panel');
    }

    public function delete($id)
    {
        Gender::destroy($id);

        return redirect('/admin/panel');
    }

    public function edit($id)
    {
        $gender = Gender::find($id);

        return view('gender.edit', ['gender' => $gender]);
    }

    public function update($id, Request $request)
    {
        $gender = Gender::find($id);
        $gender->name = $request->name;

        $gender->save();

        return redirect('/admin/panel');

    }
}
