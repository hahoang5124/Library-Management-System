
<?php
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'detail':
            // lấy dữ liệu
            include_once 'model/m_category.php';
            $ctChuDe = category_getById($_GET['id']);
            include_once 'model/m_book.php';
            $dsSach = book_getByCategory($_GET['id']);

            // hiển thị dư liệu 
            $view_name = 'category_detail';
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