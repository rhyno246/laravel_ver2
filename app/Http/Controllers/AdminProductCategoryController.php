<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminProductCategoryController extends Controller
{
    public function index () {
        return view('backend.pages.category.product.index');
    }
    public function create () {
        return view('backend.pages.category.product.create');
    }
}
