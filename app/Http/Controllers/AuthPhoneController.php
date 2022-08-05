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
            'phone' => 'required|regex:/^([0-9]*)$/'
        ]);

        $customer = Customer::firstOrCreate($phone);
        $customer->updatingCode();
        try {
                $sms->send($customer->phone, $customer->verification_code);
            } catch(\Exception $e) {
               return redirect()->back()->withErrors([
                  'phone' => explode(":", $e->getMessage())[1]
               ]);
            }
        

        return Inertia::render('AuthPhone/Verification', $phone);
    }


    public function verification(Request $request)
    {
        $customer = Customer::firstWhere('phone', $request->phone);
        if($customer->verification_code == $request->code){
            $customer->setVerifiedPhone();
            Auth::guard('web')->login($customer);
        }

        return redirect('/dashboard');
    }


    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Inertia::redirect('/');
    }
}
