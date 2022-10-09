@extends('frontend.layout.layout')
@section('title')
    <title>Trang cá nhân của {{ $user->name }}</title>
@endsection


@section('css')
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/izitoast/css/iziToast.min.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="login-form" style="margin-bottom: 20px">
                <div class="img text-center" style="margin-bottom: 20px;">
                    <img alt="image"
                        src="{{ session()->get('users')->src ? session()->get('users')->src : asset('backend/assets/img/avatar/avatar-1.png') }}"
                        class="rounded-circle mr-1" style="width:100px; margin : 0 auto">
                </div>

                <form action="">
                    @csrf
                    <input type="text" placeholder="" required value="{{ $user->name }}">
                    <input type="email" placeholder="" required value="{{ $user->email }}">
                    <input type="password" placeholder="" required value="{{ $user->password_dehash }}">
                    <input type="number" placeholder="" required value="{{ $user->phone }}">
                    <button type="submit" class="btn btn-default">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('backend/assets/modules/izitoast/js/iziToast.min.js') }}"></script>
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
