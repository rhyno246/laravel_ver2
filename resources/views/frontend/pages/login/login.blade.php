@extends('frontend.layout.layout')
@section('title')
    <title>Đăng nhập</title>
@endsection
@section('content')
    <div class="container">
        <div class="row" style="margin-bottom: 30px">
            <div class="login-form">
                <h2>Đăng nhập</h2>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <input type="text" placeholder="Tên" required />
                    <input type="email" placeholder="Email" required />
                    <p style="margin-top: 20px"> <a href="{{ route('register') }}">Tôi Chưa có tài khoản , tôi muốn đăng
                            ký</a> </p>
                    <button type="submit" class="btn btn-default">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection
