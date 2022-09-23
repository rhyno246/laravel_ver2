@extends('backend.layout.admin')

@section('title')
    <title>Thêm Mới Mã Giảm Giá</title>
@endsection
@section('content')
    @include('backend.partials.headercontent', [
        'name' => 'Thêm Mới Mã Giảm Giá',
    ])
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Thêm Mới Mã Giảm Giá</h4>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('coupons.store') }}">
                    @csrf
                    <div class="form-group">
                        <label>Mã</label>
                        <input type="text" class="form-control @error('coupons_key') is-invalid @enderror"
                            name="coupons_key" value="{{ old('coupons_key') }}">
                        @error('coupons_key')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Loại giảm giá</label>
                        <select name="coupons_value" class="form-control">
                            <option value="0">Tiền (vnđ)</option>
                            <option value="1">Phần trăm (%)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Giỏ hàng phải trên</label>
                        <input type="number" class="form-control @error('coupons_cart_value') is-invalid @enderror"
                            name="coupons_cart_value" value="{{ old('coupons_cart_value') }}">
                        @error('coupons_cart_value')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Thuộc nhóm khách hàng</label>
                        <select class="form-control" name="customer_group">
                            <option value="0" selected="selected"></option>
                        </select>
                    </div>
                    <button class="btn btn-primary">Tạo mã giảm giá</button>
                </form>
            </div>
        </div>
    </div>
@endsection
