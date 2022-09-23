<?php

namespace App\Http\Controllers;

use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CouponsController extends Controller
{
    use DeleteModelTrait;
    private $role_customer;
    private $customer;
    public function __construct()
    {
        // $this->role_customer = $role_customer;
        // $this->customer = $customer;
    }
    public function index () {
        return view('backend.pages.coupons.index');
    }
    public function create () {
        return view('backend.pages.coupons.create');
    }

    public function store (Request $request){
        try {
            DB::beginTransaction();
            
            DB::commit();
            return redirect()->route('customer.index')->with('message' , 'Bạn đã tạo nhóm khách thàng công');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message : ' . $exception->getMessage() . '-----------------Line : ' . $exception->getLine());
        }
    }

    public function edit($id){
        $data = $this->role_customer->find($id);
        return view('backend.pages.customer-role.edit' , compact('data'));
    }
    public function update(Request $request ,$id){
        try {
            DB::beginTransaction();
            
            DB::commit();
            return redirect()->route('customer.index')->with('message' , 'Bạn đã cập nhật nhóm khách thàng công');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message : ' . $exception->getMessage() . '-----------------Line : ' . $exception->getLine());
        }
    }

    public function delete ($id){
        return $this->deleteModelTrait($id, $this->role_customer);
    } 
    public function deleteSelected ( Request $request ) {
        
    }

}
