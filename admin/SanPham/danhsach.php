<?php
session_start();
?>
<?php
    include_once __DIR__ . '/../../admin/config/db.php';
?>
<?php
    $sql = "SELECT * FROM SanPham";
    $query = mysqli_query($con, $sql);
?>
<div class="contrainer-fluid">
    <div class="card">
        <div class="card-header">
            <div class="trangchu">
                <h1>Trang chủ</h1>
                <?php if(isset($_SESSION['dangnhap_nv'])) { ?>
                Xin chào, <?php echo htmlspecialchars($_SESSION['dangnhap_nv']); ?>
            <?php } elseif(isset($_SESSION['UserNamead'])) { ?>
                Xin chào, <?php echo htmlspecialchars($_SESSION['UserNamead']); ?>
            <?php } ?>
            </div>
            <div class="sidebar">
            <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Quản lý tài khoản <span ></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../nhanvien/nhanvien.php">Tài khoản nhân viên</a></li>
                        <li><a href="../taikhoanadmin/admin.php">Tài khoản admin</a></li>
                        <li><a href="../taikhoankhachhang/Users.php">Tài khoản khách hàng</a></li>                   
                    </ul>
                </li>
                <li><a  style="color: #f00;" href="../SanPham/danhsach.php">Quản lý sản phẩm</a></li>
                <li><a href="../thuonghieu/thuonghieu.php">Quản lý thương hiệu</a></li>
                <li><a href="../danhmuc/danhmuc.php">Quản lý danh mục</a></li>
                <li><a href="../baiviet/baiviet.php">Quản lý bài viết</a></li>
                <li><a href="../giohang/giohang.php">Quản lý giỏ hàng</a></li>
                <li><a href="../khuyenmai/khuyenmai.php">Quản lý khuyến mãi</a></li>
                <li><a href="../donhang/donhang.php">Quản lý đơn hàng</a></li>
                <li><a href="../chitietdonhang/chitietdonhang.php">Quản lý chi tiết đơn hàng</a></li>
                <!-- <li><a href="../chitietsanpham/chitietsanpham.php">Quản lý chi tiết sản phẩm</a></li> -->
                <li><a href="../trangthaidonhang/trangthaidonhang.php">Quản lý trạng thái đơn hàng</a></li>
                <!-- <li><a class="user" href=""></a></li> -->
                <li><a href="/WEB_TBYT/admin/logout.php">Thoát</a></li> 
            </div>
        <h2>Danh sách sản phẩm</h2> 
        <a style= " margin-left: 1350px;margin-top: -40px;" class = "btn btn-primary" href ="them.php">Thêm mới</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>IDSanPham</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá sản phẩm</th>
                        <th>Mô tả sản phẩm</th>
                        <th>IDDanhMuc</th>
                        <th>IDThuongHieu</th>

                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $i = 1;
                    while($row = mysqli_fetch_assoc($query)){?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['IDSanPham']; ?></td>
                            <td>
                            <img style="width :100px;" src="/WEB_TBYT/giaodienkhachhang/image_giaodien/<?php echo $row['HinhAnh']; ?>">
                            </td>
                            <td><?php echo isset($row['TenSanPham']) ? $row['TenSanPham'] : ''; ?></td>
                            <td><?php echo isset($row['GiaSanPham']) ? number_format($row['GiaSanPham']) : ''; ?> VNĐ</td>
                            <td><?php echo isset($row['MoTaSanPham']) ? $row['MoTaSanPham'] : ''; ?></td>
                            <td><?php echo isset($row['IDDanhMuc']) ? $row['IDDanhMuc'] : ''; ?></td>
                            <td><?php echo isset($row['IDThuongHieu']) ? $row['IDThuongHieu'] : ''; ?></td>
                            <?php if(isset($_SESSION['dangnhap_nv'])) { ?>
                                <td><a href="sua.php?id=<?php echo $row['IDSanPham']; ?>">Sửa</a></td>
                                <td>Không có quyền</td>
                            <?php } else { ?>
                                <td><a href="sua.php?id=<?php echo $row['IDSanPham']; ?>">Sửa</a></td>
                                <td><a href="xoa.php?id=<?php echo $row['IDSanPham']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">Xóa</a></td>
                            <?php } ?>
                           


                        </tr>
                <?php }?>

                </tbody>
            </table>
           
        </div>
    </div>
</div>


<body>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Danh sách sản phẩm</title>
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
    <style>
      .trangchu {
        width: 100%;
        
    text-align: center; 
    background-color: black; 
    color: white;
    padding: 20px; 
}
.trangchu h1{
    font-size: 48px;
}

    .container {
        display: flex;
    }
    

    .sidebar {
        display: flex;
        background-color: #333;
            color: white;
            padding: 20px;
            display: flex;
            flex-direction: row;
            margin-top:-8px;
            width: 100%;
           
    
    }

    .sidebar li {
        display: flex;
        flex-direction: row; 
        flex: 1;
        font-size: 16px;
        
    
    }

    .sidebar a {
        text-decoration: none;
        padding: 10px;
        color: white;
        display: block; 
    }
    .sidebar a:hover {
        
        color: red;
    }

    .card-header h2{
        text-align: center;
    }
 


    .sidebar .dropdown-menu {
        display: none;
        position: absolute;
        background-color: white;
        min-width: 160px;
        z-index: 1;
    }

    .sidebar .dropdown:hover .dropdown-menu {
        display: block;
    }
    .sidebar .dropdown-menu li {
  width: 100%; 
}

.sidebar .dropdown-menu a {
  width: 100%; 
}
.sidebar .user{
        display: inline-block;
        width: 30px; 
        height: 30px; 
        background-image: url(../img_login/icon-1633249_1280.webp);
        background-size: cover;
        background-color: white; 
        margin-left:50px;
        margin-top:10px;

    }


.table {
    border: 1px solid #ddd; 
    border-collapse: collapse; 
    width: 100%; 
}

.table th, .table td {
    padding: 8px; 
    text-align: center; 
}



    </style>
</body>
</html>


</body>
</body>
</html>
