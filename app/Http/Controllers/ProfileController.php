<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProfileController extends Controller
{

    public function edit()
    { 
        return Inertia::render('Profile/Edit', [
            'customer' => auth()->user()
        ]);
    }


    public function update(Request $request)
    {
        $valid_customer = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'social' => 'array',
            'description' => 'nullable',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $photo_path = '';
        if ($request->hasFile('photo')) { 
            $photo_path = $request->file('photo')->store('photo', 'public');
            $valid_customer['photo'] = $photo_path;
        }
        $customer = Customer::find(auth()->user()->id);
        $customer->update($valid_customer);
    }

}
