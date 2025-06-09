<?php
include_once __DIR__ . '/../../admin/config/db.php';

$id = $_GET['id'];
$sql_delete = "DELETE FROM DanhMuc WHERE IDDanhMuc = $id";
$query_delete = mysqli_query($con, $sql_delete);
header('location: danhmuc.php');

?>
