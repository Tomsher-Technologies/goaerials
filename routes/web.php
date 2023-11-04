<?php

use App\Http\Controllers\FrontendController;
use App\Models\Division;
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

Route::get('/contact-us', [FrontendController::class, 'contact_us'])->name('contact_us');
Route::post('/store-contact', [FrontendController::class, 'storeContact'])->name('store.contact');

Route::get('/career', [FrontendController::class, 'career'])->name('career');
Route::get('/career/details/{slug}', [FrontendController::class, 'careerDetails'])->name('career-details');
Route::get('/news', [FrontendController::class, 'news'])->name('news');
Route::get('/news/{blog}', [FrontendController::class, 'news_details'])->name('news.details');

Route::get('/chairmans_message', [FrontendController::class, 'chairmansMessage'])->name('chairmans_message');
Route::get('/divisions/{divisions}', [FrontendController::class, 'divisions'])->name('divisions');
Route::get('/products/{category}', [FrontendController::class, 'category'])->name('category');
Route::get('/products/{category}/{sub_category}', [FrontendController::class, 'sub_category'])->name('sub_category');

Route::post('/language_change', [FrontendController::class, 'changeLanguage'])->name('language.change');
Route::post('/apply-job', [FrontendController::class, 'applyJob'])->name('apply.job');

include_once('admin.php');
