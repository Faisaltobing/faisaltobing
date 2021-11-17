<?php 
session_start();

require 'koneksi.php';

	// cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

		//ambil username berdasarkan id
	$result = mysqli_query($conn, "SELECT username FROM user WHERE id= $id");
	$row = mysqli_fetch_assoc($result);

		// cek cookie dan username
	if ($key === hash('sha256', $row['username'])) {
		$_SESSION['login'] = true;
	}
}

if (isset($_SESSION["login"])) {
	header("location: tampil.php");
	exit;
}

if (isset($_POST["login"])) {
	$username = mysqli_real_escape_string($conn, $_POST["username"]);
	$password = mysqli_real_escape_string($conn, $_POST["password"]);

	$data_user = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

		// cek username

	if (mysqli_num_rows($data_user) === 1) {
			//cek password
		$row = mysqli_fetch_assoc($data_user);

		if (password_verify($password, $row["password"])) {

				// set session
			$_SESSION["login"] = true;
			$_SESSION["level"] = $row['level'];

				// cek remember me
			if (isset($_POST['remember'])) {
				setcookie('id', $row['id'], time()+60);
				setcookie('key', hash('sha256', $row['username']), time()+60);
			}

			header("location: tampil.php");
			exit;
		}
	}

	$error = true;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Paisal Lumban Tobing</title>
	<style type="text/css">
		body {
			font-family: sans-serif;
		}
		.login {
			padding: 2em;
			margin: 6em auto;
			width: 17em;
		}
	</style>
</head>
<body>

	<div class="login">
		<h2>Ujian Tengah Semester</h2>
		<h2>Paisal Lumban Tobing 20190801387</h2>
		<h2>Keamanan Informasi
		</h2>

		<form action="" method="post">
		<table>
			<tr>
				<td>
					Username
				</td>
				<td>
					<input type="text" name="username" placeholder="username" required="required">
				</td>
			</tr>
			<tr>
				<td>
					Password
				</td>
				<td>
					<input type="password" name="password" placeholder="password" required="required">
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" name="login" value="Login">
				</td>
			</tr>
			<tr>
				<td>
					<a href="register.php">Registrasi</a>
				</td>
			</tr>
		</table>
	</form>
	</div>

</body>
</html>