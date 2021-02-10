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

// AJAX
Route::post('ajax/request/wishlist', [UserController::class, 'wishlist'])->name('ajax.request.wishlist');
Route::post('ajax/request/updatewishlist', [UserController::class, 'updateWishlist'])->name('ajax.request.updatewishlist');


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
    Route::get('/blockProduct/{id}', [AdminController::class, 'blockProduct']);
    Route::get('/recoverProduct/{id}', [AdminController::class, 'recoverProduct']);
    Route::get('/removeProduct/{id}', [AdminController::class, 'removeProduct']);
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

    // GET
    Route::get('profile', [UserController::class, 'profile']);
    Route::get('userSettings', [UserController::class, 'userSettings']);
    Route::get('removeUserImg', [UserController::class, 'removeUserImg']);
    Route::get('allNotifications', [UserController::class, 'allNotifications']);
    Route::get('cart', [UserController::class, 'cart']);
    Route::get('removeFromCart/{id}', [UserController::class, 'removeFromCart']);

    // POST
    Route::post('saveUserDatas', [UserController::class, 'saveUserDatas']);

    // AJAX
    Route::post('ajax/request/getusernotifications', [UserController::class, 'getUserNotifications'])->name('ajax.request.getusernotifications');
    Route::post('ajax/request/removemessage', [UserController::class, 'removeMessage'])->name('ajax.request.removemessage');
    Route::post('ajax/request/notifisseen', [UserController::class, 'notifisSeen'])->name('ajax.request.notifisseen');
    Route::post('ajax/request/addtocart', [UserController::class, 'addToCart'])->name('ajax.request.addtocart');
});