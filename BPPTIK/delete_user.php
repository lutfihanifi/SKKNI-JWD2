<?php
include "koneksi.php";
    $id = $_GET["id"];
	$nama_lengkap = $_POST['nama_lengkap'];
	$email = $_POST['email'];
	$nim = $_POST['nim'];
    $no_telp = $_POST['no_telp'];


    $query="DELETE FROM user WHERE id_user = $id";
    mysqli_query($conn, $query);
    header('location: registrasi.php')
?>