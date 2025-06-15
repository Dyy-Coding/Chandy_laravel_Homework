<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\BookTestController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Here is where you can register API routes for your application.
| These routes are loaded by the RouteServiceProvider within a group
| which is assigned the "api" middleware group.
|--------------------------------------------------------------------------
*/


// Books routes 
Route::prefix('books')->controller(BookTestController::class)->group(function () {
    Route::get('/', 'index');             // GET /api/books
    Route::post('/create', 'create');            // POST /api/books  (instead of /create)
    Route::get('/show/{id}', 'show');          // GET /api/books/{id}
    Route::put('/update/{id}', 'update');        // PUT /api/books/{id}
    Route::delete('/delete/{id}', 'delete');    // DELETE /api/books/{id}
});


//Authors routes 
Route::prefix('authors')->controller(AuthorController::class)->group(function () {
    Route::get('/', 'index');             // GET /api/books
    Route::post('/create', 'create');            // POST /api/books  (instead of /create)
    Route::get('/show/{id}', 'show');          // GET /api/books/{id}
    Route::put('/update/{id}', 'update');        // PUT /api/books/{id}
    Route::delete('/delete/{id}', 'delete');    // DELETE /api/books/{id}
});
//Users routes 
Route::prefix('users')->controller(UsersController::class)->group(function () {
    Route::get('/', 'index');             // GET /api/books
    Route::post('/create', 'create');            // POST /api/books  (instead of /create)
    Route::get('/show/{id}', 'show');          // GET /api/books/{id}
    Route::put('/update/{id}', 'update');        // PUT /api/books/{id}
    Route::delete('/delete/{id}', 'delete');    // DELETE /api/books/{id}
});







// 🔐 User info for authenticated users via Sanctum
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
