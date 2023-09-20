<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class CategoryController extends Controller
{
    public function AllCategory()
    {
        $allCategory = Category::all();
        return view('admin.category.all_category', compact('allCategory'));
    } //end method


    public function AddCategory()
    {
        return view('admin.category.add_category');
    }

    public function StoreCategory(Request $request)
    {
        if ($request->file('category_image')) {
            $image = $request->file('category_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(384, 420)->save('upload/category_images/' . $name_gen);
            $save_url = 'upload/category_images/' . $name_gen;
            $category = new Category();
            $category->name = $request->name;
            $category->category_image = $save_url;
            $category->created_at = Carbon::now();
            $category->save();
        }

        $notification = array(
            'message' => 'Category Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.category')->with($notification);
    } //end method


    public function EditCategory($id)
    {
        $categoryInfo = Category::findOrFail($id);
        return view('admin.category.edit_category', compact('categoryInfo'));
    } //end method

    public function UpdateCategory(Request $request)
    {
        $categoryId = $request->id;
        if ($request->file('category_image')) {

            $categoryImg = Category::findOrFail($categoryId);
            if ($categoryImg->category_image != null) {
                $img = $categoryImg->category_image;
                unlink($img);
            }

            $image = $request->file('category_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(384, 420)->save('upload/category_images/' . $name_gen);
            $save_url = 'upload/category_images/' . $name_gen;

            Category::findOrFail($categoryId)->update([
                'category_image' => $save_url,
                'name' => $request->name,
            ]);

            $notification = array(
                'message' => 'Category Updated Successfully',
                'alert_type' => 'success'
            );
        } else {
            Category::findOrFail($categoryId)->update([
                'name' => $request->name,
            ]);

            $notification = array(
                'message' => 'Category Updated Successfully Without Image',
                'alert_type' => 'success'
            );
        }
        return redirect()->route('all.category')->with($notification);
    } //end method

    public function DeleteCategory($id)
    {
        $categoryImg = Category::findOrFail($id);
        if ($categoryImg->category_image != null) {
            $img = $categoryImg->category_image;
            unlink($img);
        }

        Category::findOrFail($id)->delete();
        SubCategory::where('category_id', $id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.category')->with($notification);
    }


    // frontend show product category
}
