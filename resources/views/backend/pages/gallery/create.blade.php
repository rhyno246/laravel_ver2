@extends('backend.layout.admin')

@section('title')
    <title>Thêm mới hình ảnh</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/components.css') }}">
@endsection

@section('content')
    @include('backend.partials.headercontent', [
        'name' => 'Thêm mới albums',
    ])
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Thêm mới albums</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('gallerys.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Tên albums</label>
                        <input type="text" class="form-control" name="name">
                    </div>

                    <div class="form-group">
                        <label>Mô tả</label>
                        <input type="text" class="form-control" name="description">
                    </div>

                    <div class="form-group">
                        <label>Chọn đại diện cho albums</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Chọn file ảnh</label>

                            <input type="file" class="form-control @error('feature_image_path') is-invalid @enderror"
                                name="feature_image_path" id="image-upload">
                            @error('feature_image_path')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <button class="btn btn-primary">Tạo Albums </button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('backend/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/chooseImage.js') }}"></script>
@endsection
