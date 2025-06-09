<?php
session_start();
?>
<?php
    include_once __DIR__ . '/../../admin/config/db.php';
    $sql = "SELECT * FROM `DonHang`";
    $query = mysqli_query($con, $sql);
?>
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
<body>
    <style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
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
    }
    .sidebar a {
        text-decoration: none;
        padding: 10px;
        color: white;
        display: block; /* Hiển thị như block để có thể sử dụng padding */
    }
    .sidebar a:hover {
        color: red;
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
        width: 100%; /* Đảm bảo chiều rộng của các item trong dropdown-menu bằng nhau */
    }
    .sidebar .dropdown-menu a {
         width: 100%; /* Đảm bảo chiều rộng của các liên kết trong dropdown-menu bằng nhau */
    }
    .sidebar .user{
        display: inline-block;
        width: 30px; /* Đặt kích thước cho hình ảnh */
        height: 30px; /* Đặt kích thước cho hình ảnh */
        background-image: url(../img_login/icon-1633249_1280.webp); /* Đường dẫn đến hình ảnh */
        background-size: cover; /* Hiển thị hình ảnh toàn bộ kích thước của thẻ a */
        background-color: white; /* Màu nền của hình ảnh */
        margin-left:50px;
        margin-top:10px;

    }
    .trangchu {
    text-align: center; /* Đưa tiêu đề vào giữa */
    background-color: black; /* Đặt màu nền đen */
    color: white; /* Đặt màu chữ trắng */
    padding: 20px; /* Thêm khoảng cách xung quanh tiêu đề */
}

    </style>
</body>
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
                <li><a href="../SanPham/danhsach.php">Quản lý sản phẩm</a></li>
                <li><a href="../thuonghieu/thuonghieu.php">Quản lý thương hiệu</a></li>
                <li><a href="../danhmuc/danhmuc.php">Quản lý danh mục</a></li>
                <li><a href="../baiviet/baiviet.php">Quản lý bài viết</a></li>
                <li><a href="../giohang/giohang.php">Quản lý giỏ hàng</a></li>
                <li><a href="../khuyenmai/khuyenmai.php">Quản lý khuyến mãi</a></li>
                <li><a  style="color: #f00;" href="../donhang/donhang.php">Quản lý đơn hàng</a></li>
                <li><a href="../chitietdonhang/chitietdonhang.php">Quản lý chi tiết đơn hàng</a></li>
                <!-- <li><a href="../chitietsanpham/chitietsanpham.php">Quản lý chi tiết sản phẩm</a></li> -->
                <li><a href="../trangthaidonhang/trangthaidonhang.php">Quản lý trạng thái đơn hàng</a></li>
                <!-- <li><a class="user" href=""></a></li> -->
                <li><a href="/WEB_TBYT/admin/logout.php">Thoát</a></li> 
                
        </div>
             <h2>Đơn hàng</h2>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>IDDonHang</th>
                        <th>IDKhachHang</th>
                        <th>IDNhanVien</th>
                        
                        <th>Ngày đặt</th>
                        <th>Địa chỉ</th>
                        <th>Tổng tiền</th>
                        <th>Tên sản phẩm</th>
                        <th>Tình Trạng</th>
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
                            <td><?php echo isset($row['IDDonHang']) ? $row['IDDonHang'] : ''; ?></td>
                            <td><?php echo isset($row['IDKhachHang']) ? $row['IDKhachHang'] : ''; ?></td>
                            <td><?php echo isset($row['IDNhanVien']) ? $row['IDNhanVien'] : ''; ?></td>
                            <td><?php echo isset($row['NgayDat']) ? $row['NgayDat'] : ''; ?></td>
                            <td><?php echo isset($row['DiaChi']) ? $row['DiaChi'] : ''; ?></td>
                            <td><?php echo isset($row['TongTien']) ? number_format($row['TongTien']) : ''; ?> VNĐ</td>
                            <td><?php echo isset($row['TenSanPham']) ? $row['TenSanPham'] : ''; ?></td>
                            <td><?php echo isset($row['TinhTrang']) ? $row['TinhTrang'] : ''; ?></td>
                          
                            <?php if(isset($_SESSION['dangnhap_nv'])) { ?>
                                <td><a href="sua_donhang.php?id=<?php echo $row['IDDonHang']; ?>">Sửa</a></td>
                                <td>Không có quyền</td>
                            <?php } else { ?>
                                <td><a href="sua_donhang.php?id=<?php echo $row['IDDonHang']; ?>">Sửa</a></td>
                            <td><a href="xoa_donhang.php?id=<?php echo $row['IDDonHang']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này?')">Xóa</a></td>
                            <?php } ?>
                            
                           
                        </tr>
                     <?php }?>

            </table>
        </div>
    </div>
</div>