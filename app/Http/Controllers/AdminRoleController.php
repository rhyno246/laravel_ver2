<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminRoleController extends Controller
{
    public function index (){
        return view('backend.pages.role.index');
    }
    public function create (){
        return view('backend.pages.role.create');
    }
}
