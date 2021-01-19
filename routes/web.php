<?php

// Use default
use Illuminate\Support\Facades\Route;

// Use controllers
use App\Http\Controllers\UserController;

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


// Global views
Route::view('/', 'home');
Route::view('/home', 'home');
Route::view('details', 'details');
Route::view('about', 'about');

// __USER LOGINED__
Route::group(['middleware' => ['UserLoggined']], function(){

    // VIEW
    Route::view('login', 'login');
    Route::view('register', 'register');

    // POST
    Route::post('/login', [UserController::class, 'login']);
    Route::post('/register', [UserController::class, 'register']);

});

// __USER NOT LOGINED__
Route::group(['middleware' => ['UserNotLoggined']], function(){

    // GET
    Route::get('logout', [UserController::class, 'logout']);
    Route::get('profile', [UserController::class, 'profile']);
    Route::get('userSettings', [UserController::class, 'userSettings']);

    // POST
    Route::post('saveUserDatas', [UserController::class, 'saveUserDatas']);

});