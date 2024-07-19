<?php

use Illuminate\Support\Facades\Auth;
use Spatie\Sitemap\SitemapGenerator;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\pageController;
use App\Http\Controllers\userController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\skillController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\contactusController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\experienceController;

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

Route::get('/', [homeController::class, "index"])->name('home.index');
Route::post('/', [homeController::class, "store"])->name('home.store');

Route::redirect('home','dashboard');

Route::get('/auth', [authController::class, "index"])->name('login')->middleware('guest');
Route::get('/auth/redirect', [authController::class, "redirect"])->middleware('guest');
Route::get('/auth/callback', [authController::class, "callback"])->middleware('guest');
Route::get('/auth/logout', [authController::class, "logout"]);




Route::prefix('dashboard')->middleware('auth')->group(
    function(){
        Route::get('/',[dashboardController::class,'dashboard']);
        Route::resource('page', pageController::class);
        Route::resource('contactus', contactusController::class);
        Route::get('contactus', [contactusController::class, "index"])->name('contactus.index');
        Route::resource('experience', experienceController::class); 
        Route::get('profiles', [profileController::class, "index"])->name('profile.index');
        Route::post('profiles', [profileController::class, "update"])->name('profile.update');
        Route::get('skill', [skillController::class,'index'])->name('skill.index');
        Route::post('skill', [skillController::class,'update'])->name('skill.update');
    }
);

$path = public_path('sitemap.xml');
SitemapGenerator::create('https://example.com')->writeToFile($path);