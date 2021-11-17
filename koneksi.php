<?php 

//koneksi ke database
$conn = mysqli_connect("localhost","root","","login-hash");

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$row = [];
	while( $row = mysqli_fetch_assoc($result)) {
		$row[] = $row;
	}
	return $row;
}

function registrasi($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);
	$level = mysqli_real_escape_string($conn, $data["level"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

	if (mysqli_fetch_assoc($result)) {
		echo "<script>
		alert('Maaf username sudah terdaftar!')
		</script>";
	return false;
	}

	// cek konfirmasi password
	if ( $password !== $password2) {
		echo "<script>
		alert('konfirmasi password tidak sesuai!!');
		</script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan user baru ke dalam database
	mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password','$level')");
	return mysqli_affected_rows($conn);
}

 ?>