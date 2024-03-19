<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controller\HomeController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Mail;

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
    return view('welcome');
});

Route::fallback(function(){

    return view('errors.404');

});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//table view
Route::get('tableview', [App\Http\Controllers\HomeController::class, 'table']);
//edit view 
Route::get('/edittable/{id}', [App\Http\Controllers\HomeController::class, 'edit']);
// update
Route::post('/updatetable/{id}', [App\Http\Controllers\HomeController::class, 'update']);
// delete
Route::get('/deletetable/{id}', [App\Http\Controllers\HomeController::class, 'delete']);

// email send
Route::get('emailsend', [App\Http\Controllers\HomeController::class, 'email']);

//middleware 
Route::get('/role',  [App\Http\Controllers\HomeController::class, 'Role']);

Route::get('/testdemo', [App\Http\Controllers\HomeController::class, 'practice']);

Route::get('/createroute', [App\Http\Controllers\HomeController::class, 'twocreated']);
// frontpage
Route::get('/frontshow', [App\Http\Controllers\HomeController::class, 'front']);

//setcookies
Route::get('/set-cookie', [App\Http\Controllers\HomeController::class, 'setCookie']);
//get cookies
Route::get('/get-cookie',  [App\Http\Controllers\HomeController::class, 'getCookie']);
//delete cookie
Route::get('/delete-cookie', [App\Http\Controllers\HomeController::class, 'deleteCookie']);

//setsession 
Route::get('/set-session', [App\Http\Controllers\HomeController::class, 'storesession']);
//getsession 
Route::get('/get-session', [App\Http\Controllers\HomeController::class, 'getsession']);
//delete session
Route::get('/remove-session', [App\Http\Controllers\HomeController::class, 'deletesession']);

// basic response
Route::get('/basic_response', function () {
    return 'welcome';
});

// json response
Route::get('/jsonresponse', [App\Http\Controllers\HomeController::class, 'index_response']);

//form
Route::get('contact', [App\Http\Controllers\HomeController::class, 'showForm']);
Route::post('contact', [App\Http\Controllers\HomeController::class, 'store']);

// dashboard
Route::get('dashboardshow', [App\Http\Controllers\HomeController::class, 'dashboard']);

//api
Route::get('/users', [App\Http\Controllers\HomeController::class, 'asspost']);

Route::get('/users/{id}', [App\Http\Controllers\HomeController::class, 'store']);


//queues 

Route::get('send-email', function(){
    $data['email']= 'ankurc@whizkraft.net';
    dispatch(new App\jobs\SendTest($data));
    dd('email send successfull');

});



