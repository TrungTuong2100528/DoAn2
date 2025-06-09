<?php
include_once __DIR__ . '/../admin/config/db.php';
session_start();

if (!isset($_SESSION['tenkhachhang'])) {
    header('Location: /Web_TBYT/admin/login/login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $IDKhachHang = $_SESSION['IDKhachHang']; // Assuming you have the ID of the customer in the session
    $DiaChi = mysqli_real_escape_string($con, $_POST['address']);

    $TongTien = 0;
    $TenSanPham = [];
    if (isset($_SESSION["cart"]) && is_array($_SESSION["cart"])) {
        foreach ($_SESSION["cart"] as $key => $value) {
            if (isset($value["GiaSanPham"], $value["SoLuong"])) {
                $itemTotal = $value["GiaSanPham"] * $value["SoLuong"];
                $TongTien += $itemTotal;
                $TenSanPham[] = $value["TenSanPham"] . ' x ' . $value["SoLuong"];
            } else {
                // Handle the error case where expected keys are missing
                error_log("Missing keys in cart item: " . print_r($value, true));
                continue; // Skip this item
            }
        }
    } else {
        // Handle the case where cart is not set or not an array
        error_log("Cart is not set or not an array.");
        $_SESSION['error_message'] = 'Giỏ hàng trống hoặc không hợp lệ!';
        header('Location: /WEB_TBYT/giaodienkhachhang/TrangChu.php');
        exit();
    }
    $TenSanPhamStr = implode(', ', $TenSanPham); // Join product names into a single string

    // Insert into DonHang table
    $sql_donhang = "INSERT INTO DonHang (IDKhachHang, NgayDat, DiaChi, TongTien, TinhTrang, TenSanPham) 
                    VALUES ('$IDKhachHang', NOW(), '$DiaChi', '$TongTien', 'Chưa xử lý', '$TenSanPhamStr')";
    mysqli_query($con, $sql_donhang);
    $IDDonHang = mysqli_insert_id($con); // Get the ID of the inserted order

    // Insert into ChiTietDonHang table
    foreach ($_SESSION["cart"] as $key => $value) {
        if (isset($value["IDSanPham"], $value["TenSanPham"], $value["GiaSanPham"], $value["HinhAnh"])) {
            $IDSanPham = $value["IDSanPham"];
            $TenSanPham = $value["TenSanPham"];
            $GiaSanPham = $value["GiaSanPham"];
            $HinhAnh = $value["HinhAnh"];
            $sql_giohang = "INSERT INTO GioHang (IDSanPham, IDKhachHang, IDDonHang, TenSanPham, GiaSanPham, HinhAnh) 
                            VALUES ('$IDSanPham', '$IDKhachHang', '$IDDonHang', '$TenSanPham', '$GiaSanPham', '$HinhAnh')";
            mysqli_query($con, $sql_giohang);
    
            // $IDGioHang = mysqli_insert_id($con); // Get the ID of the inserted order in GioHang table
    
            // Insert into ChiTietDonHang table
            $SoLuong = $value["SoLuong"]; // Assuming SoLuong is available in your cart
            $sql_chitiet = "INSERT INTO ChiTietDonHang (IDSanPham, IDDonHang, GiaSanPham, SoLuong, NgayDat, TongTien) 
                            VALUES ('$IDSanPham', '$IDDonHang', '$GiaSanPham', '$SoLuong', NOW(),'$TongTien')";
            mysqli_query($con, $sql_chitiet);
        } else {
            // Log the error for debugging
            error_log("Missing keys in cart item: " . print_r($value, true));
        }
    }

    // // Insert into GioHang table (optional, depending on your requirements)
    // foreach ($_SESSION["cart"] as $key => $value) {
    //     if (isset($value["IDSanPham"], $value["TenSanPham"], $value["GiaSanPham"], $value["HinhAnh"])) {
    //         $IDSanPham = $value["IDSanPham"];
    //         $TenSanPham = $value["TenSanPham"];
    //         $GiaSanPham = $value["GiaSanPham"];
    //         $HinhAnh = $value["HinhAnh"];
    //         $sql_giohang = "INSERT INTO GioHang (IDSanPham, IDKhachHang, IDDonHang, TenSanPham, GiaSanPham, HinhAnh) 
    //                         VALUES ('$IDSanPham', '$IDKhachHang', '$IDDonHang', '$TenSanPham', '$GiaSanPham', '$HinhAnh')";
    //         mysqli_query($con, $sql_giohang);
    //     } else {
    //         // Log the error for debugging
    //         error_log("Missing keys in cart item: " . print_r($value, true));
    //     }
    // }

    // Insert into TrangThaiDonHang table
    $sql_trangthai = "INSERT INTO TrangThaiDonHang (IDDonHang, TenTrangThai) 
                      VALUES ('$IDDonHang', 'Chưa xử lý')";
    mysqli_query($con, $sql_trangthai);

    // Clear the cart after placing the order
    unset($_SESSION["cart"]);
    $_SESSION['success_message'] = 'Đặt hàng thành công!';
    // Redirect to a success page or display a success message
    header('Location: /WEB_TBYT/giaodienkhachhang/cart.php');
    exit();
}
?>
