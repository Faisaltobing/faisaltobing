<?php 
	require 'koneksi.php';

	if (isset($_POST["register"])) {
		
		if ( registrasi($_POST) > 0) {
			
			echo "<script>
			alert('Registrasi berhasil');
			</script>";
		}else {
			echo mysqli_error($conn);
		}
	}
	
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>register</title>
	<style type="text/css">
		body {
			font-family: sans-serif;
		}
		.regis {
			padding: 2em;
			margin: 6em auto;
			width: 17em;
		}
	</style>
</head>
<body>

	<div class="regis">
		<h2>Register</h2>
		<form action="" method="post">
		<table>
			<tr>
				<td>
					username
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
				<td>
					Konfirmasi Password
				</td>
				<td>
					<input type="password" name="password2" placeholder="Konfirmasi password" required="required">
				</td>
			</tr>
			<tr>
				<td>
					level
				</td>
				<td>
					<input type="text" name="level" placeholder="level">
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" name="register" value="Register">
				</td>
			</tr>
		</table>
	</form>
	</div>

</body>
</html>