<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function create()
    {
        return view('language.create');
    }

    public function store(Request $request)
    {

        $type = new Language();

        $type->name = $request->name;
        $type->save();

        return redirect('/admin/panel');
    }

    public function delete($id)
    {
        Language::destroy($id);

        return redirect('/admin/panel');
    }

    public function edit($id)
    {
        $language = Language::find($id);

        return view('language.edit', ['language' => $language]);
    }

    public function update($id, Request $request)
    {
        $language = Language::find($id);
        $language->name = $request->name;

        $language->save();

        return redirect('/admin/panel');

    }
}
