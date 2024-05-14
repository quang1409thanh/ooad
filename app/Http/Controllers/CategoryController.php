<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    //
    public function store(Request $request)
    {
        // Validate form data
        $validatedData = $request->validate([
            'category_name' => 'required|string|max:255',
            'category_icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
            'description' => 'nullable|string',
            'status' => 'required|in:Active,Inactive',
        ]);

        // Process category icon upload
        if ($request->hasFile('category_icon')) {
            $image = $request->file('category_icon');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('imgcategory'), $imageName);
            $validatedData['category_icon'] = $imageName;

        }
        // Create new category
        Category::create($validatedData);

        return redirect()->route('category')->with('success', 'Category created successfully!');

    }

    public function destroy($id)
    {

        // Tìm category cần xóa
        $category = Category::findOrFail($id);

        // Xóa ảnh của category nếu tồn tại
        if (!empty($category->category_icon)) {
            $imagePath = public_path('imgcategory/' . $category->category_icon);
            if (file_exists($imagePath)) {
                unlink($imagePath); // Xóa ảnh
            }
        }

        // Xóa category
        $category->delete();

        return redirect()->route('view_category')->with('success', 'Category deleted successfully!');
    }


    function addCategory()
    {
        return view('employee.add_category');
    }

    public
    function viewCategory()
    {
        $categories = Category::all();
        return view('employee.view_category', compact('categories'));
    }
}
