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
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content mt-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Thêm Tài khoản</h3>
                            </div>


                            <form action="#" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tên tài khoản</label>
                                        <input type="text" class="form-control" placeholder="Nhập Tên tài khoản"
                                            name="name" value="{{ old('name') }}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" placeholder="Nhập Email"
                                            name="email" value="{{ old('email') }}">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Mật khẩu</label>
                                        <input type="password" class="form-control" placeholder="Nhập password"
                                            name="password" >
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nhập lại Mật khẩu</label>
                                        <input type="password" class="form-control" placeholder="Nhập lại password"
                                            name="password_confirm" >
                                        @error('password_confirm')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                                </div>
                            </form>
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
