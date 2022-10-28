<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\auth\Admin;
use App\Models\auth\Roles;
use Auth;
use Session;

class AuthController extends Controller
{
    public function getLoginAdmin()
    {
        return view('login.adminLoginPage');
    }

    public function postLoginAdmin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
            return redirect(route('admin.index'));
        }
        else {
            Session::flush();
            return redirect(route('login.index'))->with('message', 'Wrong username or password !');
        }
    }

    public function getAdminPage()
    {
        return view('layouts.admin.admin_layout');
    }

    public function postLogoutAdmin()
    {
        Auth::logout();
        return redirect(route('login.index'));
    }
}
