<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CabinetPageController;
use App\Http\Controllers\ViewPageController;
use App\Http\Controllers\AccountingController;
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


Route::get('/', [HomePageController::class, 'load'])->name("/");

Route::post('/file-import', [HomePageController::class, 'fileImport'])->name('file-import');

Route::get('/signup', [RegisterController::class, 'register'])->name('signup');
Route::post('/signup', [RegisterController::class, 'create'])->name('create');

Route::post('/signin', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/signin', [LoginController::class, 'login'])->name('signin');

Route::get('/cabinet', [CabinetPageController::class, '__invoke'])->name('cabinet');
Route::post('/cabinet', [CabinetPageController::class, 'getName'])->name('getName');

Route::get('/view-data', [ViewPageController::class, '__invoke'])->name('view-data');
Route::get('/getdata', [ViewPageController::class, 'getData'])->name('getdata');


Route::post('/add-data', [AccountingController::class, 'add'])->name('add-data');
Route::post('/del-data', [AccountingController::class, 'remove'])->name('del-data');
Route::post('/edit-data', [AccountingController::class, 'edit'])->name('edit-data');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
