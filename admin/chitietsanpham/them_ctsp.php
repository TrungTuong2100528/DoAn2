<?php

include_once __DIR__ . '/../../admin/config/db.php';

    $sql_SanPham = "SELECT * FROM SanPham";
    $query_SanPham = mysqli_query($con, $sql_SanPham);

 
    if(isset($_POST['sbm'])){

        $IDChiTietSanPham = $_POST['IDChiTietSanPham'];
        $IDSanPham = $_POST['IDSanPham'];
        $GiaSanPham = $_POST['GiaSanPham'];
        $SoLuong = $_POST['SoLuong'];
        $TongTien = $_POST['TongTien'];
        $sql = "INSERT INTO ChiTietSanPham(IDChiTietSanPham, IDSanPham, GiaSanPham,SoLuong,TongTien) 
        VALUES ('$IDChiTietSanPham ','$IDSanPham','$GiaSanPham','$SoLuong','$TongTien')";
        $query = mysqli_query($con, $sql);

        header('location: danhmuc.php');
    }




?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Thêm chi tiết sản phẩm</h2>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">IDChiTietSanPham</label>
                    <input type="text" id="IDChiTietSanPham" name="IDChiTietSanPham" class="form-control" required>
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
                    <label for="">Giá sản phẩm</label>
                    <input type="text" id="GiaSanPham" name="GiaSanPham" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Số lượng</label>
                    <input type="text" id="SoLuong" name="SoLuong" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Tổng tiền</label>
                    <input type="text" id="TongTien" name="TongTien" class="form-control" required>
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
    <title>Thêm chi tiết sản phẩm</title>
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
    <script>
        
    
    </script>
</body>
</html>