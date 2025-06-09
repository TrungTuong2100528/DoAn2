<?php

include_once __DIR__ . '/../../admin/config/db.php';

$sql_SanPham = "SELECT * FROM SanPham";
$query_SanPham = mysqli_query($con, $sql_SanPham);

if (isset($_POST['sbm'])) {
    // $IDKhuyenMai = $_POST['IDKhuyenMai'];
    $IDSanPham = $_POST['IDSanPham'];
    $GiaKhuyenMai = $_POST['GiaKhuyenMai'];
    $NgayBatDau = $_POST['NgayBatDau'];
    $NgayKetThuc = $_POST['NgayKetThuc'];

    // Fetch the original product price
    $sql_GiaSanPham = "SELECT GiaSanPham FROM SanPham WHERE IDSanPham = '$IDSanPham'";
    $result_GiaSanPham = mysqli_query($con, $sql_GiaSanPham);
    $row_GiaSanPham = mysqli_fetch_assoc($result_GiaSanPham);
    $GiaSanPham = $row_GiaSanPham['GiaSanPham'];

    // Check if the product already has a promotion
    $sql_CheckPromotion = "SELECT * FROM KhuyenMai WHERE IDSanPham = '$IDSanPham' AND NOW() BETWEEN NgayBatDau AND NgayKetThuc";
    $result_CheckPromotion = mysqli_query($con, $sql_CheckPromotion);

    if (mysqli_num_rows($result_CheckPromotion) > 0) {
        echo "Sản phẩm này đã có khuyến mãi trong thời gian hiện tại.";
    } elseif ($GiaKhuyenMai < 0) {
        echo "Giá khuyến mãi không được âm.";
    } elseif ($GiaKhuyenMai > $GiaSanPham) {
        echo "Giá khuyến mãi đã lớn hơn giá sản phẩm vui lòng kiểm tra lại.";
    } else {
        $sql = "INSERT INTO KhuyenMai(IDSanPham, GiaKhuyenMai, NgayBatDau, NgayKetThuc) 
                VALUES ('$IDSanPham', '$GiaKhuyenMai', '$NgayBatDau', '$NgayKetThuc')";
        $query = mysqli_query($con, $sql);

        header('location: khuyenmai.php');
    }
}

?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Thêm khuyến mãi</h2>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <!-- <div class="form-group">
                    <label for="">IDKhuyenMai</label>
                    <input type="text" id="IDKhuyenMai" name="IDKhuyenMai" class="form-control" required>
                </div> -->

                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <select id="IDSanPham" name="IDSanPham" class="form-control">
                        <?php
                        while ($row_SanPham = mysqli_fetch_assoc($query_SanPham)) { ?>
                            <option value="<?php echo $row_SanPham['IDSanPham']; ?>"><?php echo $row_SanPham['TenSanPham']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Giá khuyến mãi</label>
                    <input type="number" id="GiaKhuyenMai" name="GiaKhuyenMai"  class="form-control" required oninput="validateInput(this)" >
                    <div id="errorMessage" style="color: red;"></div>
                </div>
                <div class="form-group">
                    <label for="">Ngày bắt đầu</label>
                    <input type="date" id="NgayBatDau" name="NgayBatDau" class="form-control" required oninvalid="this.setCustomValidity('Vui lòng nhập ngày bắt đầu')" oninput="this.setCustomValidity('')">
                </div>

                <div class="form-group">
                    <label for="">Ngày kết thúc</label>
                    <input type="date" id="NgayKetThuc" name="NgayKetThuc" class="form-control" required oninvalid="this.setCustomValidity('Vui lòng nhập ngày kết thúc')" oninput="this.setCustomValidity('')">
                </div>

                <button name="sbm" class="btn btn-success" type="submit">Thêm</button>
            </form>
        </div>
    </div>
</div>
<script>
      function validateInput(input) {
        let value = input.value;
        let isValid = /^\d+$/.test(value);
        let errorMessage = document.getElementById('errorMessage');
        
        if (!isValid) {
            errorMessage.textContent = 'Vui lòng nhập số nguyên dương và không có ký tự';
            input.setCustomValidity('Giá khuyến mãi không hợp lệ');
        } else {
            errorMessage.textContent = '';
            input.setCustomValidity('');
        }
    }
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm khuyến mãi</title>
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
    <script>
        // You can add some client-side validation here if needed
    </script>
</body>
</html>
