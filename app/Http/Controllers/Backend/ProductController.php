<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function AllProduct()
    {
        $allProduct = Product::all();
        return view('admin.product.all_product', compact('allProduct'));
    }

    public function AddProduct()
    {
        $categories = Category::OrderBy('name', 'asc')->get();
        $subCategories = SubCategory::OrderBy('name', 'asc')->get();
        return view('admin.product.add_product', compact('categories', 'subCategories'));
    } //end method


    public function StoreProduct(Request $request)
    {
        $number = mt_rand(1000000000, 9999999999);
        if ($this->productCodeExists($number)) {
            $number = mt_rand(1000000000, 9999999999);
        }

        if ($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(282, 242)->save('upload/product_images/' . $name_gen);
            $save_url = 'upload/product_images/' . $name_gen;
            $product = new Product();
            $product->name = $request->name;
            // $product->slug = $request->slug;
            $product->slug = Str::slug($request->slug);
            $product->category_id = $request->category_id;
            $product->sub_cat_id = $request->sub_cat_id;
            $product->image = $save_url;
            $product->product_code = $number;
            $product->description = $request->description;
            $product->created_at = Carbon::now();
            $product->save();
        }
        $notification = array(
            'message' => 'Product Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.product')->with($notification);
    } //end method

    public function productCodeExists($number)
    {
        return Product::whereProductCode($number)->exists();
    } //end method


    public function EditProduct($id)
    {
        $productInfo = Product::findOrFail($id);
        $categories = Category::OrderBy('name', 'asc')->get();
        $subCategories = SubCategory::OrderBy('name', 'asc')->get();
        return view('admin.product.edit_product', compact('productInfo', 'categories', 'subCategories'));
    }



    public function UpdateProduct(Request $request)
    {
        $productId = $request->id;
        if ($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(580, 670)->save('upload/product_images/' . $name_gen);
            $save_url = 'upload/product_images/' . $name_gen;
            Product::findOrFail($productId)->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'category_id' => $request->category_id,
                'sub_cat_id' => $request->sub_cat_id,
                'product_code' => $request->product_code,
                'description' => $request->description,
                'image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Product Updated Successfully',
                'alert-type' => 'success'
            );
        }else{
            Product::findOrFail($productId)->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'category_id' => $request->category_id,
                'sub_cat_id' => $request->sub_cat_id,
                'product_code' => $request->product_code,
                'description' => $request->description,
            ]);

            $notification = array(
                'message' => 'Product Updated Successfully Without Image',
                'alert-type' => 'success'
            );
        }


        return redirect()->route('all.product')->with($notification);
    }

    public function DeleteProduct($id)
    {
        Product::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.product')->with($notification);
    } //end method
}
