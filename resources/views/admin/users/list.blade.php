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
                            <div class="card-header">
                                <a href="{{ route('users.create') }}" class="btn btn-primary">Thêm tài khoản</button></a>
                                <a href="{{ route('formChange') }}" class="btn btn-primary">Đổi mật khẩu</button></a>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên tài khoản</th>
                                            <th>Email</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning mr-2"> <i class="fas fa-edit"> Sửa</i></a>
                                                        <form action="{{ route('users.destroy', $user->id) }}" method="post" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')"><i class="fas fa-trash"></i>Xóa</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    {{-- <tfoot>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên tài khoản</th>
                                            <th>Email</th>
                                            <th>Thao Tác</th>
                                        </tr>
                                    </tfoot> --}}
                                </table>
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

