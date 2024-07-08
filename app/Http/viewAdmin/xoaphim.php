<?php
session_start();
$conn = mysqli_connect("localhost","root","","bcinema");
$sql = ' DELETE FROM  movie WHERE id ='.$_GET['idkh'];
$result = mysqli_query($conn,$sql);
header("Location:danhsachphim.php");

?>