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
//search route
Route::get('/search','Frontend\HomeController@search')->name('search');

//product show route
Route::get('/products','Frontend\ProductsController@index')->name('products');
Route::get('/product/{slug}','Frontend\ProductsController@show')->name('products.show');






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
});

