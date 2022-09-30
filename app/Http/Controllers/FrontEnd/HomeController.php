<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slider;

class HomeController extends Controller
{   
    private $slider, $category;
    public function __construct(Slider $slider, Category $category)
    {
        $this->slider = $slider;
        $this->category = $category;
    }
    public function index () {
        $slider = $this->slider->latest()->get();
        $category = $this->category->where('parent_id' , 0)->get();
        return view('frontend.pages.home.index' , compact('slider', 'category'));
    }
}
