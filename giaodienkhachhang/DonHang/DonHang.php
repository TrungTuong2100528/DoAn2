<?php
  session_start();
if (!isset($_SESSION['tenkhachhang'])) {
    header('Location: /Web_TBYT/admin/login/login.php');
    exit();
 
}?>
<?php
    include_once __DIR__ . '/../../admin/config/db.php';
?>
<?php
    
    $IDKhachHang = $_SESSION['IDKhachHang'];
    $sql = "SELECT DonHang.*, KhachHang.HoTen FROM DonHang JOIN KhachHang ON DonHang.IDKhachHang = KhachHang.IDKhachHang WHERE DonHang.IDKhachHang=".$IDKhachHang;
    $query = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Đơn hàng</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


  <style>

    .w3-padding form{
      margin-top: -110px;
    }

.w3-padding form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
  margin-top: 15px;
}

.w3-padding form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #000000;
  color: rgb(251, 232, 29);
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
  margin-top: 15px;
}

.w3-padding form.example button:hover {
  background: #0b7dda;
}

.w3-padding form.example::after {
  content: "";
  clear: both;
  display: table;
}
 
.w3-padding{

  background: linear-gradient(135deg, rgb(145, 22, 22), rgb(39, 114, 39), rgb(40, 40, 115));
    height: 70px;

    display: flex;
    justify-content: space-between; 
    align-items: center; 

}
.w3-padding a{
  color: #f7cb1b;
  width: 200px; 
  display: inline-block; 
  /* text-align: center;  */
  margin-right: 10px; 
  height: 30px; 
  line-height: 30px; 
  margin-top: 10px;
  margin-left: 60px;
  cursor: pointer;
  font-size: 20px;
}

    
/* --- */

    .dropdown-content {
   
      margin-left: 30px;
      display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 360px;
  box-shadow: 0 8px 16px rgba(0,0,0,0.2);
  z-index: 1;
  padding: 10px; 
  border: 2px solid #952323; /* Độ dày và màu sắc của khung */
}
.dropdown-content a {
  
  display: block;
  white-space: nowrap;
  text-decoration: none;
  color: #333;
  text-align: left;
  margin-top: 0px;
  margin-left:0px;
  margin-bottom: 10px;
}

.dropdown-content a:hover {
  color: #fc0404;

}

.dropdown:hover .dropdown-content, .dropdown:focus-within .dropdown-content {
  display: block;
}

    .glyphicon-home{    
     font-size: 26px;
    }
    .GioHang {
      position: fixed;
      top: 300px;
      right: 150px;
      z-index: 999;
      /* background-color: yellow;  */
      padding: 10px;
      border-radius: 50%; 
      animation: floating 2s infinite; 
      cursor: pointer;
      

      position: fixed;
    top: 600px; 
    right: 20px; 

    }
    .GioHang img{
      background-color: #ffff00;
      border-radius: 40%;
     
    }
    @keyframes floating {
      0% {
        transform: translateY(0);
      }
      50% {
        transform: translateY(-10px);
      }
      100% {
        transform: translateY(0);
      }
    }
    .GioHang span{
      margin-left: 30px;
    }
    

    
    .footer {
        position: static; /* Thay đổi từ 'fixed' sang 'static' */
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: #030303;
  color: #fffcfc;
  display: flex;
  justify-content: space-evenly;
}

.footer div {
  text-align: center;
  padding: 10px;
}

.footer h2 {
  font-size: 20px;
  margin-top: 20px;
  display: inline-block;
}

.footer a {
  font-size: 17px;
  margin-top: 20px;
  display: block;
  text-align: center;
}

.footer p {
  color: #b5a6a6;
  font-size: 17px;
  margin-top: 20px;
}
.footer .aa{
    text-decoration: none;
    color: #b5a6a6;
}

.dropdown .dropdown{
  position: relative;
  display: inline-block;
}
.dropdown .dropdown a{
  color: #333;
}
.dropdown .dropdown a:hover{
  color: #ff0000;
}
.dropdown .sidenav a{
  color: #333;
  padding: 16px;
  border: none;
  cursor: pointer;
  font-size: 25px;
}
.dropdown .dropdown-content{
  min-width: 350px;
  
}
.dropdown .menucon {

  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.dropdown .menucon a {
  color: #333;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
.dropdown .menucon{
  right: -290px;
  margin-top: -30px;
  min-width: 340px;
}


.dropdown .menucon a:hover {background-color: #f1f1f1;}
.dropdown .dropdown:hover .menucon {display: block;}
.dropdown .dropdown:hover .dropdown a {background-color: #f1f1f1;}


.table-responsive{
    max-height: 730px; /* Đặt chiều cao tối đa của bảng */
    overflow: auto; /* Tạo thanh cuộn khi cần */
    font-size: 19px;
}

  /* CSS cho bảng */
  .table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
   

  }

  .table th, .table td {
    font-size: 17px;
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #dddddd6f;
    text-align: center; /* Căn giữa nội dung ngang */
    vertical-align: middle; /* Căn giữa nội dung dọc */
  }

  /* CSS cho ảnh trong bảng */
  .table img {
    width: 200px;
    height: auto;
    margin-right: 10px;
    vertical-align: middle;
  }
      
  .table tbody tr td{
    vertical-align: middle; 
    background-color: #f9f9f9;
  }

  </style>
</head>
<body>
  
  
                                <!-- danh mục -->
  <div class="w3-padding w3-xlarge w3-text-orange">

  <div class="dropdown">
        <a  class="glyphicon glyphicon-menu-hamburger"> Danh mục</a>
            <div class="dropdown-content">
            <?php
          
          $listcat = 'SELECT * from DanhMuc';
          $result = mysqli_query($con, $listcat);
          while($row = mysqli_fetch_array($result)){

        ?>
            <a href="/WEB_TBYT/giaodienkhachhang/listDanhMuc.php?id=<?php echo $row['IDDanhMuc']; ?>"><?php echo $row['TenDanhMuc']; ?></a>
        <?php 
        } 
        ?>
          
      </div>
  </div>

    <div class="dropdown">
      <a href="../TrangChu.php" class="glyphicon glyphicon-home"> Trang chủ</a>
    </div>

    
    <div  class="dropdown">
    <a href="">Bài viết</a>
      <div class="dropdown-content">
          <?php
          
            $sql_baiviet = "SELECT * from BaiViet ORDER BY IDBaiViet DESC";
            $query_baiviet = mysqli_query($con, $sql_baiviet);
            while($row = mysqli_fetch_array($query_baiviet)){

          ?>
          <a href="/WEB_TBYT/giaodienkhachhang/BaiViet/BaiViet.php?id=<?php echo $row['IDBaiViet'] ?>"><?php echo $row['TenBaiViet'] ?></a>
          <?php
            }
          ?>
        </div>
    </div>
    <!-- <div class="dropdown"><form class="example" style="margin:auto;max-width:300px">
      <input type="text" placeholder="Search.." name="search2">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form></div> -->
               
    <div  class="dropdown">
        <?php
        $numberCart = 0;
        if(isset($_SESSION["cart"])){
            foreach($_SESSION["cart"] as $key => $value) {
              $numberCart ++;
          }
        }
        ?>
      <a class="fa fa-shopping-cart" href="/WEB_TBYT/giaodienkhachhang/cart.php">
      <span class="badge bg-danger" id="numberCart" ><?php echo $numberCart ?></span><br>Giỏ hàng 
      <!-- <span class="badge bg-danger" id="numberCart" ><?php echo $numberCart ?></span><br> -->
      <!-- <span ><label id="total">0</label>VNĐ </span> -->
      </a>
    </div>
    <div  class="dropdown">
      <a href="#" class="glyphicon glyphicon-user">  <?php echo htmlspecialchars($_SESSION['tenkhachhang']); ?></a>
      <div class="dropdown-content">
        <a href="/WEB_TBYT/giaodienkhachhang/ThongTinTaiKhoan/ThongTinTaiKhoan.php?id=<?php echo htmlspecialchars($_SESSION['IDKhachHang']); ?>">Thông tin tài khoản</a>
        <a href="/WEB_TBYT/giaodienkhachhang/DonHang/DonHang.php">Đơn hàng</a>
        <a href="/WEB_TBYT/giaodienkhachhang/layout.php">Đăng xuất</a>
        
      </div>
    </div>

    <!-- <div  class="dropdown">
      <a href="#"> Đăng xuất</a>
    </div> -->
  </div>    
                                  <!-- Giỏ hàng -->
  <!-- <div class="GioHang">
    <span class="badge bg-danger">4</span>
    <img src = "../image_giaodien/xe.png" width="50%" alt="">
  </div> -->
  <div class="table-responsive">
  <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Họ và tên</th>
                        <th>Ngày đặt</th>
                        <th>Địa chỉ</th>
                        <th>Tổng tiền</th>
                        <th>Tên Sản phẩm</th>
                        <th>Tình trạng</th>
                        <th>Hủy đơn hàng</th>
   

                    </tr>
                </thead>
                <tbody>
                        <?php
                    $i = 1;
                    while($row = mysqli_fetch_assoc($query)){
                        $currentDate = new DateTime(); // Ngày hiện tại
                        $orderDate = new DateTime($row['NgayDat']); // Ngày đặt hàng
                        $interval = $currentDate->diff($orderDate);
                        $daysPassed = $interval->days;
                ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo isset($row['HoTen']) ? $row['HoTen'] : ''; ?></td>
                        <td><?php echo isset($row['NgayDat']) ? $row['NgayDat'] : ''; ?></td>
                        <td><?php echo isset($row['DiaChi']) ? $row['DiaChi'] : ''; ?></td>
                        <td><?php echo isset($row['TongTien']) ? number_format($row["TongTien"], 0, ',', '.') : ''; ?> VNĐ</td>
                        <td><?php echo isset($row['TenSanPham']) ? $row['TenSanPham'] : ''; ?></td>
                        <td><?php echo isset($row['TinhTrang']) ? $row['TinhTrang'] : ''; ?></td>
                        <td>
                            <?php if ($daysPassed <= 3) { ?>
                                <a href="javascript:void(0);" onclick="confirmCancelOrder(<?php echo $row['IDDonHang']; ?>)">Hủy</a>
                            <?php } else { ?>
                                Quá thời hạn hủy
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
           
        </div>
  </div>
  

  <script>
     function confirmCancelOrder(orderId) {
        if (confirm("Bạn có chắc chắn muốn hủy đơn hàng này không?")) {
            // Gửi yêu cầu xóa đơn hàng đến server
            window.location.href = "/WEB_TBYT/giaodienkhachhang/DonHang/XoaDonHang.php?id=" + orderId;
        }
    }

  </script>
</body>
</html>


