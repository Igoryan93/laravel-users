<?php

namespace App\Http\Controllers;

use App\User;
use App\Validate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CreateController extends Controller
{
    public function create(Request $request) {

        $validate = Validate::check($request, [
            'email' => 'required|unique:users|max:30|min:5|email',
            'name' => 'required|min:3|max:30',
            'password' => 'required|min:5',
            'password_again' => 'required|same:password',
            'check' => 'required'
        ]);

        if ($validate->fails()) {
            return redirect('/reg')->withErrors($validate)->withInput();;
        } else {
            $user = new User($request->all());

            $user->password = Hash::make($request->password);
            $user->date = date('d/m/Y');
            $user->remember_token = str_random(10);
            $user->save();
            Session::flash('success', true);

            return redirect('/reg');
        }

    }
}
