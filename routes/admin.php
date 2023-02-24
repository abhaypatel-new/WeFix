<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ShopController;

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

Route::middleware(['guest:admin'])->group(function () {

Route::get('/', [AdminController::class, 'showLoginForm'])->name('login');
});


Route::get('/logout', [AdminController::class, 'signOut'])->name('logout');

 Route::post('admin/signin', [AdminController::class, 'create'])->name('admin.signin');
 Route::post('create_district', [AdminController::class, 'create_district'])->name('create_district');
 Route::get('ca_cities', [AdminController::class, 'ca_cities']);
 Route::get('get_managers', [AdminController::class, 'get_managers']);
 Route::get('get_customers', [AdminController::class, 'get_customers']);
 Route::get('get_cities', [AdminController::class, 'get_cities']);
 
 Route::match(array('GET','POST'),'/disctricts', 'AdminController@disctricts')->name('disctricts');
 
 Route::middleware(['admin'])->group(function () {
 Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
 Route::match(array('GET','POST'),'settings', 'AdminController@settings')->name('settings');

 });
Route::group(['middleware' => ['admin'],'prefix'=>'products','as'=>'product.'], function(){
    Route::match(array('GET','POST'),'/', 'ProductController@create')->name('create');
    Route::post('/update/{id}', [ProductController::class, 'update'])->name('update');
    Route::get('/list', [ProductController::class, 'index'])->name('list');
    Route::get('/edit/{id}', [ProductController::class, 'edit']);
    Route::get('/removeImage/{id}', [ProductController::class, 'removeImage']);
    Route::get('/removeThumbnail/{id}', [ProductController::class, 'removeThumbnail']);
    Route::get('/view/{id}', [ProductController::class, 'show']);
    Route::get('/trash', [ProductController::class, 'trash']);
    // Route::get('/', ['as' => 'index', 'uses' => 'ProductController@index']);
});

Route::group(['middleware' => ['admin'],'prefix'=>'categories','as'=>'category.'], function(){
    Route::match(array('GET','POST'),'/', 'CategoryController@create')->name('create');
    Route::post('/update/{id}', [CategoryController::class, 'update'])->name('update');
     Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('delete');
    Route::get('/list', [CategoryController::class, 'index'])->name('list');
    Route::get('/edit/{id}', [CategoryController::class, 'edit']);
    Route::get('/view/{id}', [CategoryController::class, 'show']);
    Route::get('/trash', [CategoryController::class, 'trash']);
    // Route::get('/', ['as' => 'index', 'uses' => 'ProductController@index']);
});

Route::group(['middleware' => ['admin'],'prefix'=>'vendors','as'=>'vendor.'], function(){
     Route::match(array('GET','POST'),'/', 'VendorController@create')->name('create');
     Route::post('/update/{id}', [VendorController::class, 'update'])->name('update');
     Route::get('/delete/{id}', [VendorController::class, 'delete'])->name('delete');
    Route::get('/list', [VendorController::class, 'index'])->name('list');
    Route::get('/edit/{id}', [VendorController::class, 'edit']);
    Route::get('/view/{id}', [VendorController::class, 'show']);
    Route::get('/trash', [VendorController::class, 'trash']);
    // Route::get('/', ['as' => 'index', 'uses' => 'ProductController@index']);
});

Route::group(['middleware' => ['admin'],'prefix'=>'managers','as'=>'manager.'], function(){
     Route::match(array('GET','POST'),'/', 'ManagerController@create')->name('create');
     Route::post('/update/{id}', [ManagerController::class, 'update'])->name('update');
     Route::get('/delete/{id}', [ManagerController::class, 'delete'])->name('delete');
    Route::get('/list', [ManagerController::class, 'index'])->name('list');
    Route::get('/edit/{id}', [ManagerController::class, 'edit']);
    Route::get('/view/{id}', [ManagerController::class, 'show']);
    Route::get('/trash', [ManagerController::class, 'trash']);
    // Route::get('/', ['as' => 'index', 'uses' => 'ProductController@index']);
});


Route::group(['middleware' => ['admin'],'prefix'=>'district-manager','as'=>'district-manager.'], function(){
     Route::match(array('GET','POST'),'/', 'DistrictController@create')->name('create');
     Route::post('/update/{id}', [DistrictController::class, 'update'])->name('update');
     Route::get('/delete/{id}', [DistrictController::class, 'delete'])->name('delete');
    Route::get('/list', [DistrictController::class, 'index'])->name('list');
    Route::get('/edit/{id}', [DistrictController::class, 'edit']);
    Route::get('/view/{id}', [DistrictController::class, 'show']);
    Route::get('/trash', [DistrictController::class, 'trash']);
    // Route::get('/', ['as' => 'index', 'uses' => 'ProductController@index']);
});


Route::group(['middleware' => ['admin'],'prefix'=>'customers','as'=>'customer.'], function(){
     Route::match(array('GET','POST'),'/', 'CustomerController@create')->name('create');
     Route::post('/update/{id}', [CustomerController::class, 'update'])->name('update');
     Route::get('/delete/{id}', [CustomerController::class, 'delete'])->name('delete');
    Route::get('/list', [CustomerController::class, 'index'])->name('list');
    Route::get('/edit/{id}', [CustomerController::class, 'edit']);
    Route::get('/view/{id}', [CustomerController::class, 'show']);
    Route::get('/trash', [CustomerController::class, 'trash']);
    // Route::get('/', ['as' => 'index', 'uses' => 'ProductController@index']);
});



Route::group(['middleware' => ['admin'],'prefix'=>'shops','as'=>'shop.'], function(){
    Route::post('/company', [ShopController::class, 'company_create'])->name('company_create');
    Route::get('/company/edit/{id}', [ShopController::class, 'company_edit'])->name('company_edit');
    Route::match(array('GET','POST'),'/', 'ShopController@create')->name('create');
    Route::post('/update/{id}', [ShopController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [ShopController::class, 'delete'])->name('delete');
   Route::get('/list', [ShopController::class, 'index'])->name('list');
   Route::get('/edit/{id}', [ShopController::class, 'edit']);
//    Route::get('/view/{id}', [CustomerController::class, 'show']);
//    Route::get('/trash', [CustomerController::class, 'trash']);
   // Route::get('/', ['as' => 'index', 'uses' => 'ProductController@index']);
});


Route::group(['middleware' => ['admin'],'prefix'=>'companies','as'=>'company.'], function(){

    Route::post('/update/{id}', [ShopController::class, 'company_update'])->name('update');

   Route::get('/edit/{id}', [ShopController::class, 'company_edit']);
//    Route::get('/view/{id}', [CustomerController::class, 'show']);
//    Route::get('/trash', [CustomerController::class, 'trash']);
   // Route::get('/', ['as' => 'index', 'uses' => 'ProductController@index']);
});

Route::group(['middleware' => ['admin'],'prefix'=>'reports','as'=>'report.'], function(){
    Route::get('/earnings', [ProductController::class, 'earnings']);
    Route::get('/sales', [ProductController::class, 'sales']);
    Route::get('/customer-report', [ProductController::class, 'customers']);
    Route::get('/vendor-report', [ProductController::class, 'vendors']);
});


