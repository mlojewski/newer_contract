<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('user.forms');
    }

    public function createAdmin()
    {
        $user = new User();

        $user->name = 'admin';
        $user->email = 'a@a.pl';
        $user->password = Hash::make('123123123');
        $user->is_admin = true;

        $user->save();
        return true;
    }

    public function createOrganization()
    {
        $user = new User();

        $user->name = 'b';
        $user->email = 'b@b.pl';
        $user->password = Hash::make('123123123');
        $user->is_admin = false;
        $user->organization_id = 1;

        $user->save();

        return true;
    }

    public function createPerson()
    {
        $user = new User();

        $user->name = 'c';
        $user->email = 'c@c.pl';
        $user->password = Hash::make('123123123');
        $user->is_admin = false;
        $user->person_id = 1;

        $user->save();

        return true;
    }

    public function show($id)
    {

        $user = User::where('id', $id)->first();

        if ($user->organization_id) {
            $user = User::with('organization')->with(['ads' => ['personTypes']])->where('id', $id)->first();

            return view('user.organization_show', ['user' => $user]);
        } elseif ($user->person_id) {
            $user = User::with(['person'=> ['languages', 'photo']])->where('id', $id)->first();

            return view('user.person_show', ['user' => $user]);
        } else {
            return redirect()->back()->with('pop_up', 'No such user');
        }

    }
}
