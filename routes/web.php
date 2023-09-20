<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


// Admin Controller
Route::middleware('auth', 'role:admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'ChangeAdminPassword'])->name('change.admin.password');
    Route::post('/update/change/password', [AdminController::class, 'UpdateAdminPassword'])->name('update.admin.password');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');


    // product category
    Route::controller(CategoryController::class)->group(function () {
        Route::get('all/category', 'AllCategory')->name('all.category');
        Route::get('add/category', 'AddCategory')->name('add.category');
        Route::post('store/category', 'StoreCategory')->name('store.category');
        Route::post('update/category', 'UpdateCategory')->name('update.category');
        Route::get('edit/category/{id}', 'EditCategory')->name('edit.category');
        Route::get('delete/category/{id}', 'DeleteCategory')->name('delete.category');
    });

    // product sub category
    Route::controller(SubCategoryController::class)->group(function () {
        Route::get('all/sub-category', 'AllSubCategory')->name('all.sub.category');
        Route::get('add/sub-category', 'AddSubCategory')->name('add.sub.category');
        Route::post('store/sub-category', 'StoreSubCategory')->name('store.sub.category');
        Route::post('update/sub-category', 'UpdateSubCategory')->name('update.sub.category');
        Route::get('edit/sub-category/{id}', 'EditSubCategory')->name('edit.sub.category');
        Route::get('delete/sub-category/{id}', 'DeleteSubCategory')->name('delete.sub.category');
        Route::get('get/sub-category', 'GetSubCategory')->name('get.sub.category');
    });

    // product all method
    Route::controller(ProductController::class)->group(function () {
        Route::get('all/product', 'AllProduct')->name('all.product');
        Route::get('add/product', 'AddProduct')->name('add.product');
        Route::post('store/product', 'StoreProduct')->name('store.product');
        Route::post('update/product', 'UpdateProduct')->name('update.product');
        Route::get('edit/product/{id}', 'EditProduct')->name('edit.product');
        Route::get('delete/product/{id}', 'DeleteProduct')->name('delete.product');
    });

    // Slider all method
    Route::controller(SliderController::class)->group(function () {
        Route::get('all/slider', 'AllSlider')->name('all.slider');
        Route::get('add/slider', 'AddSlider')->name('add.slider');
        Route::post('store/slider', 'StoreSlider')->name('store.slider');
        Route::post('update/slider', 'UpdateSlider')->name('update.slider');
        Route::get('edit/slider/{id}', 'EditSlider')->name('edit.slider');
        Route::get('delete/slider/{id}', 'DeleteSlider')->name('delete.slider');
    });
});


// Vendor Controller
Route::middleware('auth', 'role:vendor')->group(function () {
    Route::get('/vendor/dashboard', [VendorController::class, 'VendorDashboard'])->name('vendor.dashboard');
});




Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');


// user controller
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'Home')->name('home');
    Route::get('product/category', 'ProductCategory')->name('product.category');
    Route::get('product-category/{slug}', 'ProductCategoryByName')->name('product.category.name');
    Route::get('contact-us', 'ContactUs')->name('contact.us');
    Route::get('about-us', 'AboutUs')->name('about.us');
    Route::get('products', 'Product')->name('product');
    Route::get('product/details', 'ProductDetails')->name('product.details');
});
