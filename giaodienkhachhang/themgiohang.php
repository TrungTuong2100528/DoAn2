<?php
      include_once __DIR__ . '/../admin/config/db.php';
    session_start();
    if (isset($_GET['themgiohang'])) {
        $IDSanPham = $_GET['IDSanPham'];
        $SoLuong = 1;

        // Prepare SQL statement to fetch product details
        $sql = "SELECT * FROM SanPham WHERE IDSanPham = '".$IDSanPham."' LIMIT 1";
        $query = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($query);

        if ($row) {
            // Create a new product array
            $new_product = array(array(
                'TenSanPham' => $row['TenSanPham'],
                'IDSanPham' => $IDSanPham,
                'SoLuong' => $SoLuong,
                'GiaSanPham' => $row['GiaSanPham'],
                'HinhAnh' => $row['HinhAnh']
            ));

            if (isset($_SESSION['cart'])) {
                $found = false;
                foreach ($_SESSION['cart'] as $cart_item) {
                    if ($cart_item['IDSanPham'] == $IDSanPham) {
                        $product[] = array(
                            'TenSanPham' => $cart_item['TenSanPham'],
                            'IDSanPham' => $cart_item['IDSanPham'],
                            'SoLuong' => $cart_item['SoLuong'] + 1,
                            'GiaSanPham' => $cart_item['GiaSanPham'],
                            'HinhAnh' => $cart_item['HinhAnh']
                        );
                        $found = true;
                    } else {
                        $product[] = array(
                            'TenSanPham' => $cart_item['TenSanPham'],
                            'IDSanPham' => $cart_item['IDSanPham'],
                            'SoLuong' => $cart_item['SoLuong'],
                            'GiaSanPham' => $cart_item['GiaSanPham'],
                            'HinhAnh' => $cart_item['HinhAnh']
                        );
                    }
                }
            } else {
                $_SESSION['cart'] = $new_product;
            }
        }
        header('Location: /WEB_TBYT/giaodienkhachhang/GioHang/GioHang.php');
    }
?>
