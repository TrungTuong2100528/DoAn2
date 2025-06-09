<?php
    include_once __DIR__ . '/../../admin/config/db.php';
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql_select = "SELECT * FROM ThuongHieu WHERE IDThuongHieu = $id";
        $query_select = mysqli_query($con, $sql_select);
        $row_select = mysqli_fetch_assoc($query_select);

        if(isset($_POST['sbm'])){

            $IDThuongHieu = $_POST['IDThuongHieu'];
            $IDSanpham = $_POST['IDSanpham'];
            $TenThuongHieu = $_POST['TenThuongHieu'];
         


            $sql = "UPDATE ThuongHieu SET IDThuongHieu='$IDThuongHieu', IDSanpham='$IDSanpham', TenThuongHieu='$TenThuongHieu'
              WHERE IDThuongHieu=$id";
              $query = mysqli_query($con, $sql);
            header('location: thuonghieu.php');
            
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thương hiệu</title>
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
    <h1>Sửa thương hiệu</h1>
    <form method="POST" enctype="multipart/form-data">
        <!-- Hiển thị thông tin sản phẩm hiện tại -->
        <label for="">IDThuongHieu:</label>
        <input type="text" name="IDThuongHieu" class="form-control" readonly value="<?php echo $row_select['IDThuongHieu']; ?>"><br>
        <input type="hidden" name="IDThuongHieu" value="<?php echo $row_select['IDThuongHieu']; ?>">

        <label for="">IDSanPham:</label>
        <input type="text" name="IDSanpham" class="form-control" require value="<?php echo $row_select['IDSanpham']; ?>"><br>

        <label for="">Tên thương hiệu:</label>
        <input type="text" name="TenThuongHieu" class="form-control" require value="<?php echo $row_select['TenThuongHieu']; ?>"><br>

   
        <input type="submit" name="sbm" value="Lưu">    
    </form>
</body>
</html>
