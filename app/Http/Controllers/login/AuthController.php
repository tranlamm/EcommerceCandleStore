<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;

class AuthController extends Controller
{
    public function getLoginAdmin()
    {
        return view('admin.login.adminLoginPage');
    }

    public function postLoginAdmin(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Auth::guard('admin')->attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
            return redirect(route('admin.index'));
        }
        else {
            return redirect(route('login.index'))->with('message', 'Wrong username or password !')->withInput();
        }
    }

    // route admin.index (merge class AdminController)
    public function getAdminPage()
    {
        return view('layouts.admin.admin_layout');
    }

    public function postLogoutAdmin()
    {
        Auth::guard('admin')->logout();
        return redirect(route('login.index'));
    }
}
