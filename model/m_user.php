<?php
include_once 'm_pdo.php';
function user_login($phone, $pass)
{
    return pdo_query_one("SELECT * FROM taikhoan WHERE SoDienThoai = ? AND MatKhau = ? ", $phone, $pass);
}
function user_getAll(){
    return pdo_query("SELECT * FROM taikhoan");
}
function user_checkPhone($SoDienThoai){
    return pdo_query_one("SELECT * FROM taikhoan WHERE SoDienThoai = ?", $SoDienThoai);
}
function user_add($SoDienThoai, $Hoten, $MatKhau,$ViTien,$Quyen, $HinhAnh){
    pdo_execute("INSERT INTO taikhoan (`SoDienThoai`, `HoTen`, `Matkhau`, `ViTien`, `Quyen`, `HinhAnh`) VALUES (?,?,?,?,?,?)",$SoDienThoai,$Hoten,$MatKhau,$ViTien,$Quyen,$HinhAnh);
}
function user_getById($MaTK){
    return pdo_query_one("SELECT * from taikhoan WHERE MaTK = ?",$MaTK);
}