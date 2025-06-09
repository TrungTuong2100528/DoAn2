<?php
    include_once __DIR__ . '/../../admin/config/db.php';
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql_select = "SELECT * FROM TrangThaiDonHang WHERE IDTrangThaiDonHang = $id";
        $query_select = mysqli_query($con, $sql_select);
        $row_select = mysqli_fetch_assoc($query_select);

        if(isset($_POST['sbm'])){

            $IDTrangThaiDonHang = $_POST['IDTrangThaiDonHang'];
            $IDDonHang = $_POST['IDDonHang'];
            $TrangThai = $_POST['TrangThai'];
         


            $sql = "UPDATE TrangThaiDonHang SET IDTrangThaiDonHang='$IDTrangThaiDonHang', IDDonHang='$IDDonHang', TrangThai='$TrangThai'
              WHERE IDTrangThaiDonHang=$id";
            header('location: trangthaidonhang.php');
            
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa trạng thái đơn hàng</title>
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
    <h1>Sửa trang thái đơn hàng</h1>
    <form method="POST" enctype="multipart/form-data">
        <!-- Hiển thị thông tin sản phẩm hiện tại -->
        <label for="">IDTrangThaiDonHang:</label>
        <input type="text" name="IDTrangThaiDonHang" class="form-control" readonly value="<?php echo $row_select['IDTrangThaiDonHang']; ?>"><br>
        <input type="hidden" name="IDTrangThaiDonHang" value="<?php echo $row_select['IDTrangThaiDonHang']; ?>">

        <label for="">IDDonHang:</label>
        <input type="text" name="IDDonHang" class="form-control" require value="<?php echo $row_select['IDDonHang']; ?>"><br>

        <label for="">Trạng thái:</label>
        <input type="text" name="TenTrangThai" class="form-control" require value="<?php echo $row_select['TenTrangThai']; ?>"><br>

   
        <input type="submit" name="sbm" value="Lưu">    
    </form>
</body>
</html>
