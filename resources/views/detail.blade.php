@extends('layout')

@section('title', 'Trang chu')

@section('content')
    <div class="tab-pane fade show active col-9 " id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
        <div class="card mb-3 border-0" style="max-width: 540px;">
            <div class="row ">
                <h3 class="nav-brand mb-3">Chi tiết sản phẩm</h3>

                <div class="col-md-4">
                    <img src="{{ $post->image }}"
                        class="img-fluid rounded-start" alt="{{ $post->title }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <p class="card-text">
                        <ul>
                            <li>Tên đơn hàng: {{ $post->title }} <span class="badge bg-info"></span>
                            </li>
                            <li>Đơn giá: <span class="badge bg-danger">{{ $post->price }}$</span></li>
                            <li>Nhà cung cấp: {{ $post->category->name }}</li>
                            <li>Hàng mới nhập</li>
                            <li>View: <span class="badge bg-warning">{{ $post->view }}</span> lượt xem</li>
                            <li>Giảm giá: <span class="badge bg-danger">5%</span></li>

                        </ul>
                        <!-- modal1 -->
                        <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="formModalLabel">Điền thông tin đặt
                                            hàng</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <label for="basic-url" class="form-label">Tên khách
                                                hàng</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">Họ và
                                                    tên</span>
                                                <input type="text" class="form-control" placeholder="" aria-label="name"
                                                    aria-describedby="basic-addon1">

                                            </div>

                                            <label for="basic-url" class="form-label">Email</label>
                                            <div class="input-group mb-3">
                                                <input type="email" class="form-control" placeholder="Email"
                                                    aria-label="Email" aria-describedby="basic-addon1">
                                                <span class="input-group-text" id="basic-addon2">@example.com</span>
                                            </div>

                                            <label for="basic-url" class="form-label">Khu vực</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">Chọn
                                                    khu vực giao hàng</span>
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>--Chọn khu vực</option>
                                                    <option value="1">Hà Nội</option>
                                                    <option value="2">TP.HCM</option>
                                                    <option value="3">Korea</option>
                                                </select>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success">Xác nhận</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#formModal"
                            class="btn btn-info">Mua hàng</button>
                        <!-- //modal2 -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <span class="badge bg-danger">Tính năng này chưa hỗ trợ</span>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Đóng</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button href="#" class="btn btn-success" type="button" class="btn btn-success"
                            data-bs-toggle="modal" data-bs-target="#exampleModal">Trả góp</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <h4>Mô tả sản phẩm</h4>
        <hr>
        <div>
            <p>{{ $post->description }}</p>
            <!-- <a href="#" class="btn btn-primary mt-3">Xem thêm</a> -->
        </div>
    </div>
@endsection
