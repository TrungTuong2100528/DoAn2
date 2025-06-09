<?php
     include_once __DIR__ . '/../../admin/config/db.php';

     // Lấy danh sách khách hàng
     $sql_select_khach_hang = "SELECT * FROM KhachHang";
     $query_select_khach_hang = mysqli_query($con, $sql_select_khach_hang);
 
     // Lấy danh sách nhân viên
     $sql_select_nhan_vien = "SELECT * FROM NhanVien";
     $query_select_nhan_vien = mysqli_query($con, $sql_select_nhan_vien);
 
     if(isset($_GET['id'])){
         $id = $_GET['id'];
         $sql_select = "SELECT * FROM DonHang WHERE IDDonHang = $id";
         $query_select = mysqli_query($con, $sql_select);
         $row_select = mysqli_fetch_assoc($query_select);
 
         if(isset($_POST['sbm'])){
 
             $IDDonHang = $_POST['IDDonHang'];
             $IDKhachHang = $_POST['IDKhachHang'];
             $IDNhanVien = $_POST['IDNhanVien'];
             $NgayDat = $_POST['NgayDat'];
             $DiaChi = $_POST['DiaChi'];
             $TongTien = $_POST['TongTien'];
             $TenSanPham = $_POST['TenSanPham'];
             $TinhTrang = $_POST['TinhTrang'];
 
             // Thực hiện UPDATE với IDKhachHang và IDNhanVien được chọn từ select box
             $sql = "UPDATE DonHang SET IDDonHang='$IDDonHang', IDKhachHang='$IDKhachHang', IDNhanVien='$IDNhanVien',
              NgayDat='$NgayDat', DiaChi='$DiaChi', TongTien='$TongTien', TenSanPham='$TenSanPham', TinhTrang='$TinhTrang'  WHERE IDDonHang=$id";
             $query = mysqli_query($con, $sql);
             header('location: donhang.php');
             
         }
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa đơn hàng</title>
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
    <h1>Sửa đơn hàng</h1>
    <form method="POST" enctype="multipart/form-data">
        <!-- Hiển thị thông tin sản phẩm hiện tại -->
        <label for="">IDDonHang:</label>
        <input type="text" name="IDDonHang" class="form-control" readonly value="<?php echo $row_select['IDDonHang']; ?>"><br>
        <input type="hidden" name="IDDonHang" value="<?php echo $row_select['IDDonHang']; ?>">
        
        <label for="">IDKhachHang:</label>
        <input type="text" name="IDKhachHang" class="form-control" readonly value="<?php echo $row_select['IDKhachHang']; ?>"><br>

        <label for="">Nhân viên:</label>
        <select style=" height: 30px; margin-bottom: 10px;" name="IDNhanVien" class="form-control" required>
            <?php while($row_nhan_vien = mysqli_fetch_assoc($query_select_nhan_vien)) { ?>
                <option value="<?php echo $row_nhan_vien['IDNhanVien']; ?>" <?php if($row_nhan_vien['IDNhanVien'] == $row_select['IDNhanVien']) echo 'selected'; ?>><?php echo $row_nhan_vien['UserName']; ?></option>
            <?php } ?>
        </select><br>
   
        <label for="">Ngày đặt:</label>
        <input type="text" name="NgayDat" class="form-control" require value="<?php echo $row_select['NgayDat']; ?>"><br>

        <label for="">địa chỉ:</label>
        <input type="text" name="DiaChi" class="form-control" require value="<?php echo $row_select['DiaChi']; ?>"><br>

        <label for="">Tổng tiền:</label>
        <input type="number" name="TongTien" class="form-control" require value="<?php echo $row_select['TongTien']; ?>"><br>
        <label for="">Tên sản phẩm</label>
        <input type="text" name="TenSanPham" class="form-control" require value="<?php echo $row_select['TenSanPham']; ?>"><br>

        <label for="">Tình trạng:</label>
        <input type="text" name="TinhTrang" class="form-control" require value="<?php echo $row_select['TinhTrang']; ?>"><br>

        <input type="submit" name="sbm" value="Lưu">    
    </form>
</body>
</html>
