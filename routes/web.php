<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Events\Login;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [UserController::class, 'storeRegistration'])->name('register'); // Connect storeRegistration method
Route::get('/signin', [LoginController::class, 'showSignIn'])->name('signin');
Route::post('/signin', [LoginController::class, 'authenticate'])->name('authenticate');


 Route::middleware('auth')->group(function (){
    Route::get('/dashboard',[LoginController::class,'dashboard'])->name('dashboard');
    Route::get('/logout',[UserController::class,'logout'])->name('logout');
 });

