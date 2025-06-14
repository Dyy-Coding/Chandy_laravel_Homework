<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| These routes are loaded by the RouteServiceProvider and assigned to the "api"
| middleware group. Define your API endpoints here.
|
*/

// Simple test route
Route::get('/test', function (Request $request) {
    return "Hello " . $request->query('message');
});

// Grouped routes for PostController
Route::prefix("/posts")->group(function () {
    Route::get("/", [PostController::class, "index"]);
    Route::get("/counts", [PostController::class, "count"]);
    Route::post("/create", [PostController::class, "create"]);
    Route::put("/edit/{id}", [PostController::class, "edit"]);
    Route::get("/find/{id}", [PostController::class, "find"]); // moved inside /posts for clarity
});

// RESTful resource routes for comments
Route::resource("/comment", CommentController::class);

// Sanctum-authenticated user info
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
