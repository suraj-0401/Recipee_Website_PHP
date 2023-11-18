<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>login</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<style>
		.bg-custom {
			background-image: url("../images/1.jpg");
		}

		.loginform {
			background-image: url("../images/1.jpg");
			position: absolute;
			top: 10em;
			left: 30em;
			width: 26em;
			height: 30em;
			margin: 8px;
			padding: 8px;
			border-radius: 10px;
		}

		.icon {
			text-align: center;
			background: red;
		}

		body {
			background-image: url("../images/1.jpg");
		}

		#back {
			position: absolute;
			top: 524px;
			left: 599px;
			font-size: 14px;
		}
	</style>
</head>

<body>
	<?php
	$login = false;
	$showError = false;

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		include 'partials/_dbconnect.php';

		$email = $_POST['email'];
		$password = $_POST['password'];

		// $sql="select * from users where email='$email' AND password='$password'";
		$sql = "select * from users where email='$email'";
		$result = mysqli_query($conn, $sql);
		$nums = mysqli_num_rows($result);
		if ($nums == 1) {
			while ($row = mysqli_fetch_assoc($result)) {
				if (password_verify($password, $row['password'])) {

					$login = true;
					session_start();
					$_SESSION['login'] = true;
					$_SESSION['loggined'] = true;
					$_SESSION['email'] = $email;
					header('location:../nav/nav.php');
				} else {
					$showError = "invalid crendentials";
				}
			}
		} else {
			$showError = "invalid crendentials";
		}
	}
	?>
	<?php
	if ($login) {
		echo '<div class="alert alert-success alert-warning alert-dismissible fade show" role="alert">
<strong></strong> your are logged in.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
	}
	if ($showError) {

		echo '<div class="alert alert-danger alert-warning alert-dismissible fade show" role="alert">
	<strong></strong> ' . $showError . '
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>';
	}
	?>
	<div class="loginform">
		<form action="login.php" method="post">
			<div class="icon text-white">
				<i class="fa fa-user"></i>
				<h5>Login form</h5>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Email address</label> <input type="email" class="form-control"
					id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email"
					maxlength=30 required>
				<small id="emailHelp" class="form-text">We'll never share
					your email with anyone else.</small>
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Password</label> <input type="password" class="form-control"
					id="exampleInputPassword1" placeholder="Password" name="password" maxlength=20 required>
			</div>
			<div class="form-check">
				<input type="checkbox" class="form-check-input" id="exampleCheck1">
				<label class="form-check-label" for="exampleCheck1">Check me
					out</label>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
			<button type="submit" class="btn btn-primary"><a href="register.php" style="color:white;">Sign
					up?</a></button>
		</form>
	</div>
	<a href="../nav/nav.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true" id="back">Back to
		Home</a>
</body>

</html>