<?php

namespace App\Http\Controllers;

use App\Components\CategoryRecusive;
use App\Models\Post;
use App\Models\PostCategory;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AdminPostController extends Controller
{
    use StorageImageTrait;
    private $category;
    private $post;
    public function __construct(PostCategory $category , Post $post)
    {
        $this->category = $category;
        $this->post = $post;
    }
    public function getCategory ($parentId) {
        $data = $this->category->all();
        $recusive = new CategoryRecusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }

    public function index () {
        $data = $this->post->latest()->get();
        return view('backend.pages.post.index', compact('data'));
    }
    public function create () {
        $htmlOption = $this->getCategory($parentId = '');
        return view('backend.pages.post.create', compact('htmlOption'));
    }

    public function store (Request $request) {
        try {
            DB::beginTransaction();
            $data = [
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'categories_id' => $request->categories_id,
                'content' => $request->content,
                'user_id' => auth()->id(),
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request ,'feature_image_path' , 'post');
            if(!empty($dataUploadFeatureImage)){
                $data['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $data['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            $this->post->create($data);
            DB::commit();
            return redirect()->route('post.index')->with('message' , 'Tạo bài viết thành công');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message : ' . $exception->getMessage() . '-----------------Line : ' . $exception->getLine());
        }
    }
}
