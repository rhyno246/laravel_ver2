<?php

namespace App\Http\Controllers;

use App\Components\CategoryRecusive;
use App\Http\Requests\RequestPost;
use App\Models\Category;
use App\Models\Products;
use App\Models\ProductTags;
use App\Traits\ChangeStatusTrait;
use App\Traits\DeleteModelTrait;
use App\Traits\DeleteSelectedTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    use StorageImageTrait , ChangeStatusTrait , DeleteModelTrait , DeleteSelectedTrait;
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
        $data = $this->products->latest()->get();
        return view('backend.pages.products.index' , compact('data'));
    }
    public function create () {
        $htmlOption = $this->getCategory($parentId = '');
        $product_tag = $this->product_tag->latest()->get();
        return view('backend.pages.products.create', compact('htmlOption' , 'product_tag'));
    }

    public function store (RequestPost $request) {
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
                    $product->images()->create([
                        'image_path'=>$img['file_path'],
                        'image_name'=>$img['file_name']
                    ]);
                }
            }

            $tagsIds = [];
            if(!empty($request->tags)){
                foreach($request->tags as $tagItem){
                    $tagsIds[] = $tagItem;
                }
            }
            $product->tags()->attach($tagsIds);

            DB::commit();
            return redirect()->route('products.index')->with('message' , 'Tạo sản phẩm thành công');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message : ' . $exception->getMessage() . '-----------------Line : ' . $exception->getLine());
        }
    }







    public function edit ($id){
        $data = $this->products->find($id);
        $htmlOption = $this->getCategory($data->categories_id);
        $product_tag = $this->product_tag->latest()->get();
        return view('backend.pages.products.edit', compact('data', 'htmlOption','product_tag'));
    }


    public function update (RequestPost $request , $id) {
        
    }



    public function delete ($id){
        $data = $this->products->find($id);
        dd($data->images);
        // $tagsIds = $data->tags;
        // $data->tags()->detach($tagsIds);
        // return $this->deleteModelTrait($id, $this->products);
    }

    public function deleteSelected ( Request $request ) {
        if($request->ajax()){
            $data = $this->products->find($request->ids);

            foreach ( $data as $item){
                $tagsIds = $item->tags;
                $item->tags()->detach($tagsIds);
            }

            return $this->deleteSelectedTrait($request->ids , $this->products);
        }
    }


    public function changeStatusShow (Request $request ,$id){
        if($request->ajax()){
            return $this->changeStatusTrait($this->products , $id , 'status' , $request->status );
        }
    }
    public function changeStatusHome (Request $request ,  $id) {
        if($request->ajax()){
            return $this->changeStatusTrait($this->products , $id , 'is_show_home' , $request->status );
        }
    }
}
