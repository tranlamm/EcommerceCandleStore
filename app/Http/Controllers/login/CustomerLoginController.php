<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\auth\Customer;
use App\Models\auth\CustomerPasswordReset;
use App\Models\auth\CustomerVerifiedEmail;
use App\Models\auth\Roles;

use Carbon\Carbon;
use Auth;
use Session;
use Hash;
use Mail;

class CustomerLoginController extends Controller
{
    // Login
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

        if (Auth::guard('customer')->attempt([
            'username' => $request->input('username'), 
            'password' => $request->input('password'), 
            'isVerified' => true
        ])) {
            return redirect(route('shop.index'));
        }
        else {
            return back()->with('wrong', 'Wrong username or password !')->withInput();
        }
    }

    // Logout
    public function postLogoutCustomer()
    {
        Auth::guard('customer')->logout();
        return back();
    }

    // Register
    public function postRegisterCustomer(Request $request) 
    {
        $request->validate([
            'username' => 'bail|required|min:3|max:50',
            'password' => 'bail|required|confirmed|min:8',
            'fullname' => 'bail|required',
            'email' => 'bail|email|required',
            'address' => 'bail|required',
            'phoneNumber' => array(
                'bail',
                'required',
                'regex:/(84|0[3|5|7|8|9])+([0-9]{8})/u',
            ),
        ]);

        $customer = Customer::where('email', '=',  $request->input('email'))->first();
        if ($customer)
        {
            if ($customer->isVerified)
                return back()->withErrors(['email_exists' => 'Email already exists'])->withInput($request->input());
            else
                return redirect(route('register_customer_verify.index'));
        }

        if (Customer::where('username', '=',  $request->input('username'))->first())
            return back()->withErrors(['exists' => 'Username already exists'])->withInput($request->input());

        $email = $request->input('email');
        $verifyToken = CustomerVerifiedEmail::updateOrCreate(
            ['email' => $email], 
            ['token' => Str::random(10)]
        );
        
        if ($verifyToken) {
            Mail::send('customer.login.createAccountMailTemplate', ['token' => $verifyToken->token], function($message) use ($email){
                $message->to($email)->subject('Create Account Token');
            });
        }

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
        return redirect(route('register_customer_verify.index'));
    }

    public function getRegisterVerify()
    {
        return view('customer.login.customerVerifyAccount');
    }

    public function getResendMail()
    {
        return view('customer.login.customerResendMail');
    }

    public function resendMail(Request $request)
    {
        $request->validate([
            'email' => 'bail|required|email',
        ]);
        $email = $request->input('email');

        $customer = Customer::where('email', '=',  $request->input('email'))->first();
        if (!$customer)
            return back()->with('wrong', 'Email is invalid');
        if ($customer->isVerified)
            return back()->with('wrong', 'Account had verified');

        $verifyToken = CustomerVerifiedEmail::updateOrCreate(
            ['email' => $email], 
            ['token' => Str::random(10)]
        );
        
        if ($verifyToken) {
            Mail::send('customer.login.createAccountMailTemplate', ['token' => $verifyToken->token], function($message) use ($email){
                $message->to($email)->subject('Create Account Token');
            });
        }

        return redirect(route('register_customer_verify.index'));
    }

    public function verifyCreateAccountToken(Request $request)
    {
        $request->validate([
            'token' => 'bail|required',
        ]);
        $token = $request->input('token');

        $verifyToken = CustomerVerifiedEmail::where('token', '=', $token)->first();
        if (!$verifyToken)
            return back()->with('wrong', 'Token is invalid !');

        if (Carbon::parse($verifyToken->updated_at)->addMinutes(3)->isPast())
        {
            $verifyToken->delete();
            return back()->with('wrong', 'Token is expired !');
        }

        $customer = Customer::where('email', '=', $verifyToken->email)->first();
        if (!$customer)
        {
            $verifyToken->delete();
            return back()->with('wrong', 'Token is invalid !');
        }

        $customer->update(['isVerified' => true]);
        $verifyToken->delete();
        return redirect(route('login_customer.index'))->with('message', 'Sign up successfully !');
    }

    // Change account info
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
            'address' => $request->input('address'),
        ]);

        return back()->with('message', 'Change information successfully !');
    }

    // Change password
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

    // Forgot password
    public function getResetPassword()
    {
        return view('customer.login.customerResetPasswordPage');
    }

    public function sendTokenMail(Request $request) 
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
            ['token' => Str::random(8)]
        );
        
        if ($passwordReset) {
            Mail::send('customer.login.resetPasswordMailTemplate', ['token' => $passwordReset->token], function($message) use ($email){
                $message->to($email)->subject('Reset Password Token');
            });
        }

        return redirect(route('reset_customer_token.index'));
    }

    public function getToken()
    {
        return view('customer.login.customerTokenPage');
    }

    public function postToken(Request $request)
    {
        $request->validate([
            'token' => 'bail|required',
        ]);
        $token = $request->input('token');

        $passwordReset = CustomerPasswordReset::where('token', '=', $token)->first();
        if (!$passwordReset) 
            return back()->with('wrong', 'Token is invalid !');

        if (Carbon::parse($passwordReset->updated_at)->addMinutes(3)->isPast())
        {
            $passwordReset->delete();
            return back()->with('wrong', 'Token is expired !');
        }

        $customer = Customer::where('email', '=', $passwordReset->email)->first();
        if (!$customer)
        {
            $passwordReset->delete();
            return back()->with('wrong', 'Token is invalid !');
        }

        $request->session()->put('reset_password_customer', $customer);
        $passwordReset->delete();
        return redirect(route('reset_customer_new.index'));
    }

    public function getNewPassword(Request $request)
    {
        if (!$request->session()->has('reset_password_customer'))
            return redirect(route('reset_customer.index'));
             
        $customer = $request->session()->get('reset_password_customer');
        return view('customer.login.customerNewPasswordPage', ['customer' => $customer]);
    }

    public function patchResetPassword(Request $request)
    {
        $request->validate([
            'password' => 'bail|required|confirmed|min:8',
        ]);
        $password = $request->input('password');

        if (!$request->session()->has('reset_password_customer'))
            return redirect(route('reset_customer_token.index'))->with('wrong', 'Token is invalid');

        $id = $request->session()->get('reset_password_customer')->id;
        $customer = Customer::where('id', $id)->first();
        $customer->update(['password' => bcrypt($password)]);
        $request->session()->forget('reset_password_customer');

        return redirect(route('login_customer.index'))->with('message', 'Create new password successfully!');
    }
}
