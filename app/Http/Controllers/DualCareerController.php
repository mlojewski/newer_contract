<?php

namespace App\Http\Controllers;

use App\Models\DualCareer;
use Symfony\Component\HttpFoundation\Request;

class DualCareerController extends Controller
{
    public function index()
    {
        $content = DualCareer::first();

        return view('dual.index', ['content' => $content]);
    }

    public function edit()
    {
        $content = DualCareer::first();

        return view('dual.edit', ['content' => $content]);
    }

    public function update(Request $request)
    {
        $content = DualCareer::first();

        $content->title = $request->title;
        $content->quote = $request->quote;
        $content->before_quote = $request->before_quote;
        $content->after_quote = $request->after_quote;

        $content->save();

        return redirect ('/admin/panel');

    }
}
