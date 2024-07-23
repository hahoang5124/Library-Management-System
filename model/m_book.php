<?php
// thao tacs du lieu trong co so du lieu
include_once 'm_pdo.php';
    function get_bookIncreaseByID(){
        return pdo_query("SELECT * FROM sach s INNER JOIN chude cd ON s.MaCD = cd.MaCD ORDER BY s.maSach ASC");
    }
    function book_getNew($limit){
        
        return pdo_query("SELECT* FROM sach ORDER BY MaSach DESC LIMIT $limit");
    }
    function book_getpin($limit){
        
        return pdo_query("SELECT* FROM sach WHERE GhimTrangChu = 1 LIMIT $limit");
    }
    function book_getMostView($limit){
        
        return pdo_query("SELECT* FROM sach ORDER BY LuotDoc DESC LIMIT $limit");
    }
    function book_get_id($id){
        
        return pdo_query_one("SELECT* FROM sach WHERE MaSach = ?", $id );
    }
    function book_getById($id){
        
        return pdo_query_one("SELECT* FROM sach s
         INNER JOIN chude cd ON s.MaCD =cd. MaCD 
         WHERE s.MaSach = ?", $id);
    }
    function book_getRabdomByCategory($id){
        
        return pdo_query("SELECT* FROM sach 
        WHERE MaCD =$id ORDER BY rand() LIMIT 4");
    }
    function book_getByCategory($id){
        
        return pdo_query("SELECT* FROM sach 
        WHERE MaCD =$id ");
    }
    function book_search($keyword, $page=1){
        $batdau = ($page -1)*8;
        // 1 trang lấy 8 cuốn
        // trang 1 bắt đâu từ 0 
        // trang 2 bắt đầu từ 8
        // trang 3 băt đua từ 16
        // trang n bắt dầu tư (n-1)*8
        return pdo_query("SELECT* FROM sach 
        WHERE TuaSach like '%$keyword%' LIMIT $batdau,8 ");
    }
    function book_searchTotal($keyword){
        return pdo_query_value("SELECT COUNT(*) FROM sach 
        WHERE TuaSach like '%$keyword%'");
    }
    function book_Decrease_Amount($MaSach){
        pdo_execute("UPDATE sach SET SoLuong = SoLuong - 1 WHERE MaSach = ?", $MaSach);
    }
    function book_increase_Amount($MaSach){
        pdo_execute("UPDATE sach SET SoLuong = SoLuong + 1 WHERE MaSach = ?", $MaSach);
    }
    function book_add($ten, $anh, $tacgia, $gia, $mota, $macd, $soluong){
        pdo_execute("INSERT INTO sach (`TuaSach`, `HinhAnh`, `TacGia`, `GiaTri`, `MoTa`, `MaCD`,`SoLuong`) VALUES (?,?,?,?,?,?,?)",$ten, $anh, $tacgia, $gia, $mota, $macd, $soluong);
    }
    function book_update($ten, $anh, $tacgia, $gia, $mota, $macd, $soluong,$MaSach){
        pdo_execute("UPDATE sach SET TuaSach = ?, HinhAnh =?, TacGia = ?, GiaTri = ?, MoTa = ?, MaCD = ?, SoLuong =? WHERE MaSach = ?", $ten, $anh, $tacgia, $gia, $mota, $macd, $soluong,$MaSach);
    }
    function book_delete($maSach){
        pdo_execute("DELETE FROM sach WHERE MaSach = ?", $maSach);
    }
    function book_accept($mhd){
        return pdo_query("SELECT ls.MaLS, s.HinhAnh, s.TuaSach, s.GiaTri, tk.HoTen FROM lichsu ls INNER JOIN chitietlichsu ctls on ls.MaLS = ctls.MaLS INNER JOIN sach s on s.MaSach = ctls.MaSach INNER JOIN taikhoan tk on tk.MaTK = ls.MaTK WHERE ls.MaLS = ?", $mhd);
    }