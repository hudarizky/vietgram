<?php 
	session_start();
	include 'koneksi.php';

	$username = $_POST["username"];
	$password = $_POST["password"];

	$query_login = mysqli_query($koneksi, "SELECT * FROM user JOIN profile ON user.id = profile.user_id WHERE username = '" . $username . "' and password = '" . $password . "'");

	if (mysqli_num_rows($query_login) > 0) {
			$_SESSION["user"] = mysqli_fetch_assoc($query_login);
			header("Location: feed.php");
	} else {
			header("Location: index.php");
	}
 ?>