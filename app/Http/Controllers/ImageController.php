<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreImage;
use Intervention\Image\ImageManager;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreImageRequest;
use Intervention\Image\Drivers\Gd\Driver;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Image::paginate(9);
        
        return view('pages.admin.photos.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.photos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreImageRequest $request)
    {
        $filepath = request('image');
        
        if(request('format') == 0)
        {
            $width = 2000;
            $height = 1333;
        }
        else
        {
            $width = 1333;
            $height = 2000;
        }

        $photo = new ImageManager(new Driver());
        $photo = $photo->read($filepath)->scale($width,$height); // ou scaleDown

        // $photoName = Str::random(10) . time() . ".webp";
        // Storage::disk('public')->put('/images/' . $photoName, $photo->toWebp());

        // // $photo = ImageManager::read($filepath)->fit($width,$height);
        // // $photoName = Str::random(10) . time() . ".webp";
        // // Storage::disk('public')->put('/images/' . $photoName, $photo->encode('webp'));


        // $image = new Image();
        // $image->alt = $request->alt;
        // $image->filepath = '/images/' . $photoName;
        // $image->save();

        return redirect('/admin/photos');

    }
    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        // Vérifier si l'image existe (dans le dossier public), si oui, supprimer.
        if (Storage::disk('public')->exists($image->filepath))
        {
            Storage::disk('public')->delete($image->filepath);
        }

        $image->delete();

        return redirect('/admin/photos')->with('success','RIP');
    }
}
