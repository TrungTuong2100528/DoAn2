<?php
	session_start();
	include('config/db.php');
	if(isset($_POST['dangnhap'])){
		$taikhoan = $_POST['UserName'];
		$matkhau = $_POST['Pass'];
		// Kiểm tra trong bảng Admin
		$sql_admin = "SELECT * FROM `Admin` WHERE UserName='".$taikhoan."' AND Pass='".$matkhau."' LIMIT 1";
		$result_admin = mysqli_query($con,$sql_admin);
		$count_admin = mysqli_num_rows($result_admin);
		// Kiểm tra trong bảng NhanVien
		$sql_nv = "SELECT * FROM `NhanVien` WHERE UserName='".$taikhoan."' AND Pass='".$matkhau."' LIMIT 1";
		$result_nv = mysqli_query($con,$sql_nv);
		$count_nv = mysqli_num_rows($result_nv);
		if($count_admin > 0){
			$_SESSION['dangnhap'] = $taikhoan;
			$_SESSION['UserNamead'] = $taikhoan;
			header("Location: /WEB_TBYT/admin/taikhoanadmin/admin.php");
		}elseif($count_nv > 0){
			$_SESSION['dangnhap_nv'] = $taikhoan;
			$_SESSION['UserName_nv'] = $taikhoan;
			header("Location: /WEB_TBYT/admin/nhanvien/nhanvien.php");
		}else{
			echo '<script>
                alert("Tài khoản hoặc Mật khẩu không đúng, vui lòng nhập lại.");
                window.location.href = "loginadmin.php";
              </script>';
		}
	} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Đăng nhập Admin</title>
	<style type="text/css">
		body {
  background-color: #f2f2f2;
  font-family: Arial, sans-serif;  /* Set a default font */
}

.wrapper-login {
  width: 600px;  /* Increase width for better appearance on most screens */
  margin: 200px auto;
  padding: 40px;
  border: 3px solid #ccc;
  border-radius: 10px;  /* Add rounded corners */
  box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);  /* Add subtle shadow */
}

table.table-login {
  width: 100%;
  border-collapse: collapse;
}

table.table-login tr td {
  padding: 20px;
  text-align: left;  /* Align text to the left */
}

h3 {
  text-align: center;  /* Center the heading */
  margin-bottom: 45px;
}

input[type="text"],
input[type="password"] {
  width: 100%;
  padding: 5px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

input[type="submit"] {
  width: 100%;
  padding: 10px;
  background-color: #4CAF50;  
  color: white;
  border: none;
  border-radius: 3px;
  cursor: pointer;  
}




	</style>
</head>
<body>
<div class="wrapper-login">
	<form action="" autocomplete="off" method="POST">
		<table class="table-login" style="text-align: center;border-collapse: collapse;">
			<tr>
				<td colspan="2"><h3>Đăng nhập Admin</h3></td>
			</tr>
			<tr>
				<td>Tài khoản</td>
				<td><input type="text" name="UserName"></td>
			</tr>
			<tr>
				<td>Mật khẩu</td>
				<td><input type="password" name="Pass"></td>
			</tr>
			<tr>
				
				<td colspan="2"><input type="submit" name="dangnhap" value="Đăng nhập"></td>
			</tr>
	</table>
	</form>

</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>
