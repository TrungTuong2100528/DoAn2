
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

      background: linear-gradient(135deg, rgb(112, 30, 30), rgb(24, 110, 24), rgb(37, 37, 119));
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
      display: flex;
      border-top: 2px solid #ccc;
      padding: 20px;
    }

    .box1 {
      flex: 70%;
    }

    .box1 .TieuDe {
      display: flex;
      justify-content: space-between;
      border-bottom: 2px solid #ccc;
      padding: 10px 0;

      
    }

    .box1 .TieuDe a {
      flex: 1;
      text-align: center;
    }
    .box1 .sanpham{
      display: flex;
      justify-content: space-between;
      border-bottom: 2px solid #ccc;
      padding: 10px 0;
     
    }
   
    .box2 {
      flex: 30%;
      padding: 0 20px;
    }

    .box2 a {
      display: block;
      margin-bottom: 40px;
    }

    
    @media screen and (max-width: 600px) {
      .container {
        flex-direction: column;
      }

      .box1,
      .box2 {
        flex: 100%;
      }
    }
    

    .button {
      background-color: #f7cb1b;
      color: black;
      border: none;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
      margin-left: 1300px;
      margin-top: -100px;
    }

    .button:hover {
      background-color: #f1f1f1;
    }






    /* CSS cho bảng thông báo */
.w3-modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(129, 24, 24, 0.4);
}

.w3-modal-content {
  background-color: #fefefe;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #040303;
  width: 80%;
}

.w3-container {
  position: relative;
}

.w3-button {
  position: absolute;
  right: 10px;
  top: 10px;
}


  </style>
</head>
<body>
  
  
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
    <a href="../SanPham/allproduct.php">Sản phẩm</a>
      <!-- <div class="dropdown-content">
        <a href="./SanPham/ThietBiYTeGiaDinh.html">Thiết bị y tế gia đình</a>
        <a href="./SanPham/ThietBiYTeChuyenDung.html">Thiết bị y tế chuyên dụng</a>
        <a href="./SanPham/ThietBiXetNghiem.html">Thiết bị xét nghiệm</a>
        <a href="./SanPham/ChamSocYTeChuyenNghiep.html">Chăm sóc y tế chuyên nghiệp</a>
      </div> -->
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
  </div>
  

  
  <div class="container">
    <div class="box1">
      <div class="TieuDe">
          <a>Hình ảnh</a>
          <a>Tên sản phẩm</a>
          <a>Số lượng</a>
          <a>Giá</a>
      </div>

      <div class="sanpham">
        <img src="../image_giaodien/ThietBiYTeChuyenDung/Bom-tiem-su-dung-1-lantanaphar-bt-10ml.jpg" width="10%" alt="Product Image">
        <span>Áo thun trắng</span>
        <span>2</span>
        <span>200,000đ</span>     
      </div>
      
      <div class="sanpham">
          <img src="../image_giaodien/ThietBiYTeChuyenDung/kinh-chong-giot-ban-300x300.jpg" width="10%" alt="Product Image">
          <span>Quần jean đen</span>
          <span>1</span>   
          <span>300,000đ</span>
      </div>
            
    </div>
    <div class="box2">
      <a>Phương thức thanh toán</a>
      <label class="COD">COD
        <input type="radio" checked="checked" name="payment">
        <span class="checkmark"></span>
      </label>
    </div>
    <div class="box2">
      <a>Tổng tiền: </a>
      <span>700,000đ</span>
    </div>
    
  </div>
  <button class="button" onclick="purchase()">Mua ngay</button>
  <div id="purchaseMessage" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom">
      <div class="w3-container">
        <span onclick="document.getElementById('purchaseMessage').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <p>Đã mua. Đang xử lý đơn hàng...</p>
      </div>
    </div>
  </div>
  
  <script>
      // Retrieve URL parameters
    const urlParams = new URLSearchParams(window.location.search);
    const productName = urlParams.get('productName');
    const quantity = urlParams.get('quantity');
   
    const price = urlParams.get('price');

    // Use the retrieved information to display the product information in your checkout page
    document.getElementById('productName').innerText = productName;
    document.getElementById('quantity').innerText = quantity;

    document.getElementById('price').innerText = price;



    function purchase() {
  // Hiển thị thông báo đã mua
  document.getElementById('purchaseMessage').style.display = 'block';

  // Ẩn nút "Mua ngay"
  document.querySelector('.button').style.display = 'none';
}



    
  </script>
</body>
</html>


