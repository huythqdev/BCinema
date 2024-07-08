<?php
session_start(); 

// Kiểm tra xem admin đã đăng nhập chưa để hủy cookie
if (isset($_COOKIE['admin_id'])) {
    // Hủy cookie 'admin_id' và 'admin_name'
    setcookie('admin_id', '', time() - 3600, '/');
    setcookie('admin_name', '', time() - 3600, '/');
}


// Điều hướng về trang đăng nhập hoặc trang chính
header("Location: index.php");
exit();
// if (isset($_GET['logout'])) {
//     // include("xulylogin.php");
//     // exit();
// }


?>