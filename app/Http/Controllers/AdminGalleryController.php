<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestGallery;
use App\Models\Gallery;
use Illuminate\Http\Request;

class AdminGalleryController extends Controller
{
    private $gallery;
    public function __construct(Gallery $gallery)
    {
        $this->gallery = $gallery;
    }

    public function index () {
        return view('backend.pages.gallery.index');
    }
    public function create() {
        return view('backend.pages.gallery.create');
    }

    public function store(RequestGallery $request) {
        
    }
}
