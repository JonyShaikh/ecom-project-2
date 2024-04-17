<?php

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[FrontendController::class,'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/category/create' , [CategoryController::class, 'categoryCreateForm']);
Route::get('/category/manage' , [CategoryController::class, 'categoryManage']);
Route::get('/category/delete/{id}' , [CategoryController::class, 'categoryDelete']);
Route::get('/category/edit/{id}' , [CategoryController::class, 'categoryEdit']);
Route::post('/category/store' , [CategoryController::class, 'categoryStore']);

Route::get('/product/create' , [ProductController::class, 'productCreateForm']);
Route::get('/product/manage' , [ProductController::class, 'productManage']);
Route::get('/product/delete/{id}' , [ProductController::class, 'productDelete']);
Route::get('/product/edit/{id}' , [ProductController::class, 'productEdit']);
Route::post('/product/store' , [ProductController::class, 'productStore']);