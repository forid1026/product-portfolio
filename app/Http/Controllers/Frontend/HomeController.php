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
        $products = Product::Orderby('name', 'asc')->get();
        return view('frontend.index', compact('products'));
    } //end method


    public function ProductCategory()
    {
        $categories = Category::OrderBy('name', 'asc')->get();
        return view('frontend.category.product_category', compact('categories'));
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
        $categories = Category::OrderBy('name', 'asc')->get();
        $products = Product::Orderby('name', 'asc')->get();
        return view('frontend.product.product_page', compact('categories', 'products'));
    }

    public function ProductDetails($slug)
    {
        $productInfo = Product::where('slug', $slug)->first();
        $categoryInfo = Category::where('id', $productInfo->category_id)->first();
        $relatedProducts = Product::where('category_id', $productInfo->category_id)->get();
        return view('frontend.product.product_details', compact('productInfo','relatedProducts'));
    }
}
