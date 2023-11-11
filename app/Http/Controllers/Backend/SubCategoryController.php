<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{

    public function AllSubCategory()
    {
        $allSubCategory = SubCategory::all();
        return view('admin.sub_category.all_sub_category', compact('allSubCategory'));
    } //end method


    public function AddSubCategory()
    {
        $categories = Category::OrderBy('name','asc')->get();
        return view('admin.sub_category.add_sub_category',compact('categories'));
    }

    public function StoreSubCategory(Request $request)
    {
        SubCategory::insert([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Sub Category Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.sub.category')->with($notification);
    } //end method


    public function EditSubCategory($id)
    {
        $subCatInfo = SubCategory::findOrFail($id);
        $categories = Category::OrderBy('name','asc')->get();
        return view('admin.sub_category.edit_sub_category', compact('subCatInfo','categories'));
    } //end method

    public function UpdateSubCategory(Request $request)
    {
        $categoryId = $request->id;
        SubCategory::findOrFail($categoryId)->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);

        $notification = array(
            'message' => 'Sub Category Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.sub.category')->with($notification);
    } //end method

    public function DeleteSubCategory($id)
    {
        SubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Sub Category Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.sub.category')->with($notification);
    }//end method



    public function GetSubCategory(Request $request)
    {
        $category_id = $request->category_id;
        $subCategory = SubCategory::where('category_id', $category_id)->get();
        return response()->json($subCategory);
    }
}
