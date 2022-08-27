@extends('backend.layout.admin')

@section('title')
    <title>Thêm Mới Bài Viết</title>
@endsection
@section('content')
    @include('backend.partials.headercontent', [
        'name' => 'Thêm Mới Bài Viết',
    ])
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Thêm Mới Bài Viết</h4>
            </div>
            <div class="card-body">
                <form action="">
                    @csrf
                    <div class="form-group">
                        <label>Tiêu đề bài viết</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Chọn danh mục</label>
                        <select class="form-control" name="parent_id">
                            <option value="0" selected="selected">----</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="ckeditor" name="ckeditor" rows="30"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Ảnh đại diện bài viết</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="image" id="image-upload" />
                        </div>
                    </div>
                    <button class="btn btn-primary">Tạo bài viết</button>

                </form>

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="//cdn.ckeditor.com/4.19.1/full/ckeditor.js"></script>
    <script src="{{ asset('backend/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/page/features-post-create.js') }}"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
        CKEDITOR.replace('ckeditor', options);
    </script>
@endsection
