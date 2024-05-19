<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    //
    public function store(Request $request)
    {
        // Validate form data
        DB::beginTransaction();

        try {
            $validatedData = $request->validate([
                'category_name' => 'required|string',
                'description' => 'nullable|string',
                'status' => 'required|in:Active,Inactive',
            ]);

            // Process category icon upload
            if ($request->hasFile('category_icon')) {
                $image = $request->file('category_icon');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('category'), $imageName);
                $validatedData['category_icon'] = $imageName;
            }

            // Create new category
            Category::create($validatedData);

            DB::commit();

            alert()->success('Thành công', 'Chúc mừng bạn đã tạo danh mục thành công');
            return redirect()->route('category');

        } catch (\Exception $e) {
            DB::rollBack();
            // Optionally, log the error or handle it
            alert()->error('Thất bại', 'Đã có lỗi xảy ra. Vui lòng thử lại.');
            return redirect()->route('category');
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            // Find the category to be deleted
            $category = Category::findOrFail($id);

            // Delete the category image if it exists
            if (!empty($category->category_icon)) {
                $imagePath = public_path('category/' . $category->category_icon);
                if (file_exists($imagePath)) {
                    unlink($imagePath); // Delete the image
                }
            }

            // Delete the category
            $category->delete();

            DB::commit();

            return redirect()->route('view_category')->with('success', 'Danh mục đã xóa thành công!');

        } catch (\Exception $e) {
            DB::rollBack();
            // Optionally, log the error or handle it
            return redirect()->route('view_category')->with('error', 'Đã có lỗi khi xóa, xin vui lòng thử lại.');
        }
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
