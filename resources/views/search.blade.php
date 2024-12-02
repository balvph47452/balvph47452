@extends('layout')

@section('title', 'Tìm kiếm sản phẩm')

@section('content')
    <div class="col-9">
        <h3>Sản phẩm liên quan</h3>

        <div class="row mt-4">
            @if($posts->count())
                @foreach($posts as $post)
                    <div class="col-4 mt-4">
                        <div class="card">
                            <img src="{{ $post->image }}" class="card-img-top" alt="{{ $post->title }}">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">
                                    <span class="badge bg-danger">{{ $post->price }}$</span>
                                </p>
                                <a href="{{ route('detail', $post->id) }}" class="btn btn-info">Xem chi tiết</a>
                                <button class="mt-3 btn btn-success add-to-cart" data-id="{{ $post->id }}">Thêm vào giỏ hàng</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>Không có sản phẩm nào phù hợp với từ khóa tìm kiếm của bạn.</p>
            @endif
        </div>

        <!-- Hiển thị phân trang -->
        {{ $posts->links() }}
    </div>
@endsection
