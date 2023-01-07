<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\auth\Customer;
use App\Models\auth\CustomerPasswordReset;
use App\Models\auth\Roles;

use Carbon\Carbon;
use Auth;
use Session;
use Hash;
use Mail;

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
        return redirect(route('login_customer.index'))->with('message', 'Change password successfully!');
    }

    public function showChangePassword()
    {
        return view('customer.login.customerResetPasswordPage');
    }

    public function mailResetPassword(Request $request) 
    {
        $request->validate([
            'username' => 'bail|required',
            'email' => 'bail|email',
        ]);
        $username = $request->input('username');
        $email = $request->input('email');

        $customer = Customer::where('username', '=', $username)
                            ->where('email', '=', $email)
                            ->first();
        if (!$customer) 
            return back()->with('wrong', 'Wrong username or email !')->withInput();

        $passwordReset = CustomerPasswordReset::updateOrCreate(
            ['email' => $email], 
            ['token' => Str::random(60)]
        );
        
        if ($passwordReset) {
            Mail::send('customer.login.resetPasswordMailTemplate', ['token' => $passwordReset->token], function($message) use ($email){
                $message->to($email)->subject('Reset Password');
            });
        }

        return redirect(route('reset_customer_change.index'));
    }

    public function showSubmitToken()
    {
        return view('customer.login.customerNewPasswordPage');
    }

    public function patchResetPassword(Request $request)
    {
        $request->validate([
            'token' => 'bail|required',
            'password' => 'bail|required|confirmed|min:8',
        ]);
        $token = $request->input('token');
        $password = $request->input('password');

        $passwordReset = CustomerPasswordReset::where('token', '=', $token)->first();
        if (!$passwordReset) 
            return back()->with('wrong', 'Token is invalid !');

        if (Carbon::parse($passwordReset->updated_at)->addMinutes(5)->isPast())
        {
            $passwordReset->delete();
            return back()->with('wrong', 'Token is expired !');
        }

        $customer = Customer::where('email', '=', $passwordReset->email)->first();
        if (!$customer)
            return back()->with('wrong', 'Token is invalid !');

        $customer->update(['password' => bcrypt($password)]);
        $passwordReset->delete();

        return redirect(route('login_customer.index'))->with('message', 'Change password successfully!');
    }
}
