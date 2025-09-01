<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Media $media)
    {
        $media = Media::latest()->first();
        $medias = Media::latest()->get();
        return view('pages.home', [
            'title' => 'Home',
            'media' => $media,
            'medias' => $medias
        ]);
    }
}
