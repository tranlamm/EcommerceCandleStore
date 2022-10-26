<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\auth\Admin;
use App\Models\auth\Roles;
use Auth;

class AuthController extends Controller
{
    public function loginAdmin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
            return redirect(route('admin.index'));
        }
        else {
            return redirect(route('login.index'))->with('message', 'Wrong username or password !');
        }
    }
}
