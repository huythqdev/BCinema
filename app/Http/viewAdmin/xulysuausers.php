<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./assets/css/main.css">
	<link href="./app.css" rel="stylesheet">
    <link rel="stylesheet" href="./base.css">
    <title>Khách Hàng</title>
</head>
<body>
    <?php
    $id = $_GET['idkh'];
     ?>
<div class="update__app">
    <div class="update__app--container">
            <form  class="form__update" action="xulySuaKH.php" method="POST">
            <input type="hidden" name="updateId" value="<?php echo $id; ?>">
            <div class="form__update--container">
                <h3 class="form__update--container--title">Chỉnh Sửa Tài Khoảng Khách Hàng</h3>
                    <div class="form__update--container__form">
                       
                    <div class="form__update--container__group">
                    <input type="text" name="updateName" class="form__update--container__input" placeholder="Cập nhật tên khách hàng">
                    </div>
                    <div class="form__update--container__group">
                        <input type="text"name="updateEmail" class="form__update--container__input" placeholder="Cập nhật email khách hàng">
                    </div>
                    <div class="form__update--container__group">
                        <input type="password"name="updatePass" class="form__update--container__input" placeholder="Cập nhật mật khẩu khách hàng">
                    </div>
                    <input type="submit" name="submit" value="Lưu" class="form__update--container__btn">
                    </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>

<?php
  if(isset($_POST['submit'])){
    $id = $_POST['updateId'];
    $tenKH = $_POST['updateName'];
    $emailKH = $_POST['updateEmail'];
    $passKH = $_POST['updatePass'];
$conn = mysqli_connect("localhost","root","","bcinema");
$sql = "UPDATE  USERS SET tenKH ='$tenKH',email ='$emailKH', pass ='$passKH'  WHERE id =$id;";
$result = mysqli_query($conn,$sql);
header("Location:adminKH.php");
}

?>