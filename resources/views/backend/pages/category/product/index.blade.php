@extends('backend.layout.admin');

@section('title')
    <title>Danh Sách Danh Mục</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('backend/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/izitoast/css/iziToast.min.css') }}">
@endsection


@section('content')
    @include('backend.partials.headercontent', [
        'name' => 'Danh Sách Danh Mục',
        'button' => 'Thêm Mới',
        'link' => 'category.product.create',
    ])
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Danh Sách Danh Mục</h4>
            </div>


            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-product">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    <div class="custom-checkbox custom-control">
                                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad"
                                            class="custom-control-input" id="checkbox-all">
                                        <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                    </div>
                                </th>
                                <th>Tên danh mục</th>
                                <th>Đường dẫn</th>
                                <th>Danh mục cha</th>
                                <th>Tạo ngày</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td class="align-middle">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                                                id="checkbox-1">
                                            <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        {{ $item->name }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $item->slug }}
                                    </td>
                                    <td class="align-middle">
                                        {{ optional($item->getParent)->name }}
                                    </td>
                                    <td class="align-middle">
                                        {{ date('d-m-Y', strtotime($item->created_at)) }}
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('category.product.edit', ['id' => $item->id]) }}"
                                                class="btn btn-primary mr-2">Sửa</a>
                                            <a href="{{ route('category.product.detele', ['id' => $item->id]) }}"
                                                class="btn btn-danger">Xóa</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <!-- JS Libraies -->
    <script src="{{ asset('backend/assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('backend/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/page/modules-datatables.js') }}"></script>
    <script src="{{ asset('backend/assets/modules/izitoast/js/iziToast.min.js') }}"></script>
    <script>
        @if (Session::has('message'))
            iziToast.success({
                title: 'OK rồi !',
                message: '{{ Session::get('message') }}',
                position: 'bottomCenter'
            });
        @endif
    </script>
@endsection
