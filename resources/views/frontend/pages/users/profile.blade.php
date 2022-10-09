@extends('frontend.layout.layout')
@section('title')
    <title>Trang cá nhân của {{ $user->name }}</title>
@endsection


@section('css')
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/izitoast/css/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#profile">Thông tin cá nhân</a></li>
                <li><a data-toggle="tab" href="#order">Đã mua</a></li>
                <li><a data-toggle="tab" href="#floworder">Theo dõi đơn hàng</a></li>
            </ul>
            <div class="tab-content">
                <div id="profile" class="tab-pane fade in active">
                    <div class="login-form" style="margin-bottom: 20px">


                        <form action="{{ route('users.update', ['id' => $user->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            <div class="img text-center" style="margin-bottom: 20px;">
                                <div id="image-preview" class="image-preview w-100"
                                    style="background: url('{{ session()->get('users')->src ? session()->get('users')->src : asset('backend/assets/img/avatar/avatar-1.png') }}');background-repeat: no-repeat;
                                background-size: cover;
                                background-position: center;">
                                    <label for="image-upload" id="image-label">Chọn file ảnh</label>
                                    <input type="file" name="src" id="image-upload" />
                                </div>
                            </div>
                            @csrf
                            <input type="text" name="role" value="{{ $user->role }}" readonly>
                            <input type="text" placeholder="" required value="{{ $user->name }}" name="name">
                            <input type="email" placeholder="" required value="{{ $user->email }}" name="email">
                            <input type="password" placeholder="" required value="{{ $user->password_dehash }}"
                                name="password">
                            <input type="number" placeholder="" required value="{{ $user->phone }}" name="phone">
                            <button type="submit" class="btn btn-default">Cập nhật</button>
                        </form>
                    </div>
                </div>
                <div id="order" class="tab-pane fade">
                    <h3>Menu 1</h3>
                    <p>Some content in menu 1.</p>
                </div>
                <div id="floworder" class="tab-pane fade">
                    <h3>Menu 2</h3>
                    <p>Some content in menu 2.</p>
                </div>
            </div>



        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('backend/assets/modules/izitoast/js/iziToast.min.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/chooseImage.js') }}"></script>
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
