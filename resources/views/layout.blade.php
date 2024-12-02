<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <style>
        /* Wide top banner */
        .top-banner img {
            width: 100%;
           
            object-fit: cover;
        }
        .carousel-item img {
            height: 250px;
            object-fit: cover;
        }

        .bottom-carousel img {
            height: 250px;
            object-fit: cover;
        }
        .footer-icons i {
            color: white;
        }
       
        .carousel-item {
            position: relative;
        }


        .carousel-caption {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        /* Show the caption when hovering over the image */
        .carousel-item:hover .carousel-caption {
            opacity: 1;
        }


        .carousel-caption h2, .carousel-caption h5 {
            color: rgb(133, 216, 18);
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); 
        }

        .carousel-item img {
            width: 100%;
            /* height: auto; */
            object-fit: cover;
        }
        /* Dropdown hover effect */
        .navbar .nav-item.dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 0;
        }
        .navbar .nav-item.dropdown .dropdown-menu {
            display: none;
        }
        .dropdown-item:hover {
            background-color: #007bff; /* Blue background on hover */
            color: #ffffff; /* White text color on hover */
        }
        /* Sticky sidebar */
        .sidebar-sticky {
            position: sticky;
            top: 20px; /* Adjust this value as needed */
            z-index: 10; /* Ensures it stays above other content */
        }
        .nav-item .dropdown-menu {
            display: none; /* Ẩn menu mặc định */
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .nav-item:hover .dropdown-menu {
            display: block; /* Hiển thị menu khi hover */
            opacity: 1;
        }

    </style>
</head>

<body>
    <div class="container mb-3">
        <!-- Top Banner (Wide) -->
        
<!-- LOGO -->
<div class="row">
    <div class="col-12">
        <nav class="navbar navbar-expand-lg bg-success navbar-dark"> <!-- Changed bg-primary to bg-success -->
            <div class="container-fluid">
                <!-- Logo -->
                <div class="d-flex align-items-center">
                    <i class="fa-solid fa-book" style="color: #ffffff; font-size: 32px;"></i>
                    <a href="{{ route('index') }}" style="text-decoration: none;"> 
                        <span style="color: #ffffff; font-size: 24px; font-weight: bold; margin-left: 10px;">BookWorld</span>
                    </a>
                </div>
            
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            
        </nav>
    </div>
</div>

<!-- LOGO -->



        <!-- Header -->
        <div class="row">
            <div class="col-12">
                <!-- Carousel -->
                <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://vietgigs.vn/public/storage/gigs/gallery/large/90054AE20DD9E8EFE72C.webp" class="d-block w-100 banner-img" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h2>Chào mừng đến với BookWorld</h2>
                                <h5>Khám phá các sản phẩm mới nhất!</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://vietgigs.vn/public/storage/gigs/gallery/large/EC6D5D824FE2BE40EAB4.webp" class="d-block w-100 banner-img" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h2>Chào mừng đến với BookWorld</h2>
                                <h5>Khám phá các sản phẩm mới nhất!</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://thegioidohoa.com/wp-content/uploads/2018/12/thi%E1%BA%BFt-k%E1%BA%BF-banner-du-l%E1%BB%8Bch-5.jpg" class="d-block w-100 banner-img" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h2>Chào mừng đến với BookWorld</h2>
                                <h5>Khám phá các sản phẩm mới nhất!</h5>
                            </div>
                        </div>
                    </div>
                    <!-- Carousel Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <!-- Carousel -->
                <!-- Navbar -->
 <div class="row">
    <div class="col-12">
        <nav class="navbar navbar-expand-lg bg-primary navbar-dark">
            <div class="container-fluid">
                <i class="fa-solid fa-house" style="color: #ffffff;"></i>
                <a class="navbar-brand" href="{{ route('index') }}">Trang chủ</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('list') }}">
                                <i class="fa-brands fa-product-hunt"></i> Sản phẩm
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-layer-group"> </i> Danh mục
                            </a>
                            <ul class="dropdown-menu bg-primary" aria-labelledby="navbarDropdown">
                                @foreach($cate as $category)
                                    <li> <a class="dropdown-item text-white" href="{{ route('about', $category->id) }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        
                    </ul>
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <form action="{{ route('search') }}" method="GET" class="d-flex">
                            <input class="form-control form-control-sm me-2 w-auto" type="search" name="query" placeholder="Tìm kiếm sản phẩm..." aria-label="Search" value="{{ request()->query('query') }}">
                            <button class="btn btn-outline-light btn-sm" type="submit">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                        <li class="nav-item"></li>
                        <a class="nav-link" href="{{ route('cart.show') }}" alt="Giỏ hàng">
                            <i class="fa-solid fa-cart-shopping"></i> 
                        </a>
                        <!-- Admin icon at the end -->
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-user-shield"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="{{ route('login') }}">Đăng nhập</a></li>
                                <li><a class="dropdown-item" href="">Đăng ký</a></li>
                            </ul>
                        </div>
                        
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar -->
            </div>
        </div>
        <!-- Header -->

       

        <!-- Main Content -->
        <div class="row mt-5">
            <!-- Main content area -->
            <div class="col-9">
                @yield('content')
            </div>
            <!-- Sidebar -->
            <div class="col-3">
                <div class="card mb-3">
                    <!-- Category Dropdown -->
                   

                <!-- Warranty Information -->
                
                    <div class="card-header bg-success text-white">
                        Tin tức mới nhất
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="#" class="text-decoration-none">Tin tức 1</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="text-decoration-none">Tin tức 2</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="text-decoration-none">Tin tức 3</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="text-decoration-none">Tin tức 3</a>
                        </li>
                    </ul>
                </div>
               

                <!-- Contact Form -->
                <div class="card mb-3">
                    
                    <div class="card-body">
                        <!-- Quảng cáo 1 -->
                        <div class="mb-3">
                            <a href="#" target="_blank">
                                <img src="https://cdn0.fahasa.com/media/wysiwyg/Thang-11-2024/TrangCTT11_1124_20_11_Resize_310X210_2.png" alt="Quảng cáo 1" class="img-fluid rounded">
                            </a>
                        </div>
                        <!-- Quảng cáo 2 -->
                        <div class="mb-3">
                            <a href="#" target="_blank">
                                <img src="https://cdn0.fahasa.com/media/wysiwyg/Thang-11-2024/TrangGiangSinh_SmallBanner_T12_310x210.jpg" alt="Quảng cáo 2" class="img-fluid rounded">
                            </a>
                        </div>
                        <!-- Quảng cáo 3 -->
                        <div class="mb-3">
                            <a href="#" target="_blank">
                                <img src="https://cdn0.fahasa.com/media/wysiwyg/Thang-11-2024/SmallBanner_T11_Alphabooks_smallbanner_310x210.jpg" alt="Quảng cáo 3" class="img-fluid rounded">
                            </a>
                        </div>
                        <div class="mb-3">
                            <a href="#" target="_blank">
                                <img src="https://cdn0.fahasa.com/media/wysiwyg/Thang-11-2024/SmallBanner_T11_Alphabooks_smallbanner_310x210.jpg" alt="Quảng cáo 3" class="img-fluid rounded">
                            </a>
                        </div>
                        
                    </div>
                </div>
                
            
            <!-- Sidebar -->
        </div>
        <!-- Main Content -->

        <!-- Footer -->
        <div class="row mt-5">
            <div class="col-12">
                <footer class="navbar navbar-light bg-primary">
                    <div class="container-fluid">
                        <span class="navbar-brand" style="color: #ffffff;"></span>
                        <div class="d-flex footer-icons">
                            <a href="#" class="btn btn-body" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Facebook.com/font-end."><i class="fa-brands fa-facebook"></i></a>
                            <a href="#" class="btn btn-body" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Youtube.com/html-css."><i class="fa-brands fa-youtube"></i></a>
                            <a href="#" class="btn btn-body" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="instagram.com/javascrips."><i class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <!-- Logo -->
                        <div class=" d-flex align-items-center">
                            <i class="fa-solid fa-book" style="color: #ffffff; font-size: 32px;"></i>
                            <a href="{{ route('index') }}"> <span  style="color: #ffffff; font-size: 24px; font-weight: bold; margin-left: 10px;">BookWorld</span></a>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!-- Footer -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>
    <script src="https://uhchat.net/code.php?f=bfa70d"></script>
</body>

</html>
