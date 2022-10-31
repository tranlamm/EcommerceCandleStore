<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;

class CustomerController extends Controller
{
    public function getLoginCustomer()
    {
        return view('login.customerLoginPage');
    }

    public function postLoginCustomer(Request $request)
    {
        Session::flush();
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Auth::guard('customer')->attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
            return redirect('/');
        }
        else {
            return redirect(route('login_customer.index'))->with('message', 'Wrong username or password !')->withInput();
        }
    }

    public function postLogoutCustomer()
    {
        Auth::guard('customer')->logout();
        return redirect(route('login_customer.index'));
    }
}
