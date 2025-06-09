
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
      width: 2375px;
      height: 280px; 
      margin-left: -7px;
      margin-top: -7px;
      position: relative;
    }
    .hieuung img{
      width: 100%;

      margin-top: -345px;
      align-items: center;
      text-align: center;
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

      background: linear-gradient(135deg, rgb(71, 10, 10), rgb(12, 56, 12), rgb(14, 14, 54));
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
    
    .abc{
      -ms-flex: 30%; 
      flex: 10%;
      display: flex;
      flex-direction: column;
      background-color: #000000;
      padding: 10px;
      color: #f7f7f7;
      
    }
    .abc h1{
      margin-top: 10px;
      text-align: center;
      font-size: 19px;
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

.footer h1 {
  font-size: 23px;
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
    color: #b5a6a6;
    text-decoration: none;
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

#list-products {
        padding: 80px;
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
        gap: 100px;
        background: linear-gradient(135deg, #f00, #0f0, #00f);
    }

    #list-products .item {
      box-shadow: 1px 1px 50px rgb(9, 93, 161);
        width: 250px;
        height: 400px;
        background: #362f2f;
        border-radius: 10px;
        margin-bottom: 50px;
        text-align: center;
        padding: 20px;
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: space-evenly;
    }

    #list-products .item img {
        max-width: 400%;
        max-height: 400%;
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
        height: 30px;
        font-size: 17px;
    }

    #list-products button:hover {
        background-color: #e0ac1c;
    }
    #list-products a{
      
      color: beige;
    }
    #list-products .name{
        font-size: 17px;
    }
  </style>
</head>
<body>
  
  <div class="hieuung">
        <img src="../image_giaodien/nen/nen3.jpg"  alt="" />

  </div>
  
                                <!-- danh mục -->
  <div class="w3-padding w3-xlarge w3-text-orange">

   <div class="dropdown">
      <a  class="glyphicon glyphicon-menu-hamburger"></a>
      <div class="dropdown-content">
          <a href="../TrangChu.php">Trang chủ</a>
              <div class="dropdown">
                  <a >Sản phẩm <i class="fa fa-caret-right"></i> </a>
                  <div class="menucon">
                    <a href="../SanPham/ThietBiYTeGiaDinh.php">Thiết bị y tế gia đình</a>
                    <a href="../SanPham/ThietBiYTeChuyenDung.php">Thiết bị y tế chuyên dụng</a>
                    <a href="../SanPham/ThietBiXetNghiem.php">Thiết bị xét nghiệm</a>
                     <a href="../SanPham/ChamSocYTeChuyenNghiep.php">Chăm sóc y tế chuyên nghiệp</a>
                  </div> 
            </div>
          <!-- <a href="./LienHe/LienHe.html">Liên hệ</a> -->
          <div class="dropdown">
                  <a> Tài khoản <i class="fa fa-caret-right"></i> </a>
                  <div class="menucon">
                    <a href="../ThongTinTaiKhoan/ThongTinTaiKhoan.php">Thông tin tài khoản</a>
                    <a href="../DonHang/DonHang.php">Đơn hàng</a>
                    <a href="/admin/login/login.php">Đăng xuất</a>
                  </div> 
          </div>
          
      </div>
   </div>

    <div class="dropdown">
      <a href="../TrangChu.php" class="glyphicon glyphicon-home"> Trang chủ</a>
    </div>

    
    <div  class="dropdown">
      <a href="../giaodienkhachhang/SanPham/allproduct.php">Sản phẩm</a>
        <!-- <div class="dropdown-content">
          <a href="./SanPham/ThietBiYTeGiaDinh.html">Thiết bị y tế gia đình</a>
          <a href="./SanPham/ThietBiYTeChuyenDung.html">Thiết bị y tế chuyên dụng</a>
          <a href="./SanPham/ThietBiXetNghiem.html">Thiết bị xét nghiệm</a>
          <a href="./SanPham/ChamSocYTeChuyenNghiep.html">Chăm sóc y tế chuyên nghiệp</a>
        </div> -->
    </div>

    <div  class="dropdown">
      <!-- <a href="./LienHe/LienHe.html" class="glyphicon glyphicon-earphone"> Liên hệ</a> -->
    </div>
    <div class="dropdown">
      <a href="/WEB_TBYT/giaodienkhachhang/BaiViet/BaiViet.php">Bài viết</a>
    </div>
    <div class="dropdown"><form class="example" style="margin:auto;max-width:300px">
      <input type="text" placeholder="Search.." name="search2">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form></div>

    <div  class="dropdown">
      <a href="#" class="glyphicon glyphicon-user">  Tài khoản</a>
      <div class="dropdown-content">
        <a href="../ThongTinTaiKhoan/ThongTinTaiKhoan.php">Thông tin tài khoản</a>
        <a href="../DonHang/DonHang.php">Đơn hàng</a>
        <a href="/admin/login/login.php">Đăng xuất</a>
        
      </div>
    </div>

    <!-- <div  class="dropdown">
      <a href="#"> Đăng xuất</a>
    </div> -->
  </div>    
                                  <!-- Giỏ hàng -->
  <div class="GioHang">
    <span class="badge bg-danger">2</span>
    <a href="../GioHang/GioHang.php"><img src = "../image_giaodien/xe.png" width="50%" alt=""></a>
  </div>
  <div class="abc">
    <h1>CHĂM SÓC Y TẾ CHUYÊN NGHIỆP</h1>
  </div>
  <div id="list-products">
    <div class="item">
      <img src="../image_giaodien/ChamSocYTeChuyenNgiep/He-Thong-giai-trinh-tu-gene-pyromark-q24dx-2.jpg" alt="">
      <a class="name">Hệ thống giải trình tự gene pyrosequencing Pyromark Q24 MDx</a>
      <a href="../ThongTinSanPham/ThongTinSanPham.php"> <button>Xem</button></a> 
    </div>
    <div class="item">
      <img src="../image_giaodien/ChamSocYTeChuyenNgiep/He-thong-tach-chiet-axit-nucleic-tu-dong-hoan-toan-Seegene-Starlet_1_crop1280x750p.jpg" alt="">
      <a class="name">Hệ thống tách chiết axit nucleic tự động hoàn toàn Seegene STARlet IVD</a>
      <a href="../ThongTinSanPham/ThongTinSanPham.php"> <button>Xem</button></a> 
     </div>
     <div class="item">
      <img src="../image_giaodien/ChamSocYTeChuyenNgiep/May-Realtime-PCR-tu-dong-hoan-toan-Qiastat4.jpg" alt="">
      <a class="name">Máy Realtime PCR tự động hoàn toàn QIAstat-Dx</a>
      <a href="../ThongTinSanPham/ThongTinSanPham.php"> <button>Xem</button></a> 
     </div>
     <div class="item">
        <img src="../image_giaodien/ChamSocYTeChuyenNgiep/May-Phan-Tich-huyet-hoc-tu-dong-Nihon_Kohden_MEK-7300K-min.png" alt="">
        <a class="name">Máy phân tích huyết học tự động Nihon Kohden MEK-7300K</a>
        <a href="../ThongTinSanPham/ThongTinSanPham.php"> <button>Xem</button></a> 
       </div>
       <div class="item">
        <img src="../image_giaodien/ChamSocYTeChuyenNgiep/May-phan-tich-huyet-hoc-tu-dong-Nihon_Kohden_MEK-9100-min.png" alt="">
        <a class="name">Máy phân tích huyết học tự động Nihon Kohden MEK-9100</a>
        <a href="../ThongTinSanPham/ThongTinSanPham.php"> <button>Xem</button></a> 
       </div>
       <div class="item">
        <img src="../image_giaodien/ChamSocYTeChuyenNgiep/May-phan-tich-sinh-hoa-tu-dong-hoan-toan-CA-400_ph01_en.jpg" alt="">
        <a class="name">Máy phân tích sinh hóa tự động hoàn toàn CA-400</a>
        <a href="../ThongTinSanPham/ThongTinSanPham.php"> <button>Xem</button></a> 
       </div>
       <div class="item">
        <img src="../image_giaodien/ChamSocYTeChuyenNgiep/May-Phan-tich-sinh-hoa-tu-dong-hoan-toan-CA-800.jpg" alt="">
        <a class="name">Máy phân tích sinh hóa tự động hoàn toàn CA-800</a>
        <a href="../ThongTinSanPham/ThongTinSanPham.php"> <button>Xem</button></a> 
       </div>
       <div class="item">
        <img src="../image_giaodien/ChamSocYTeChuyenNgiep/May-Realtime PCR Rotor-Gene-Rotor-Gene-Q-5plex-1.jpg" alt="">
        <a class="name">Máy Realtime PCR Rotor-Gene Q MDx</a>
        <a href="../ThongTinSanPham/ThongTinSanPham.php"> <button>Xem</button></a> 
       </div>
       <div class="item">
        <img src="../image_giaodien/ChamSocYTeChuyenNgiep/May-tach-chiet-axit-nucleic-tu-dong-Qiasymphony-ok.jpg" alt="">
        <a class="name">Máy chuẩn bị mẫu tự động QIAsymphony AS</a>
        <a href="../ThongTinSanPham/ThongTinSanPham.php"> <button>Xem</button></a> 
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


