<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Menu;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    private $category , $menu , $products , $gallery;
    public function __construct(Category $category , Products $products, Menu $menu , Gallery $gallery)
    {
        $this->category = $category;
        $this->products = $products;
        $this->menu = $menu;
        $this->gallery = $gallery;
    }
    public function index () {
        $category = $this->category->where('parent_id' , 0)->get();
        $gallery = $this->gallery->latest()->get();
        $product = $this->products->latest()->get();
        $menu = $this->menu->where('parent_id' , 0)->get();
        return view('frontend.pages.products.index' , compact('category', 'product' , 'menu' , 'gallery'));
    }
    public function detail ($slug) {
        $category = $this->category->where('parent_id' , 0)->get();
        $gallery = $this->gallery->latest()->get();
        $menu = $this->menu->where('parent_id' , 0)->get();
        $product = $this->products->where('slug', $slug)->first();
        return view('frontend.pages.products.detail' , compact('category' , 'menu' , 'product' , 'gallery'));
    }
}
