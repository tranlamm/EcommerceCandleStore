<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Route;

class AccessCustomerPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('customer')->check()) {
            if (Auth::guard('customer')->user()->hasRole('client')) {
                return $next($request);
            }
            else {
                Auth::guard('customer')->logout();
                return redirect(route('login_customer.index'));
            }
        }
        else {
            return redirect(route('login_customer.index'));
        }
    }
}
