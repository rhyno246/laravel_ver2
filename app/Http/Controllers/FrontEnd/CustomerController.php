<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Gallery;
use App\Models\Menu;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private $customer,  $menu , $gallery;
    public function __construct(Customer $customer, Menu $menu , Gallery $gallery)
    {
        $this->customer = $customer;
        $this->menu = $menu;
        $this->gallery = $gallery;
    }
    public function login () {
        $gallery = $this->gallery->latest()->get();
        $menu = $this->menu->where('parent_id' , 0)->get();
        return view('frontend.pages.login.login' , compact( 'menu' , 'gallery'));
    }

    public function register () {
        $gallery = $this->gallery->latest()->get();
        $menu = $this->menu->where('parent_id' , 0)->get();
        return view('frontend.pages.login.register' , compact( 'menu' , 'gallery'));
    }

    public function loginPost () {

    }

    public function registerPost () {
        
    }
}
