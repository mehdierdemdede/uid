<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ContactMessageAdminController;
use App\Http\Controllers\Admin\ExportMembershipApplicationsController;
use App\Http\Controllers\Admin\MembershipApplicationAdminController;
use App\Http\Controllers\MembershipApplicationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'site.home')->name('home');
Route::view('/hakkimizda', 'site.pages.about')->name('about');
Route::get('/haberler', [\App\Http\Controllers\NewsController::class, 'index'])->name('news.index');
Route::get('/haberler/{news}', [\App\Http\Controllers\NewsController::class, 'show'])->name('news.show');
Route::get('/iletisim', [ContactController::class, 'create'])->name('contact');
Route::post('/iletisim', [ContactController::class, 'store'])
    ->middleware(['throttle:20,1', 'honeypot'])
    ->name('contact.store');

Route::get('/uyelik', [MembershipApplicationController::class, 'create'])->name('membership.create');
Route::post('/uyelik', [MembershipApplicationController::class, 'store'])
    ->middleware(['throttle:20,1', 'honeypot'])
    ->name('membership.store');
Route::get('/uyelik/basarili', [MembershipApplicationController::class, 'success'])->name('membership.success');

Route::view('/uyelik/kvkk', 'legal.kvkk')->name('legal.kvkk');
Route::view('/uyelik/tuzuk', 'legal.tuzuk')->name('legal.tuzuk');

Route::prefix('admin')->group(function (): void {
    Route::get('/login', [AuthController::class, 'create'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'store'])->name('admin.login.store');

    Route::middleware('admin.auth')->group(function (): void {
        Route::post('/logout', [AuthController::class, 'destroy'])->name('admin.logout');
        
        Route::resource('news', \App\Http\Controllers\Admin\NewsController::class)->names('admin.news');

        Route::get('/basvurular', [MembershipApplicationAdminController::class, 'index'])->name('admin.applications.index');
        Route::get('/basvurular/export/csv', ExportMembershipApplicationsController::class)->name('admin.applications.export.csv');
        Route::get('/basvurular/{membershipApplication}', [MembershipApplicationAdminController::class, 'show'])->name('admin.applications.show');
        Route::patch('/basvurular/{membershipApplication}', [MembershipApplicationAdminController::class, 'update'])->name('admin.applications.update');

        Route::get('/mesajlar', [ContactMessageAdminController::class, 'index'])->name('admin.messages.index');
        Route::get('/mesajlar/{message}', [ContactMessageAdminController::class, 'show'])->name('admin.messages.show');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
