<?php
include "koneksi.php";
$id = $_GET["id"];
$data = "SELECT * FROM user WHERE id_user = $id";
$data_user = $conn->query($data)->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- CSS only -->
    <link rel="stylesheet" href="../BPPTIK/assets/css/style.css">
    <!-- icon -->
    <link rel="icon" href="../BPPTIK/assets/images/logo_kecil.png">
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <a href="index.html">
                    <h3><img src="../BPPTIK/assets/images/logo_bpptik.png" alt="" width="200px"></h3>
                </a>
                <a href="index.html"><strong><img src="../BPPTIK/assets/images/logo_kecil.png" alt="" width="50px"></strong></a>
            </div>

            <ul class="list-unstyled components">

                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="glyphicon glyphicon-home"></i>
                        Home
                    </a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li><a href="pelatihan.html">Pelatihan</a></li>
                        <li><a href="sertifikasi.html">Sertifikasi</a></li>
                        <li><a href="jadwal.html">Jadwal</a></li>
                        <li><a href="berita.html">Berita</a></li>
                        <li><a href="artikel.html">Artikel</a></li>
                        <li><a href="registrasi.html">Registrasi</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#profileSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="glyphicon glyphicon-user"></i>
                        Profil
                    </a>
                    <ul class="collapse list-unstyled" id="profileSubmenu">
                        <li><a href="profil_singkat.html">Profil Singkat</a></li>
                        <li><a href="sejarah.html">Sejarah</a></li>
                        <li><a href="tugasfungsi.html">Tugas dan Fungsi</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#galeriSubmenu" data-toggle="collapse" aria-expanded="false">
                        <i class="glyphicon glyphicon-film"></i>
                        Galeri
                    </a>
                    <ul class="collapse list-unstyled" id="galeriSubmenu">
                        <li><a href="foto.html">Foto</a></li>
                        <li><a href="video.html">Video</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-default">
                <div class="container-fluid">

                    <div class="navbar-header">
                        <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                            <i class="glyphicon glyphicon-align-left"></i>
                            <span>Menu</span>
                        </button>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="pelatihan.html">Pelatihan</a></li>
                            <li><a href="sertifikasi.html">Sertifikasi</a></li>
                            <li><a href="jadwal.html">Jadwal</a></li>
                            <li><a href="berita.html">Berita</a></li>
                            <li><a href="artikel.html">Artikel</a></li>
                            <li><a href="registrasi.html">Registrasi</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container">
                <form action="edit_user.php?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data">
                    <div class="edit-profile-user">
                        <div class="col-md pb-3 ps-4 pt-4">
                            <div class="row justify-content-center">
                            </div>
                            <div class="row" style="margin-bottom: 10px;">
                                <label for="inputFname" class="col-sm-4">Nama
                                    Lengkap</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" value="<?= $data_user['nama_lengkap'] ?>" id="" name="nama_lengkap" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="row" style="margin-bottom: 10px;">
                                <label for="inputEmail" class="col-sm-4">Email</label>
                                <div class="col-sm-7">
                                    <input type="email" class="form-control" id="" name="email" value="<?= $data_user['email'] ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md pb-3 ps-4 pt-1">
                            <div class="row" style="margin-bottom: 10px;">
                                <label for="inputnim" class="col-sm-4">NIM</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="" name="nim" value="<?= $data_user['nim'] ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md pb-3 ps-4 pt-1">
                            <div class="row" style="margin-bottom: 10px;">
                                <label for="inputPassword" class="col-sm-4">No Telp</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="inputTelp" name="no_telp" value="<?= $data_user['no_telp'] ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group d-grid text-right" style="margin-top: 10px;">
                        <a href="registrasi.php"><button type="button" style="text-decoration: none; color:white;" class="btn btn-danger text-right" name="cancel">Batal</button></a>
                        <input id="btn-signup" type="submit" name="submit" class="btn btn-success" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
</body>

</html>