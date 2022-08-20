<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerBussinessDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CustomerBussinessDetailsController extends Controller
{
    public function create()
    {
        return Inertia::render('Profile/BussinessDetails');
    }

    public function store(Request $request)
    { 
        $details = $request->validate([
            'zip_code' => 'required|string',
            'address' => 'required|string',
            'neighborhood' => 'required|string',
            'number' => 'required|string',
            'add_on' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'fullname' => 'required|string',
            'description' => 'required|string',
            'bank' => 'required|string',
            'agency' => 'required|string',
            'account'=> 'required|string',
            'account_type' => 'required|string',
        ]);
        
        CustomerBussinessDetails::create($details);
        Customer::setVerifiedProfile();

        return  Redirect::route('products.list');

    }
}
