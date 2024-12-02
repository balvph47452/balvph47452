@extends('layout')

@section('content')
    <div class="container mt-5 col-9">
        <h2>Chi tiết đơn hàng: {{ $order['order_id'] }}</h2>
        <p>Thời gian đặt: {{ $order['created_at'] }}</p>
        <p>Tổng tiền: {{ number_format($order['total'], 2, '.', '') }} $</p>

        <table class="table">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Tổng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order['items'] as $item)
                    <tr>
                        <td>{{ $item['title'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ number_format($item['price'], 2, '.', '') }} $</td>
                        <td>{{ number_format($item['price'] * $item['quantity'], 2, '.', '') }} $</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('orders.show') }}" class="btn btn-secondary mt-3">Quay lại</a>
    </div>
@endsection
