
<?php
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'login':
            // lấy dữ liệu
            include_once 'model/m_user.php';
            if (isset($_POST['SoDienThoai']) && isset($_POST['MatKhau'])) {
                $kq = user_login($_POST['SoDienThoai'], $_POST['MatKhau']);
                if ($kq) {
                    $_SESSION['user'] = $kq;
                    header('Location: ' . $base_url . 'page/home');
                } else {
                    $_SESSION['loi'] = "Đăng nhập không thành công";
                }
            }
            // hiển thị dư liệu
            $view_name = 'user_login';
            break;
        case 'signin':
            // lấy dữ liệu
            // hiển thị dư liệu
            $view_name = 'user_signin';
            break;
        case 'logout':
            unset($_SESSION['user']);
            header('Location: ' . $base_url . 'page/home');

            break;
        case 'personalinfo':
            // lấy dữ liệu
            include_once 'model/m_user.php';
            $info = user_getById($_SESSION['user']['MaTK']);
            // hiển thị dư liệu
            $view_name = 'user_infomation';
            break;

        default:
            # code...
            break;
    }
    include_once 'view/v_user_layout.php';
} else {
    header('Location: mod=page&act=home');
}
?>