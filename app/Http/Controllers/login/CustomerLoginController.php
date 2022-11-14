<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Models\auth\Customer;
use App\Models\auth\Roles;

class CustomerLoginController extends Controller
{
    public function getLoginCustomer()
    {
        return view('customer.login.customerLoginPage');
    }

    // public function postLoginCustomer(Request $request)
    // {
    //     Session::flush();
    //     $request->validate([
    //         'username' => 'required',
    //         'password' => 'required'
    //     ]);
    //     if (Auth::guard('customer')->attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
    //         return redirect('/');
    //     }
    //     else {
    //         return redirect(route('login_customer.index'))->with('message', 'Wrong username or password !')->withInput();
    //     }
    // }

    // public function postLogoutCustomer()
    // {
    //     Auth::guard('customer')->logout();
    //     return redirect(route('login_customer.index'));
    // }

    // public function getRegisterCustomer()
    // {
    //     return view('customer.login.customerRegisterPage');
    // }

    // public function postRegisterCustomer(Request $request) 
    // {
    //     $request->validate([
    //         'username' => 'bail|required|min:3|max:50',
    //         'password' => 'bail|required|confirmed|min:6',
    //         'fullname' => 'bail|required',
    //         'email' => 'bail|email',
    //         'address' => 'bail|required',
    //         'phoneNumber' => array(
    //             'bail',
    //             'required',
    //             'regex:/(84|0[3|5|7|8|9])+([0-9]{8})/u',
    //         ),
    //     ]);

    //     $role = Roles::where('role', 'client')->first();
    //     Customer::create([
    //         'username' => $request->input('username'),
    //         'password' => bcrypt($request->input('password')),
    //         'email' => $request->input('email'),
    //         'phoneNumber' => $request->input('phoneNumber'),
    //         'address' => $request->input('address'),
    //         'fullname' => $request->input('fullname'),
    //         'role' => $role->id,
    //     ]);

    //     return redirect(route('login_customer.index'))->with('message', 'Sign up successfully !');
    // }
}
