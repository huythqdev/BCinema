<?php
session_start();
ob_start();

$conn = mysqli_connect("localhost", "root", "", "bcinema");
if (!$conn) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}
    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['emailAdmin'];
    $password = $_POST['passwordAdmin'];

    $conn = mysqli_connect("localhost", "root", "", "bcinema");

    // Bảo mật trước SQL Injection sử dụng Prepared Statements
    $sql = "SELECT id ,tenAdmin FROM ADMINACOUNT WHERE emailAdmin = ? AND passAdmin = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $email, $password);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    // Kiểm tra xem có kết quả trả về từ truy vấn hay không
    if (mysqli_stmt_num_rows($stmt) > 0) {
       
          // Lấy thông tin khách hàng từ kết quả truy vấn
          mysqli_stmt_bind_result($stmt, $admin_id, $admin_name);
          mysqli_stmt_fetch($stmt);
  
           // Lưu thông tin khách hàng vào cookie (với thời gian sống là 1 ngày)
          setcookie('admin_id', $admin_id, time() + 3600 * 24, '/');
          setcookie('admin_name', $admin_name, time() + 3600 * 24, '/');
        
          header('Location: admin.php');
    } else {  
        header('Location: error.html');
    }
    // Đóng Prepared Statement và kết nối CSDL
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
ob_end_flush();
?>