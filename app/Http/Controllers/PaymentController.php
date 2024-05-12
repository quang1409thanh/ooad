<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function index()
    {

    }
    public function viewPayment() {
        $payments = Payment::all();
        return view('employee.view_payment',compact('payments'));
    }
}
