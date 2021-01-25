<?php

// Use default
use Illuminate\Support\Facades\Route;

// Use controllers
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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


// VIEW
Route::view('about', 'about');

// GET
Route::get('/', [UserController::class, 'getHomePage']);
Route::get('/home', [UserController::class, 'getHomePage']);
Route::get('/details/{id}', [UserController::class, 'getDetails']);
Route::get('logout', [UserController::class, 'logout']);


// __ADMIN LOGGINED__
Route::group(['middleware' => ['AdminLoggined']], function(){
    // VIEW
    Route::view('admin', 'admin_login');

    // POST
    Route::post('admin_login', [AdminController::class, 'adminLogin']);
});


// __ADMIN NOT LOGGINED__
Route::group(['middleware' => ['AdminNotLoggined']], function(){
   // VIEW
    Route::view('addProduct', 'addProduct');

    // POST
    Route::post('addProduct', [AdminController::class, 'addProduct']);
    Route::post('saveProduct', [AdminController::class, 'saveProduct']);

    // GET
    Route::get('editProduct/{id}', [AdminController::class, 'editProduct']);
    Route::get('allProducts', [AdminController::class, 'allProducts']);
});


// __USER LOGGINED__
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

    Route::get('profile', [UserController::class, 'profile']);
    Route::get('userSettings', [UserController::class, 'userSettings']);

    // POST
    Route::post('saveUserDatas', [UserController::class, 'saveUserDatas']);

});