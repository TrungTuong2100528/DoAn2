<?php
include_once __DIR__ . '/../../admin/config/db.php';

$id = $_GET['id'];

// Xóa dữ liệu từ bảng ChiTietDonHang trước
$sql_delete_chitiet = "DELETE FROM ChiTietDonHang WHERE IDDonHang = $id";
$query_delete_chitiet = mysqli_query($con, $sql_delete_chitiet);

// Xóa dữ liệu từ bảng TrangThaiDonHang
$sql_delete_trangthai = "DELETE FROM TrangThaiDonHang WHERE IDDonHang = $id";
$query_delete_trangthai = mysqli_query($con, $sql_delete_trangthai);

// Xóa dữ liệu từ bảng DonHang cuối cùng
$sql_delete_donhang = "DELETE FROM DonHang WHERE IDDonHang = $id";
$query_delete_donhang = mysqli_query($con, $sql_delete_donhang);

$sql_delete_giohang = "DELETE FROM GioHang WHERE IDDonHang = $id";
$query_delete_donhang = mysqli_query($con, $sql_delete_giohang);

// Chuyển hướng trình duyệt web trở lại trang donhang.php
header('location: donhang.php');
?>
