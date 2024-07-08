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
    <title>Thêm Phim</title>
</head>
<body>
    <div class="update__app">
        <div class="update__app--container">
                <form  class="form__addProduct" action="themphim.php" method="POST">
                <div class="form__update--container">
                    <h3 class="form__update--container--title">Thêm phim</h3>
                        <div class="form__update--container__form"> 
                        <div class="form__update--container__group">
                            <input type="text" name="addTitle" class="form__update--container__input" placeholder="Thêm tên phim">
                            <input type="text" name="addImg" class="form__update--container__input" placeholder="Thêm poster ">
                        </div>
                        <div class="form__update--container__group">
                            <input type="text" name="addDate_start" class="form__update--container__input" placeholder="Thêm ngày chiếu ">
                            <input type="text"name="addDate_end" class="form__update--container__input" placeholder="Thêm ngày kết thúc">
                        </div>
                        <div class="form__update--container__group">
                            <input type="text" name="addTrailer" class="form__update--container__input" placeholder="Thêm Trailer">
                            <input type="text"name="addtime" class="form__update--container__input" placeholder="Thêm thời gian">
                        </div>
                        <div class="form__update--container__group">
                            <input type="text" name="addcensoship" class="form__update--container__input" placeholder="Thêm độ tuổi">
                            <input type="text" name="addcost" class="form__update--container__input" placeholder="Thêm giá vé">
                        </div>
                        <div class="form__update--container__group">
                            <input type="text" name="addtype" class="form__update--container__input" placeholder="Thêm mã Thể loại phim">
                            <input type="text"name="addlanguage" class="form__update--container__input" placeholder="Thêm ngôn ngữ">
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
    $Title = $_POST['addTitle'];
    $Img = $_POST['addImg'];
    $date_start = $_POST['addDate_start'];
    $Date_end = $_POST['addDate_end'];
    $Trailer = $_POST['addTrailer'];
    $Time = $_POST['addtime'];
    $censoship = $_POST['addcensoship'];
    $Cost = $_POST['addcost'];
    $Type = $_POST['addtype'];
    $Language = $_POST['addlanguage'];
   

    $conn = mysqli_connect("localhost","root","","bcinema");
   $sql = " INSERT INTO  movie(cost,trailer,date_start,date_end,time,name,censoship,poster,mount_watch,movie_type,language)
            VALUES ('$Cost','$Trailer','$date_start','$Date_end','$Time','$Title','$censoship','$Img','100','$Type','$Language')";
  $result = mysqli_query($conn,$sql);
  header("Location:danhsachphim.php");
}
?>
