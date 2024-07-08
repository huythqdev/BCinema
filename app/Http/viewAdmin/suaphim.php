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
    <title>Thêm sản phẩm</title>
</head>
<body>
    <?php
    $id = $_GET['idkh'];
    ?>
   <div class="update__app">
        <div class="update__app--container">
                <form  class="form__addProduct" action="suaphim.php" method="POST">
                <div class="form__update--container">
                    <h3 class="form__update--container--title">Chỉnh Sửa Phim</h3>
                        <div class="form__update--container__form"> 
                        <div class="form__update--container__group">
                            <input type="hidden" name="updateId" value="<?php echo $id; ?>">
                            <input type="text" name="addTitle" class="form__update--container__input" placeholder="Sửa tên phim">
                            <input type="text" name="addImg" class="form__update--container__input" placeholder="Sửa poster ">
                        </div>
                        <div class="form__update--container__group">
                            <input type="text" name="addDate_start" class="form__update--container__input" placeholder="Sửa ngày chiếu ">
                            <input type="text"name="addDate_end" class="form__update--container__input" placeholder="Sửa ngày kết thúc">
                        </div>
                        <div class="form__update--container__group">
                            <input type="text" name="addTrailer" class="form__update--container__input" placeholder="Sửa Trailer">
                            <input type="text"name="addtime" class="form__update--container__input" placeholder="Sửa thời gian">
                        </div>
                        <div class="form__update--container__group">
                            <input type="text" name="addcensoship" class="form__update--container__input" placeholder="Sửa quốc gia">
                            <input type="text" name="addcost" class="form__update--container__input" placeholder=" Sửa giá vé">
                        </div>
                        <div class="form__update--container__group">
                            <input type="text" name="addtype" class="form__update--container__input" placeholder="Sửa mã Thể loại phim">
                            <input type="text"name="addlanguage" class="form__update--container__input" placeholder="Sửa ngôn ngữ">
                        </div>
                         <
                        <input type="submit" name="submit" value="Lưu" class="form__addProduct--btn">
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
    $Title = $_POST['addTitle'];
    $Img = $_POST['addImg'];
    $Date_start = $_POST['addDate_start'];
    $Date_end = $_POST['addDate_end'];
    $Trailer = $_POST['addTrailer'];
    $Time = $_POST['addtime'];
    $Censoship = $_POST['addcensoship'];
    $Cost = $_POST['addcost'];
    $Type = $_POST['addtype'];
    $Language = $_POST['addlanguage'];

    $conn = mysqli_connect("localhost","root","","bcinema");
   $sql = " UPDATE  movie SET cost ='$Cost',trailer ='$Trailer',date_start ='$Date_start',date_end = '$Date_end' ,time ='$Time',name ='$Title',censoship ='$Censoship',poster ='$Img',mount_watch =100,
   movie_type ='$Type',language ='$Language' WHERE id =$id";
  $result = mysqli_query($conn,$sql);
  header("Location:danhsachphim.php");
}
?>
