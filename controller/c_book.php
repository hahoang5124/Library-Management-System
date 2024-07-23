
<?php
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'detail':
            // lấy dữ liệu
            include_once 'model/m_book.php';
            $CTSach = book_getById($_GET['id']);
            $dsNgauNhienCungChuDe = book_getRabdomByCategory($CTSach['MaCD']);
            // hiển thị dư liệu
            $view_name = 'book_detail';
            break;
        case 'search':
            if (isset($_POST['keyword'])) {
                //đôi từ post sang get
                header("location:" . $base_url . "book/search/" . $_POST['keyword']);
            }
            include_once 'model/m_book.php';
            $page = 1;
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            }
            $ketqua = book_search($_GET['keyword'], $page);
            $sotrang = ceil(book_searchTotal($_GET['keyword']) / 8);
            $view_name = 'book_search';

            break;
        case 'addToCart':
            if (!isset($_SESSION['user'])) {
                $_SESSION['loi'] = 'ban can nhap de muon sach';
                header('Location:' . $base_url . 'user/login');
                return;
            }
            $MaSach = $_GET['id'];
            $MaTK = $_SESSION['user']['MaTK'];
                        try {
                include_once 'model/m_history.php';
                $kq = history_hasCart($MaTK);
                if ($kq) {
                    //dung, da co gio hang
                    history_addToCart($kq['MaLS'], $MaSach);
                } else {
                    // sai chua co gio sach
                    history_add($MaTK);
                    $kq = history_hasCart($MaTK);
                    history_addToCart($kq['MaLS'], $MaSach);
                }
                $_SESSION['thongbao'] = 'Da them sach vao gio';
            } catch (\Throwable $th) {
                $_SESSION['loi'] = 'sach nay da co trong gio';
            }
            header("Location: " . $base_url . "book/detail/" . $MaSach);
            break;
            case 'removeFromCart':
                include_once 'model/m_history.php';
                $MaTK = $_SESSION['user']['MaTK'];
                $MaSach = $_GET['id'];
                $GioSach = history_hasCart($MaTK);
                if(isset($GioSach)){
                    history_removeFromCart($GioSach['MaLS'], $MaSach);
                }
                header('Location:' . $base_url . 'page/cart');

                break;
            case 'removeCart':
                include_once 'model/m_history.php';
                $MaTK = $_SESSION['user']['MaTK'];
                $GioSach = history_hasCart($MaTK);
                if(isset($GioSach)){
                    history_removeCart($GioSach['MaLS']);
                }
                header('Location:' . $base_url . 'page/cart');

                break;
            case 'updateCart':
                include_once 'model/m_history.php';
                include_once 'model/m_book.php';
                $MaTK = $_SESSION['user']['MaTK'];
                $GioSach = history_hasCart($MaTK);
                if(isset($GioSach)){
                    $NgayMuon = date_format(date_create($_POST['ngaymuon']),"Y-m-d H:i:s");
                    $NgayTra = date_format(date_create($_POST['ngaytra']),"Y-m-d H:i:s");
                    $SoSachMuon = $_POST['sosachmuon'];
                    $TongTien = $_POST['tongtien'];
                    $TrangThai = 'chuan-bi';
                    $ctGioSach = history_getCart($MaTK);
                    foreach ($ctGioSach as $sach) {
                        book_Decrease_Amount($sach['MaSach']);

                    }
                    history_updateCart($GioSach['MaLS'], $NgayMuon, $NgayTra, $SoSachMuon, $TongTien, $TrangThai);
                    $_SESSION['thongbao'] ="Yêu cầu nhận xét của bạn đã được xác nhận";
                }
                header('Location:' . $base_url . 'page/cart');

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