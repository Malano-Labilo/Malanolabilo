<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Media;
use App\Models\MediaCategory;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medias = Media::latest()->get();
        return view('pages.media.index', [
            'title' => 'Media',
            'medias' => $medias
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

    //Halaman untuk menampilkan media berdasarkan Author
    public function authors(Media $medias)
    {
        $firstTitle = 'All Media';
        $title = ' By ' . $medias::first()->author->username;
        return view('pages.media.medias', [
            'firstTitle' => $firstTitle,
            'title' => $title,
            'medias' => $medias::latest()->get()
        ]);
    }

    //Halaman untuk menampilkan media berdasarkan kategori
    public function mediaCategories(MediaCategory $category)
    {
        $firstTitle = 'All Media';
        $title = ' About ' . $category->name;
        return view('pages.media.medias', [
            'firstTitle' => $firstTitle,
            'title' => $title,
            // 'show' => $medias
        ]);
    }

    // Halaman untuk menampilkan salah satu media berdasarkan slug
    public function show(Media $media)
    {
        return view('pages.media.show', [
            'title' => "Media",
            'media' => $media
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
