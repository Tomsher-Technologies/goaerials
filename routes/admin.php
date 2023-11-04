<?php

use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeBannerController;
use App\Http\Controllers\Admin\Users\ProfileController;
use App\Http\Controllers\Admin\Users\UserController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\ReelsController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ClientsController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => env('ADMIN_PREFIX', 'admin'), 'as' => 'admin.'], function () {

    Route::get('/', function () {
        // dd( auth()->user()->can('manage-distributor') );
        return redirect()->route('admin.dashboard');
    });

    Route::middleware(['auth', 'auth.session'])->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/search', [DashboardController::class, 'search'])->name('search');

        Route::get('/settings', [PagesController::class, 'generalSettings'])->name('settings');
        Route::post('/store-settings', [PagesController::class, 'storeSettings'])->name('store-settings');

        Route::get('/enquiries', [PagesController::class, 'enquiries'])->name('enquiries');

        // Logged-in user profile
        Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
            Route::get('/profile', function () {
                return view('admin.users.profile');
            })->name('profile');

            Route::put('/password-update', [ProfileController::class, 'updatePassword'])->name('password-update');
            Route::put('/profile-update', [ProfileController::class, 'updateProfile'])->name('profile-update');
            Route::post('/logout-everywhere', [ProfileController::class, 'logoutEverywhere'])->name('logout-everywhere');
        });

        // All Users 
        Route::resource('users', UserController::class);

        // Home Banners
        Route::resource('banner', HomeBannerController::class)->except('show');

        // Brands
        Route::resource('brand', BrandController::class)->except('show');

        // Clients
        Route::resource('clients', ClientsController::class)->except('show');

        // Services
        Route::resource('services', ServiceController::class)->except('show');

        Route::resource('careers', CareerController::class);
        Route::post('careers/change_status', [CareerController::class, 'change_status'])->name('careers.change_status');
        Route::get('/careers/view/{id}', [CareerController::class, 'viewApplications'])->name('careers.view');

        // Reels
        Route::resource('reels', ReelsController::class)->except('show');

        Route::group(['prefix' => 'pages', 'as' => 'page.'], function () {
           
            Route::get('/home', [PagesController::class, 'homePage'])->name('home');
            Route::post('/store-home', [PagesController::class, 'storeHomePage'])->name('store-home');

            Route::get('/about', [PagesController::class, 'aboutPage'])->name('about');
            Route::post('/store-about', [PagesController::class, 'storeAboutPage'])->name('store-about');

            Route::get('/services', [PagesController::class, 'servicesPage'])->name('services');
            Route::post('/store-services', [PagesController::class, 'storeServicesPage'])->name('store-services');

            Route::get('/clients', [PagesController::class, 'clientsPage'])->name('clients');
            Route::post('/store-clients', [PagesController::class, 'storeClientsPage'])->name('store-clients');
           
            Route::get('/contact', [PagesController::class, 'contactPage'])->name('contact');
            Route::post('/store-contact', [PagesController::class, 'storeContactPage'])->name('store-contact');

            Route::get('/reels', [PagesController::class, 'reelsPage'])->name('reels');
            Route::post('/store-reels', [PagesController::class, 'storeReelsPage'])->name('store-reels');

            Route::get('/social', [PagesController::class, 'socialPage'])->name('social');
            Route::post('/store-social', [PagesController::class, 'storeSocialPage'])->name('store-social');
        });

        Route::resource('roles', RoleController::class);
    });
});
