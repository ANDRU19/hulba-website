<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with(['products'])->where('customer_id', auth()->user()->id)->latest()->paginate(10);
        return Inertia::render('Payment/Index', ['payments' => $payments]);
    }
}
