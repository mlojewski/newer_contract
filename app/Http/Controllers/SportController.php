<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use App\Models\SportLogo;
use Illuminate\Http\Request;

class SportController extends Controller
{
    public function create()
    {

        return view('sport.create');
    }

    public function store(Request $request)
    {
        $sport = new Sport();
        $sport->name = $request->name;

        $sport->save();

        $path = $request->sport_logo->store('public/sport_logos');

        $logo = new SportLogo();
        $logo->path = $path;
        $logo->sport_id = $sport->id;
        $logo->save();

        return redirect('/admin/sport_panel');
    }

    public function delete($id)
    {
        Sport::destroy($id);

        return redirect('/admin/sport_panel');
    }

    public function edit($id)
    {
        $sport = Sport::find($id);

        return view('sport.edit', ['sport' => $sport]);
    }

    public function update($id, Request $request)
    {
        $sport = Sport::with('SportLogo')->where('id', $id)->first();

        $sport->name = $request->name;
        $sport->save();

        $path = $request->sport_logo->store('public/sport_logos');

        $logo = SportLogo::where('sport_id', $sport->id)->first();
        $logo->path = $path;
        $logo->sport_id = $sport->id;
        $logo->save();

        return redirect ('/admin/sport_panel');
    }
}
