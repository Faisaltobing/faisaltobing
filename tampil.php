<?php 
	session_start();

	if (!isset($_SESSION["login"])) {
		header("location: index.php");
		exit;
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Paisal Lumban Tobing</title>
</head>
<body>

	<h1>SELAMAT ANDA BERHASIL MELAKUKAN LOGIN</h1>

	<a href="logout.php">logout</a>

</body>
</html>