<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Home()
    {
        return view('frontend.index');
    } //end method


    public function ProductCategory()
    {
        return view('frontend.category.product_category');
    } //end method

    public function ProductCategoryByName($id)
    {
        $categoryInfo = Category::findOrFail($id);
        $categories = Category::OrderBy('name', 'asc')->get();
        $productByCategory = Product::OrderBy('name', 'asc')->where('category_id', $id)->get();
        return view('frontend.product.product_by_category', compact('productByCategory', 'categoryInfo', 'categories'));
    } //end method

    public function ContactUs()
    {
        return view('frontend.contact');
    } //end method


    public function AboutUs()
    {
        return view('frontend.about');
    } //end method

    public function Product()
    {
        return view('frontend.product.product_page');
    }

    public function ProductDetails()
    {
        return view('frontend.product.product_details');
    }
}
