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
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <div class="col-12">
                <img src="{{ Storage::url($post->image)}}" class="product-image" alt="Product Image" style="width:500px;height=400px">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">Tên Sản Phẩm: {{ $post->title }}</h3>
              <hr>
              <h3 class="mt-3">Giá tiền: <small>{{ $post->price }}</small></h3>
              <hr>
              <h4 class="mt-3">Lượt Xem: <small>{{ $post->view }}</small></h4>
              <h4 class="mt-3">Danh Mục: <small>{{ $post->category->name }}</small></h4>
              <h4 class="mt-3">Mô tả: <small>{{ $post->description }}</small></h4>
            </div>
          </div>
          <a href="{{ route('posts.list') }}" class="btn btn-secondary mt-4">
            <i class="fas fa-arrow-left"></i> Quay lại danh sách sản phẩm
          </a>
          
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
