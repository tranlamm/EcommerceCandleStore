<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\auth\Customer;
use App\Models\auth\Roles;

use Auth;
use Session;
use Hash;

class CustomerLoginController extends Controller
{
    public function getLoginCustomer()
    {
        return view('customer.login.customerLoginPage');
    }

    public function postLoginCustomer(Request $request)
    {
        Auth::guard('customer')->logout();
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        if (Auth::guard('customer')->attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
            return redirect(route('shop.index'));
        }
        else {
            return back()->with('wrong', 'Wrong username or password !')->withInput();
        }
    }

    public function postLogoutCustomer()
    {
        Auth::guard('customer')->logout();
        return back();
    }

    public function postRegisterCustomer(Request $request) 
    {
        $request->validate([
            'username' => 'bail|required|min:3|max:50',
            'password' => 'bail|required|confirmed|min:8',
            'fullname' => 'bail|required',
            'email' => 'bail|email',
            'address' => 'bail|required',
            'phoneNumber' => array(
                'bail',
                'required',
                'regex:/(84|0[3|5|7|8|9])+([0-9]{8})/u',
            ),
        ]);

        if (Customer::where('username', '=',  $request->input('username'))->first())
            return back()->withErrors(['exists' => 'Username already exists'])->withInput($request->input());

        $role = Roles::where('role', 'client')->first();
        Customer::create([
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'email' => $request->input('email'),
            'phoneNumber' => $request->input('phoneNumber'),
            'address' => $request->input('address'),
            'fullname' => $request->input('fullname'),
            'role' => $role->id,
        ]);

        return back()->with('message', 'Sign up successfully !');
    }

    public function showAccountInfo(Request $request)
    {
        $customer = Auth::guard('customer')->user();

        return view('customer.main.customerAccountInfo', [
            'customer' => $customer,
        ]);
    }

    public function changeAccountInfo(Request $request)
    {
        $request->validate([
            'fullname' => 'bail|required',
            'email' => 'bail|email',
            'address' => 'bail|required',
            'phoneNumber' => array(
                'bail',
                'required',
                'regex:/(84|0[3|5|7|8|9])+([0-9]{8})/u',
            ),
        ]);

        $customer = Auth::guard('customer')->user();

        $customer->update([
            'fullname' => $request->input('fullname'),
            'phoneNumber' => $request->input('phoneNumber'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
        ]);

        return back()->with('message', 'Change information successfully !');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'bail|required|min:8',
            'password' => 'bail|required|confirmed|min:8',
        ]);
        
        $customer = Auth::guard('customer')->user();
        if (!Hash::check($request->input('old_password'), $customer->password))
            return back()->withErrors(['old_password' => 'Wrong password!']);

        $customer->update([
            'password' => bcrypt($request->input('password')),
        ]);

        Auth::guard('customer')->logout();
        return redirect(route('login_customer.index'))->with('message', 'Change password successfully !');
    }
}
