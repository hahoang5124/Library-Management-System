<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>thư viện HNA Lib</title>
    <link rel="stylesheet" href="<?= $base_url ?>template/bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg " style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= $base_url ?>page/home">HNA Lib</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= $base_url ?>page/home">trang chủ</a>
                    </li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?=$base_url?>page/book">Sách</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            chủ đề
                        </a>
                        <ul class="dropdown-menu">
                            <?php foreach ($dsChuDe as $chude) : ?>
                                <li><a class="dropdown-item" href="<?= $base_url ?>category/detail/<?= $chude['MaCD'] ?>"> <?= $chude['TenChuDe'] ?> </a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $base_url ?>page/cart">Giỏ sách</a>
                    </li>
                    <?php if (!isset($_SESSION['user'])) : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Tài khoản
                            </a>
                            <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="<?= $base_url ?>user/login">Đăng nhập</a></li>
                                    <li><a class="dropdown-item" href="<?= $base_url ?>user/signin">Đăng ký</a></li>
                            </ul>
                        </li>
                    <?php else : ?>



                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?= $_SESSION['user']['HoTen'] ?>
                            </a>
                            <ul class="dropdown-menu end-0" style="left: auto">
                                <li><a class="dropdown-item" href="<?=$base_url?>user/personalinfo">thông tin cá nhân</a></li>
                                <li><a class="dropdown-item" href="<?=$base_url?>page/history">lịch sử mượn sách</a></li>
                                <?php
                                if($_SESSION['user']['Quyen'] >=1):
                                ?>
                                <li><a class="dropdown-item text-warning" href="<?=$base_url?>admin/dashboard">Trang quản lý</a></li>
                                <?php endif;?>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="<?= $base_url ?>user/logout">Đăng xuất</a></li>
                            </ul>
                        </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </nav>
<?php if($view_name == 'page_home'): ?>
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= $base_url ?>template/img/1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?= $base_url ?>template/img/2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?= $base_url ?>template/img/3.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
<?php endif;?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-3">
                <form action="<?= $base_url ?>book/search" method="POST" class="mb-3">
                    <div class="input-group mb-3">
                        <input type="text" name="keyword" class="form-control" placeholder="tìm kiếm sách" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="button" id="search" name="keyword">Tìm kiếm</button>
                    </div>
                </form>
                <ul class="list-group mb-3">
                    <li class="list-group-item active" aria-current="true">
                        Sách Đọc Nhiều </li>
                    <?php foreach ($dsDocNhieu as $sach) : ?>
                        <li class="list-group-item"><?= $sach['TuaSach'] ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-md-9">
                <?php include_once 'view/v_' . $view_name . '.php'; ?>
            </div>

        </div>
    </div>
    <footer class="text-center text-bg-dark rounded-3-3 text-danger"> bản quyền &copy; 2023, thuộc về thư viện HNA Lib
    </footer>
    <script src="<?= $base_url ?>template/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>