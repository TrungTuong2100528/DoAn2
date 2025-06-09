<?php
session_start();

include_once __DIR__ . '/../../admin/config/db.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $orderId = $_GET['id'];

    // Lấy thông tin đơn hàng
    $sqlGetOrder = "SELECT *, DATE_FORMAT(NgayDat, '%Y-%m-%d') as NgayDat FROM DonHang WHERE IDDonHang = $orderId";
    $result = mysqli_query($con, $sqlGetOrder);
    if ($result) {
        $order = mysqli_fetch_assoc($result);

        // Ngày hiện tại
        $currentDate = date('Y-m-d');

        // Ngày đặt hàng
        $orderDate = $order['NgayDat'];

        // Tính số ngày chênh lệch
        $diffDays = (strtotime($orderDate) - strtotime($currentDate)) / (60 * 60 * 24);

        if ($diffDays <= 3) {
            // Xóa chi tiết đơn hàng
            $sqlDeleteChiTiet = "DELETE FROM ChiTietDonHang WHERE IDDonHang = $orderId";
            mysqli_query($con, $sqlDeleteChiTiet);

            // Xóa trạng thái đơn hàng
            $sqlDeleteTrangThai = "DELETE FROM TrangThaiDonHang WHERE IDDonHang = $orderId";
            mysqli_query($con, $sqlDeleteTrangThai);

            $sqlDeleteDonHang = "DELETE FROM DonHang WHERE IDDonHang = $orderId";
            mysqli_query($con, $sqlDeleteDonHang);

            $sqlDeleteDonHang = "DELETE FROM GioHang WHERE IDDonHang = $orderId";
            mysqli_query($con, $sqlDeleteDonHang);

            // Xóa đơn hàng trong giỏ hàng (nếu có)
            if (isset($_SESSION['cart']) && isset($_SESSION['cart'][$orderId])) {
                unset($_SESSION['cart'][$orderId]);
            }

            // Chuyển hướng về trang đơn hàng sau khi xóa
            header('Location: /WEB_TBYT/giaodienkhachhang/DonHang/DonHang.php');
            exit();
        } else {
            // Nếu đã quá 3 ngày, thông báo không thể hủy đơn hàng
            echo "Không thể hủy đơn hàng sau 3 ngày kể từ ngày đặt hàng.";
        }
    } else {
        echo "Không tìm thấy đơn hàng.";
    }
} else {
    // Nếu không có ID đơn hàng, chuyển hướng về trang chủ hoặc trang lỗi
    header('Location: /WEB_TBYT/giaodienkhachhang/DonHang/DonHang.php');
    exit();
}
?>
