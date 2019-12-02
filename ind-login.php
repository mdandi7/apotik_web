<!-- <?php
include "string.php";
include "login_con.php";
$connection = mysqli_connect("localhost", "root", "", "testbas");
session_start();// Starting Session
?> -->

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $nama_aplikasi ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body class="text-center mt-5">
	<section class="container-fluid pt-5">
		<section class="row justify-content-center">
			<section class="col-12 col-sm-6 col-md-3">
				<form class="form-signin" method="post">
				  <img class="mb-3" src="4.jpg " alt="" width="75">
				  <h1 class="h3 mb-4 font-weight-normal">Please sign in</h1>
				  <input type="text" id="name" name="username"class="form-control" placeholder="Username" required autofocus><br>
				  <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
				  <div class="checkbox mb-3">
				    <label>
				     <input type="checkbox" value="remember-me"> Remember me
				    </label>
				  </div>
				  <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit"></input>
				  <p class="mt-5 mb-3 text-muted">&copy; Apotek Setiawan</p>
				  <span><?php echo $error; ?></span>
				</form>
			</section>
		</section>
	</section>
</body>

<script src="assets/jquery-3.4.1.min.js" type="text/javascript"></script>
<script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</html>
