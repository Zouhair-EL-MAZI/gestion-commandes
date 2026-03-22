<?php

use App\Http\Controllers\CommandeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StatsController;
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

Route::get('/', function () {
    return view('welcome');
});


// Route::middleware('auth')->resource('commandes', CommandeController::class);          
Route::resource('commandes', CommandeController::class)->middleware('auth');          // pour protéger les routes de commandes, on utilise le middleware d'authentification


Route::get("/RegisterForm" , [LoginController::class, 'showRegisterForm'])->name('register');
Route::post("/Register" , [LoginController::class, 'register'])->name('register.post');

Route::get("/LoginForm" , [LoginController::class, 'showLoginForm'])->name('loginform');
Route::post("/Login" , [LoginController::class, 'login'])->name('login.post');
Route::post("/Logout" , [LoginController::class, 'logout'])->name('logout');

Route::post('/commandes/{id}/add-product', [CommandeController::class, 'addProduct'])->name('commandes.addProduct');


Route::prefix('stats')->middleware('auth')->group(function () {
    Route::get('/clients', [StatsController::class, 'statsClients'])->name('stats.commandes');
    Route::get('/produits', [StatsController::class, 'statsProduits'])->name('stats.produits');
});
