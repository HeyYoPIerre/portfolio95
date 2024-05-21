<?php

use App\Models\Image;
use App\Models\Gallery;
use App\Models\Section;
use App\Http\Middleware\AdminPanel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SectionController;
use Illuminate\Auth\Middleware\Authenticate;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile', function () {
    
})->middleware(AdminPanel::class);

Route::resource('sections', SectionController::class);
Route::resource('images', ImageController::class);
Route::resource('galleries', GalleryController::class);

Route::middleware([Authenticate::class])->group(function () {
    
});
