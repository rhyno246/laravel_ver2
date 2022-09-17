@extends('backend.layout.admin')

@section('title')
    <title>Danh sách hình ảnh </title>
@endsection

@section('css')
@endsection


@section('content')
    @include('backend.partials.headercontent', [
        'name' => 'Danh sách hình ảnh',
        'button' => 'Thêm Mới',
        'link' => 'gallery.create',
    ])
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>Danh sách hình ảnh</h4>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
