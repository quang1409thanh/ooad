<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    //
    public function deposit()
    {
        return view('deposit');
    }

    public function withdraw() {

    }
    public function viewBilling() {
        $billings = Billing::all();
        return view('employee.view_billing',compact('billings'))    ;
    }
}
