
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

  /* CSS for cart-table */
.cart-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    font-family: Arial, sans-serif;
    color: #333;
}

.cart-table th, .cart-table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.cart-table th {
    background-color: #f2f2f2;
}

.cart-table tbody tr:hover {
    background-color: #f5f5f5;
}

.cart-table img {
    border-radius: 5px;
}

.cart-table button {
    background-color: #f44336;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
}

.cart-table button:hover {
    background-color: #d32f2f;
}

/* CSS for cart-body */
#cart-body td {
    vertical-align: middle;
}

#cart-body td:nth-child(1) {
    width: 100px;
}

#cart-body td:nth-child(2) {
    width: 200px;
}

#cart-body td:nth-child(3) {
    width: 150px;
}

#cart-body td:nth-child(4) {
    width: 100px;
}

#cart-body td:nth-child(5) {
    width: 100px;
}

#cart-body td:nth-child(6) {
    width: 100px;
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
    <table class="cart-table">
      <thead>
        <tr>
          <th>Hình ảnh</th>
          <th>Tên sản phẩm</th>
          <th>Nhãn hiệu</th>
          <th>Số lượng</th>
          <th>Giá</th>
          <th>Thao tác</th>
        </tr>
      </thead>  
      <tbody id="cart-body">
        <tr>
          <td><img src="../image_giaodien/ThietBiYTeGiaDinh/Bang-ca-nhan-tanaphar-ugotana-38x72mm.jpg" width="100%" alt="Hình ảnh"></td>
          <td>Băng cá nhân</td>
          <td>Nhãn hiệu A</td>
          <td>1</td>
          <td>100,000 VND</td>
          <td><button >Xóa</button></td>
        </tr>
        <tr>
          <td><img src="../image_giaodien/ThietBiYTeGiaDinh/nhiet-ke-dau-cung-khong-tham-nuoc-polygreen-classic-kd-1490-1.jpg" width="100%" alt="Hình ảnh"></td>
          <td>Nhiệt kế</td>
          <td>Nhãn hiệu B</td>
          <td>5</td>
          <td>200,000 VND</td>
          <td><button >Xóa</button></td>
        </tr>
      </tbody>
    </table>



    <script>

    </script>
  </body>
  </html>


