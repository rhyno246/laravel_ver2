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
    private $customer,  $menu, $gallery;
    public function __construct(Customer $customer, Menu $menu, Gallery $gallery)
    {
        $this->customer = $customer;
        $this->menu = $menu;
        $this->gallery = $gallery;
    }
    public function login()
    {
        $gallery = $this->gallery->latest()->get();
        $menu = $this->menu->where('parent_id', 0)->get();
        return view('frontend.pages.login.login', compact('menu', 'gallery'));
    }

    public function register()
    {
        $gallery = $this->gallery->latest()->get();
        $menu = $this->menu->where('parent_id', 0)->get();
        return view('frontend.pages.login.register', compact('menu', 'gallery'));
    }

    public function loginPost(Request $request)
    {
        $user =  $this->customer->where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId', $user->name);
                $request->session()->put('users', $user);
                return redirect()->route('home');
            } else {
                return back()->with('fail', 'Bạn nhập sai email hoặc password');
            }
        } else {
            return back()->with('fail', 'Tài khoản này chưa đăng kí');
        }
    }

    public function registerPost(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = [
                "name" => $request->name,
                "password" => Hash::make($request->password),
                'password_dehash' => $request->password,
                "email" => $request->email,
                'phone' => $request->phone
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'src', 'customers');
            if (!empty($dataUploadFeatureImage)) {
                $data['src'] = $dataUploadFeatureImage['file_path'];
                $data['image_name'] = $dataUploadFeatureImage['file_name'];
            }
            $this->customer->create($data);
            $request->session()->put('loginId', $data['name']);
            DB::commit();
            return redirect()->route('login')->with('message', 'Đăng ký thành công');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message : ' . $exception->getMessage() . '-----------------Line : ' . $exception->getLine());
        }
    }

    public function logout()
    {
        if (session()->has('loginId')) {
            session()->pull('loginId');
            session()->pull('users');
            return redirect()->route('login');
        }
    }


    public function profile($id)
    {
        $user = $this->customer->find($id);
        $gallery = $this->gallery->latest()->get();
        $menu = $this->menu->where('parent_id', 0)->get();
        return view('frontend.pages.users.profile', compact('user', 'menu', 'gallery'));
    }

    public function update (Request $request , $id)
    {
        try {
            DB::beginTransaction();
            $data = [
                "name"=> $request->name,
                "password" => Hash::make($request->password),
                'password_dehash' =>$request->password,
                "email" => $request->email,
                'phone' => $request->phone,
                'role' => $request->role
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'src', 'customers');
            if (!empty($dataUploadFeatureImage)) {
                $data['src'] = $dataUploadFeatureImage['file_path'];
                $data['image_name'] = $dataUploadFeatureImage['file_name'];
            }
            $this->customer->find($id)->update($data);
            $user = $this->customer->find($id);
            $request->session()->put('loginId', $user->name);
            $request->session()->put('users', $user);
            DB::commit();
            return redirect()->route('users.index', $id)->with('message' , 'Cập nhật thông tin thành công');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message : ' . $exception->getMessage() . '-----------------Line : ' . $exception->getLine());
        }
    }
}
