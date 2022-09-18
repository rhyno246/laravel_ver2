@extends('backend.layout.admin')

@section('title')
    <title>Danh sách hình ảnh </title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/izitoast/css/iziToast.min.css') }}">
@endsection


@section('content')
    @include('backend.partials.headercontent', [
        'name' => 'Danh sách Albums',
        'button' => 'Thêm Mới',
        'link' => 'gallerys.create',
    ])
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>Danh sách Albums</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($gallerys as $item)
                        <div class="col-md-4">
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h4>{{ $item->name ? $item->name : 'Không tên' }}</h4>
                                    <div class="card-header-action">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                                                id="checkbox-{{ $item->id }}" name="ids"
                                                value="{{ $item->id }}">
                                            <label for="checkbox-{{ $item->id }}"
                                                class="custom-control-label">&nbsp;</label>
                                        </div>
                                        <div class="dropdown">
                                            <a href="#" data-toggle="dropdown"
                                                class="btn btn-warning dropdown-toggle">Options</a>
                                            <div class="dropdown-menu">
                                                <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i>
                                                    View</a>
                                                <a href="#" class="dropdown-item has-icon"><i class="far fa-edit"></i>
                                                    Edit</a>
                                                <a href="#" class="dropdown-item has-icon"><i
                                                        class="far fa-trash-alt"></i> Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="#" class="d-block"><img src="{{ $item->feature_image_path }}"
                                            alt="{{ $item->feature_image_name }}" class="w-100 d-block img-albums"></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('backend/assets/modules/izitoast/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/sweetalert/sweetalert.min.js') }}"></script>
    @if (Session::has('message-edit'))
        <script>
            iziToast.success({
                title: 'OK rồi !',
                message: '{{ Session::get('message-edit') }}',
                position: 'bottomCenter'
            });
        </script>
    @endif

    @if (Session::has('message'))
        <script>
            iziToast.success({
                title: 'OK rồi !',
                message: '{{ Session::get('message') }}',
                position: 'bottomCenter'
            });
        </script>
    @endif
@endsection
