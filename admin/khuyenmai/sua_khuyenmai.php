<?php
include_once __DIR__ . '/../../admin/config/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Modify the SQL query to join with the SanPham table
    $sql_select = "SELECT KhuyenMai.*, SanPham.TenSanPham FROM KhuyenMai 
                   JOIN SanPham ON KhuyenMai.IDSanPham = SanPham.IDSanPham 
                   WHERE IDKhuyenMai = $id";
    $query_select = mysqli_query($con, $sql_select);
    $row_select = mysqli_fetch_assoc($query_select);

    // Fetch all products from the SanPham table
    $sql_products = "SELECT * FROM SanPham";
    $query_products = mysqli_query($con, $sql_products);

    if (isset($_POST['sbm'])) {
        $IDKhuyenMai = $_POST['IDKhuyenMai'];
        $IDSanPham = $_POST['IDSanPham'];
        $GiaKhuyenMai = $_POST['GiaKhuyenMai'];
        $NgayBatDau = $_POST['NgayBatDau'];
        $NgayKetThuc = $_POST['NgayKetThuc'];

        // Ensure GiaKhuyenMai is a valid number and not negative
        if (is_numeric($GiaKhuyenMai) && $GiaKhuyenMai >= 0) {
            $sql = "UPDATE KhuyenMai SET IDSanPham='$IDSanPham', GiaKhuyenMai='$GiaKhuyenMai', NgayBatDau='$NgayBatDau', 
                    NgayKetThuc='$NgayKetThuc' WHERE IDKhuyenMai=$id";
            $query = mysqli_query($con, $sql);
            header('location: khuyenmai.php');
        } else {
            $error_message = "Giá khuyến mãi phải là số và không được âm.";
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa khuyến mãi</title>
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
    <h1>Sửa khuyến mãi</h1>
    <form method="POST" enctype="multipart/form-data">
        <!-- Hiển thị thông tin sản phẩm hiện tại -->
        <label for="">IDKhuyenMai:</label>
        <input type="text" name="IDKhuyenMai" class="form-control" readonly value="<?php echo $row_select['IDKhuyenMai']; ?>"><br>
        <input type="hidden" name="IDKhuyenMai" value="<?php echo $row_select['IDKhuyenMai']; ?>">

        <label for="">Tên sản phẩm:</label>
        <select style="height: 30px; margin-block: 7px;" name="IDSanPham" class="form-control" required>
            <?php while ($row_products = mysqli_fetch_assoc($query_products)) { ?>
                <option value="<?php echo $row_products['IDSanPham']; ?>" <?php if ($row_products['IDSanPham'] == $row_select['IDSanPham']) echo 'selected'; ?>>
                    <?php echo $row_products['TenSanPham']; ?>
                </option>
            <?php } ?>
        </select><br>

        <label for="">Giá khuyến mãi:</label>
        <input type="text" name="GiaKhuyenMai" class="form-control" required pattern="^[0-9]*$"  title="Giá khuyến mãi không hợp lệ" value="<?php echo $row_select['GiaKhuyenMai']; ?>"><br>

        <label for="">Ngày bắt đầu:</label>
        <input type="text" name="NgayBatDau" class="form-control" required value="<?php echo $row_select['NgayBatDau']; ?>"><br>

        <label for="">Ngày kết thúc:</label>
        <input type="text" name="NgayKetThuc" class="form-control" required value="<?php echo $row_select['NgayKetThuc']; ?>"><br>

        <input type="submit" name="sbm" value="Lưu">
    </form>
</body>

</html>
