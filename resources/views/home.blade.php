@extends('layout')

@section('title', 'Trang chu')

@section('content')
    <div class="col-9">
        <div class="row">
            <h3 class="nav-brand">Sản phẩm nổi bật</h3>
            <!-- Item Product -->
            @foreach ($posts as $post)
                <div class="col-4 mt-4">
                    <div class="card">
                        <img src="{{ $post->image }}"
                            class="card-img-top" alt="{{ $post->title }}">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $post->title }}</h5>

                            <p class="card-text">
                                <span class="badge bg-danger">{{ $post->price }}$</span>
                            </p>
                            <a href="{{ route('detail', $post->id )}}" class="btn btn-info">Xem chi tiết</a>
                            <button class="mt-3 btn btn-success add-to-cart" data-id="{{ $post->id }}">Thêm vào giỏ hàng</button>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- Item Product -->
        </div>
    </div>
@endsection
