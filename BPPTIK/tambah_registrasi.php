<?php
include "koneksi.php";

	$nama_lengkap = $_POST['nama_lengkap'];
	$email = $_POST['email'];
	$nim = $_POST['nim'];
    $no_telp = $_POST['no_telp'];


    $query="INSERT INTO user (id_user, nama_lengkap, email, nim, no_telp) VALUES ('','$nama_lengkap','$email','$nim', '$no_telp')";
    mysqli_query($conn, $query);
    header('location: registrasi.php')
?>