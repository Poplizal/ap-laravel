<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;

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
Route::get("courses",function(){
    return "welcome from courses";
});
Route::get("courses/laravel",function(){
});
Route::get('contact',function(){
    $data=request('name');
    return view("contact",["data"=>$data]);
});
Route::get('home',[homeController::class,'home']);
Route::get('about',function(){
    return view('about',['data'=>"about page"]);
});
//explanation
// Route::get()  method works when the server port path is running;
// prarmeter "/" is meant server port path(http://127.0.0.1:8000/)
// view("welcome") is redirecting recources>views>welcome.blade.php 