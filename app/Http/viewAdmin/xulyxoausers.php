<?php
session_start();
$conn = mysqli_connect("localhost","root","","bcinema");
$sql = ' DELETE FROM  users WHERE id ='.$_GET['idnd'];
$result = mysqli_query($conn,$sql);
header("Location:users.php");
?>