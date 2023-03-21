<?php

use App\Http\Controllers\api\ReportController;
use Illuminate\Support\Facades\Route;

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
Route::get('/admin', function () {
    return view('admin.login');
});
Route::get('/product-details', function () {
    return view('front-end.product-details');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('get-notification-list', [WebNotificationController::class, 'notificationList'])->name('notification.list');
Route::get('read-notification/{id}', [WebNotificationController::class, 'readNotification'])->name('notification.read');
Route::post('save_task', [WebNotificationController::class, 'save_task']);
Route::get('/push-notificaiton', [WebNotificationController::class, 'index'])->name('push-notificaiton');
Route::post('/store-token', [WebNotificationController::class, 'storeToken'])->name('store.token');
Route::post('/send-web-notification', [WebNotificationController::class, 'sendWebNotification'])->name('send.web-notification');
Route::get('report', [ReportController::class, 'index'])->name('report');
Route::get('delete-report', [ReportController::class, 'destroy'])->name('delete.report');
Route::get('view-report', [ReportController::class, 'show'])->name('view.report');
Route::get('list', [ReportController::class, 'listNotification'])->name('list.notification');
Route::get('view', [ReportController::class, 'viewNotification'])->name('view.notification');
Route::get('getcount', [ReportController::class, 'getCount'])->name('get.count');
Route::get('getchart', [ReportController::class, 'getChart'])->name('get.chart');
Route::get('getpiechart', [ReportController::class, 'getLast'])->name('get.pie.chart');
Route::post('invoice', [ReportController::class, 'generateInvoice'])->name('invoice.generate');
Route::get('getsingleorder', [ReportController::class, 'getSingleOrder'])->name('get.single.order');
