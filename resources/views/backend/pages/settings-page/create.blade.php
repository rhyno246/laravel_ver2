@extends('backend.layout.admin')

@section('title')
    <title>Thêm Mới Config</title>
@endsection
@section('content')
    @include('backend.partials.headercontent', [
        'name' => 'Thêm Mới Config',
    ])
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Thêm Mới Config</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('settings-pages.store' . '?type=' . request()->type) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Config_key</label>
                        <input type="text" class="form-control" name="config_key">
                    </div>

                    @if (request()->type === 'Text')
                        <div class="form-group">
                            <label>Config_value</label>
                            <input type="text" class="form-control" name="config_value">
                        </div>
                        <input type="text" hidden name="type" value="{{ request()->type }}">
                    @endif

                    @if (request()->type === 'Textarea')
                        <div class="form-group">
                            <label>Config_value</label>
                            <textarea name="config_value" class="form-control"rows="10"></textarea>
                        </div>
                        <input type="text" hidden name="type" value="{{ request()->type }}">
                    @endif

                    @if (request()->type === 'Image')
                        <div class="form-group">
                            <div id="image-preview" class="image-preview">
                                <label for="image-upload" id="image-label">Chọn file ảnh</label>
                                <input type="file" class="form-control" name="config_value" id="image-upload">
                            </div>
                        </div>
                        <input type="text" hidden name="type" value="{{ request()->type }}">
                    @endif


                    <button class="btn btn-primary">Tạo config</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('backend/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/chooseImage.js') }}"></script>
@endsection
