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
        <section class="content mt-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Sửa Sản Phẩm</h3>
                            </div>


                            <form action="{{ route('posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Tên Sản phẩm</label>
                                        <input type="text" class="form-control" placeholder="Nhập tên sản phẩm"
                                            name="title" value="{{ old('name') ?? $post->title }}">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Hình ảnh sản phẩm</label>
                                        <img src="{{ Storage::url($post->image) }}" width="90" alt="">
                                        <input type="file" class="form-control" name="image">
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Mô tả sản phẩm</label>
                                        <textarea name="description" rows="5" class="form-control">{{ old('description') ?? $post->description }}</textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Giá sản phẩm</label>
                                        <input type="number" class="form-control" name="price"
                                            value="{{ old('price') ?? $post->price }}">
                                        @error('price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Lượt xem sản phẩm</label>
                                        <input type="text" class="form-control" name="view"
                                            value="{{ old('view') ?? $post->view }}">
                                        @error('view')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Danh Mục</label>
                                        <select name="category_id" class="form-control">
                                            @foreach ($categories as $cate)
                                                <option value="{{ $cate->id }}" @selected($cate->id === $post->category_id)>
                                                    {{ $cate->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    <a href="{{ route('posts.list') }}" class="btn btn-secondary">Quay lại</a>

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
