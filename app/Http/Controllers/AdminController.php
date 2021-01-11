<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index() {
        $users = User::get();

        return view('admin.users', ['users' => $users]);
    }
    public function delete($id) {
        User::where('id', $id)->delete();
        Session::flash('success', true);
        return back();
    }

    public function roleAdmin($id) {
        User::where('id', $id)->update(['is_admin' => 1]);
        Session::flash('success', true);
        return back();
    }

    public function roleUser($id) {
        User::where('id', $id)->update(['is_admin' => 0]);
        Session::flash('success', true);
        return back();
    }
}
