<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestGallery;
use App\Models\Gallery;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminGalleryController extends Controller
{
    use StorageImageTrait;
    private $gallery;
    public function __construct(Gallery $gallery)
    {
        $this->gallery = $gallery;
    }

    public function index () {
        $gallerys = $this->gallery->latest()->get();
        return view('backend.pages.gallery.index', compact('gallerys'));
    }
    public function create() {
        return view('backend.pages.gallery.create');
    }

    public function store(RequestGallery $request) {
        try {
            DB::beginTransaction();
            $data = [
                'name' => $request->name,
                'description' => $request->description,
                'user_id' => auth()->id(),
                'user_name' => auth()->user()->name,
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request ,'feature_image_path' , 'gallerys');
            if(!empty($dataUploadFeatureImage)){
                $data['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $data['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            $this->gallery->firstOrCreate($data);
            DB::commit();
            return redirect()->route('gallerys.index')->with('message' , 'Tạo hình ảnh thành công');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message : ' . $exception->getMessage() . '-----------------Line : ' . $exception->getLine());
        }
    }
}
