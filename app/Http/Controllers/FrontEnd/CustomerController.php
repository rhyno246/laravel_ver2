<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Gallery;
use App\Models\Menu;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    use StorageImageTrait;
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

    public function registerPost (Request $request){
        try {
            DB::beginTransaction();
            $data = [
                "name"=> $request->name,
                "password" => Hash::make($request->password),
                'password_dehash' =>$request->password,
                "email" => $request->email,
                'phone' => $request->phone
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'src', 'customers');
            if (!empty($dataUploadFeatureImage)) {
                $data['src'] = $dataUploadFeatureImage['file_path'];
                $data['image_name'] = $dataUploadFeatureImage['file_name'];
            }
            $this->customer->create($data);
            DB::commit();
            return redirect()->route('login')->with('message' , 'Đăng ký thành công');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message : ' . $exception->getMessage() . '-----------------Line : ' . $exception->getLine());
        }
    }
}
