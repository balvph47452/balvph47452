@extends('layout')

@section('content')
    <div class="container mt-5 col-9">
        <h2>Danh sách Đơn Hàng</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($orders)
            <table class="table">
                <thead>
                    <tr>
                        <th>Mã Đơn Hàng</th>
                        <th>Thời gian đặt</th>
                        <th>Tổng tiền</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order['order_id'] }}</td>
                            <td>{{ $order['created_at'] }}</td>
                            <td>{{ number_format($order['total'], 2, '.', '') }} $</td>
                            <td>
                                <a href="{{ route('orders.details', ['id' => $order['order_id']]) }}" class="btn btn-info">
                                    Xem chi tiết
                                </a>
                            </td>
                        </tr>
                        <tr id="details-{{ $order['order_id'] }}" class="collapse">
                            <td colspan="4">
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
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Bạn chưa có đơn hàng nào.</p>
        @endif
    </div>
@endsection
