<?php
    session_start();
    if(isset($_POST["IDSanPham"]) && isset($_POST["SoLuong"])){
        $SoLuong = $_POST["SoLuong"];
        $IDSanPham = $_POST["IDSanPham"];
        $cart = $_SESSION["cart"];
        if(array_key_exists($IDSanPham, $cart)){
            if($SoLuong > 0){
                $cart[$IDSanPham] = array(
                    'TenSanPham'=>$cart[$IDSanPham]["TenSanPham"],
                    'SoLuong'=>$SoLuong,
                    'GiaSanPham'=>$cart[$IDSanPham]["GiaSanPham"],
                    'HinhAnh'=>$cart[$IDSanPham]["HinhAnh"]
                );
            }else{
                unset($cart[$IDSanPham]);
            }
            $_SESSION["cart"] = $cart;
        }
    }
?>