<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

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

Route::get('/', function () {
    return view('welcome');
});




// Show Register Page & Login Page
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->name('attempt')->middleware('guest');


//register
Route::get('/register', [RegisterController::class, 'index'])->name('register.index')->middleware('guest');
Route::post('/register', [RegisterController::class, 'register_one'])->name('register.one')->middleware('guest');
Route::get('/register-two/{user_id}', [RegisterController::class, 'index_two'])->name('register.index-two')->middleware('guest');
Route::post('/register-two', [RegisterController::class, 'register_two'])->name('register.two')->middleware('guest');
Route::get('/register-success', [RegisterController::class, 'success'])->name('register.success')->middleware('guest');

Route::get('/get-membership-fee', [RegisterController::class, 'getMembershipFee'])->name('membership-fee')->middleware('guest');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});