<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\GalleryStoreRequest;
use App\Http\Requests\GalleryUpdateRequest;


class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $galleries = Gallery::latest()->paginate(5);
        return view('galleries.index', compact('galleries'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GalleryStoreRequest $request): RedirectResponse
    {
        if ($request->has('section_id')) {
            $sectionId = $request->input('section_id');
            $gallery = Gallery::create([
                'name' => $request->input('name'),
                'section_id' => $sectionId,
            ]);
            return redirect()->route('galleries.index')
                            ->with('success', 'Galerie créée avec succès.');
        }
        return redirect()->back()->withErrors(['section_id' => 'Veuillez sélectionner une section.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery): View
    {
        return view('galleries.show',compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery): View
    {
        return view('galleries.edit',compact('gallery'));
    }

    public function update(Gallery $gallery, Request $request)
    {
        if ($request->has('section_id')) {
            $sectionId = $request->input('section_id');
            $gallery->update([
                'name' => $request->input('name'),
                'section_id' => $sectionId,
            ]);
    
            return redirect()->route('galleries.index')
                            ->with('success', 'Galerie mise à jour avec succès.');
        }
    
        return redirect()->back()->withErrors(['section_id' => 'Veuillez sélectionner une section.', 'id' => 'La galerie n\'existe pas.']);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery): RedirectResponse
    {
        $gallery->delete();
        return redirect()->route('galleries.index')
                        ->with('success','Gallery deleted successfully');
    }
}