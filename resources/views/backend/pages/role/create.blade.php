@extends('backend.layout.admin');

@section('title')
    <title>Tạo vai trò</title>
@endsection


@section('css')
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/jquery-selectric/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/components.css') }}">
@endsection


@section('content')
    @include('backend.partials.headercontent', [ 
        'name' => 'Tạo vai trò'
    ])
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Tạo vai trò</h4>
      </div>
      <div class="card-body">
        <form action="" method="POST">
            <div class="form-group">
              <label>Tên vai trò</label>
              <input type="text" class="form-control" name="name">
            </div>

            <div class="form-group">
              <label>Vai trò hiển thị</label>
              <input type="text" class="form-control" name="display_name">
            </div>


            <button class="btn btn-primary">Tạo vai trò</button>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('js')
    <script src="{{ asset('backend/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
@endsection
