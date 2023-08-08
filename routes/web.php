<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Frontend\ClientController;
use App\Http\Controllers\Frontend\FrontendController;
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

Route::get('/', [FrontendController::class, 'index']);


Route::controller(ClientController::class)->group(function () {
         Route::get('/category/{id}/{slug}', 'CategoryPage');
         Route::get('/subcategory/{id}/{slug}', 'SubCategoryPage');
         Route::get('/product-details/{id}/{slug}', 'Singleproduct');
         Route::get('/add-to-cart', 'AddToCart');
         Route::get('/checkout', 'CheckOut');
         Route::get('/user-profile', 'userProfile');
         Route::get('/events', 'Events');
         Route::get('/about-us', 'AboutUs');
         Route::get('/Best-deals', 'BestDeals');
         Route::get('/services', 'Services');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index']);


    //category routes
    Route::controller(CategoryController::class)->group(function () {

        Route::get('/category/add', 'showCategoryForm');
        Route::get('/category/manage', 'showCategoryList');
        Route::post('/category/store', 'StoreCategory');
        Route::get('/category/edit/{id}', 'EditCategory');
        Route::post('/category/update/{id}', 'UpdateCategory');
        Route::get('/category/delete/{id}', 'DeleteCategory');
    });
    //brand routes
    Route::get('/brands/add', [BrandController::class, 'showBrandForm']);
    Route::get('/brands/manage', [BrandController::class, 'showBrandList']);
    Route::post('/brands/store', [BrandController::class, 'createBrand']);
    Route::get('/brands/edit/{id}', [BrandController::class, 'EditBrand']);
    Route::post('/brands/update/{id}', [BrandController::class, 'UpdateBrand']);
    Route::get('/brands/delete/{id}', [BrandController::class, 'DeleteBrand']);

    //subcategory routes
    Route::controller(SubCategoryController::class)->group(function () {
        Route::get('/subcategory/add', 'showSubcategoryForm');
        Route::get('/subcategory/manage', 'showSubcategoryList');
        Route::post('/subcategory/create', 'createSubcategory');
        Route::get('/subcategory/edit/{id}', 'EditSubcategory');
        Route::post('/subcategory/update/{id}', 'UpdateSubcategory');
        Route::get('/subcategory/delete/{id}', 'DeleteSubcategory');
    });
     //product routes
    Route::controller(ProductController::class)->group(function () {

        Route::get('/product/add', 'showProductForm');
        Route::get('/product/manage', 'showProductList');
        Route::post('/product/create', 'createProduct');
        Route::get('/product/edit/{id}', 'EditProduct');
        Route::post('/product/update/{id}', 'UpdateProduct');
        Route::get('/product/delete/{id}', 'DeleteProduct');
        Route::get('/product/editImage/{id}', 'editProductImage');
        Route::post('/product/updateImage', 'updateProductImage');
    });
});
   


   

