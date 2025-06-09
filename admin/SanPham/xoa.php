<?php
include_once __DIR__ . '/../../admin/config/db.php';

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Kiểm tra xem có bài viết liên quan không
    $sql_check_baiviet = "SELECT COUNT(*) AS count FROM BaiViet WHERE IDSanPham = $id";
    $query_check_baiviet = mysqli_query($con, $sql_check_baiviet);
    $result_check_baiviet = mysqli_fetch_assoc($query_check_baiviet);
    $count_baiviet = $result_check_baiviet['count'];

    // Kiểm tra xem có khuyến mãi liên quan không
    $sql_check_khuyenmai = "SELECT COUNT(*) AS count FROM KhuyenMai WHERE IDSanPham = $id";
    $query_check_khuyenmai = mysqli_query($con, $sql_check_khuyenmai);
    $result_check_khuyenmai = mysqli_fetch_assoc($query_check_khuyenmai);
    $count_khuyenmai = $result_check_khuyenmai['count'];

    if($count_baiviet == 0 && $count_khuyenmai == 0) {
        // Nếu không có bài viết hoặc khuyến mãi liên quan, thực hiện xóa sản phẩm
        $sql_delete = "DELETE FROM SanPham WHERE IDSanPham = $id";
        $query_delete = mysqli_query($con, $sql_delete);
        
        if($query_delete) {
            header('location: danhsach.php');
        } else {
            echo "Xóa không thành công: " . mysqli_error($con);
        }
    } else {
        // Nếu có bài viết hoặc khuyến mãi liên quan, thông báo không thể xóa
        echo "Không thể xóa sản phẩm này vì còn bài viết hoặc khuyến mãi liên quan";
    }

} else {
    echo "ID không hợp lệ";
}
?>
