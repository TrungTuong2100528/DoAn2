
<?php
include_once __DIR__ . '/../../admin/config/db.php';

// Check the number of existing admin records
$sql_count = "SELECT COUNT(*) as count FROM `Admin`";
$query_count = mysqli_query($con, $sql_count);
$row_count = mysqli_fetch_assoc($query_count);
$count = $row_count['count'];

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Ensure there is more than one admin record before attempting to delete
    if($count > 1) {
        $sql_delete = "DELETE FROM `Admin` WHERE IDAdmin = ?";
        $stmt = mysqli_prepare($con, $sql_delete);
        mysqli_stmt_bind_param($stmt, "i", $id);
        $query_delete = mysqli_stmt_execute($stmt);

        if($query_delete) {
            header('location: admin.php');
        } else {
            echo "Xóa không thành công";
        }
    } else {
        echo "Không thể xóa. Chỉ còn một admin.";
    }
} else {
    echo "ID không hợp lệ";
}
?>
