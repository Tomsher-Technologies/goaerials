<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/services', [FrontendController::class, 'services'])->name('services');
Route::get('/service/{slug}', [FrontendController::class, 'serviceDetails'])->name('service-details');
Route::get('/clients', [FrontendController::class, 'clients'])->name('clients');
Route::get('/reels', [FrontendController::class, 'reels'])->name('reels');
Route::get('/social', [FrontendController::class, 'social'])->name('social');

Route::get('/contact-us', [FrontendController::class, 'contact_us'])->name('contact_us');
Route::post('/store-contact', [FrontendController::class, 'storeContact'])->name('store.contact');


Route::post('/language_change', [FrontendController::class, 'changeLanguage'])->name('language.change');

include_once('admin.php');
