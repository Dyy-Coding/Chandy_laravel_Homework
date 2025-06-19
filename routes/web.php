<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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

Route::get('/Welcome', function () {
    return view('welcome');
});


Route::get("/",[HomeController::class,"index"]);
Route::get("/create",[HomeController::class,"create"]);
Route::delete("/delete/{id}",[HomeController::class,"destroy"]);
Route::get("/edit/{id}",[HomeController::class,"edit"]);
Route::put("/update/{id}",[HomeController::class,"update"]);
Route::post("/store",[HomeController::class,"store"]);
Route::get("/about",[AboutController::class,"index"]);
Route::get("/contact",[ContactController::class,"index"]);
