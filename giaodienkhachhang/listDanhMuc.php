
<?php

include_once __DIR__ . '/../admin/config/db.php';
  $sql = "SELECT * FROM `SanPham`";
  $query = mysqli_query($con, $sql);

?>
<?php
  session_start();
if (!isset($_SESSION['tenkhachhang'])) {
    header('Location: /Web_TBYT/admin/login/login.php');
    exit();
 
}?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Web bán thiết bị y tế</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


  <style>



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
    .hieuung {
   
        overflow: hidden;
      width: 2355px;
      height: 300px;
      height: 250px;
      margin-top: -7px;
      position: relative;
    }
    .hieuung img{
        width: 80%;
      margin-top: -235px;
      align-items: center;
      /* text-align: center; */
      margin-left: -200px;
    }
    .hieuung h1 {
      color: #FFD700;
      position: absolute;
      margin-top: -5px;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 1; 
    }
    .w3-padding{

      background: linear-gradient(135deg, rgb(23, 156, 168), rgb(58, 168, 15), rgb(41, 8, 172));
      height: 70px;
      display: flex;
      justify-content: space-between; 
      align-items: center; 

    }
    .w3-padding a{
      color: #f7cb1b;
    
      display: inline-block; 
      text-align: center; 
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
  z-index: 10;
  padding: 10px; 
  border: 2px solid #952323; 
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
      z-index: 99;
      /* background-color: yellow;  */
      padding: 10px;
      border-radius: 50%; 
      animation: floating 2s infinite; 
      cursor: pointer;
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
    #list-products {
      margin-top: 60px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 100px;
        
    }

    #list-products .item {
      box-shadow: 1px 1px 50px rgb(9, 93, 161);
        width: 270px;
        height: 340px;
        background: #362f2f;
        border-radius: 10px;
        margin-bottom: 50px;
        text-align: center;
        padding: 20px;
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    #list-products .item img {
        max-width: 100%;
        max-height: 200px;
        margin-bottom: 20px;
    }

    #list-products button {
        padding: 5px 10px;
        background-color: #f7cb1b;
        color: #333333;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        width: 100px;
    }

    #list-products button:hover {
        background-color: #e0ac1c;
    }
    #list-products a{
      color: beige;
    }
    .abc{
      -ms-flex: 30%; 
      flex: 10%;
      display: flex;
      flex-direction: column;
      background: linear-gradient(135deg, rgb(29, 196, 96), rgb(27, 182, 182), rgb(15, 41, 135));
  
      color: #fffcfc;
      margin-top: -77px;

    }
    .abc h1{
      margin-top: 20px;
      text-align: center;
      font-size: 24px;
      
    }
    .centered {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .xemthem a {
      font-size: 18px; 
    }
    .loaisanpham {
      margin-top: 20px;
      background-color: #a39e9e; 
      padding: 10px; 
      border-radius: 10px; 
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      text-align: left;
    }

    .loaisanpham h1 {
     
      margin: 0; 
      color: #333; 
      font-size: 24px; 
      font-weight: bold; 
      text-transform: uppercase; 
      font-size: 14px;
    }

.row {  
  display: -ms-flexbox; 
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  
}

.side {
  -ms-flex: 30%; 
  flex: 10%;
  display: flex;
  flex-direction: column;
  background: linear-gradient(135deg, rgb(192, 91, 14), rgb(27, 159, 119), rgb(62, 31, 163));
  padding: 20px;
  color: #fffcfc;
}

.side h1 {
  margin-bottom: 60px; 
  text-indent: 5px; 
  font-size: 24px;
}

.side a {
  display: block; 
  margin-bottom: 50px; 
  text-decoration: none;
  color: #fffcfc; 
  font-size: 14px;
  padding: 2px; 
  font-weight: bold;
  text-indent: 15px; 
}

.side a:hover {
  color: #f7351b; 
}

.main { 
  overflow-x: auto;
    max-height: 1730px;
  -ms-flex: 70%; 
  flex: 70%;
  background-color: white;
  padding: 20px;

 
}
.main::-webkit-scrollbar {
    width: 40px; /* Đặt chiều rộng của thanh cuộn */
    height: 40px; /* Đặt chiều cao của thanh cuộn (nếu bạn đang sử dụng thanh cuộn dọc) */
}

/* Tùy chỉnh màu sắc của thanh cuộn */
.main::-webkit-scrollbar-thumb {
    background-color: #888; /* Đặt màu sắc cho phần thanh cuộn */
}


.footer {
  
    display: flex;
    justify-content: space-evenly;
    background-color: #241d1d;
    color: #fffcfc;
}

.footer div {

    text-align: center;
    padding: 10px;
}
.footer h1 {
  font-size: 24px;
  margin-top: 20px; 
    display: inline-block;
}

.footer a {

  font-size: 17px;
  margin-top: 20px; 
    display: block;
    text-align: center;
}
.footer p{
  color: #b5a6a6;
  font-size: 17px;
  margin-top: 20px; 
}
.footer .aa{
  color: #b5a6a6;
  text-decoration: none;
}
.side img {
  width: 100%; 
  height: auto; 
  margin-top: 10px; 
}
.nen {
    display: flex;
    justify-content: space-between;
}

.nen .content {
    font-style: italic;
    text-shadow: 1px 1px 1px rgba(0,0,0,0.5); 
    font-family: Arial, sans-serif;
    font-size: 16px; 
    color: #333; 
    
    width: 50%;
    padding-right: 10px; 
    
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: left; 
    padding: 30px; 
}
.nen .content::before {
    content: "";
    position: absolute;
    top: 100px;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('image_giaodien/tong-hop-hinh-nen-background-vector-designer-dep-do-phan-giai-fhd-2k-4k-moi-nhat-5.jpg');
    opacity: 0.3;
    z-index: -1; 
}
.nen .image {
    margin-top: px;
    width: 50%;
}
.nen .content .aa{
    color: #030303;
    font-size: 56px;
    text-decoration: none;
   
}
.nen .content p{
  margin-top: 40px;
  font-size: 26px;
  text-align: left;
  
}


.anhdong{
    padding-left: 200px;
    display: flex;
    justify-content:  center;
    align-items: center; 
    margin-top: -416px;
    position: relative;
    
}
 .anhdong img{
  box-shadow: 1px 1px 50px rgb(138, 161, 9);
  border-radius: 30px;
  width: 30%;
  position: relative;
  z-index: 5; 
     margin: 0px 10px;
    animation: animation 3s infinite linear;
    transform: translateZ(1px);
    position: relative;
  top: -160px; 
  left: -100px; 
  margin-top: 200px;
}

.anhdong image:nth-child(1){
    animation-delay: 0,5s;
}  

@keyframes animation{
    0%{
        transform: translateY(0px);
    }
    50%{
        transform: translateY(-10px);
    }
    100%{
        transform: translateY(0px);
    }
}


.dropdown .dropdown{
  
  position: relative;
  /* display: inline-block; */
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

  </style>



<style>
  .image-container {
    position: relative;
    display: inline-block;
  }

  .promotion-label {
    position: absolute;
    top: 10px;
    left: 10px;
    background-color: red;
    color: white;
    padding: 5px;
    border-radius: 5px;
    font-size: 12px;
  }
</style>

</head>
<body>
  
  <div class="hieuung">
        <img src="image_giaodien/nen/nen3.jpg"  alt="" />

  </div>
  
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
          <!-- <a href="./TrangChu.php">Trang chủ</a>
              <div class="dropdown" >
                  <a >Sản phẩm <i class="fa fa-caret-right"></i> </a>
                  <div class="menucon">
                    <a href="./SanPham/ThietBiYTeGiaDinh.php">Thiết bị y tế gia đình</a>
                    <a href="./SanPham/ThietBiYTeChuyenDung.php">Thiết bị y tế chuyên dụng</a>
                    <a href="./SanPham/ThietBiXetNghiem.php">Thiết bị xét nghiệm</a>
                     <a href="./SanPham/ChamSocYTeChuyenNghiep.php">Chăm sóc y tế chuyên nghiệp</a>
                  </div> 
            </div> -->
      
          <!-- <a href="./LienHe/LienHe.html">Liên hệ</a> -->
          <div class="dropdown">
<!--          
                  <a> Tài khoản <i class="fa fa-caret-right"></i>
                
                </a>
                
                  <div class="menucon">
                    <a href="./ThongTinTaiKhoan/ThongTinTaiKhoan.php">Thông tin tài khoản</a>
                    <a href="./DonHang/DonHang.php">Đơn hàng</a>
                    <a href="../admin/login/login.php">Đăng xuất</a>
                  </div>  -->
          </div>
            
      </div>
      
   </div>

    <div class="dropdown">
      <a href="./TrangChu.php" class="glyphicon glyphicon-home"> Trang chủ</a>
    </div>

    <div  class="dropdown">
      <!-- <a href="../giaodienkhachhang/SanPham/allproduct.php">Sản phẩm</a> -->
        <!-- <div class="dropdown-content">
          <a href="./SanPham/ThietBiYTeGiaDinh.html">Thiết bị y tế gia đình</a>
          <a href="./SanPham/ThietBiYTeChuyenDung.html">Thiết bị y tế chuyên dụng</a>
          <a href="./SanPham/ThietBiXetNghiem.html">Thiết bị xét nghiệm</a>
          <a href="./SanPham/ChamSocYTeChuyenNghiep.html">Chăm sóc y tế chuyên nghiệp</a>
        </div> -->
    </div>
    <!-- <div class="dropdown">
      <a href="">Thương hiệu</a>
    </div> -->
    <div class="dropdown">
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
    <div  class="dropdown">
      <!-- <a href="./LienHe/LienHe.html" class="glyphicon glyphicon-earphone"> Liên hệ</a> -->
    </div>
    <!-- <div class="dropdown"><form class="example" style="margin:auto;max-width:300px">
      <form action="/WEB_TBYT/giaodienkhachhang/timkiem.php" method="POST">
          <input type="text" placeholder="Tìm kiếm.." name="tukhoa">
          <button type="submit" name="timkiem"><i class="fa fa-search"></i></button>
        </form>
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
        <a href="./ThongTinTaiKhoan/ThongTinTaiKhoan.php?id=<?php echo htmlspecialchars($_SESSION['IDKhachHang']); ?>">Thông tin tài khoản</a>
        <a href="./DonHang/DonHang.php">Đơn hàng</a>
        <a href="/WEB_TBYT/giaodienkhachhang/layout.php">Đăng xuất</a>
        
      </div>
    </div>

    <!-- <div  class="dropdown">
      <a href="#"> Đăng xuất</a>
    </div> -->
  </div>    
           
  <!-- <div class="GioHang">
    <span class="badge bg-danger">2</span>
    <a href="../giaodienkhachhang/GioHang/GioHang.php"><img src = "image_giaodien/xe.png" width="50%" alt=""></a>
  </div> -->
 
  <div class="nen">
    <div class="content">
        <a class="aa">Welcome to website <br>Thiết bị y tế</a>
        <p>Tại website Thiết bị y tế, chúng tôi cam kết <br>
          mang đến cho bạn trải nghiệm mua các <br>
          thiết bị với giá tốt và chất lượng. Mua với<br>
           sự tự tin khi biết rằng thông tin cá nhân<br>
            của bạn được bảo mật và sự hài lòng của<br>
             bạn là ưu tiên hàng đầu của chúng tôi.</p>
    </div>
   
    <div class="image">
        <img src="image_giaodien/nen/nhua-y-te.png" width="100%" alt="">
    </div>
  </div>
  <div class="anhdong">
    <img src="image_giaodien/nen/list-dung-cu-y-te-768x569.jpg" width="20%" alt="">
  </div>
  <div class="abc">
    <h1>CÁC SẢN PHẨM NỔI BẬT</h1>
  </div>



  <div class="row">
    <div class="side">
      <h1>DANH MỤC SẢN PHẨM</h1>
      <?php
     
        $listcat = 'SELECT * from DanhMuc';
        $result = mysqli_query($con, $listcat);
        while($row = mysqli_fetch_array($result)){

      ?>
          <a href="/WEB_TBYT/giaodienkhachhang/listDanhMuc.php?id=<?php echo $row['IDDanhMuc']; ?>"><?php echo $row['TenDanhMuc']; ?></a>
      <?php 
      } 
      ?>
      <h1>HỖ TRỢ 24/7</h1>
      <a >Nhân viên: NV007</a>
      <a >SDT: 113</a>
      <a >Email: CuaHangTBYT@gmail.com</a>
      <img src="image_giaodien/nen/list-dung-cu-y-te-768x569.jpg"  alt="">
      <img src="image_giaodien/nen/nhua-y-te.png"  alt="">
      <img src="image_giaodien/nen/nen1.jpg"  alt="">
      <img src="image_giaodien/nen/nen2.jpg" alt="">
      <img src="image_giaodien/nen/nen3.jpg" alt="">
    </div>
    <?php
$sqlcat = "SELECT * FROM DanhMuc WHERE IDDanhMuc = ".$_GET["id"];
$kqcat = mysqli_query($con, $sqlcat);
$datacat = mysqli_fetch_row($kqcat);
?>
<div class="main">
  <h1 style="font-family: 'Arial', sans-serif; 
  font-size: 2em; 
  color: #333;
  background-color: #f9f9f9; 
  padding: 20px;
  border: 2px solid #ccc; 
  border-radius: 10px; 
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  text-align: center;
  margin: 20px auto; 
  width: 100%;
  "> Sản phẩm <?php echo htmlspecialchars($datacat[1]); ?></h1>
  <div id="list-products">
    <?php
    $selectpro = 'SELECT sp.*, km.* FROM SanPham sp LEFT JOIN KhuyenMai km ON sp.IDSanPham = km.IDSanPham WHERE sp.IDDanhMuc = '.$_GET["id"];
    $result = mysqli_query($con, $selectpro);
    while ($row = mysqli_fetch_array($result)){
        $giaMoi = $row['GiaSanPham'];
        // Kiểm tra xem khuyến mãi có hiệu lực hay không
        $current_date = strtotime(date('Y-m-d'));
        $start_date = strtotime($row['NgayBatDau']);
        $end_date = strtotime($row['NgayKetThuc']);
        
        if ($row['GiaKhuyenMai'] && $current_date >= $start_date && $current_date <= $end_date) {
            $giaMoi = $row['GiaSanPham'] - $row['GiaKhuyenMai'];
        }
    ?>
    <div class="item">
      <div class="image-container">
        <img src="/WEB_TBYT/giaodienkhachhang/image_giaodien/<?php echo htmlspecialchars($row['HinhAnh']); ?>" alt="">
        <?php if($row['GiaKhuyenMai'] && $current_date >= $start_date && $current_date <= $end_date): ?>
          <span class="promotion-label">Đã khuyến mãi</span>
        <?php endif; ?>
      </div>
      <a class="name"><?php echo htmlspecialchars($row["TenSanPham"]); ?></a>
      <a>Giá: <?php echo number_format($giaMoi, 0, ',', '.');?> VNĐ </a>
      <a href="/WEB_TBYT/giaodienkhachhang/ThongTinSanPham/ThongTinSanPham.php?id=<?php echo htmlspecialchars($row['IDSanPham']); ?>"><button>Xem</button></a> 
    </div>
    <?php
    }
    ?>



      </div>
     
    </div>

    
  
    <div class="footer">
      <div>
          <h1>Thông tin cửa hàng</h1>
          <a class="aa">WEBSITE BÁN THIẾT BỊ Y TẾ</a>
          <p>Tại WEBSITE BÁN THIẾT BỊ Y TẾ, chúng tôi cam kết mang đến cho <br>
            bạn trải nghiệm mua các thiết bị với giá tốt và chất lượng.Mua với sự <br>
            tự tin khi biết rằng thông tin cá nhân của bạn được bảo mật và sự hài <br>lòng của bạn là ưu tiên hàng đầu của chúng tôi.</p>
      </div>
      <div>
          <h1>Liên hệ</h1>
          <a class="aa">Nhân viên: NV007</a>
          <a class="aa">SDT: 113</a>
          <a class="aa">Email: CuaHangTBYT@gmail.com</a>
      </div>
  </div>

  <script>


  </script>
</body>
</html>


