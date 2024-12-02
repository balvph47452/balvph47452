@extends('admin.layout')

@section('title', 'Trang chu')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Quản lý tài khoản</h1>
                        @session('message')
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endsession
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <h1>Đổi mật khẩu</h1>
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                <form action="{{ route('updatePassword') }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label for="current_password" class="form-label">Mật khẩu hiện tại</label>
                                        <input type="password" name="current_password" class="form-control"
                                            id="current_password">
                                        @error('current_password')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Mật khẩu mới</label>
                                        <input type="password" name="password" class="form-control" id="password">
                                        @error('password')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Xác nhận mật khẩu mới</label>
                                        <input type="password" name="password_confirm" class="form-control">
                                    </div>
                                    @error('password_confirm')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                                    <a href="{{ route('users.list') }}" class="btn btn-info">Quay lại</a>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
