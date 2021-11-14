<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SheetdbController;

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

//Show all products
Route::get('',[SheetdbController::class, 'showProducts'])->name('showProducts');

//Show one product
Route::get('{id}',[SheetdbController::class, 'showProduct'])->name('showProduct');
