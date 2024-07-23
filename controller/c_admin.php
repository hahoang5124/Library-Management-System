
<?php
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'dashboard':
            // lấy dữ liệu
            include_once 'model/m_book.php';

            // hiển thị dư liệu
            $view_name = 'admin_dashboard';
            break;
        case 'user':
            // lấy dữ liệu
            include_once 'model/m_user.php';
            $dsTK = user_getAll();
            // hiển thị dư liệu
            $view_name = 'admin_user';
                break;
        case 'user-add':
            // lấy dữ liệu
            include_once 'model/m_user.php';
            if(isset($_POST['submit'])){
                $SoDienThoai = $_POST['sodienthoai'];
                $Hoten = $_POST['hoten'];
                $ViTien = $_POST['vitien'];
                $Quyen = $_POST['quyen'];
                $kq = user_checkPhone($SoDienThoai);
                if( $kq){ // đúng, bị trùng, không thêm
                    $_SESSION['loi'] = "Không thể tạo tài khoản với số điện thoại: <strong> ".$SoDienThoai."</strong>";
                }else{ // sai, không trùng, thêm tài khoản
                    $Matkhau =123456;
                    $HinhAnh = "default.png";
                    user_add($SoDienThoai, $Hoten, $Matkhau, $ViTien, $Quyen, $HinhAnh);
                    $_SESSION['thongbao'] ="Đã tạo tài khoản với số điện thoại: <strong>".$SoDienThoai."</strong> Và mật khẩu mặc định là: <strong>".$Matkhau."</strong>";
                }
            }
            // hiển thị dư liệu
            $view_name = 'admin_user_add';
                break;
            case 'user-edit':
                // lấy dữ liệu
                include_once 'model/m_user.php';
                $maTK = $_GET['id'];
                $tk = user_getById($maTK);
                // hiển thị dư liệu
                $view_name = 'admin_user_edit';
                    break;
            case 'category':
                // lấy dữ liệu
                include_once 'model/m_book.php';
    
                // hiển thị dư liệu
                $view_name = 'admin_category';
                break;
        case 'book':
            // lấy dữ liệu
            include_once 'model/m_book.php';
            $dsSach = get_bookIncreaseByID();

            // hiển thị dư liệu
            $view_name = 'admin_book';
            break;
            case 'book-add':
                // lấy dữ liệu
                include_once 'model/m_book.php';
                include_once 'model/m_category.php';
                $chude = categoly_getALL();
                if(isset($_POST['submit'])){
                    $ten = $_POST['name'];
                    $tacgia = $_POST['tacgia'];
                    $mota = $_POST['mtchitiet'];
                    $gia = $_POST['price'];
                    $soluong = $_POST['mount'];
                    $image ='';
                    if(isset($_FILES['image'])){    
                        //var_dump($_FILES['image']);
                        $image = basename($_FILES['image']['name']) ;
                        $path = __DIR__;
                        $parentPath = dirname($path) . $base_url.'upload/product';
                        $target_file = $path . $image;
                        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                        $flag =1;
                    }
                    $chude = $_POST['category'];
                    book_add($ten, $image, $tacgia, $gia, $mota, $chude, $soluong);
                    header('Location:' . $base_url . 'admin/book');
                }
    
                // hiển thị dư liệu
                $view_name = 'admin_book_add';
                break;
            case 'book-edit':
                // lấy dữ liệu
                include_once 'model/m_book.php';
                include_once 'model/m_category.php';
                $chude = categoly_getALL();
                $MaSach = $_GET['id'];
                $sach = book_get_id($MaSach);
                if(isset($_POST['submit'])){
                    $ten = $_POST['name'];
                    $tacgia = $_POST['tacgia'];
                    $mota = $_POST['mtchitiet'];
                    $gia = $_POST['price'];
                    $soluong = $_POST['mount'];
                    $image ='';
                    if(isset($_FILES['image'])){    
                        //var_dump($_FILES['image']);
                        $image = basename($_FILES['image']['name']) ;
                        $path = __DIR__;
                        $parentPath = dirname($path) . $base_url.'upload/product';
                        $target_file = $path . $image;
                        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                        $flag =1;
                    }
                    $chude = $_POST['category'];
                    book_update($ten, $image, $tacgia, $gia, $mota, $chude, $soluong,$MaSach);
                    header('Location:' . $base_url . 'admin/book');
                }
                $view_name = 'admin_book_edit';
                break;
                case 'book-delete':
                    include_once 'model/m_book.php';
                    $MaSach = $_GET['id'];
                    book_delete($MaSach);
                    header('Location:' . $base_url . 'admin/book');
                // hiển thị dư liệu
                    break;
        case 'history':
            // lấy dữ liệu
            include_once 'model/m_book.php';

            // hiển thị dư liệu
            $view_name = 'admin_history';
            break;
        case 'accept':
            // lấy dữ liệu
            include_once 'model/m_book.php';
            include_once 'model/m_history.php';
            // hiển thị dư liệu
            $ls = history_getAll();
            $view_name = 'admin_accept';
            break;
        case 'accept-accept':
            // lấy dữ liệu
            include_once 'model/m_history.php';
            history_accept($_GET['id']);
            // hiển thị dư liệu
            header('Location:' . $base_url . 'admin/accept');
            break;
        case 'accept-delete':
            // lấy dữ liệu
            include_once 'model/m_history.php';
            history_detaildelete($_GET['id']);
            history_delete($_GET['id']);
            // hiển thị dư liệu
            header('Location:' . $base_url . 'admin/accept');
            break;
        case 'accept-success':
            // lấy dữ liệu
            include_once 'model/m_book.php';
            include_once 'model/m_history.php';
            // hiển thị dư liệu
            $ls = history_getAllSuccess();
            $view_name = 'admin_accept_success';
            break;
        case 'accept-givebook':
            // lấy dữ liệu
            include_once 'model/m_history.php';
            history_giveBook($_GET['id']);
            // hiển thị dư liệu
            header('Location:' . $base_url . 'admin/accept/success');
            break;
        case 'accept-returned':
            // lấy dữ liệu
            include_once 'model/m_book.php';
            include_once 'model/m_history.php';
            // hiển thị dư liệu
            $ls = history_getAllreturned();
            $view_name = 'admin_accept_returned';
            break;
        }
    }
    include_once 'view/v_admin_layout.php';
?>