@extends('layout')

@section('content')
    <div class="col-9">
        <h2>Giỏ Hàng</h2>

        @if(session('cart'))
            <table class="table">
                <thead>
                    <tr>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Tổng</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(session('cart') as $id => $details)
                        <tr>
                            <td><img src="{{ $details['image'] }}" width="50" height="50" alt="post-image"></td>
                            <td>{{ $details['title'] }}</td>
                            <td>
                                <form action="{{ route('cart.update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1">
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                </form>
                            </td>
                            <td>{{ number_format($details['price'], 2, '.', '') }} $</td>
                            <td>{{ number_format($details['price'] * $details['quantity'], 2, '.', '') }} $</td>
                            <td>
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-right">
                <strong>Tổng tiền:
                    {{ number_format(array_sum(array_map(function ($item) { return $item['price'] * $item['quantity']; }, session('cart'))), 2, '.', '') }} $
                </strong>
            </div>
            <div class="text-right mt-3">
                <form action="{{ route('cart.placeOrderSession') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Đặt hàng</button>
                </form>
            </div>
        @else
            <p>Giỏ hàng của bạn đang trống.</p>
            <div class="text-center">
                <a href="{{ route('index') }}" class="btn btn-primary">Mua ngay</a>
            </div>
        @endif
    </div>
@endsection

