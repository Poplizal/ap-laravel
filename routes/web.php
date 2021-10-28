<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;


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



Route::resource('/',Homecontroller::class);
Route::get('about',function(){
    return view('about',['data'=>"about page"]);
});
//explanation
// Route::get()  method works when the server port path is running;
// prarmeter "/" is meant server port path(http://127.0.0.1:8000/)
// view("welcome") is redirecting recources>views>welcome.blade.php 