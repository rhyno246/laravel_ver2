@extends('backend.layout.admin')

@section('title')
    <title>Thêm Mới Sản Phẩm</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/jquery-selectric/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/image-uploader.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
@endsection

@section('content')
    @include('backend.partials.headercontent', [
        'name' => 'Thêm Mới Sản Phẩm',
    ])
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Thêm Mới Sản Phẩm</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Nhập số lượng</label>
                        <input type="number" class="form-control" name="stock">
                    </div>

                    <div class="form-group">
                        <label>Chọn danh mục</label>
                        <select class="form-control select2" name="categories_id">
                            <option selected="selected" disabled></option>
                            {!! $htmlOption !!}
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="ckeditor" name="content" rows="30"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Chọn tags cho sản phẩm</label>
                        <select class="form-control select2" name="tags[]" multiple="multiple">
                            @foreach ($product_tag as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ảnh đại diện sản phẩm</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Chọn file ảnh</label>
                            <input type="file" name="feature_image_path" id="image-upload" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Thumnail sản phẩm</label>
                        <div class="input-images"></div>
                    </div>

                    <button class="btn btn-primary">Tạo sản phẩm</button>

                </form>

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="//cdn.ckeditor.com/4.19.1/full/ckeditor.js"></script>
    <script src="{{ asset('backend/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/page/features-post-create.js') }}"></script>
    <script src="{{ asset('backend/assets/js/chooseImage.js') }}"></script>
    <script src="{{ asset('backend/assets/js/image-uploader.min.js') }}"></script>
    <script>
        $('.input-images').imageUploader({
            imagesInputName: "image_path",
            label: "Chọn ảnh thumnail"
        });
    </script>
@endsection
