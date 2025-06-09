<?php

include_once __DIR__ . '/../../admin/config/db.php';

$sql_SanPham = "SELECT * FROM SanPham";
$query_SanPham = mysqli_query($con, $sql_SanPham);

if(isset($_POST['sbm'])){

    $IDThuongHieu = $_POST['IDThuongHieu'];
    $IDSanPham = $_POST['IDSanPham'];
    $TenThuongHieu = $_POST['TenThuongHieu'];

    // Check if IDThuongHieu already exists
    $sql_check = "SELECT * FROM ThuongHieu WHERE IDThuongHieu = '$IDThuongHieu'";
    $query_check = mysqli_query($con, $sql_check);

    if(mysqli_num_rows($query_check) > 0) {
        // IDThuongHieu already exists
        echo '<script>alert("IDThuongHieu đã tồn tại. Vui lòng nhập ID khác.");</script>';
    } else {
        // Perform INSERT
        $sql = "INSERT INTO ThuongHieu(IDThuongHieu, IDSanPham, TenThuongHieu) 
                VALUES ('$IDThuongHieu', '$IDSanPham', '$TenThuongHieu')";
        $query = mysqli_query($con, $sql);

        header('location: thuonghieu.php');
    }
}
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Thêm thương hiệu</h2>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">IDThuongHieu</label>
                    <input type="text" id="IDThuongHieu" name="IDThuongHieu" class="form-control" required oninvalid="this.setCustomValidity('Vui lòng nhập IDThuongHieu')" oninput="this.setCustomValidity('')">
                </div>

                <div class="form-group">
                    <label for="">IDSanPham</label>
                    <select id="IDSanPham" name="IDSanPham" class="form-control">
                        <?php
                        while($row_SanPham = mysqli_fetch_assoc($query_SanPham)){?>
                            <option value="<?php echo $row_SanPham['IDSanPham']; ?>"><?php echo $row_SanPham['TenSanPham']; ?></option>
                        <?php }?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Tên thương hiệu</label>
                    <input type="text" id="TenThuongHieu" name="TenThuongHieu" class="form-control" required oninvalid="this.setCustomValidity('Vui lòng nhập tên thương hiệu')" oninput="this.setCustomValidity('')">
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
    <title>Thêm bài viết</title>
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
