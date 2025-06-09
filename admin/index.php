<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="css/styleadmincp.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
</head>
<?php
 session_start();
 if(!isset($_SESSION['dangnhap'])){
 	header('Location:loginadmin.php');
 } 
?>
<body>
	<h3 class="title_admin">Welcome to Admin</h3>
	<div class="wrapper">
	<?php 
			include("config/db.php");
			
	?>
	</div>


   

</body>
</html>