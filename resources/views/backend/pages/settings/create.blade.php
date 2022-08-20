@extends('backend.layout.admin');

@section('title')
    <title>Tạo tài khoản</title>
@endsection


@section('css')
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/jquery-selectric/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/components.css') }}">
@endsection


@section('content')
    @include('backend.partials.headercontent', [ 
        'name' => 'Tạo tài khoản'
    ])
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Tạo tài khoản</h4>
      </div>
      <div class="card-body">
        <form action="" method="POST">
            <div class="form-group">
                <label>Tên tài khoản</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email">
            </div>

            <div class="form-group">
                <label>Mật khẩu</label>
                <input type="password" class="form-control" name="password">
            </div>

            <div class="form-group">
                <label> Chọn vai trò</label>
                <select class="form-control select2" multiple="" name="role_id[]">
                  <option>Option 1</option>
                  <option>Option 2</option>
                  <option>Option 3</option>
                  <option>Option 4</option>
                  <option>Option 5</option>
                  <option>Option 6</option>
                </select>
            </div>

            <button class="btn btn-primary">Tạo tài khoản</button>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('js')
    <script src="{{ asset('backend/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
@endsection
