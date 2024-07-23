<?php
include_once 'm_pdo.php';

function history_hasCart($MaTK)
{
    return pdo_query_one("SELECT * FROM lichsu where MaTK=? and TrangThai=?", $MaTK, 'gio-sach');
}

function history_add($MaTK)
{
    pdo_execute(
        "INSERT INTO lichsu(`MaTK`,`NgayMuon`,`NgayTra`, `TrangThai`) VALUES(?,?,?,?)",
        $MaTK,
        date('Y-m-d H:i:s'),
        date('Y-m-d H:i:s'),
        'gio-sach'
    );
}

function history_addToCart($MaLS, $MaSach)
{
    pdo_execute("INSERT INTO chitietlichsu(`MaLS`, `MaSach`) 
    VALUES(?,?)", $MaLS, $MaSach);
}
function history_getCart($MaTK)
{
    return pdo_query("SELECT * FROM lichsu ls INNER JOIN chitietlichsu ct ON ls.MaLS=ct.MaLS INNER JOIN sach s ON ct.MaSach=s.MaSach where ls.MaTK =? and  ls.TrangThai=?", $MaTK, 'gio-sach');
}

function history_updateCart($MaLS, $NgayMuon, $NgayTra, $SoSachMuon, $TongTien, $TrangThai)
{
    pdo_execute("UPDATE lichsu SET NgayMuon = ?, NgayTra = ?, SoSachMuon = ?, TongTien = ?, TrangThai = ? WHERE MaLS = ?", $NgayMuon, $NgayTra, $SoSachMuon, $TongTien, $TrangThai, $MaLS);
}
function history_removeFromCart($MaLS, $MaSach){
    pdo_execute("DELETE FROM chitietlichsu WHERE MaLS = ? AND MaSach = ?",$MaLS, $MaSach);
}
function history_removeCart($MaLS){
    pdo_execute("DELETE FROM chitietlichsu WHERE MaLS = ?",$MaLS);
}
function history_getAllByaccount($MaTK){
    return pdo_query("SELECT * FROM lichsu WHERE MaTK = ?", $MaTK);
}
function history_getAll(){
    return pdo_query("SELECT * FROM lichsu WHERE TrangThai = 'chuan-bi'");
}
function history_getAllSuccess(){
    return pdo_query("SELECT * FROM lichsu WHERE TrangThai = 'dang-muon'");
}
function history_getAllreturned(){
    return pdo_query("SELECT * FROM lichsu WHERE TrangThai = 'da-tra'");
}
function history_accept($MaLS){
    pdo_execute("UPDATE lichsu set TrangThai = ? WHERE MaLS = ?", "dang-muon", $MaLS);
}
function history_giveBook($MaLS){
    pdo_execute("UPDATE lichsu set TrangThai = ? WHERE MaLS = ?", "da-tra", $MaLS);
}
function history_detailDelete($MaLS){
    pdo_execute("DELETE FROM chitietlichsu WHERE MaLS = ?",$MaLS);
}
function history_delete($MaLS){
    pdo_execute("DELETE FROM lichsu WHERE MaLS = ?",$MaLS);
}