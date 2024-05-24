<?php

use App\Models\Image;
use App\Models\Gallery;
use App\Models\Section;
use App\Http\Middleware\AdminPanel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SectionController;
use Illuminate\Auth\Middleware\Authenticate;

Route::get('/', function () {
    return view('welcome'); 
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


Route::get('/profile', function () {
    
})->middleware(AdminPanel::class);

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('galleries', GalleryController::class);
    Route::resource('images', ImageController::class);
    Route::resource('sections', SectionController::class);
});
