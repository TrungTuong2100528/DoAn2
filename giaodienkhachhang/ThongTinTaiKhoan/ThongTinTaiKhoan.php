<?php
  include_once __DIR__ . '/../../admin/config/db.php';

?>
<?php
  session_start();
if (!isset($_SESSION['tenkhachhang'])) {
    header('Location: /Web_TBYT/admin/login/login.php');
    exit();
 
}?>
<?php
// Lấy IDKhachHang từ URL
if (isset($_GET['id'])) {
    $idKhachHang = intval($_GET['id']);
} else {
    // Nếu không có IDKhachHang trong URL, chuyển hướng về trang đăng nhập
    header('Location: /Web_TBYT/admin/login/login.php');
    exit();
}

// Truy vấn cơ sở dữ liệu để lấy thông tin khách hàng
$sql = "SELECT * FROM KhachHang WHERE IDKhachHang = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $idKhachHang);
$stmt->execute();
$result = $stmt->get_result();
$khachHang = $result->fetch_assoc();

// Nếu không tìm thấy khách hàng, chuyển hướng về trang đăng nhập
if (!$khachHang) {
    header('Location: /Web_TBYT/admin/login/login.php');
    exit();
}
?>

<?php
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hoTen = $_POST['hoTen'];
    $ngaySinh = $_POST['ngaySinh'];
    $email = $_POST['email'];
    $sdt = $_POST['sdt'];
    $diaChi = $_POST['diaChi'];
    $userName = $_POST['userName'];
    $pass = $_POST['pass'];

    $updateSql = "UPDATE KhachHang SET HoTen = ?, NgaySinh = ?, Email = ?, SDT = ?, DiaChi = ?, UserName = ?, Pass = ? WHERE IDKhachHang = ?";
    $updateStmt = $con->prepare($updateSql);
    $updateStmt->bind_param("sssssssi", $hoTen, $ngaySinh, $email, $sdt, $diaChi, $userName, $pass, $idKhachHang);
    $updateStmt->execute();
    header('Location: ThongTinTaiKhoan.php?id=' . $idKhachHang);
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thông tin khách hàng</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


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

  background: linear-gradient(135deg, rgb(32, 108, 14), rgb(10, 108, 87), rgb(27, 27, 62));
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
    .GioHang a img{
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

.customer-info {
  
  font-size: 25px;
  width: 700px;
  height: 520px;
  background-color: #f9f9f9;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  max-width: 600px;
  margin: auto;
  
  padding: 20px;
}

.customer-info h2 {
  border-bottom: 3px solid #c70707; 
  font-size: 20px;
  margin-bottom: 10px;
  color: #333;
}

.customer-info .info-row {
  font-size: 20px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 5px 0;
  border-bottom: 1px solid #ccc;
}

.info-row:last-child {
  border-bottom: none;
}

.info-row strong {
  flex: 1;
}

.info-row span {
  flex: 2;
}
.color{
  width: 100%;
  height: 100%;
  background: linear-gradient(135deg, rgb(38, 171, 47), rgb(17, 156, 175), rgb(130, 23, 202));
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

<div class="color">
    <div class="customer-info">
      <h2>Thông tin khách hàng: <?php echo htmlspecialchars($khachHang['HoTen']); ?></h2>
      <div class="info-row"><strong>Họ và tên:</strong> <?php echo htmlspecialchars($khachHang['HoTen']); ?></div>
      <div class="info-row"><strong>Ngày sinh:</strong><?php echo htmlspecialchars($khachHang['NgaySinh']); ?></div>
      <div class="info-row">
      <strong>Email:</strong>
      <?php 
        $email = htmlspecialchars($khachHang['Email']);
        $email_parts = explode('@', $email);
        $name = substr($email_parts[0], 0, 2); // Show first 2 characters of the name part
        $masked_email = $name . str_repeat('*', strlen($email_parts[0]) - 2) . '@' . $email_parts[1];
        echo $masked_email;
      ?>
     </div>

      <div class="info-row"><strong>Số điện thoại:</strong> <?php echo htmlspecialchars($khachHang['SDT']); ?></div>
      <div class="info-row"><strong>Địa chỉ:</strong> <?php echo htmlspecialchars($khachHang['DiaChi']); ?></div> <br><br>
      <h2>Thông tin tài khoản:</h2>
      <div class="info-row"><strong>Tên đăng nhập:</strong> <?php echo htmlspecialchars($khachHang['UserName']); ?></div>
      <div class="info-row"><strong>Mật khẩu đăng nhập:</strong> <?php  echo str_repeat('*', strlen($khachHang['Pass']));  ?></div>
      <div class="info-row">
            <button  onclick="openUpdateModal()">Cập nhật</button>
      </div>
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
        <!-- Update Modal -->
  <div id="updateModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Cập nhật thông tin khách hàng</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" id="updateForm">
            <div class="form-group">
              <label for="hoTen">Họ tên:</label>
              <input type="text" class="form-control" id="hoTen" name="hoTen" value="<?php echo htmlspecialchars($khachHang['HoTen']); ?>" required>
            </div>
            <div class="form-group">
              <label for="ngaySinh">Ngày sinh:</label>
              <input type="date" class="form-control" id="ngaySinh" name="ngaySinh" value="<?php echo htmlspecialchars($khachHang['NgaySinh']); ?>" required>
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($khachHang['Email']); ?>" required>
            </div>
            <div class="form-group">
              <label for="sdt">Số điện thoại:</label>
              <input type="text" class="form-control" id="sdt" name="sdt" value="<?php echo htmlspecialchars($khachHang['SDT']); ?>" required>
            </div>
            <div class="form-group">
              <label for="diaChi">Địa chỉ:</label>
              <input type="text" class="form-control" id="diaChi" name="diaChi" value="<?php echo htmlspecialchars($khachHang['DiaChi']); ?>" required>
            </div>
            <div class="form-group">
              <label for="userName">Tên đăng nhập:</label>
              <input type="text" class="form-control" id="userName" name="userName" value="<?php echo htmlspecialchars($khachHang['UserName']); ?>" readonly>
            </div>
            <div class="form-group">
              <label for="pass">Mật khẩu:</label>
              <input type="text" class="form-control" id="pass" name="pass" value="<?php echo htmlspecialchars($khachHang['Pass']); ?>" required>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" >Lưu thay đổi</button>
              <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="resetForm()">Đóng</button> -->
            </div>
          </form>
        </div>
      </div>
    </div>
 
</body>
</html>
 <script>
     function openUpdateModal() {
      $('#updateModal').modal('show');
    }
            function resetForm() {
    document.getElementById("updateForm").reset();
  }
  </script>

