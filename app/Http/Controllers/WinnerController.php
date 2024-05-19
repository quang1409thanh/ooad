<?php

namespace App\Http\Controllers;

use App\Models\Bidding;
use App\Models\Payment;
use App\Models\Winner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WinnerController extends Controller
{
    //
    public function viewWinners()
    {
        $winners = Winner::with('Customer', 'Product')->get();
        return view('employee.view_winners', compact(
            'winners'));
    }
}
