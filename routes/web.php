<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/sitemap.xml', [SitemapController::class, 'sitemap'])->name('sitemap');
Route::get('/robots.txt', [SitemapController::class, 'robots'])->name('robots');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/lang/{locale}', [LanguageController::class, 'switch'])
    ->whereIn('locale', ['en', 'hi'])
    ->name('lang.switch');

// ── Admin ─────────────────────────────────────────────────────────────────────
Route::prefix('admin7285')->name('admin.')->group(function () {

    Route::get('login',  [AdminLoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminLoginController::class, 'login'])->name('login.post');

    Route::middleware('admin')->group(function () {
        Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('inquiries',                   [InquiryController::class, 'index'])->name('inquiries.index');
        Route::get('inquiries/{inquiry}',         [InquiryController::class, 'show'])->name('inquiries.show');
        Route::delete('inquiries/{inquiry}',      [InquiryController::class, 'destroy'])->name('inquiries.destroy');
    });
});
