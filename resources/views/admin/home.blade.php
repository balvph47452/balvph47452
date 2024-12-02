@extends('admin.layout')

@section('title', 'Trang chủ')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Trang chủ</h1>
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <!-- Thống kê tổng quan -->
                    <div class="col-md-4">
                        <div class="widget-small primary coloured-icon">
                            <i class='icon bx bxs-user-account fa-3x'></i>
                            <div class="info">
                                <h4>Tổng tài khoản</h4>
                                <p><b>{{ $tongtk }} tài khoản</b></p>
                                <p class="info-tong">Tổng số tài khoản được quản lý.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="widget-small info coloured-icon">
                            <i class='icon bx bxs-data fa-3x'></i>
                            <div class="info">
                                <h4>Tổng sản phẩm</h4>
                                <p><b>{{ $tongsanpham }} sản phẩm</b></p>
                                <p class="info-tong">Tổng số sản phẩm được quản lý.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="widget-small warning coloured-icon">
                            <i class='icon bx bxs-category fa-3x'></i>
                            <div class="info">
                                <h4>Tổng danh mục</h4>
                                <p><b>{{ $tongdm }} danh mục</b></p>
                                <p class="info-tong">Tổng số danh mục hiện có.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Thống kê sản phẩm theo danh mục -->
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="tile">
                            <h3 class="text-primary">Thống kê sản phẩm theo danh mục</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>Tên danh mục</th>
                                            <th>Số lượng sản phẩm</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listTk as $tke)
                                            <tr>
                                                <td>{{ $tke->name }}</td>
                                                <td class="text-center">{{ $tke->posts_count }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
    </div>
@endsection
