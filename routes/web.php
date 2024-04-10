<?php

use App\Http\Controllers\ImageController;
use App\Models\Image;
use App\Models\Section;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware([Authenticate::class])->group(function () {
    
});