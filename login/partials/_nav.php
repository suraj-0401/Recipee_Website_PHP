<?php

if (isset($_SESSION['loggined']) && $_SESSION['loggined'] == true) {
	$loggined = true;
} else {
	$loggined = false;
}
echo '<nav class="navbar navbar-expand-lg navbar-light bg-dark bg-custom">
		<a class="navbar-brand" href="">iSecure</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse"
			data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false"
			aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active"><a class="nav-link"
					href="#">Home<span class="sr-only">(current)</span></a>
					</li>';
if (!$loggined) {
	echo '<li class="nav-item"><a class="nav-link" href="login.php">Login</a>
					</li>
					<li class="nav-item"><a class="nav-link" href="register.php">Register</a>
					</li>';

}
if ($loggined) {
	echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a>
					</li>';
}
echo '</ul>
			<form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="search"
					placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>
	</nav>'
	?>