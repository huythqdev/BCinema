<?php
session_start();
ob_start();

$conn = mysqli_connect("localhost", "root", "", "bcinema");
if (!$conn) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['createAdminName'];
    $user = $_POST['createAdminEmail'];
    $pass = $_POST['createAdminPassword'];
    
    // kiểm tra tên khách hàng và email hoặc mật khẩu có trùng không
    $conn = mysqli_connect("localhost", "root", "", "bcinema");
    $check_account = "SELECT * FROM ADMINACOUNT WHERE tenAdmin = ? OR (emailAdmin = ? AND passAdmin = ?)";
    $stmt = mysqli_prepare($conn, $check_account);
    mysqli_stmt_bind_param($stmt, 'sss', $name, $user, $pass);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
   if(!$name || !$user || !$pass ){
      die("Vui lòng nhập đủ thông tin.!");
    } else if (mysqli_stmt_num_rows($stmt) > 0) {
      die("Tên người dùng hoặc mật khẩu đã tồn tại.");
  } else{
        $create_account = " INSERT INTO ADMINACOUNT (tenAdmin, emailAdmin, passAdmin) VALUES (?, ?, ?)";
        $stmt1 = mysqli_prepare($conn,$create_account);
        mysqli_stmt_bind_param($stmt1, 'sss', $name, $user, $pass);
        mysqli_stmt_execute($stmt1);
        mysqli_stmt_store_result($stmt1);

        $sql = "SELECT id ,tenAdmin FROM ADMINACOUNT WHERE  emailAdmin = ? AND passAdmin = ?";
        $stmt2 = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt2, 'ss',  $user, $pass);
        mysqli_stmt_execute($stmt2);
        mysqli_stmt_store_result($stmt2);
        if (mysqli_stmt_num_rows($stmt2) > 0) {

            mysqli_stmt_bind_result($stmt2, $admin_id, $admin_name);
            mysqli_stmt_fetch($stmt2);
    
            // Lưu thông tin khách hàng vào cookie (với thời gian sống là 1 ngày)
          setcookie('admin_id', $admin_id, time() + 3600 * 24, '/');
          setcookie('admin_name', $admin_name, time() + 3600 * 24, '/');
        
          header('Location: admin.php');
        }
    }
      // Đóng Prepared Statement và kết nối CSDL
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
}
ob_end_flush();

?>