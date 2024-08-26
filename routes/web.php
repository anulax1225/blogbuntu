<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;

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

Route::get('/', [ BlogController::class, 'index' ]);

Route::get('/register', [ RegisterController::class, 'index' ]);
Route::post('/register', [ RegisterController::class, 'register' ]);

Route::get('/email/verify', [ RegisterController::class, 'verifyEmail' ])->middleware([ 'App\Http\Middleware\UserAuthMiddleware' ])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [ RegisterController::class, 'emailVerification' ])->middleware(['App\Http\Middleware\UserAuthMiddleware', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', [ RegisterController::class, 'sendEmailVerification' ])->middleware(['App\Http\Middleware\UserAuthMiddleware', 'throttle:6,1'])->name('verification.send');

Route::get('/login', [ LoginController::class, 'index' ]);
Route::post('/login', [ LoginController::class, 'login' ]);
Route::get('/logout', [ LoginController::class, 'logout' ])->middleware([ 'App\Http\Middleware\UserAuthMiddleware', 'verified' ]);

Route::get('/profile/{id}', [ UserController::class, 'profile' ]);
Route::get('/myprofile', [ UserController::class, 'myProfile' ])->middleware([ 'App\Http\Middleware\UserAuthMiddleware', 'verified' ]);
Route::post('/follow/{id}', [ UserController::class, 'follow' ])->middleware([ 'App\Http\Middleware\UserAuthMiddleware', 'verified' ]);

Route::post('/user/{id}', [ UserController::class, 'update' ])->middleware([ 'App\Http\Middleware\UserAuthMiddleware', 'verified' ]);
Route::delete('/user/{id}',  [ UserController::class, 'delete' ])->middleware([ 'App\Http\Middleware\UserAuthMiddleware', 'verified' ]);

Route::get('/blogs', [ BlogController::class, 'list' ]);
Route::get('/blog/create', [ BlogController::class, 'create' ])->middleware([ 'App\Http\Middleware\UserAuthMiddleware', 'verified' ]);
Route::get('/blog/{id}', [ BlogController::class, 'single' ]);
Route::post('/blog', [ BlogController::class, 'insert' ])->middleware([ 'App\Http\Middleware\UserAuthMiddleware', 'verified' ]);
Route::post('/blog/like/{id}', [ BlogController::class, 'like' ])->middleware([ 'App\Http\Middleware\UserAuthMiddleware', 'verified' ]);
Route::post('/blog/{id}', [ BlogController::class, 'update' ])->middleware([ 'App\Http\Middleware\UserAuthMiddleware', 'verified' ]);
Route::delete('/blog/{id}', [ BlogController::class, 'delete' ])->middleware([ 'App\Http\Middleware\UserAuthMiddleware', 'verified' ]);
