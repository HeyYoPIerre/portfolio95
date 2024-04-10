<?php

use App\Http\Controllers\ImageController;
use App\Models\Image;
use App\Models\Section;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/attach', function () {
    $image = Image::factory()->create();
 
    $section = Section::factory()->create([
        'name' => 'boxe',
]);
 
$image->sections()->attach($section);
});


Route::middleware('auth')->group(function () {
    // Mes routes protégées par mot de passe
    Route::get('/admin/photos', [ImageController::class, 'index'])->name('photos.index');
    Route::post('/admin/photos', [ImageController::class, 'store'])->name('photos.store');
    Route::get('/admin/photos/create', [ImageController::class, 'create'])->name('photos.create');
    Route::delete('/admin/photos/{image}', [ImageController::class, 'destroy'])->name('photos.destroy');
});