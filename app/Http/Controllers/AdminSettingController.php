<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    public function index (){
        return view('backend.pages.settings.index');
    }
    public function create () {
        return view('backend.pages.settings.create');
    }
}
