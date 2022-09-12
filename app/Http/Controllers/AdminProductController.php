<?php

namespace App\Http\Controllers;

use App\Components\CategoryRecusive;
use App\Http\Requests\RequestPost;
use App\Models\Category;
use App\Models\Products;
use App\Models\ProductTags;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    use StorageImageTrait;
    private $products;
    private $category;
    private $product_tag;
    public function __construct(Products $products , Category $category , ProductTags $product_tag)
    {
        $this->products = $products;
        $this->category = $category;
        $this->product_tag = $product_tag;
    }


    public function getCategory ($parentId) {
        $data = $this->category->all();
        $recusive = new CategoryRecusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }


    public function index () {
        return view('backend.pages.products.index');
    }
    public function create () {
        $htmlOption = $this->getCategory($parentId = '');
        $product_tag = $this->product_tag->latest()->get();
        return view('backend.pages.products.create', compact('htmlOption' , 'product_tag'));
    }

    public function store (Request $request) {
        try {
            DB::beginTransaction();
            $data = [
                'name' => $request->name,
                'categories_id' => $request->categories_id,
                'stock' => $request->stock,
                'content' => $request->content,
                'user_id' => auth()->id(),
                'user_name' => auth()->user()->name,
                'slug' => Str::slug($request->name),
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request ,'feature_image_path' , 'products');
            if(!empty($dataUploadFeatureImage)){
                $data['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $data['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            $product = $this->products->create($data);

            if($request-> hasFile('image_path')){
                foreach($request->image_path as $fileItem){
                    $img = $this->storageTraitUploadMutiple($fileItem , 'products');
                    $product->image()->create([
                        'image_path'=>$img['file_path'],
                        'image_name'=>$img['file_name']
                    ]);
                }
            }
            


            DB::commit();
            return redirect()->route('products.index')->with('message' , 'Tạo sản phẩm thành công');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message : ' . $exception->getMessage() . '-----------------Line : ' . $exception->getLine());
        }
    }







    public function edit ($id){

    }


    public function update (RequestPost $request , $id) {
        
    }



    public function delete ($id){
 
    }

    public function deleteSelected ( Request $request ) {
   
    }


    public function changeStatusShow (Request $request ,$id){


    }
    public function changeStatusHome (Request $request ,  $id) {

    }
}
