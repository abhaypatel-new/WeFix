<?php

use App\Http\Controllers\WebNotificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ReportController;

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

Route::get('/', function () {
    return view('front-end.home');
});
Route::get('/notification', function () {
    return view('front-end.notification');
});
Route::get('/services', function () {
    return view('front-end.services');
});
Route::get('/about-us', function () {
    return view('front-end.about-us');
});
Route::get('/blog', function () {
    return view('front-end.blog');
});

Route::get('/product-details', function () {
    return view('front-end.product-details');
});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('get-notification-list', [WebNotificationController::class, 'notificationList'])->name('notification.list');
Route::get('read-notification/{id}', [WebNotificationController::class, 'readNotification'])->name('notification.read');
Route::post('save_task', [WebNotificationController::class, 'save_task']);
Route::get('/push-notificaiton', [WebNotificationController::class, 'index'])->name('push-notificaiton');
Route::post('/store-token', [WebNotificationController::class, 'storeToken'])->name('store.token');
Route::post('/send-web-notification', [WebNotificationController::class, 'sendWebNotification'])->name('send.web-notification');
Route::get('report', [ReportController::class, 'index'])->name('report');
 Route::get('delete-report', [ReportController::class, 'destroy'])->name('delete.report');
// Auth::routes();
// Route::get('/login', [HomeController::class, 'index'])->name('customer.login');
// Route::get('/signup', [HomeController::class, 'register']);
// Route::post('/create', [CustomerController::class, 'create'])->name('signup');
