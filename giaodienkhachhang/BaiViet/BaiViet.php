<?php
  include_once __DIR__ . '/../../admin/config/db.php';
	$sql_bv = "SELECT * 
  FROM BaiViet 
  JOIN SanPham ON BaiViet.IDSanPham = SanPham.IDSanPham 
  WHERE BaiViet.IDBaiViet = '$_GET[id]' 
  LIMIT 1
  ";
	$query_bv = mysqli_query($con,$sql_bv);
	// $query_bv_all = mysqli_query($con,$sql_bv);
	
	$row_bv_title = mysqli_fetch_array($query_bv);
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
  <title>Bài viết</title>
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
      margin-top: 10px;
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


.footer {
  background: linear-gradient(135deg, rgb(11, 116, 137), rgb(131, 159, 19), rgb(39, 161, 23));
  display: flex;
  justify-content: space-evenly;
}

.footer div {

  text-align: center;
  padding: 10px;
}
.footer h1 {
  color: #000;
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
color: #000000;
font-size: 17px;
margin-top: 20px; 
}
.footer .aa{
color: #000000;
text-decoration: none;
}

.baiviet{
    width: 60%;
    margin-left: auto;
    margin-right: auto;
    margin-top: 80px;
    
}
.baiviet p{
  font-size: 22px;
  text-align: justify;
  text-indent: 40px;
}
.baiviet h3{
    font-size: 32px;
    text-shadow: 2px 2px 5px rgb(34, 188, 186);
}
.baiviet .TaiDay{
 
  color: #fc0404;
  text-decoration: underline;
  cursor: pointer;
}
.baiviet .Mua{
  margin-left: 350px;
}
.baiviet hr {
    
    border: 0;

    height: 3px;
    background: #333; /* Màu của đường chân ngang */
    margin: 40px 0px; /* Khoảng cách trên và dưới đường chân ngang */
}


#comments {
      background-color: #f9f9f9;
      padding: 20px;
      border-radius: 10px;
      margin-top: 20px;
    }
    .comment {
      border-bottom: 1px solid #ddd;
      padding-bottom: 10px;
      margin-bottom: 10px;
    }
    .comment:last-child {
      border-bottom: none;
    }
    .comment strong {
      color: #333;
      font-size: 18px;
    }
    .comment .email {
      color: #666;
      font-size: 14px;
      margin-bottom: 5px;
    }
    .comment p {
      font-size: 16px;
      line-height: 1.5;
      color: #444;
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
</div>
    <div class="baiviet">
        <!-- <h3>Trang web bán Thiết bị y tế</h3> <br>
        <p>Trang web bán thiết bị y tế là nền tảng trực tuyến cung cấp các 
          sản phẩm và dịch vụ liên quan đến lĩnh vực y tế và chăm sóc sức khỏe.
           Đây là một công cụ hữu ích cho các tổ chức y tế, bệnh viện, phòng khám,
            cũng như người tiêu dùng cá nhân để tìm kiếm và mua sắm các sản phẩm y tế chất lượng và đáng tin cậy.</p>

        <p>Trang web bán thiết bị y tế thường cung cấp một loạt các sản phẩm như máy móc y tế, dụng cụ y tế,
           vật tư y tế, thuốc, sản phẩm chăm sóc sức khỏe cá nhân, và các dịch vụ chăm sóc sức khỏe.
            Các sản phẩm này được cung cấp từ các nhà sản xuất uy tín và được kiểm định chất lượng, đảm bảo an toàn cho người sử dụng.</p><br>
          <img src="/WEB_TBYT/giaodienkhachhang/image_giaodien/nen/list-dung-cu-y-te-768x569.jpg" alt=""><br><br><br>
          
      

        <p>Trang web bán thiết bị y tế thường cung cấp dịch vụ giao hàng nhanh chóng và thuận tiện,
           giúp người tiêu dùng tiết kiệm thời gian và công sức khi mua sắm. Đồng thời,
            trang web này còn cung cấp các hình thức thanh toán đa dạng, từ thanh toán trực tuyến đến thanh toán khi nhận hàng,
             để phù hợp với nhu cầu của người tiêu dùng.</p> <br><br><br> -->

        <h3>Bài viết về <?php echo $row_bv_title['TenBaiViet'] ?></h3> <br>
          <p>WEBSITE Bán Thiết Bị Y Tế chúng tôi chuyên cung cấp các thiết bị y tế chất lượng cao, phục vụ nhu cầu chăm sóc sức
             khỏe của bạn. Với mục tiêu mang đến những giải pháp y tế tiên tiến và hiệu quả, chúng tôi tự hào 
             giới thiệu sản phẩm <?php echo $row_bv_title['TenBaiViet']  ?>, sản phẩm sẽ mang đến nhiều lợi ích cho người dùng.</p>
             <img src="/WEB_TBYT/giaodienkhachhang/image_giaodien/<?php echo $row_bv_title['HinhAnh']; ?>" alt="">


             <div class="Mua">
              <p>Mua <a class="TaiDay" href="/WEB_TBYT/giaodienkhachhang/ThongTinSanPham/ThongTinSanPham.php?id=<?php echo $row_bv_title['IDSanPham']; ?>">tại đây</a></p>
             </div>
          <p>Các sản phẩm của chúng tôi không chỉ đáp ứng các tiêu chuẩn quốc tế mà còn được cập nhật liên tục để bắt kịp
             với những tiến bộ trong công nghệ y tế hiện đại. Chúng tôi cam kết đem đến cho khách hàng những sản phẩm chất
              lượng nhất với dịch vụ hậu mãi chu đáo, giúp nâng cao chất lượng cuộc sống và sức khỏe cộng đồng.</p>
         
          <hr>
    </div>
    <div class="well">
        <h4>Bình luận:</h4>

        <!-- Add a Comment -->
        <form id="commentForm">
          <div class="form-group">
            <label for="name">Tên:</label>
            <input type="text" class="form-control" id="name" required>
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" required>
          </div>
          <div class="form-group">
            <label for="comment">Nhập bình luận của bạn:</label>
            <textarea class="form-control" id="comment" rows="3" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Gửi</button>
        </form> <br>
        <br>
        <div id="comments"></div>
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
     document.addEventListener("DOMContentLoaded", function() {
      const commentForm = document.getElementById("commentForm");
      const nameInput = document.getElementById("name");
      const emailInput = document.getElementById("email");
      const commentInput = document.getElementById("comment");
      const commentsDiv = document.getElementById("comments");
      const comments = [];

      commentForm.addEventListener("submit", function(event) {
        event.preventDefault();
        const name = nameInput.value.trim();
        const email = emailInput.value.trim();
        const commentText = commentInput.value.trim();

        if (name && email && commentText) {
          comments.push({ name, email, commentText });
          nameInput.value = "";
          emailInput.value = "";
          commentInput.value = "";
          displayComments();
        }
      });

      function displayComments() {
        commentsDiv.innerHTML = "";
        comments.forEach((comment, index) => {
          const commentElement = document.createElement("div");
          commentElement.innerHTML = `<strong>${comment.name}</strong> (${comment.email}):<br>${comment.commentText}<hr>`;
          commentsDiv.appendChild(commentElement);
        });
      }
    });
  </script>
</body>
</html>


