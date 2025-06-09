<?php
    include_once __DIR__ . '/../../admin/config/db.php';
	if(isset($_POST['dangnhap'])){
		$UserName = $_POST['UserName'];
		$Pass = $_POST['Pass'];
		$sql = "SELECT * FROM KhachHang WHERE UserName='".$UserName."' AND Pass='".$Pass."' LIMIT 1";
		$row = mysqli_query($con ,$sql);
		$count = mysqli_num_rows($row);

		if($count>0){
            session_start();
			$row_data = mysqli_fetch_array($row);
			$_SESSION['UserName'] = $row_data['UserName'];
			$_SESSION['Email'] = $row_data['Email'];
			$_SESSION['IDKhachHang'] = $row_data['IDKhachHang'];
           
            $_SESSION['tenkhachhang'] = $UserName;
            
			echo '<script>
                alert("Bạn đăng nhập thành công.");
                window.location.href = "/Web_TBYT/giaodienkhachhang/TrangChu.php";
                
              </script>';
		}else{
			echo '<script> alert("Mật khẩu hoặc tên đăng nhập sai ,vui lòng nhập lại.") </script>';
			
		}
	} 

	if (isset($_POST['dangky'])) {
        $UserName = $_POST['UserName'];
        $Email = $_POST['Email'];
        $Pass = $_POST['Pass'];
        $HoTen = $_POST['HoTen'];
        $SDT = $_POST['SDT'];
        $NgaySinh = $_POST['NgaySinh'];
        $DiaChi = $_POST['DiaChi'];
        $today = date("Y-m-d");
    
        if ($NgaySinh >= $today) {
            echo "<script>alert('Ngày sinh phải nhỏ hơn ngày hiện tại.');</script>";
        } else {
            // Check for username or email existence before insertion
            $check_sql = "SELECT * FROM KhachHang WHERE UserName='" . $UserName . "' OR Email='" . $Email . "' LIMIT 1";
            $check_result = mysqli_query($con, $check_sql);
            $check_count = mysqli_num_rows($check_result);
    
            if ($check_count > 0) {
                echo '<script>alert("Tên đăng nhập hoặc Email đã tồn tại. Vui lòng chọn tên đăng nhập hoặc Email khác.");</script>';
            } else {
                $sql_dangky = mysqli_query($con, "INSERT INTO KhachHang(UserName, Pass, HoTen, Email, SDT, NgaySinh, DiaChi) VALUES('" . $UserName . "','" . $Pass . "','" . $HoTen . "','" . $Email . "','" . $SDT . "','" . $NgaySinh . "','" . $DiaChi . "')");
                if ($sql_dangky) {
                    echo '<script>
                    alert("Bạn đã đăng ký thành công.");
                    window.location.href = "/Web_TBYT/admin/login/login.php";
                    </script>';
                    $_SESSION['UserName'] = $UserName;
                    $_SESSION['Email'] = $Email;
                    $_SESSION['IDKhachHang'] = mysqli_insert_id($con);
                } else {
                    echo '<script>alert("Đăng ký thất bại. Vui lòng thử lại.");</script>';
                }
            }
        }
    }
    

   
    
    // Xử lý quên mật khẩu
if(isset($_POST['quenmatkhau'])){
    $Email = $_POST['Email'];
    $sql = "SELECT * FROM KhachHang WHERE Email='".$Email."' LIMIT 1";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if($count > 0){
        // Lấy lại mật khẩu từ cơ sở dữ liệu và hiển thị trong alert
        $row_data = mysqli_fetch_array($result);
        $password = $row_data['Pass'];

        echo '<script>
            alert("Mật khẩu của bạn là: '.$password.'");
        </script>';
    } else {
        echo '<script>
            alert("Email không tồn tại. Vui lòng kiểm tra lại.");
        </script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

         
    
</head>
<style>

body{
    width: 67%;
    height: 100vh;
    width: 100%;
    background: url("../img_login/Desktop-Best-And-Website-background-2560x1600.jpg");
    
    background-size:cover ;
    
  
}
.background{
    background: url(backgroun3.jpg) no-repeat;
    background-position: center;
    background-size:cover ;
    height: 100vh;
    width: 100%;
    filter: blur(10px);
}

.header{
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: 25px 13%;
    background: transparent;
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 100;
}
.search-bar{
    width: 250px;
    height: 45px;
    background-color: transparent;
    border: 2px solid #fff;
    border-radius: 6px;
    display: flex;
    align-items: center;
}
.search-bar input{
    width: 100%;
    background-color: transparent;
    border: none;
    outline: none;
    color: #fff;
    font-size: 16px;
    padding-left: 10px;
}
.search-bar button{
    width: 40px;
    height: 100%;
    background: transparent;
    outline: none;
    border: none;
    color: #fff;
    cursor: pointer;
}
.search-bar input::placeholder{
    color: #fff;
}
.search-bar button i{
    font-size: 22px;
}
.container{
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%,-50%);
    width: 70%;
    height: 550px;
    margin-top: 20px;
    background:
    url(../img_login/backgroun3.jpg) no-repeat;
    background-position: center;
    background-size:cover ;
    border-radius: 20px;
     overflow: hidden;
     backdrop-filter: blur(10px);
     filter: hue-rotate(240deg) saturate(100%); 

    
}
.item{
    position: absolute;
    top: 0;
    left: 0;
    width: 58%;
    height: 100%;
    color: #fff;
    background: transparent;
    padding: 80px;
    display: flex;
    justify-content: space-between;
    flex-direction: column;
    
    


}

.item .logo{
    color: #fff;
    font-size: 30px;
   

}
.item .logo img{
    width: 100px;
            height: 100px; 
            margin-left: 100px;
            filter: invert(100%);
            
}
.item .logo p{
    margin-left: 100px;
}
.text-item h2{
    font-size: 40px;
    line-height: 1;
}
.text-item p{
    font-size: 16px;
    margin: 20px 0;
}
.social-icon a i{
    color: #fff;
    font-size: 24px;
    margin-left: 10px;
    cursor: pointer;
    transition: .5s ease;
}
.social-icon a:hover i{
    transform: scale(1.2);
}
.container .login-section{
    position: absolute;
    top: 0;
    right: 0;
    width: calc(100% - 58%);
    height: 100%;
    color: #fff;
    margin-top: -10px;
}
.login-section .create-account a {
    color: rgb(208, 196, 26); 
}
.login-section .form-box{
    position: absolute;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 500px;
    height: 600px;
 
}
.login-section .form-box.register{
    transform: translateX(430px);
    transition: transform .6s ease;
    transition-delay: 0s;
    width:  510px;
}
.login-section.active .form-box.register{
    transform: translateX(0px);
    transition-delay: .10s;
}

.login-section .form-box.login{
    transform: translateX(0px);
    transition: transform .6s ease;
    transition-delay: 0.7s;
}
.login-section.active .form-box.login{
    transform: translateX(430px);
    transition-delay: 0s;
}



.login-section .form-box h2{
    text-align: center;
    font-size: 25px;
}

.form-box .input-box{
    width: 340px;
    height: 20px;
    border-bottom: 2px solid#fff;
    margin: 25px 0;
    position: relative;
    
 
}
.form-box input{
    background: #fff;
    width: 100%;
    height: 45px;
    outline: none;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    background: #f72d7a;
    font-size: 16px;
    color: #fff;
    box-shadow: rgba(0,0,0,0.4);
}
.input-box input{
    width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
    font-size: 16px;
    padding-right: 28px;


}
.input-box label{
    position: absolute;
    top: 50%;
    left: 0;
    transform: translateY(-50%);
    font-size: 16px;
    font-weight: 600px;
    pointer-events: none;
    transition: .5s ease;

}
.input-box .icon{
    position: absolute;
    top: 13px;
    right: 0;
    font-size: 19px;
}
.input-box input:focus~ label,
.input-box input:valid~ label{
    top: -5px;
}
.remember-password{
    font-size: 14px;
    font-weight: 500;
    margin: -15px 0 15px ;
    display: flex;
    justify-content: space-between;
}
.remember-password label input{
    accent-color: #fff;
    margin-right: 3px;

}
.remember-password a{
    color: #fff;
    text-decoration: none;
}
.remember-password a:hover{
    text-decoration: underline;
}
.btn{
    background: #fff;
    width: 100%;
    height: 45px;
    outline: none;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    background: #f72d7a;
    font-size: 16px;
    color: #fff;
    box-shadow: rgba(0,0,0,0.4);

}
.create-account{
    font-size: 14.5px;
    text-align: center;
    margin: 25px;
}
.create-account p a{
    color: #fff;
    font-weight: 600px;
    text-decoration: none;
}
.create-account p a:hover{
    text-decoration: underline;
}


.login-section .forgot-password{
    width: 400px;
    margin-top: 110px;
}


</style>
<body>

    <div class="background"></div>
    <div class="container">
        <div class="item">
           
            <div class="text-item">
                <h2>Welcome! <br><span>
                    Cửa  hàng
                </span></h2>
                <p>Website bán thiết bị y tế rất hân hạnh chào đón</p>
                <div class="social-icon">
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-twitter'></i></a>
                    <a href="#"><i class='bx bxl-youtube'></i></a>
                    <a href="#"><i class='bx bxl-instagram'></i></a>
                    <a href="#"><i class='bx bxl-linkedin'></i></a>
                </div>
            </div>
        </div>
        <div class="login-section">
            <div class="form-box login">
                <form action="" autocomplete="off" method="POST" >
                    <h2>Đăng nhập</h2>

                    <div class="input-box">
                        <span class="icon"><i ></i></span>
                        <input type="text" name="UserName" required oninvalid="this.setCustomValidity('Vui lòng nhập tên tài khoản')" oninput="this.setCustomValidity('')">
                        <label >Tên tài khoản</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i  ></i></span>
                        <input type="password" name="Pass" required oninvalid="this.setCustomValidity('Vui lòng nhập mật khẩu')" oninput="this.setCustomValidity('')">
                        <label>Mật khẩu</label>
                    </div>
                    <div class="remember-password">
                        
                        <a  href="#" id="forgot-password" >Quên mật khẩu</a>
                    </div>
                  
                    <input type="submit" name="dangnhap" value="Đăng nhập"></td>
                    <div class="create-account">
                        <p> Để tạo tài khoản lick vào đây ?  <a href="#" class="register-link">Đăng ký</a></p>
                    </div>
                </form>
            </div>
            <div class="form-box register">
                <form action="" method="POST">

                    <h2>Đăng ký</h2>

                    <div class="input-box">
                        <span class="icon"><i ></i></span>
                        <input type="text" name="UserName" required oninvalid="this.setCustomValidity('Vui lòng nhập tên tài khoản')" oninput="this.setCustomValidity('')">
                        <label >Tên tài khoản</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i ></i></span>
                        <input type="password" name="Pass" required oninvalid="this.setCustomValidity('Vui lòng nhập mật khẩu')" oninput="this.setCustomValidity('')">
                        <label >Mật khẩu</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i></i></span>
                        <input type="Text" name="HoTen" required oninvalid="this.setCustomValidity('Vui lòng nhập họ và tên')" oninput="this.setCustomValidity('')">
                        <label>Họ và tên</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i ></i></span>
                        <input type="email" name="Email" required oninvalid="this.setCustomValidity('Vui lòng nhập  email')" oninput="this.setCustomValidity('')">
                        <label >Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i ></i></span>
                        <input type="number" name="SDT" required oninvalid="this.setCustomValidity('Vui lòng nhập số điện thoại')" oninput="this.setCustomValidity('')">
                        <label >SDT</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i  ></i></span>
                        <input type="date" name="NgaySinh" required oninvalid="this.setCustomValidity('Vui lòng nhập ngày sinh')" oninput="this.setCustomValidity('')">
                       
                    </div>
                    <div class="input-box">
                        <span class="icon"><i></i></span>
                        <input type="text" name="DiaChi" required oninvalid="this.setCustomValidity('Vui lòng nhập địa chỉ')" oninput="this.setCustomValidity('')">
                        <label>Địa chỉ</label>
                    </div>

                    <td><input type="submit" name="dangky" value="Đăng ký"></td>
                    <div class="create-account">
                        <p>Để đăng nhập lick vào đây? <a href="#" class="login-link">Đăng nhập</a></p>
                    </div>
                </form>
            </div>
             <!-- Form lấy lại mật khẩu -->
             <div class="form-box forgot-password" style="display: none;">
                <form action="" method="POST">
                    <h2>Quên mật khẩu</h2>

                    <div class="input-box">
                        <span class="icon"><i></i></span>
                        <input type="email" name="Email" required oninvalid="this.setCustomValidity('Vui lòng nhập email')" oninput="this.setCustomValidity('')">
                        <label>Email</label>
                    </div>

                    <input type="submit" name="quenmatkhau" value="Gửi mật khẩu">
                </form>
            </div>
        </div>
    </div> 
  

   
 </body>
<script>
const loginsec = document.querySelector('.login-section');
const loginlink = document.querySelector('.login-link');
const registerlink = document.querySelector('.register-link');
registerlink.addEventListener('click', () => {
    loginsec.classList.add('active');
});
loginlink.addEventListener('click', () => {
    loginsec.classList.remove('active');
});

// Xử lý sự kiện "Quên mật khẩu"
document.getElementById('forgot-password').addEventListener('click', function(event) {
    event.preventDefault();
    // Hiển thị form quên mật khẩu
    document.querySelector('.login-section .form-box.login').style.display = 'none';
    document.querySelector('.login-section .form-box.register').style.display = 'none';
    document.querySelector('.login-section .form-box.forgot-password').style.display = 'block';
});

let currentLink = null;
document.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', function(event) {
        if (currentLink !== null) {
            currentLink.style.color = ''; // Reset màu của liên kết trước đó
        }
        this.style.color = 'red'; // Thay đổi màu của liên kết được nhấp vào
        currentLink = this; // Lưu trữ liên kết hiện tại
    });
});


    </script>


</html>


