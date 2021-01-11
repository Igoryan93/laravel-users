<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index(){

        $users = User::orderBy('id', 'desc')->get();

        return view('index', ['users' => $users]);
    }

    public function reg() {
        return view('reg');
    }

    public function login() {
        return  view('login');
    }

    public function user($id) {

        $user = User::find(1)->where('id', $id)->get();
        return view('user', ['user' => $user]);
    }

    public function profile($id) {
        $user = User::find(1)->where('id', $id)->get()->first();


        if(empty($user) || Auth::user()->id !== $user->id && !Auth::user()->is_admin) {
            Session::flash('danger', true);
            return redirect()->route('index');
        }
        return view('profile', ['user' => $user]);
    }

    public function changePas($id) {
        $user = User::where('id', $id)->get()->first();

        if(empty($user) || Auth::user()->id !== $user->id && !Auth::user()->is_admin) {
            Session::flash('danger', true);
            return redirect()->route('index');
        }

        return view('changePas', ['user' => $user]);
    }

}
