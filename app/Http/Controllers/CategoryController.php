<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function addCategory() {
        return view('employee.add_category');
    }
    public function viewCategory() {
        $categories = Category::all();
        return view('employee.view_category',compact('categories'));
    }
}
