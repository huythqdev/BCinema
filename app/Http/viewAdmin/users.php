<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />
   <link rel="stylesheet" href="./assets/css/main.css">
   <link rel="stylesheet" href="app.css">
	<link rel="canonical" href="https://demo-basic.adminkit.io/" />

	<title>BOOKING CINEMA</title>

	<link href="./assets/css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<!-- sidebar admin -->
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
          <span class="align-middle">ADMIN-APP</span>
        </a>
				<ul class="sidebar-nav">
					
					<li class="sidebar-item active">
						<a class="sidebar-link" href="admin.php">
						  <i class="align-middle" data-feather="home"></i> <span class="align-middle">Trang chủ</span>
						</a>
					</li>
					<li class="sidebar-header">
						Quản lý tài khoảng 
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="#">
						<i class="align-middle" data-feather="user"></i> <span class="align-middle">Người Dùng</span>
						</a>
					</li>
					
					<li class="sidebar-header">
						Quảng lý Phim
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link"  href="themphim.php">
						<i class="align-middle" data-feather="arrow-up-circle"></i> <span class="align-middle">Thêm Phim</span>
						</a>
					</li>
					
					<li class="sidebar-item">
						<a class="sidebar-link" href="danhsachphim.php">
						<i class="align-middle" data-feather="list"></i> <span class="align-middle">Danh sách Phim</span>
						</a>
					</li>

					

					
				</ul>

		
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
				  <i class=" sidebar-toggle--icon hamburger align-self-center"></i>
				</a>
					<div class="navbar-collapse collapse">
						<span class="navbar_title">BOOKING CINEMA</span>
						 <div class="navbar-nav navbar-align">
                            <?php
							if(isset($_COOKIE['admin_id'] , $_COOKIE['admin_name'])){
								$admin_name = $_COOKIE['admin_name'];
							}
							?>
								<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
								<img src="https://as1.ftcdn.net/v2/jpg/04/80/90/90/1000_F_480909086_cRLJ6WJzkjBiy52hP9VcV8HVb50CkZx8.jpg" 
								class="avatar img-fluid rounded me-1" alt="avatar" /> <span class="text-dark"><?php echo $admin_name?></span>
								</a>
                             <?php

							 ?>
								<!-- tài khoảng admin -->
								<div class="dropdown-menu dropdown-menu-end">
									<a class="dropdown-item" href="RegisterAdmin.html"><i class="align-middle me-1" data-feather="user"></i> Đăng Ký</a>
									<a class="dropdown-item" href="admin.php"><i class="align-middle me-1" data-feather="pie-chart"></i> phân tích</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="xulylogoutAdmin.php">
										<i  class="align-middle" data-feather="power"></i>
										Log out
									</a>
								</div>
						 </div>
					</div>
			</nav>

				<div class="customer__container">
					<h1 class="customer__title">Quản lý tài khoản người dùng </h1>
					<table align="center" border="1px" cellspacing="0px" class="customer__table">
				
					<tr class="customer__table--navbar">
					<td class="customer__table--item" >Id</td>
					<td class="customer__table--item" >Tài khoản</td>
					<td class="customer__table--item" >Số điện thoại</td>
                    <td class="customer__table--item" >Tên người</td>
					<td class="customer__table--item" >Quê Quán</td>
					<td class="customer__table--item" >Tuổi</td>
					<td class="customer__table--item" >Hành Động</td>
					</tr>
					<?php
					 $conn = mysqli_connect("localhost","root","","bcinema");
					 $sql = " SELECT * FROM  USERS ";
					 $result = mysqli_query($conn,$sql);
					 while($row = mysqli_fetch_array($result)){
					?>	
					<tr class="customer__table--body">
						<td  class="customer__table--body-item" ><?php echo $row['id']?></td>
						<td  class="customer__table--body-item input__big" ><?php echo $row['email']?></td>
						
						<td  class="customer__table--body-item input__big" ><?php echo $row['phone']?></td>
                        <td  class="customer__table--body-item input__big" ><?php echo $row['username']?></td>
						<td  class="customer__table--body-item input__big" ><?php echo $row['address']?></td>
						<td  class="customer__table--body-item input__big" ><?php echo $row['old']?></td>
						<td  class="customer__table--body-item" > 
							<!-- <a  href="xulysuausers.php?idkh=<?php echo $row['id']?>" class="customer__table--body-btn-upd" >Sửa</a> -->
							<a href="xulyxoausers.php?idnd=<?php echo $row['id']?>" class="customer__table--body-btn-del">Xóa</a>
						</td>
					</tr>
                     <?php
					 }
					 ?>
					</table>
				</div>
		</div>
	</div>

	<script src="./assets/javascript/app.js"></script>

</body>
</html>