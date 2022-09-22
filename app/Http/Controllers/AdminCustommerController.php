<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Traits\ChangeStatusTrait;
use App\Traits\DeleteModelTrait;
use App\Traits\DeleteSelectedTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminCustommerController extends Controller
{
    use StorageImageTrait, DeleteModelTrait,DeleteSelectedTrait ,ChangeStatusTrait;
    private $customer;
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }
    public function index () {
        $data = $this->customer->latest()->get();
        return view('backend.pages.customer.index', compact('data'));
    }

    public function store (Request $request){
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
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message : ' . $exception->getMessage() . '-----------------Line : ' . $exception->getLine());
        }
    }

    public function edit($id){
        $users = $this->customer->find($id);
        return view('backend.pages.customer.edit' , compact('users'));
    }
    public function update($id){
        try {
            DB::beginTransaction();
            
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message : ' . $exception->getMessage() . '-----------------Line : ' . $exception->getLine());
        }
    }

    public function delete ($id){
        return $this->deleteModelTrait($id, $this->customer);
    } 
    public function changeStatusShow (Request $request ,$id){
        if($request->ajax()){
            return $this->changeStatusTrait($this->customer , $id , 'status' , $request->status );
        }

    }

    public function deleteSelected(Request $request){
        if($request->ajax()){
            return $this->deleteSelectedTrait($request->ids , $this->customer);
        }
    }
}
