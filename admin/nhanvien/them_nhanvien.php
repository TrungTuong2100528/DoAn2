<?php
include_once __DIR__ . '/../../admin/config/db.php';

if (isset($_POST['sbm'])) {
    // $IDNhanVien = $_POST['IDNhanVien'];
    $UserName = $_POST['UserName'];
    $Pass = $_POST['Pass'];
    $HoTen = $_POST['HoTen'];
    $Email = $_POST['Email'];
    $SDT = $_POST['SDT'];
    $NgaySinh = $_POST['NgaySinh'];
    $DiaChi = $_POST['DiaChi'];

    // Kiểm tra xem tên tài khoản hoặc email đã tồn tại chưa
    $check_query = "SELECT * FROM NhanVien WHERE UserName='$UserName' OR Email='$Email'";
    $check_result = mysqli_query($con, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
        echo '<script>alert("Tên tài khoản hoặc email đã tồn tại.");</script>';
    } else {
        // Thực hiện INSERT
        $sql = "INSERT INTO NhanVien( UserName, Pass, HoTen, Email, SDT, NgaySinh, DiaChi) 
                VALUES ('$UserName', '$Pass', '$HoTen', '$Email', '$SDT', '$NgaySinh', '$DiaChi')";
        $query = mysqli_query($con, $sql);
        if ($query) {
            header('location: nhanvien.php');
        } else {
            echo '<script>alert("Thêm nhân viên thất bại.");</script>';
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm nhân viên</title>
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
        input[type="date"],
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
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2>Thêm nhân viên</h2>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" id="employeeForm">
                    <div class="form-group">
                        <label for="UserName">UserName</label>
                        <input type="text" id="UserName" name="UserName" class="form-control" required oninvalid="this.setCustomValidity('Vui lòng nhập tên tài khoản')" oninput="this.setCustomValidity('')"> 
                    </div>
                    <div class="form-group">
                        <label for="Pass">Pass</label>
                        <input type="text" id="Pass" name="Pass" class="form-control" required oninvalid="this.setCustomValidity('Vui lòng nhập mật khẩu')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="HoTen">Họ và tên</label>
                        <input type="text" id="HoTen" name="HoTen" class="form-control" required oninvalid="this.setCustomValidity('Vui lòng nhập họ và tên')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="text" id="Email" name="Email" class="form-control" required oninvalid="this.setCustomValidity('Vui lòng nhập email')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="SDT">SDT</label>
                        <input type="number" id="SDT" name="SDT" class="form-control" required oninvalid="this.setCustomValidity('Vui lòng nhập số điện thoại')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="NgaySinh">Ngày Sinh</label>
                        <input type="date" id="NgaySinh" name="NgaySinh" class="form-control" required oninvalid="this.setCustomValidity('Vui lòng nhập ngày sinh')" oninput="this.setCustomValidity('')">
                    </div>
                    <div class="form-group">
                        <label for="DiaChi">Địa Chỉ</label>
                        <input type="text" id="DiaChi" name="DiaChi" class="form-control" required oninvalid="this.setCustomValidity('Vui lòng nhập địa chỉ')" oninput="this.setCustomValidity('')">
                    </div>
                    <button name="sbm" class="btn btn-success" type="submit">Thêm</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('employeeForm').addEventListener('submit', function(event) {
            var ngaySinh = document.getElementById('NgaySinh').value;
            var today = new Date().toISOString().split('T')[0];

            if (ngaySinh >= today) {
                alert('Ngày sinh phải nhỏ hơn ngày hiện tại.');
                event.preventDefault();  // Ngăn chặn việc submit form
            }
        });
    </script>
</body>
</html>
