<?php

namespace App\Http\Controllers;

use App\Contracts\SmsServiceInterface;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Inertia\Inertia;


class AuthPhoneController extends Controller
{
    public function create()
    { 
        return Inertia::render('AuthPhone/Login');
    }


    public function store(Request $request, SmsServiceInterface $sms)
    {
        $phone = $request->validate([
            'phone' => ['required', 'int']
        ]);

        $customer = Customer::firstOrCreate($phone);
        $customer->updatingCode();
        $sms->send($customer->phone, $customer->verification_code);

        return Inertia::render('AuthPhone/Verification', $phone);
    }


    public function verification(Request $request)
    {
        $customer = Customer::firstWhere('phone', $request->phone);
        if($customer->verification_code == $request->code){
            Auth::guard('web')->login($customer);
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }


    public function destroy()
    {
        Auth::guard('web')->logout();

        return redirect('/');
    }
}
