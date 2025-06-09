<?php
  include_once __DIR__ . '/../admin/config/db.php';

?>
<?php

  session_start();
      if (isset($_SESSION['success_message'])) {
        echo '<script>alert("' . $_SESSION['success_message'] . '");</script>';
        unset($_SESSION['success_message']);
    }
if (!isset($_SESSION['tenkhachhang'])) {
    header('Location: /Web_TBYT/admin/login/login.php');
    exit();
 
}?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Giỏ hàng</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


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

      background: linear-gradient(135deg, rgb(117, 20, 20), rgb(20, 171, 20), rgb(38, 38, 163));
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
      margin-top: -10px;
      margin-left: 100px;
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




.container {
    width: 100%;
    margin: 0 auto; /* Để căn giữa trang */
}

/* Định dạng khung bao của giỏ hàng */
#cart {
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 10px;
}

/* Định dạng tiêu đề của panel thông tin đặt hàng */
.panel_container h3 {
    font-size: 24px;
    margin-bottom: 20px;
}

/* Định dạng input và textarea trong form đặt hàng */
.form-horizontal input[type="text"],
.form-horizontal input[type="number"],
.form-horizontal input[type="email"],
.form-horizontal textarea {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Định dạng nút đặt hàng */
.form-horizontal button[type="submit"] {
    padding: 10px 20px;
    font-size: 16px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.form-horizontal button[type="submit"]:hover {
    background-color: #0056b3;
}

/* Định dạng bảng sản phẩm trong giỏ hàng */
.table.table-bordered.table-hover {
    margin-top: 20px;
    font-size: 16px;
}

.table.table-bordered.table-hover th,
.table.table-bordered.table-hover td {
    vertical-align: middle;
    text-align: center;
}

/* Định dạng nút mua thêm và cập nhật trong giỏ hàng */
.btn.btn-button {
    padding: 10px 20px;
    font-size: 16px;
    margin-right: 10px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn.btn-button:hover {
    background-color: #28a745;
}

/* Định dạng nút xóa trong bảng sản phẩm */
.table.table-bordered.table-hover td a {
    color: #dc3545;
    cursor: pointer;
}

.table.table-bordered.table-hover td a:hover {
    text-decoration: none;
    color: #c82333;
}
.col-sm-push-3 {
    left: 15%;
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
      <a href="/WEB_TBYT/giaodienkhachhang/TrangChu.php" class="glyphicon glyphicon-home"> Trang chủ</a>
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
        <a href="./ThongTinTaiKhoan/ThongTinTaiKhoan.php?id=<?php echo htmlspecialchars($_SESSION['IDKhachHang']); ?>">Thông tin tài khoản</a>
        <a href="./DonHang/DonHang.php">Đơn hàng</a>
        <a href="/WEB_TBYT/giaodienkhachhang/layout.php">Đăng xuất</a>
        
      </div>
    </div>
    <!-- <div class="footer">
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
  </div> -->
 
  </div>

    <section id="cart">
            <div class="container">
                <div class="row c_Detail">

                    <div class="col-sm-9 col-sm-push-3">
                        <from action="handle_cart.html?&action=update_all" method="post">
                            <div class="table-responsive img_cart" id="listCart">
                                <table class="table table-bordered table-hover" id="cartx">
                                    <tr>
                                        <!-- <th style="width: 5%;" class="text-center">STT</th>
                                        <th style="width: 15%;" class="text-center">Ảnh sản phẩm</th>
                                        <th style="width: 25%;" class="text-center">Tên sản phẩm</th> -->
                                        <th style="width: 5%;" class="text-center">STT</th>
                                        <th style="width: 15%;" class="text-center">Ảnh sản phẩm</th>
                                        <th style="width: 25%;" class="text-center">Tên sản phẩm</th>
                                        <th style="width: 15%;" class="text-center">Giá sản phẩm</th>
                                        <th style="width: 10%;" class="text-center">Số lượng</th>
                                        <th style="width: 15%;" class="text-center">Tổng tiền</th>
                                        <th style="width: 5%;" class="text-center">Xóa</th>
                                    </tr>
                                <?php
                                    $total=0;
                                    $stt = 1;
                                    if(isset($_SESSION["cart"])){ 

                                        foreach($_SESSION["cart"] as $key => $value){
                                          $itemTotal = $value["GiaSanPham"] * $value["SoLuong"];
                                          
                                          $total += $itemTotal;
                                        
                                ?>
                                    <tr>
                                        <td><?php echo $stt ?></td>
                                        <td><img style="height: 50px; width: 50px;margin-left: auto;" 
                                        src="/WEB_TBYT/giaodienkhachhang/image_giaodien/<?php echo $value["HinhAnh"] ?>" class="img-responsive text-center" alt=""></td>
                                        <td><?php echo $value["TenSanPham"] ?></td>
                                        <td class="text-danger"><?php echo $value["GiaSanPham"]; ?><sup><u>đ</u></sup></td>
                                        <td>
                                            <input style="width: 60px:" onchange="updateCart(<?php echo $key ?>)" type="text" id="quantitys_<?php echo $key ?>" name="quantitys_<?php echo $key ?>" 
                                            value="<?php echo $value["SoLuong"] ?>" min="1">


                                        </td>
                                        <td class="text-danger"><?php echo $itemTotal; ?><sup><u>đ</u></sup></td>
                                        <td><a href="javacript:void(0)" onclick="deleteCart(<?php echo $key ?>)"><i class="fa fa-trash-o"></i></a></td>
                                    </tr>
                                <?php
                                  $stt++;
                                    }}else{
                                        echo "Bạn chưa mua hàng";
                                    }
                                ?>
                                    <tr class="end">
                                        <td colspan="4">
                                            <!-- <a href="product.html" class="btn btn-button">Mua thêm</a>
                                            <button class="btn btn-button add-quantity" name="all">Cập nhật</button> -->
                                            <!-- <a href="handle_cart.html?&action=deletall" class="btn btn-button" onclick="return confirm('Bạn có chắc chắn xóa không? ')">Hủy đơn hàng</a> -->
                                        </td>
                                        <td class="text-right">Tổng cộng: </td>
                                        <td colspan="2" class="text-danger text-left">
                                            <strong><?php echo number_format($total, 0, ',', '.'); ?><sup><u>đ</u></sup></strong>
                                        </td>
                                    </tr>
                               
                                </table>
                            </div>
                        </from>

                       
                        
                        <div class="panel_container">
                            <h3>Thông tin đặt hàng</h3>
                            <p>Vui lòng điền đầy đủ và chính xác thông tin để chúng tôi hoàn thành đơn hàng!</p>
                            <form class="form-horizontal" action="handle_order.php" method="post">
                                    <div class="form-group">
                                        <!-- <div class="col-sm-6">
                                          <label for="">Họ và tên:</label>
                                            <input type="text" name="name"  class="form-control" placeholder="Họ và tên (Bắt buộc)" required="">
                                        </div>
                                        <div class="col-sm-6">
                                        <label for="">SDT:</label>
                                            <input type="number" name="phone" min="0"  class="form-control" placeholder="Điện thoại (Bắt buộc)" required="">
                                        </div> -->
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                        <!-- <label for="">Email:</label>
                                            <input type="email" name="email"  class="form-control" placeholder="Email (Bắt buộc)" required="">
                                        </div> -->
                                        <div class="col-sm-6">
                                        <label for="">Địa chỉ:</label>
                                            <input type="text" name="address"  class="form-control" placeholder="Địa chỉ (Bắt buộc)" required="">
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <div class="col-sm-12">
                                            <textarea type="text" class="form-control" name="Content" placeholder="Nội dung" rows="5"></textarea>
                                        </div>
                                    </div> -->
                                    <div class="text-center">
                                        <button type="submit" name="sbm" class="btn btn-button">Đặt hàng</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                    <!-- <div class="col-sm-3" col-sm-pull-9>
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
                    </div> -->
                </div>
            </div>
    </section>
  <script>
    function updateCart(IDSanPham){
        SoLuong = $("#quantitys_"+IDSanPham).val();    
        $.post('/WEB_TBYT/giaodienkhachhang/updateCart.php',{'IDSanPham': IDSanPham, 'SoLuong': SoLuong}, function(data) {
            $("#listCart").load("http://localhost/WEB_TBYT/giaodienkhachhang/cart.php #cartx");
        });
    }
    function deleteCart(IDSanPham){   
        $.post('/WEB_TBYT/giaodienkhachhang/updateCart.php',{'IDSanPham': IDSanPham, 'SoLuong': 0}, function(data) {
            $("#listCart").load("http://localhost/WEB_TBYT/giaodienkhachhang/cart.php #cartx");
        });
    }
  </script>
</body>
</html>


