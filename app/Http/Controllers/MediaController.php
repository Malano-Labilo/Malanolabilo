<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.media.index', [
            'title' => 'Media',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function medias()
    {
        // $medias = Media::latest()->
        $firstTitle = 'This Is';
        $title = 'All Media ';
        return view('pages.media.medias', [
            'firstTitle' => $firstTitle,
            'title' => $title,
            // 'show' => $medias
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Media $media)
    {
        return view('pages.media.show', [
            'title' => "Media"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Media $media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Media $media)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Media $media)
    {
        //
    }
}
