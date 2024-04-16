<?php

use App\Models\Image;
use App\Models\Section;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\SectionController;
use Illuminate\Auth\Middleware\Authenticate;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('sections', SectionController::class);

Route::middleware([Authenticate::class])->group(function () {
    
});
