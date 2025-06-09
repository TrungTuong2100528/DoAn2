
<?php
include_once __DIR__ . '/../../admin/config/db.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql_delete = "DELETE FROM GioHang WHERE IDGioHang = $id";
    $query_delete = mysqli_query($con, $sql_delete);
    
    if($query_delete) {
        header('location: giohang.php');
    } else {
        echo "Xóa không thành công: " . mysqli_error($con);
    }
} else {
    echo "ID không hợp lệ";
}
?>