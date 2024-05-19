<?php

namespace App\Http\Controllers;

use App\Models\Winner;
use Illuminate\Http\Request;

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
