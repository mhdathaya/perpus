<?php

use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebViewController;
use Illuminate\Support\Facades\Route;

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

Route::GET(
    '/login-view',
    [WebViewController::class, 'LoginView']
);
Route::GET(
    '/register-view',
    [WebViewController::class, 'RegisterView']
);

Route::POST(
    '/admin/register',
    [AuthAdminController::class, 'RegisterAdmin']
);
Route::POST(
    '/login',
    [UserController::class, 'Login']
);

Route::POST(
    '/peminjam/register',
    [PeminjamController::class, 'Register']
);





Route::middleware(["session.user"])->prefix('/')->group(function () {
    Route::GET("", [WebViewController::class, "HomeView"]);

    Route::GET(
        'home-view',
        [WebViewController::class, 'HomeView']
    );
    Route::GET(
        'category/view',
        [WebViewController::class, 'CategoryView']
    );
    Route::GET(
        'category/tambah-data',
        [WebViewController::class, 'CreateCategoryView']
    );
    Route::GET(
        'category/update-index/{id}',
        [WebViewController::class, 'UpdateCategoryView']
    );
    Route::POST(
        'category-create',
        [CategoryController::class, 'create']
    );
    Route::POST(
        'category-create',
        [CategoryController::class, 'create']
    );
    Route::POST(
        'category-update',
        [CategoryController::class, 'update']
    );
    Route::GET(
        'category-delete/{id}',
        [CategoryController::class, 'delete']
    );


    Route::GET(
        'book/view',
        [WebViewController::class, 'bookIndexView']
    );
    Route::GET(
        'book/tambah-data',
        [WebViewController::class, 'createBookIndexView']
    );
    Route::GET(
        'book/update-index/{id}',
        [WebViewController::class, 'updateBookIndexView']
    );
    Route::POST(
        'book-create',
        [BookController::class, 'create']
    );
    Route::POST(
        'book-update',
        [BookController::class, 'update']
    );
    Route::GET(
        'book-delete/{id}',
        [BookController::class, 'delete']
    );


    Route::GET(
        'pinjam/view',
        [WebViewController::class, 'pinjamIndexView']
    );

    Route::GET(
        'history/view',
        [WebViewController::class, 'historyView']
    );

    Route::POST(
        'tambah-pinjaman',
        [PinjamanController::class, 'create']
    );
    Route::GET(
        'logout',
        [AuthAdminController::class, 'Logout']
    );
});
