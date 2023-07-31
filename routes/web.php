<?php

use App\Http\Controllers\api\ReportController;
use App\Http\Controllers\districtManager\DistrictManagerController;
use App\Http\Controllers\districtManager\PlanController;
use App\Http\Controllers\customer\CustomerController;
// use App\Http\Controllers\customer\WebNotificationController;
use App\Http\Controllers\districtManager\EmployeeController;
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
Route::get('/Dmanager', function () {
    return view('districtManager.login');
});
Route::get('/qrcode', function () {
    return view('districtManager.qrcode');
});
Route::get('/product-details', function () {
    return view('front-end.product-details');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('get-notification-list', [WebNotificationController::class, 'notificationList'])->name('notification.list');
// Route::get('read-notification/{id}', [WebNotificationController::class, 'readNotification'])->name('notification.read');
// Route::post('save_task', [WebNotificationController::class, 'save_task']);
// Route::get('/push-notificaiton', [WebNotificationController::class, 'index'])->name('push-notificaiton');
// Route::post('/store-token', [WebNotificationController::class, 'storeToken'])->name('store.token');
// Route::post('/send-web-notification', [WebNotificationController::class, 'sendWebNotification'])->name('send.web-notification');
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
Route::get('Dmanager/dashboard', [DistrictManagerController::class, 'index'])->name('district.dashboard');
Route::post('add', [DistrictManagerController::class, 'add_equipment'])->name('add.equipment');
Route::post('add/plan', [PlanController::class, 'store'])->name('add.plan');
Route::post('update/plan', [PlanController::class, 'update'])->name('update.plan');
Route::get('get/plan', [PlanController::class, 'index'])->name('get.plan');
Route::get('get/card/plan', [PlanController::class, 'getCards'])->name('get.card.plan');
Route::get('single-plan/{id}', [PlanController::class, 'show'])->name('get.single.plan');
Route::get('getEquipment', [DistrictManagerController::class, 'get_equipment'])->name('get.equipment');
Route::get('getSingleEquipment', [DistrictManagerController::class, 'getSingleEquipment'])->name('get.single');
Route::post('update/Equipment', [DistrictManagerController::class, 'update'])->name('update.equipment');
Route::get('delete', [DistrictManagerController::class, 'delete_equipment'])->name('delete.equipment');

/*--------------Employee Routes Start-------------*/

Route::post('add/employee', [EmployeeController::class, 'store'])->name('add.employee');
Route::get('get/employee', [EmployeeController::class, 'index'])->name('get.employee');
Route::get('single-emp/{id}', [EmployeeController::class, 'show'])->name('single.employee');
Route::post('update/employee', [EmployeeController::class, 'update'])->name('update.employee');
/*--------------Employee Routes Start-------------*/
 Route::get('generate-invoice/{id}',  [ReportController::class, 'generate_invoice'])->name('generate-invoice');
Route::get('/logout', [DistrictManagerController::class, 'signOut'])->name('district.logout');
