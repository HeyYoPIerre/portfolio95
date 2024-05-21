<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\SectionStoreRequest;
use App\Http\Requests\SectionUpdateRequest;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $sections = Section::latest()->paginate(5);
        return view('sections.index', compact('sections'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('sections.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SectionStoreRequest $request): RedirectResponse
    {
        Section::create($request->validated());
        return redirect()->route('sections.index')
                    ->with('success', 'Section created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section): View
    {
        return view('sections.show',compact('section'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section): View
    {
        return view('sections.edit',compact('section'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SectionUpdateRequest $request, Section $section): RedirectResponse
    {
        $section->update($request->validated());
        return redirect()->route('sections.index')
                        ->with('success','Section updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Section $section): RedirectResponse
    {
        $section->delete();
        return redirect()->route('sections.index')
                        ->with('success','Section deleted successfully');
    }
}
