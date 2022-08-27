<?php

namespace App\Http\Controllers;

use App\Components\CategoryRecusive;
use App\Http\Requests\RequestPostCategory;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminPostCategory extends Controller
{
    private $post_cate;
    public function __construct(PostCategory $post_cate)
    {
        $this->post_cate = $post_cate;
    }
    public function index () {
        $data = $this->post_cate->latest()->get();
        return view('backend.pages.category.post.index', compact('data'));
    }
    public function create ($parentId = '') {
        $htmlOption = $this->getCategory($parentId);
        return view('backend.pages.category.post.create' , compact('htmlOption'));
    }

    public function store(RequestPostCategory $request){
        $this->post_cate->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);
        return redirect()-> route('category.post.index')->with('message' , 'Bạn đã tạo danh mục thành công');
    }

    public function getCategory ($parentId) {
        $data = $this->post_cate->all();
        $recusive = new CategoryRecusive ($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
}
