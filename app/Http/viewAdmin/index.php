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
	<link href="./assets/css/app.css" rel="stylesheet">
	<link rel="stylesheet" href="./app.css">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<title>BEUTYBLEND-LOGIN</title>
</head>
<body>
	<main class=" admin__container--login d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="admin__container--login__title h2 ">Chào mừng đến với BEUTYBLEND </h1>
							<p class="admin__container--login__msg lead">
								Đăng nhập với tư cách quản trị viên
							</p>
						</div>

						 <div class="card">
							 <div class="card-body">
									<div class="m-sm-4">
										<form action="xulylogin.php" method="POST">
											<div class="mb-3">
												<label class="form-label">Email</label>
												<input class="form-control form-control-lg" type="email" name="emailAdmin" placeholder="Nhập Email hoặc số điện thoại của bạn" />
											</div>
											<div class="mb-3">
												<label class="form-label">Password</label>
												<input class="form-control form-control-lg" type="password" name="passwordAdmin" placeholder="Nhập mật khẩu của bạn " />
											</div>
											<div>
												<label class="form-check">
													<input class="form-check-input" type="checkbox" value="remember-me" name="remember-me" checked>
													<span class="form-check-label">Nhớ tài khoản của tôi</span>											
												</label>
											</div>
											<div class="text-center mt-3 admin__container--login__btn">
												<a href="index.php" class="admin__container--login__btn--back">Trở Lại</a>
												<div class="admin__btn--controls">
													<button type="submit" class="admin__container--login__btn--login">Đăng Nhập </button>
													<a href="register.php" class="admin__container--login__btn--login--register">Đăng ký</a>
												</div>
											</div>
										</form>
									</div>
							 </div>
					     </div>

					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="./app.js"></script>

</body>

</html>