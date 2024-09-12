<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminPanelController;
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

Route::view('/', 'main_page');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/Home',[MainController::class, 'main_page'] )->name('main_page');
Route::get('/Blogs',[MainController::class, 'blogs_page'] )->name('blogs_page');
Route::get('/Contact_us',[MainController::class, 'contact_us_page'] )->name('contact_us_page');
Route::get('/Services',[MainController::class, 'services_page'] )->name('services_page');

Route::get('/Products',[AdminPanelController::class, 'products_page'] )->name('products_page');

require __DIR__.'/auth.php';
