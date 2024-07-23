
<?php
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'home':
            // lấy dữ liệu
            include_once 'model/m_book.php';
            $dsMoi = book_getNew(4);
            $dsGhim = book_getpin(4);
            // hiển thị dư liệu
            $view_name = 'page_home';
            break;
        case 'book':
            // lấy dữ liệu
            include_once 'model/m_book.php';
            $dsMoi = book_getNew(4);
            $dsGhim = book_getpin(4);
            // hiển thị dư liệu
            $view_name = 'page_book';
            break;
        case 'cart':
            include_once 'model/m_history.php';
            $MaTK = $_SESSION['user']['MaTK'];
            $GioSach = history_hasCart($MaTK);

            if ($GioSach) {
                $ctGioSach = history_getCart($MaTK);
            } else {
                $ctGioSach = [];
            }

            $view_name = 'page_cart';
            break;
        case 'history':
            include_once 'model/m_history.php';
            $dsLichSu = history_getAllByaccount($_SESSION['user']['MaTK']);
            $view_name = "page_history";
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