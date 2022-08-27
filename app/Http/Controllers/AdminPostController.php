<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function index () {
        return view('backend.pages.post.index');
    }
    public function create ($parentId = '') {
        return view('backend.pages.post.create');
    }
}
