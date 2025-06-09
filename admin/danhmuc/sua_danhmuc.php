<?php
    include_once __DIR__ . '/../../admin/config/db.php';
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql_select = "SELECT * FROM DanhMuc WHERE IDDanhMuc = $id";
        $query_select = mysqli_query($con, $sql_select);
        $row_select = mysqli_fetch_assoc($query_select);

        if(isset($_POST['sbm'])){

            $IDDanhMuc = $_POST['IDDanhMuc'];
            $TenDanhMuc = $_POST['TenDanhMuc'];
            $MoTa = $_POST['MoTa'];



            $sql = "UPDATE DanhMuc SET IDDanhMuc='$IDDanhMuc', TenDanhMuc='$TenDanhMuc', MoTa='$MoTa' WHERE IDDanhMuc=$id";
            $query = mysqli_query($con, $sql);
            header('location: danhmuc.php');
            
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa danh mục</title>
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
    <h1>Sửa danh mục</h1>
    <form method="POST" enctype="multipart/form-data">
        <!-- Hiển thị thông tin sản phẩm hiện tại -->
        <label for="">IDDanhMuc:</label>
        <input type="text" name="IDDanhMuc" class="form-control" readonly value="<?php echo $row_select['IDDanhMuc']; ?>"><br>
        <input type="hidden" name="IDDanhMuc" value="<?php echo $row_select['IDDanhMuc']; ?>">

        <label for="">TenDanhMuc:</label>
        <input type="text" name="TenDanhMuc" class="form-control" require value="<?php echo $row_select['TenDanhMuc']; ?>"><br>

        <label for="">MoTa:</label>
        <input type="text" name="MoTa" class="form-control" require value="<?php echo $row_select['MoTa']; ?>"><br>
   
        <input type="submit" name="sbm" value="Lưu">    
    </form>
</body>
</html>
