<?php

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\ProductController;

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


Route::get('/products',[ProductController::class, 'index'])->name('product.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('product.store');
Route::get('products/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/products/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/myproducts',[ProductController::class, 'myproduct'])->name('product.myproducts');
Route::get('/myproducts/{id}', [ProductController::class, 'myproductdetail'])->name('myproduct.myproductdetail');
Route::delete('/myproducts/delete/{id}', [ProductController::class, 'destroy'])->name('myproduct.delete');

//Enquiry
Route::post('/products/storeenquiry', [EnquiryController::class, 'addEnquiry'])->name('enquiry.store');

//admin
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function (){
    Route::get('/products', [AdminController::class, 'adminViewProducts'])->name('admin.product.index');
    Route::delete('/products/delete/{id}',[AdminController::class, 'deleteProduct'])->name('admin.product.delete');
    Route::get('/products/{id}', [AdminController::class, 'show'])->name('admin.product.show');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
