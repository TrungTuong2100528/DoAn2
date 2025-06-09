<?php
include_once __DIR__ . '/../../admin/config/db.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Kiểm tra xem có bài viết nào của nhân viên này không
    $sql_check = "SELECT COUNT(*) AS count FROM BaiViet WHERE IDNhanVien = $id";
    $query_check = mysqli_query($con, $sql_check);
    $result_check = mysqli_fetch_assoc($query_check);
    $count = $result_check['count'];

    if($count == 0) {
        // Xóa nhân viên nếu không có bài viết nào
        $sql_delete = "DELETE FROM NhanVien WHERE IDNhanVien = $id";
        $query_delete = mysqli_query($con, $sql_delete);
        
        if($query_delete) {
            header('location: nhanvien.php');
        } else {
            echo "Xóa không thành công: " . mysqli_error($con);
        }
    } else {
        echo "Không thể xóa nhân viên này vì còn bài viết liên quan";
    }
} else {
    echo "ID không hợp lệ";
}
?>
