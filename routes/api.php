<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ReportController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

 Route::get('generate-invoice/{id}',  [ReportController::class, 'generate_invoice_app']);
 Route::post('invoice/app', [ReportController::class, 'generateInvoiceApp']);
 Route::get('report', [ReportController::class, 'filterApp'])->name('report');
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
 
      
    
  
       
    
