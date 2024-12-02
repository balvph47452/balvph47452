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
                        <h1>Quản lý Sản phẩm</h1>
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
                                <a href="{{ route('posts.create') }}" class="btn btn-primary">Thêm Sản phẩm</button></a>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Hình ảnh</th>
                                            <th>Giá sản phẩm</th>
                                            <th>Lượt xem</th>
                                            <th>Danh mục</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $post)
                                            <tr>
                                                <td>{{ $post->id }}</td>
                                                <td>{{ $post->title }}</td>
                                                <td>
                                                    <img src="{{ Storage::url($post->image) }}" alt=""
                                                        width="60">
                                                </td>
                                                <td>{{ $post->price }}</td>
                                                <td>{{ $post->view }}</td>
                                                <td>{{ $post->category->name }}</td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Action buttons">
                                                        <!-- Show button -->
                                                        <a href="{{ route('posts.detail', $post->id) }}" class="btn btn-info btn-sm" title="Xem chi tiết">
                                                            <i class="fas fa-eye"></i> Show
                                                        </a>
                                                        <!-- Edit button -->
                                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm" title="Chỉnh sửa">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </a>
                                                        <!-- Delete button with confirmation -->
                                                        <form action="{{ route('posts.destroy', $post->id) }}" method="post" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" 
                                                                onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
                                                                <i class="fas fa-trash"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                                
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Hình ảnh</th>
                                            <th>Giá sản phẩm</th>
                                            <th>Lượt xem</th>
                                            <th>Danh mục</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                {{ $posts->links() }}
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
