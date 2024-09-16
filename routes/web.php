<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminPanelControllers;
use App\Http\Controllers\AdminPanel\products\ProductsController;

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

// Route::view('/', 'main_page');
Route::get('/',[MainController::class, 'main_page'] )->name('main_page');

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

// Route::get('/Products',[AdminPanelControllers::class, 'products_page'] )->name('products_page');
Route::get('/Products/{category}',[AdminPanelControllers::class, 'products_page'] )->name('products_page');
Route::get('/Product_category',[AdminPanelControllers::class, 'products_category_page'] )->name('products_category_page');


//THIS IS FOR THE UPLOADING OF IMAGES
// Route::get('/upload', [ProductsController::class, 'showUploadForm']);
Route::post('/upload', [ProductsController::class, 'uploadImage'])->name('image.upload');


Route::post('/uploads', [ProductsController::class, 'uploadCategory'])->name('category.uploads');


require __DIR__.'/auth.php';
