<?php
    include_once __DIR__ . '/../../admin/config/db.php';
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql_select = "SELECT * FROM ChiTietDonHang WHERE IDChiTietDonhang = $id";
        $query_select = mysqli_query($con, $sql_select);
        $row_select = mysqli_fetch_assoc($query_select);

        if(isset($_POST['sbm'])){

            $IDChiTietDonhang = $_POST['IDChiTietDonhang'];
            $IDSanPham = $_POST['IDSanPham'];
            $IDDonHang = $_POST['IDDonHang'];
            $GiaSanPham = $_POST['GiaSanPham'];
            $TongTien = $_POST['TongTien'];
            $NgayDat = $_POST['NgayDat'];
            $SoLuong = $_POST['SoLuong'];


            $sql = "UPDATE ChiTietDonHang SET IDChiTietDonhang='$IDChiTietDonhang', IDSanPham='$IDSanPham', IDDonHang='$IDDonHang',
             GiaSanPham='$GiaSanPham', TongTien='$TongTien', NgayDat='$NgayDat', SoLuong='$SoLuong' WHERE IDChiTietDonhang=$id";
             $query = mysqli_query($con, $sql);
            header('location: chitietdonhang.php');
            
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa chi tiết đơn hàng</title>
</head>
<style>


    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="file"],
    textarea {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
    }



    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="file"],
    textarea {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
    }

 form {   max-width: 100%;  
         margin: 0 auto;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
       
        
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 16px;
    }

    input[type="text"],
    input[type="file"],
    textarea {
        width: 100%;
        padding: 17px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        width: 10%;
        padding: 10px;
        border: none;
        border-radius: 3px;
        background-color: #007bff;
        color: #fff;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }

</style>
<body>
    <h1>Sửa chi tiết đơn hàng</h1>
    <form method="POST" enctype="multipart/form-data">
        <!-- Hiển thị thông tin sản phẩm hiện tại -->
        <label for="">IDChiTietDonhang:</label>
        <input type="text" name="IDChiTietDonhang" class="form-control" readonly value="<?php echo $row_select['IDChiTietDonhang']; ?>"><br>
        <input type="hidden" name="IDChiTietDonhang" value="<?php echo $row_select['IDChiTietDonhang']; ?>">

        <label for="">IDSanPham:</label>
        <input type="text" name="IDSanPham" class="form-control" require value="<?php echo $row_select['IDSanPham']; ?>"><br>

        <label for="">IDDonHang:</label>
        <input type="text" name="IDDonHang" class="form-control" require value="<?php echo $row_select['IDDonHang']; ?>"><br>

        <label for="">Giá sản phẩm:</label>
        <input type="text" name="GiaSanPham" class="form-control" require value="<?php echo $row_select['GiaSanPham']; ?>"><br>

        <label for="">Ngày đặt:</label>
        <input type="date" name="NgayDat" class="form-control" require value="<?php echo $row_select['NgayDat']; ?>"><br>

        <label for="">Số lượng:</label>
        <input type="number" name="SoLuong" class="form-control" require value="<?php echo $row_select['SoLuong']; ?>"><br>

        <label for="">Tổng tiền:</label>
        <input type="text" name="TongTien" class="form-control"  require value="<?php echo $row_select['TongTien'];?>"></input><br>

   
        <input type="submit" name="sbm" value="Lưu">    
    </form>
</body>
</html>
