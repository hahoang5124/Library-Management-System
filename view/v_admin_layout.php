<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> quản lý thư viện HNA lib</title>
    <link rel="stylesheet" href="<?=$base_url?>template/bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 p-0 expand-lg collapse collapse-horizontal show"
                style="background-color: #e3f2fd; min-height: 100vh;" id="openMenu">
                <strong class="text-center d-block p-3">trang quản lý</strong>
                <div class="list-group m-3">
                    <a href="<?=$base_url?>admin/dashboard" class="list-group-item list-group-item-action <?=(strpos($view_name, 'dashboard'))?'active':''?>">
                        tổng quan
                    </a>
                    <a href="<?=$base_url?>admin/user" class="list-group-item list-group-item-action <?=(strpos($view_name, 'user'))?'active':''?>">tài khoản</a>
                    <a href="<?=$base_url?>admin/category" class="list-group-item list-group-item-action <?=(strpos($view_name, 'category'))?'active':''?>">chủ đề</a>
                    <a href="<?=$base_url?>admin/book" class="list-group-item list-group-item-action <?=(strpos($view_name, 'book'))?'active':''?>">sách</a>
                    <a href="<?=$base_url?>admin/accept" class="list-group-item list-group-item-action <?=(strpos($view_name, 'accept'))?'active':''?>">mượn trả</a>
                </div>
            </div>
            <div class="col-md p-0">
                <nav class="navbar navbar-expand-lg " style="background-color: #e3f2fd;">
                    <div class="container-fluid">

                        <button class="btn btn-outline-light me-2 text-dark fw-bold" type="button"
                            data-bs-toggle="collapse" data-bs-target="#openMenu" aria-expanded="false"
                            aria-controls="openMenu">
                            =
                        </button>

                        <a class="navbar-brand" href="#">HNA Lib</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <?=$_SESSION['user']['HoTen']?>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="<?=$base_url?>page/home">xem trang chủ</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="<?=$base_url?>user/logout">đăng xuất</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="container">
                <?php include_once 'view/v_' . $view_name . '.php'; ?>
                </div>
            </div>
        </div>
    </div>
    <script src="<?=$base_url?>template/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>