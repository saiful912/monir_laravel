<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Home route
Route::get('/','Frontend\Homecontroller@showHome')->name('index');

//user registration notify route
Route::get('/token/{token}','Frontend\VerificationController@verify')->name('user.verification');
//user dashboard route
Route::get('user/dashboard','Frontend\UsersController@dashboard')->name('user.dashboard');
Route::get('user/profile','Frontend\UsersController@profile')->name('user.profile');
Route::post('user/profile/update','Frontend\UsersController@profile_update')->name('user.profile.update');
//search route
Route::get('/search','Frontend\HomeController@search')->name('search');

//product show route
Route::get('/products','Frontend\ProductsController@index')->name('products');
Route::get('/product/{slug}','Frontend\ProductsController@show')->name('products.show');
//carts route
Route::get('/carts','Frontend\CartsController@index')->name('carts');
Route::post('/carts/store','Frontend\CartsController@store')->name('carts.store');
Route::post('/carts/update/{id}','Frontend\CartsController@update')->name('carts.update');
Route::post('/carts/delete/{id}','Frontend\CartsController@destroy')->name('carts.delete');

//category route
Route::get('/products/categories','Frontend\CategoriesController@index')->name('categories.index');
Route::get('/products/category/{id}','Frontend\CategoriesController@show')->name('categories.show');





Route::group(['prefix' =>'admin'],function(){
    //backend route
    Route::get('/','Backend\AdminControllers@index')->name('admin.index');

    //products all route
    Route::get('/product/create','Backend\AdminProductsController@product_create')->name('admin.product.create');
    Route::get('/products','Backend\AdminProductsController@manage_products')->name('admin.products');
    Route::get('/products/edit/{id}','Backend\AdminProductsController@products_edit')->name('admin.products.edit');
    Route::post('/product/create','Backend\AdminProductsController@product_store')->name('admin.product.store');
    Route::post('/product/update/{id}','Backend\AdminProductsController@product_update')->name('admin.product.update');
    Route::post('/product/delete/{id}','Backend\AdminProductsController@product_delete')->name('admin.product.delete');

    //Category route
    Route::get('/categories/create','Backend\AdminCategoriesController@category_create')->name('admin.categories.create');
    Route::get('/categories','Backend\AdminCategoriesController@manage_categories')->name('admin.categories');
    Route::get('/categories/edit/{id}','Backend\AdminCategoriesController@categories_edit')->name('admin.categories.edit');
    Route::post('/category/create','Backend\AdminCategoriesController@category_store')->name('admin.category.store');
    Route::post('/category/update/{id}','Backend\AdminCategoriesController@category_update')->name('admin.category.update');
    Route::post('/category/delete/{id}','Backend\AdminCategoriesController@category_delete')->name('admin.category.delete');

    //Brands route
    Route::get('/brands/create','Backend\AdminBrandsController@brand_create')->name('admin.brands.create');
    Route::get('/brands','Backend\AdminBrandsController@manage_brands')->name('admin.brands');
    Route::get('/brands/edit/{id}','Backend\AdminBrandsController@brands_edit')->name('admin.brands.edit');
    Route::post('/brand/create','Backend\AdminBrandsController@brand_store')->name('admin.brand.store');
    Route::post('/brand/update/{id}','Backend\AdminBrandsController@brand_update')->name('admin.brand.update');
    Route::post('/brand/delete/{id}','Backend\AdminBrandsController@brand_delete')->name('admin.brand.delete');

    //Division route
    Route::get('/divisions/create','Backend\DivisionController@division_create')->name('admin.divisions.create');
    Route::get('/divisions','Backend\DivisionController@manage_division')->name('admin.divisions');
    Route::get('/divisions/edit/{id}','Backend\DivisionController@division_edit')->name('admin.divisions.edit');
    Route::post('/division/create','Backend\DivisionController@division_store')->name('admin.division.store');
    Route::post('/division/update/{id}','Backend\DivisionController@division_update')->name('admin.division.update');
    Route::post('/division/delete/{id}','Backend\DivisionController@division_delete')->name('admin.division.delete');

    //District route
    Route::get('/districts/create','Backend\DistrictController@district_create')->name('admin.districts.create');
    Route::get('/districts','Backend\DistrictController@manage_district')->name('admin.districts');
    Route::get('/districts/edit/{id}','Backend\DistrictController@district_edit')->name('admin.districts.edit');
    Route::post('/district/create','Backend\DistrictController@district_store')->name('admin.district.store');
    Route::post('/district/update/{id}','Backend\DistrictController@district_update')->name('admin.district.update');
    Route::post('/district/delete/{id}','Backend\DistrictController@district_delete')->name('admin.district.delete');
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
