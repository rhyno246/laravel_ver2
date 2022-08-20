<?php

namespace App\Http\Controllers;

use App\Components\CategoryRecusive;
use App\Http\Requests\RequestProductCategory;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AdminProductCategoryController extends Controller
{
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function index () {
        $data = $this->category->reorder('created_at', 'desc')->get();
        return view('backend.pages.category.product.index' , compact('data'));
    }
    public function create ($parentId = '') {
        $htmlOption = $this->getCategory($parentId);
        return view('backend.pages.category.product.create' , compact('htmlOption'));
    }

    public function store(RequestProductCategory $request ){
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);
        return redirect()-> route('category.product.index');
    }

    public function getCategory ($parentId) {
        $data = $this->category->all();
        $recusive = new CategoryRecusive ($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
    public function edit($id){
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('backend.pages.category.product.edit', compact('category' , 'htmlOption'));
    }

    public function update ($id , RequestProductCategory $request) {
        $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);
        return redirect()->route('category.product.index')->with('message' , 'Bạn đã cập nhật thành công');
    }

    public function delete ($id){
        
    }
}
