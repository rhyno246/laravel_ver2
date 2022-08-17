@extends('backend.layout.admin');

@section('title')
    <title>Thêm Mới Danh Mục</title>
@endsection



@section('content')
    @include('backend.partials.headercontent', [ 
        'name' => 'Thêm Mới Danh Mục'
    ])
<div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4>Thêm Mới Danh Mục</h4>
      </div>
      <div class="card-body">
        <form>
            <div class="form-group">
                <label>Tên Danh Mục</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <label>Chọn Danh Mục Cha</label>
                <select class="form-control">
                  <option>Option 1</option>
                  <option>Option 2</option>
                  <option>Option 3</option>
                </select>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection
