<?php
    include_once __DIR__ . '/../../admin/config/db.php';
    $row_select = [];
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql_select = "SELECT * FROM GioHang WHERE IDGioHang = $id";
        $query_select = mysqli_query($con, $sql_select);
        $row_select = mysqli_fetch_assoc($query_select);
    
        if(isset($_POST['sbm'])){
            $IDGioHang = $_POST['IDGioHang'];
            $IDSanPham = $_POST['IDSanPham'];
            $IDKhachHang = $_POST['IDKhachHang'];
            $IDDonHang = $_POST['IDDonHang'];
            $TenSanPham = $_POST['TenSanPham'];
            $GiaSanPham = $_POST['GiaSanPham'];
    
            // Validate price to ensure it's not negative
            if($GiaSanPham < 0){
                echo "Giá sản phẩm không được âm";
                exit; // Stop execution if price is negative
            }
    
            if($_FILES['HinhAnh']['name']==''){
                $HinhAnh = $_FILES['HinhAnh']['name'];
            }else{
                $HinhAnh = $_FILES['HinhAnh']['name'];
                $HinhAnh_tmp = $_FILES['HinhAnh']['tmp_name'];
                move_uploaded_file($HinhAnh_tmp, 'img/'.$HinhAnh);
            };
    
            $sql = "UPDATE GioHang SET IDGioHang=?, IDSanPham=?, IDKhachHang=?, IDDonHang=?, TenSanPham=?, GiaSanPham=?, HinhAnh=? WHERE IDGioHang=?";
            $stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "ssssssss", $IDGioHang, $IDSanPham, $IDKhachHang, $IDDonHang, $TenSanPham, $GiaSanPham, $HinhAnh, $id);
            mysqli_stmt_execute($stmt);
            header('location: giohang.php');
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
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
    <h1>Sửa giỏ hàng</h1>
    <form method="POST" enctype="multipart/form-data">
        <label for="">IDGioHang:</label>
        <input type="text" name="IDGioHang" class="form-control" readonly value="<?php echo $row_select['IDGioHang']; ?>"><br>
        <input type="hidden" name="IDGioHang" value="<?php echo $row_select['IDGioHang']; ?>">

        <label for="">IDSanPham:</label>
        <input type="text" name="IDSanPham" class="form-control" require value="<?php echo $row_select['IDSanPham']; ?>"><br>

        <label for="">IDKhachHang:</label>
        <input type="text" name="IDKhachHang" class="form-control" require value="<?php echo $row_select['IDKhachHang']; ?>"><br>

        <label for="">IDDonHang:</label>
        <input type="text" name="IDDonHang" class="form-control"  require value="<?php echo $row_select['IDDonHang'];?>"></input><br>

        <label for="">Tên sản phẩm:</label>
        <input type="text" name="TenSanPham" class="form-control" require value="<?php echo $row_select['TenSanPham']; ?>"><br>

        <label for="">Giá sản phẩm:</label>
        <input type="number" name="GiaSanPham" class="form-control" require value="<?php echo $row_select['GiaSanPham']; ?>"><br>

        <label for="">Ảnh sản phẩm:</label>
        <input type="file" id="HinhAnh" name="HinhAnh"><br>

        <input type="submit" name="sbm" value="Lưu">    
    </form>
</body>
</html>
