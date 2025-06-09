<?php
session_start();
if(isset($_POST["IDSanPham"]) && isset($_POST["SoLuong"])){
    include_once __DIR__ . '/../admin/config/db.php';
    $IDSanPham = $_POST["IDSanPham"];
    $SoLuong = $_POST["SoLuong"];
    $sqlDetail = "SELECT * from SanPham WHERE  IDSanPham= ".$IDSanPham;
    $resultRow = mysqli_query($con, $sqlDetail);
    $row = mysqli_fetch_row($resultRow);
    
    // Lấy thông tin giảm giá từ bảng KhuyenMai
    $sqlDiscount = "SELECT * FROM KhuyenMai WHERE IDSanPham = $IDSanPham AND NOW() BETWEEN NgayBatDau AND NgayKetThuc";
    $resultDiscount = mysqli_query($con, $sqlDiscount);

    // Kiểm tra nếu có khuyến mãi cho sản phẩm và trong thời gian diễn ra khuyến mãi
    if (mysqli_num_rows($resultDiscount) > 0) {
        $rowDiscount = mysqli_fetch_assoc($resultDiscount);
        $discountedPrice = $row[6] - $rowDiscount['GiaKhuyenMai'];
    } else {
        $discountedPrice = $row[6]; // Giá sản phẩm không giảm giá
    }
    
    if(!isset($_SESSION["cart"])){
        $cart = array();
        $cart[$IDSanPham] = array(
            'IDSanPham'=>$IDSanPham,
            'TenSanPham'=>$row[5],
            'SoLuong'=>$SoLuong,
            'GiaSanPham'=>$discountedPrice, // Sử dụng giá đã giảm giá ở đây
            'HinhAnh'=>$row[3]
        );
    }else{
        $cart = $_SESSION["cart"];
        if(array_key_exists($IDSanPham, $cart)){
            $cart[$IDSanPham] = array(
                'IDSanPham'=>$IDSanPham,
                'TenSanPham'=>$row[5],
                'SoLuong'=>(int)$cart[$IDSanPham]['SoLuong'] +$SoLuong,
                'GiaSanPham'=>$discountedPrice, // Sử dụng giá đã giảm giá ở đây
                'HinhAnh'=>$row[3]
            );
        }else{
            $cart[$IDSanPham] = array(
                'IDSanPham'=>$IDSanPham,
                'TenSanPham'=>$row[5],
                'SoLuong'=>$SoLuong,
                'GiaSanPham'=>$discountedPrice, // Sử dụng giá đã giảm giá ở đây
                'HinhAnh'=>$row[3]
            );
        }
    }
    $_SESSION["cart"] = $cart;
    $numCart = count($cart);
    echo $numCart;
}
?>
