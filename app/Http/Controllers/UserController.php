<?php

namespace App\Http\Controllers;

use App\User;
use App\Validate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
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

            return redirect()->route('reg');
        }

    }

    public function in(Request $request) {

        $validate = Validate::check($request, [
            'email' => 'required|max:30|min:5|email',
            'password' => 'required',
        ]);

        if ($validate->fails()) {
            return redirect()->route('login')->withErrors($validate)->withInput();
        }

        $user = User::find(1)->where('email', $request->email)->first();


        if(!Hash::check($request->password, $user->password)) {
            Session::flash('warning', true);
            return redirect()->route('login')->withInput();
        }

        $remember = (Input::has('check')) ? true : false;

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, $remember)) {
            Session::flash('success', true);
            return redirect()->route('index');
        }

    }

    public function logout() {
        Auth::logout();
        return redirect()->route('index');
    }

    public function profile(Request $request, $id) {
        $validate = Validate::check($request, [
            'name' => 'required|min:3|max:30',
            'status' => 'required|min:5',
        ]);
        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        $update = User::where('id', $id)->update([
            'name' => $request->name,
            'status' => $request->status
        ]);

        if($update) {
            Session::flash('success', true);
            return back();
        }
    }


    public function updatePas(Request $request, $id) {
        $validate = Validate::check($request, [
            'password' => 'required',
            'password_new' => 'required|min:5',
            'password_again' => 'required|same:password_new',
        ]);
        if ($validate->fails()) {
            return back()->withErrors($validate)->withInput();
        }

        $user = User::where('id', $id)->get()->first();

        if(!Hash::check($request->password, $user->password)) {
            Session::flash('danger', true);
            return back();
        }

         $user = User::where('id', $id)->update(['password' => Hash::make($request->password_new)]);
         Session::flash('success', true);
         return back();
    }


}
