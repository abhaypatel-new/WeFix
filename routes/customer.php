<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customer\CustomerController;
use App\Http\Controllers\customer\ReportController;
use App\Http\Controllers\districtManager\DistrictManagerController;

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
 
 Route::post('invoice', [CustomerController::class, 'generateInvoice'])->name('invoices.generate');
Route::middleware(['guest:owner'])->group(function () {

    Route::get('/', [CustomerController::class, 'showLoginForm'])->name('owner.login');
  
    Route::post('/login', [CustomerController::class, 'owner_login'])->name('owner.signin');
    
 });


 
 Route::middleware(['owner'])->group(function () {
    Route::get('dashboard', [CustomerController::class, 'index'])->name('owner.dashboard'); 
    Route::get('/logout', [CustomerController::class, 'signOut'])->name('owner.logout');  
   
    });



    
    
    
 


 

    
   
    
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
