<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\AboutsController;
use App\Http\Controllers\Admin\MembersController;
use App\Http\Controllers\Admin\MissionsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UsersController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [UsersController::class, 'index']);
Route::get('/show-all', [UsersController::class, 'show_all_products']);

Auth::routes();

Route::get('admin', [HomeController::class, 'index']);
Route::get('admin/dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::resource("admin/product", ProductsController::class);

// About Admin
Route::get("admin/about", [AboutsController::class, 'index'])->name('about.index');
Route::get("admin/about/create", [AboutsController::class, 'create'])->name('about.create');
Route::get("admin/about/edit", [AboutsController::class, 'edit'])->name('about.edit');
Route::post("admin/about", [AboutsController::class, 'store']);
Route::put("admin/about", [AboutsController::class, 'update']);

// Mission Admin
Route::get("admin/mission", [MissionsController::class, 'index'])->name('mission.index');
Route::get("admin/mission/create", [MissionsController::class, 'create'])->name('mission.create');
Route::get("admin/mission/edit", [MissionsController::class, 'edit'])->name('mission.edit');
Route::post("admin/mission", [MissionsController::class, 'store']);
Route::put("admin/mission", [MissionsController::class, 'update']);

// Members Admin
// Route::get("admin/members", [MembersController::class, 'index']);
Route::resource("admin/members", MembersController::class);
