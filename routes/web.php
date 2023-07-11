<?php

use App\Http\Controllers\AuthController;
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

// Route::get('/home', function () {
//     return view('welcome');
// })->name('home');

Route::get('/login',[AuthController::class,'loginPage'])->name('login');
Route::get('/registration',[AuthController::class,'registrationPage'])->name('registration');
Route::post('/login',[AuthController::class,'loginPost'])->name('login.post');
Route::post('/registration',[AuthController::class,'registrationPost'])->name('registration.post');
Route::get('/logout',[AuthController::class,'logOut'])->name('logout');
Route::get('/home',[AuthController::class,'homePage'])->name('home');
Route::group(['middleware'=>'auth'],function()
{
    Route::get('/profile',[AuthController::class,'profilePage'])->name('profile');
});