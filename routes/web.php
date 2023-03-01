<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\AboutsController;
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

Auth::routes();

Route::get('admin/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::resource("admin/product", ProductsController::class);
Route::get("admin/about", [AboutsController::class, 'index'])->name('about.index');
Route::get("admin/about/create", [AboutsController::class, 'create'])->name('about.create');
Route::get("admin/about/edit", [AboutsController::class, 'edit'])->name('about.edit');
Route::post("admin/about", [AboutsController::class, 'store']);
Route::put("admin/about", [AboutsController::class, 'update']);


// Route::get('admin/products', ProductsController::class, "index");
