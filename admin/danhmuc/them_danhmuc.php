<?php

include_once __DIR__ . '/../../admin/config/db.php';

$sql_SanPham = "SELECT * FROM DanhMuc";
$query_SanPham = mysqli_query($con, $sql_SanPham);

if(isset($_POST['sbm'])){

    $IDDanhMuc = $_POST['IDDanhMuc'];
    $TenDanhMuc = $_POST['TenDanhMuc'];
    $MoTa = $_POST['MoTa'];

    // Check if IDDanhMuc already exists
    $sql_check = "SELECT * FROM DanhMuc WHERE IDDanhMuc = '$IDDanhMuc'";
    $query_check = mysqli_query($con, $sql_check);

    if(mysqli_num_rows($query_check) > 0) {
        // IDDanhMuc already exists
        echo '<script>alert("IDDanhMuc đã tồn tại. Vui lòng nhập ID khác.");</script>';
    } else {
        // Perform INSERT
        $sql = "INSERT INTO DanhMuc(IDDanhMuc, TenDanhMuc, MoTa) 
                VALUES ('$IDDanhMuc', '$TenDanhMuc', '$MoTa')";
        $query = mysqli_query($con, $sql);

        header('location: danhmuc.php');
    }
}
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Thêm bài viết</h2>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">IDDanhMuc</label>
                    <input type="text" id="IDDanhMuc" name="IDDanhMuc" class="form-control" required oninvalid="this.setCustomValidity('Vui lòng nhập IDDanhMuc')" oninput="this.setCustomValidity('')">
                </div>
                <div class="form-group">
                    <label for="">Tên danh mục</label>
                    <input type="text" id="TenDanhMuc" name="TenDanhMuc" class="form-control" required oninvalid="this.setCustomValidity('Vui lòng nhập tên danh mục')" oninput="this.setCustomValidity('')">
                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <input type="text" id="MoTa" name="MoTa" class="form-control" required oninvalid="this.setCustomValidity('Vui lòng nhập mô tả')" oninput="this.setCustomValidity('')">
                </div>
                <button name="sbm" class="btn btn-success" type="submit">Thêm</button>
            </form>
        </div>
    </div>
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm danh mục</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .card-header {
            background-color: #f0f0f0;
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
        }
        h2 {
            margin: 0;
            font-size: 24px;
        }
        .card-body {
            padding: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="file"] {
            margin-top: 5px;
            margin-bottom: 15px;
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        @media only screen and (max-width: 600px) {
            /* Điều chỉnh kích thước cho các thiết bị nhỏ hơn hoặc bằng 600px */
            input[type="text"],
            input[type="number"],
            select {
                width: 100%;
            }
        }
        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <script></script>
</body>
</html>
