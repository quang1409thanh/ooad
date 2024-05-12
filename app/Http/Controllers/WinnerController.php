<?php

namespace App\Http\Controllers;

use App\Models\Winner;
use Illuminate\Http\Request;

class WinnerController extends Controller
{
    //
    public function viewWinners() {
        $statusArr = Winner::all();
        $winners = Winner::all();
        return view('employee.view_winners', compact('statusArr','winners'));
    }
}
