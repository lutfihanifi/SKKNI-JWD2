<?php
include "koneksi.php";

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>BPPTIK</title>

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
            <!-- Main -->
            <main class="container">
                <section class="konten">
                    <h1 class="judul" style="text-align: center;">Data User</h1>
                    <div class="col new-arc text-end pe-4">
                        <a href="tambah_user.php"><button class="btn rounded-pill btn-nw-adm fa fa-plus-circle">
                                <span class="ps-2"> Tambahkan User</span>
                            </button></a>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nama lengkap</th>
                                <th scope="col">Email</th>
                                <th scope="col">Nim</th>
                                <th scope="col">No Telp</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM `user`";
                            $data = $conn->query($sql);
                            foreach ($data as $index => $value) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $value['id_user'] ?></th>
                                    <td><?php echo $value['nama_lengkap'] ?></td>
                                    <td><?php echo $value['email'] ?></td>
                                    <td><?php echo $value['nim'] ?></td>
                                    <td><?php echo $value['no_telp'] ?></td>
                                    <td>
                                        <div class="pt-2">
                                            <a href="edit_registrasi.php?id=<?= $value['id_user']  ?>" style="text-decoration: none; color:white"><button type="button" class="btn btn-success rounded-pill">Edit</button></a>
                                            <a href="delete_user.php?id=<?= $value['id_user'] ?>" style="text-decoration: none; color:white"><button type="button" class="btn btn-danger rounded-pill"> Hapus</button></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </section>
            </main>


            <div class="cleaner">&nbsp;</div>
            <div class="cleaner">&nbsp;</div>
            <div class="footer">
                Copyright &copy; 2021 - Lutfi Hanif Imannudin
            </div>
        </div>




        <!-- jQuery CDN -->
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <!-- Bootstrap Js CDN -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#sidebarCollapse').on('click', function() {
                    $('#sidebar').toggleClass('active');
                });
            });
        </script>
</body>

</html>