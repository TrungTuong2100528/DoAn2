<?php
// Khởi động session
session_start(); 

// Xóa tất cả các biến session
// session_unset();

// Hủy bỏ session
session_destroy();


?>
<script>
    // Chuyển hướng người dùng về trang đăng nhập sau khi đăng xuất
    window.location.href = '/WEB_TBYT/admin/loginadmin.php';
</script>