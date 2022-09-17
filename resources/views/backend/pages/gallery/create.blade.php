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
        'name' => 'Thêm mới hình ảnh',
    ])
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Thêm mới hình ảnh</h4>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('gallery.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Tên hình ảnh</label>
                        <input type="text" class="form-control" name="name">
                    </div>

                    <div class="form-group">
                        <label>Mô tả hình ảnh</label>
                        <input type="text" class="form-control" name="description">
                    </div>

                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Chọn file ảnh</label>

                            <input type="file" name="feature_image_path"
                                class="@error('feature_image_path') is-invalid @enderror" id="image-upload"
                                value="{{ old('feature_image_path') }}" />
                        </div>
                        @error('feature_image_path')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <button class="btn btn-primary">Tạo hình ảnh </button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('backend/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/chooseImage.js') }}"></script>
@endsection
