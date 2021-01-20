<?php
session_start();
include "config/koneksi.php";

//contoh login sederhana, bisa dikembang lagi

//password diamankan dengan enkripsi kriptografi md5
@$pass = md5($_POST['password']);

//mysqli_escape_string fungsinya untuk mengamankan karakter aneh yang diinputkan user, seperti sql injection

@$username = mysqli_escape_string($koneksi, $_POST['username']);
@$password = mysqli_escape_string($koneksi, $pass);
@$level = mysqli_escape_string($koneksi, $_POST['level']);

$cek_user = mysqli_query($koneksi, "SELECT * from tb_user
									WHERE username = '$username' and password = '$password' and level = '$level' ");
$user_valid = mysqli_fetch_array($cek_user);
if($user_valid)
	if($password == $user_valid['password']){
		session_start();
		$_SESSION['username'] = $user_valid['username'];
		$_SESSION['level'] = $user_valid['level'];

		if($level == "admin"){
			header('location:admin.php');
		}elseif ($level == "owner"){
			header('location:owner.php');
		}elseif ($level == "pelanggan"){
			header('location:pelanggan.php');
		}
}
else
{
	echo "<script>
			alert('Maaf, Login GAGAL, pastikan username dan password anda Benar..!');
			document.location='index.php';
		  </script>";
}

?>