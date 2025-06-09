<?php

include_once __DIR__ . '/../../admin/config/db.php';

$sql_ThuongHieu = "SELECT * FROM ThuongHieu";
$query_ThuongHieu = mysqli_query($con, $sql_ThuongHieu);

$sql_DanhMuc = "SELECT * FROM DanhMuc";
$query_DanhMuc = mysqli_query($con, $sql_DanhMuc);

$sql_Baiviet = "SELECT * FROM BaiViet";
$query_BaiViet = mysqli_query($con, $sql_Baiviet);

if (isset($_POST['sbm'])) {
    $IDSanPham = $_POST['IDSanPham'];
    $HinhAnh = $_FILES['HinhAnh']['name'];
    $HinhAnh_tmp = $_FILES['HinhAnh']['tmp_name'];
    $TenSanPham = $_POST['TenSanPham'];
    $GiaSanPham = $_POST['GiaSanPham'];
    $MoTaSanPham = $_POST['MoTaSanPham'];
    $IDDanhMuc = $_POST['IDDanhMuc'];
    $IDThuongHieu = $_POST['IDThuongHieu'];

    // Kiểm tra nếu IDSanPham đã tồn tại
    $checkIDSanPham = "SELECT * FROM SanPham WHERE IDSanPham = '$IDSanPham'";
    $result = mysqli_query($con, $checkIDSanPham);

    if (mysqli_num_rows($result) > 0) {
        echo '<script>alert("ID sản phẩm đã tồn tại.");</script>';
    } elseif ($GiaSanPham < 0) {
        // Hiển thị thông báo lỗi
        echo '<script>alert("Giá sản phẩm không được âm.");</script>';
    } else {
        // Thực hiện câu lệnh INSERT
        $sql = "INSERT INTO SanPham(IDSanPham, IDDanhMuc, IDThuongHieu, HinhAnh, MoTaSanPham, TenSanPham, GiaSanPham) 
                VALUES ('$IDSanPham', '$IDDanhMuc', '$IDThuongHieu', '$HinhAnh', '$MoTaSanPham', '$TenSanPham', '$GiaSanPham')";
        $query = mysqli_query($con, $sql);

        move_uploaded_file($HinhAnh_tmp, 'image/' . $HinhAnh);
        header('location: danhsach.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
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
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2>Thêm sản phẩm</h2>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="IDSanPham">IDSanPham</label>
                        <input type="text" id="IDSanPham" name="IDSanPham" class="form-control" required oninvalid="this.setCustomValidity('Vui lòng nhập IDSanPham')" oninput="this.setCustomValidity('')">
                    </div>

                    <div class="form-group">
                        <label for="HinhAnh">Hình ảnh sản phẩm</label>
                        <input type="file" id="HinhAnh" name="HinhAnh" class="form-control" required oninvalid="this.setCustomValidity('Vui lòng chọn hình ảnh ')" oninput="this.setCustomValidity('')">
                    </div>
                    
                    <div class="form-group">
                        <label for="TenSanPham">Tên sản phẩm</label>
                        <input type="text" id="TenSanPham" name="TenSanPham" class="form-control" required oninvalid="this.setCustomValidity('Vui lòng nhập tên sản phẩm')" oninput="this.setCustomValidity('')">
                    </div>

                    <div class="form-group">
                        <label for="GiaSanPham">Giá sản phẩm</label>
                        <input type="number" id="GiaSanPham" name="GiaSanPham" class="form-control" required oninvalid="this.setCustomValidity('Vui lòng nhập giá sản phẩm')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="MoTaSanPham">Mô tả sản phẩm</label>
                        <input type="text" id="MoTaSanPham" name="MoTaSanPham" class="form-control" required oninvalid="this.setCustomValidity('Vui lòng nhập mô tả sản phẩm')" oninput="this.setCustomValidity('')">
                    </div>

                    <div class="form-group">
                        <label for="IDDanhMuc">IDDanhMuc</label>
                        <select id="IDDanhMuc" name="IDDanhMuc" class="form-control">
                            <?php
                            while ($row_DanhMuc = mysqli_fetch_assoc($query_DanhMuc)) { ?>
                                <option value="<?php echo $row_DanhMuc['IDDanhMuc']; ?>"><?php echo $row_DanhMuc['TenDanhMuc']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="IDThuongHieu">IDThuongHieu</label>
                        <select id="IDThuongHieu" name="IDThuongHieu" class="form-control">
                            <?php
                            while ($row_ThuongHieu = mysqli_fetch_assoc($query_ThuongHieu)) { ?>
                                <option value="<?php echo $row_ThuongHieu['IDThuongHieu']; ?>"><?php echo $row_ThuongHieu['TenThuongHieu']; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <button name="sbm" class="btn btn-success" type="submit">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
