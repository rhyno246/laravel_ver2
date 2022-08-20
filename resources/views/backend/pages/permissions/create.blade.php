@extends('backend.layout.admin');

@section('title')
    <title>Tạo Quyền Truy Cập</title>
@endsection


@section('css')
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/jquery-selectric/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/components.css') }}">
@endsection


@section('content')
    @include('backend.partials.headercontent', [
        'name' => 'Tạo Quyền Truy Cập',
    ])
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Tạo Quyền Truy Cập</h4>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Chọn tên Module</label>
                        <select class="form-control">
                            <option>Option 1</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="col-auto d-flex align-items-center">
                                    <label class="colorinput">
                                        <input name="color" type="checkbox" value="primary" class="colorinput-input">
                                        <span class="colorinput-color bg-primary"></span>
                                    </label>
                                    <span class="ml-2">Thêm</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary">Tạo Quyền Truy Cập</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('backend/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
@endsection
