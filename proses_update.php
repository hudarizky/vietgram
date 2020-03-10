<?php 
	session_start();
	include 'koneksi.php';

	$name = $_POST["name"];
	$username = $_POST["username"];
	$website = $_POST["website"];
	$bio = $_POST["bio"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	$gender = $_POST["gender"];

	$query_user = mysqli_query($koneksi, sprintf("update user set username = '%s', email = '%s' where id = %d", $username, $email, $_SESSION["user"]["user_id"]));
	$query_profile = mysqli_query($koneksi, sprintf("update profile set name = '%s', website = '%s',  bio = '%s', phone = '%s', gender = '%s' where user_id = %d", 
		$name,
		$website,
		$bio,
		$phone,
		$gender,
		$_SESSION["user"]["user_id"]
	));

	$query_update = mysqli_query($koneksi, "SELECT * FROM user JOIN profile ON user.id = profile.user_id WHERE profile.user_id = '" . $_SESSION["user"]["user_id"] . "'");

	$_SESSION["user"] = mysqli_fetch_assoc($query_update);

	header("Location: profile.php");
 ?>