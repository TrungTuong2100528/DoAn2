<?php
include_once __DIR__ . '/../../admin/config/db.php';
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
<!-- Tải jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Tải Bootstrap JS sau jQuery -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
 
    .w3-padding{

      background: linear-gradient(135deg, rgb(73, 77, 10), rgb(14, 158, 161), rgb(119, 20, 149));
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
      margin-top: -170px;
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
  font-size: 24px;
  margin-top: 20px;
  display: inline-block;
}

.footer a {
  font-size: 16px;
  margin-top: 20px;
  display: block;
  text-align: center;
}

.footer p {
  color: #b5a6a6;
  font-size: 16px;
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


.product {
    
    width: 800px;
    height: 610px;
  display: flex;
  justify-content: space-evenly;
   
  margin: 30px;
 
  background-color: #ffffff; 
  margin-left: 350px;
  
}

.product-image img {
  width: 400px;
  height: 400px;
  margin-top: 30px;
}

.product-info {
    padding: 30px;
  flex: 1;
  margin-left: 20px;
  line-height: 1.5; 
  font-size: 26px;
}

.product-info h3 {
  
  margin: 0px;
  font-size: 20px;
}
.product-info p{
    font-size: 16px;
}
.product-info button {
  font-size: 20px;
  margin-top: 10px;
  padding: 5px 10px;
  background-color: #f7cb1b;
  border: none; /* Xóa border */
  cursor: pointer;
}

.product-info button:hover {
  background-color: #29f0fe;
}
.color{
  margin-top: -30px;
  height: 100%;
  width: 100%;
  background: linear-gradient(135deg, rgb(131, 125, 15), rgb(16, 165, 36), #00f);
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
    <!-- <div class="dropdown"><form class="example" style="margin:auto;max-width:300px">
      <input type="text" placeholder="Search.." name="search2">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form></div> -->

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
    <span class="badge bg-danger">2</span>
    <a href="../GioHang/GioHang.php"><img src = "../image_giaodien/xe.png" width="50%" alt=""></a>
  </div> -->

<div class="color">
        <div class="product">
            <?php
            include_once __DIR__ . '/../../admin/config/db.php';
            if (isset($_GET["id"])) {
                $id = $_GET["id"];

                // Query to join SanPham and ThuongHieu tables
                $sql = '
                SELECT 
                    SanPham.*, 
                    ThuongHieu.TenThuongHieu,
                    KhuyenMai.GiaKhuyenMai,
                    KhuyenMai.NgayKetThuc,
                    KhuyenMai.NgayBatDau
                FROM 
                    SanPham 
                JOIN 
                    ThuongHieu 
                ON 
                    SanPham.IDThuongHieu = ThuongHieu.IDThuongHieu 
                LEFT JOIN 
                    KhuyenMai 
                ON 
                    SanPham.IDSanPham = KhuyenMai.IDSanPham 
                WHERE 
                    SanPham.IDSanPham=' . $_GET["id"];


                $result = mysqli_query($con, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    $data = mysqli_fetch_assoc($result);

                    // Calculate the current price based on the promotion
                    $giaHienTai = $data['GiaSanPham'];
                    if (isset($data['GiaKhuyenMai']) && $data['GiaKhuyenMai'] !== null &&
                    (isset($data['NgayBatDau']) && $data['NgayBatDau'] === null || $data['NgayBatDau'] <= date('Y-m-d')) &&
                    (isset($data['NgayKetThuc']) && ($data['NgayKetThuc'] === null || $data['NgayKetThuc'] >= date('Y-m-d')))
                ) {
                    $giaHienTai = $data['GiaSanPham'] - $data['GiaKhuyenMai'];
                }

                    // Other code for product display
                    ?>
                    <div class="product-image">
                        <img id="productImg" src="/WEB_TBYT/giaodienkhachhang/image_giaodien/<?php echo $data['HinhAnh'] ?>" alt="">
                    </div>
                    <div class="product-info">
                        <h3 id="namePro"><?php echo $data['TenSanPham'] ?></h3> <br>
                        <p id="gia">Giá: <?php echo number_format($giaHienTai, 0, ',', '.') ?> VNĐ</p>
                        <p id="soluongPro">Số lượng: <input type="number" value="1" min="1" id="SoLuong" name="SoLuong"></p>
                        <p>Nhãn hiệu: <?php echo $data['TenThuongHieu'] ?></p>
                        <p>Mô tả: <?php echo $data['MoTaSanPham'] ?></p>
                        <!-- <a href="/WEB_TBYT/giaodienkhachhang/themgiohang.php?IDSanPham=<?php echo $data['IDSanPham']; ?>"><button >Thêm vào giỏ hàng</button></a>  -->
                        <button class="button" onclick="addcart(<?php echo $data['IDSanPham']; ?>)">Thêm vào giỏ hàng</button>
                    </div>
                <?php
                } else {
                    $data = null;
                }
            } else {
                $data = null;
            }
            $sqlOther = "SELECT * FROM SanPham WHERE IDSanPham != $id ORDER BY RAND() LIMIT 3";
            $resultOther = mysqli_query($con, $sqlOther);
            ?>
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



  <div class="modal fade" tabindex="-1" id="showCart" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">       Thông tin mua hàng</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
              <a href="#" class="thumbnail">
                  <img alt="" id="xxx">
              </a>
          </div>
          <div class="col-md-6">
            <p>Tên : <span id="nameCart"></span></p>
            <p>Giá : <span id="priceCart"></span></p>
            <p>Số lượng : <span id="SoLuongCart"></span></p>
          </div>
        </div>
        
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
  <script>
      function addcart(IDSanPham){
        // alert(id);
        SoLuong = $("#SoLuong").val();
        $.post('/WEB_TBYT/giaodienkhachhang/addCart.php',{'IDSanPham': IDSanPham, 'SoLuong': SoLuong}, function(data) {
          img = $("#productImg").attr("src");
          $("#nameCart").text($("#namePro").text());
          $("#priceCart").text($("#gia").text());
          $("#SoLuongCart").text(SoLuong);
          $("#xxx").attr({
            'src': img,
          });
          $('#showCart').modal('show');
          $("#numberCart").text(data);
        });
      }
  </script>
  
</body>
</html>


