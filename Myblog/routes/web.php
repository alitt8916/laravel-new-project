<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/', [App\Http\Controllers\Front\FrontController::class , 'index'])->name('front');
Route::get('/single/{id}', [App\Http\Controllers\Front\FrontController::class , 'blogDetail'])->name('single');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('admin')->group(function(){
  
    
   
    
    Route::resource('/home/home-page' , App\Http\Controllers\Administrator\HomeController::class)->parameters(["home-page"=>"id"]);
    
    Route::resource('/home/about' , App\Http\Controllers\Administrator\AboutController::class)->parameters(["about"=>"id"]);
    
    Route::resource('/home/skill' , App\Http\Controllers\Administrator\SkillController::class)->parameters(["skill"=>"id"]);
    
    
    Route::resource('/home/blog' , App\Http\Controllers\Administrator\BlogController::class)->parameters(["blog"=>"id"]);
});






