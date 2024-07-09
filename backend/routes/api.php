<?php

use App\Http\Controllers\API\AuthApiController;
use App\Http\Controllers\API\BookApiController;
use App\Http\Controllers\API\CategoryApiController;
use App\Http\Controllers\API\PinjamanApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::POST('register-peminjam', [AuthApiController::class, "register"]);
Route::POST('register-admin', [AuthApiController::class, "registerAdmin"]);
Route::POST('login', [AuthApiController::class, "login"]);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::GET("/logout", [AuthApiController::class, "logout"]);


    //book category route api
    Route::GET("/book-category", [CategoryApiController::class, "getAll"]);
    Route::GET("/book-category/{id}", [CategoryApiController::class, "getById"]);
    Route::POST("/book-category", [CategoryApiController::class, "create"]);
    Route::PUT("/book-category/{id}", [CategoryApiController::class, "update"]);
    Route::DELETE("/book-category/{id}", [CategoryApiController::class, "delete"]);

    //book route api
    Route::GET("/book", [BookApiController::class, "getAll"]);
    Route::GET("/book/{id}", [BookApiController::class, "getById"]);
    Route::POST("/book", [BookApiController::class, "create"]);
    Route::PUT("/book/{id}", [BookApiController::class, "update"]);
    Route::DELETE("/book/{id}", [BookApiController::class, "delete"]);
    //book route api
    Route::GET("/pinjaman/get-by-user", [PinjamanApiController::class, "getByUser"]);
    Route::POST("/pinjaman", [PinjamanApiController::class, "create"]);
});
