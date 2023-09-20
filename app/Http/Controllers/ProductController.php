<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function AllProduct()
    {
        $allProduct = Product::all();
        return view('admin.product.all_product', compact('allProduct'));
    } //end method


    public function AddProduct()
    {
        return view('admin.product.add_product');
    }

    public function StoreProduct(Request $request)
    {
        Product::insert([
            'name' => $request->name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'product Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.product')->with($notification);
    } //end method


    public function EditProduct($id)
    {
        $productInfo = Product::findOrFail($id);
        return view('admin.product.edit_product', compact('productInfo'));
    } //end method

    public function Updateproduct(Request $request)
    {
        $productId = $request->id;
        Product::findOrFail($productId)->update([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Product Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.product')->with($notification);
    } //end method

    public function DeleteProduct($id)
    {
        Product::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.product')->with($notification);
    }
}
