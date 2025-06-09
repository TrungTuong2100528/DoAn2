<?php
include_once __DIR__ . '/../../admin/config/db.php';

$id = $_GET['id'];
$sql_delete = "DELETE FROM ThuongHieu WHERE IDThuongHieu = $id";
$query_delete = mysqli_query($con, $sql_delete);
header('location: thuonghieu.php');

?>
