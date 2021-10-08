<?php
session_start();
include "../koneksi.php";

$id = $_GET["id"];

$qsuper = "SELECT * from superadmin where id_superadmin = $id";
$data_superadmin = $conn->query($qsuper)->fetch_assoc();

$fname = $data_superadmin['first_name'];
$lname = $data_superadmin['last_name'];

$penulis = "SELECT * from penulis_artikel WHERE nama_penulis = '$fname $lname' OR nama_penulis = '$fname'";
$data_penulis = $conn->query($penulis)->fetch_assoc();


$qartikel = "SELECT * FROM artikel, penulis_artikel where artikel.id_penulis = penulis_artikel.id_penulis";
$data_artikel = $conn->query($qartikel);
$type = "SELECT * from penulis_artikel";

$superadmin      = "select * from superadmin WHERE id_superadmin = '$id'";
$data_superadmin = $conn->query($superadmin)->fetch_assoc();

if (isset($_SESSION['id_superadmin']) && isset($_SESSION['email'])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css" />

        <!-- CSS -->
        <link rel="stylesheet" href="../assets/style/style_artikel_superadmin.css">
        <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
        <title>JOBCARES</title>
        <link rel="icon" href="https://i.ibb.co/z89QhwV/logoheadoutliner.png" />



        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

        <script type="text/javascript" src="/media/js/site.js?_=3ce0bd53b76d94fd6dd7936dd9dbb114"></script>
        <script type="text/javascript" src="/media/js/dynamic.php?comments-page=examples%2Fstyling%2Fcompact.html" async>
        </script>
        <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" class="init">
            $(document).ready(function() {
                $('#example').DataTable();
            });
        </script>
        <style>
            .error {
                background: #F2DEDE;
                color: #A94442;
                padding: 10px;
                width: 100%;
                border-radius: 5px;
                margin: 20px auto;
            }

            .success {
                background: #D4EDDA;
                color: #40754C;
                padding: 10px;
                width: 95%;
                border-radius: 5px;
                margin: 20px auto;
            }

            .dropdown:hover .dropdown-container {
                display: block;
            }

            .vac {
                color: black;
            }

            .vac:hover {
                color: blue;
                font-weight: 500;
            }
        </style>
    </head>

    <body>
        <div class="d-flex">
            <!-- Sidebar -->
            <div class="container__sidebar d-flex flex-column flex-shrink-0 p-3 text-white bg-dark sticky-top" style="width: 18%; height: 100vh">
                <a href="overview_superadmin.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32">
                        <use xlink:href="#bootstrap" />
                    </svg>
                    <span class="fs-4">JOBCARES</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">

                    <li>
                        <a href="overview_superadmin.php?id=<?php echo "$id"; ?>" class="nav-link text-white" aria-current="page">
                            <i class="fa fa-tachometer me-3" aria-hidden="true"></i>
                            Beranda
                        </a>
                    </li>
                    <li>
                        <a href="artikel_superadmin.php?id=<?php echo "$id"; ?>" class="nav-link active">
                            <i class="fa fa-book me-3" aria-hidden="true"></i>
                            Artikel
                        </a>
                    </li>
                    <li>
                        <a href="client_superadmin.php?id=<?php echo "$id"; ?>" class="nav-link text-white">
                            <i class="fa fa-users me-3" aria-hidden="true"></i>
                            klien
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="company-superadmin.php?id=<?php echo "$id"; ?>" class="nav-link text-white">
                            <i class="fa fa-building me-3" aria-hidden="true"></i>
                            Perusahaan
                        </a>
                    </li>
                    <li>
                        <div class="dropdown">
                            <button id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-btn nav-link text-white">
                                <i class="fa fa-briefcase me-3" aria-hidden="true"></i>
                                Lowongan <i class="fa fa-caret-down pt-1" aria-hidden="true"></i>
                            </button>
                            <div class="dropdown-container ps-5" aria-labelledby="dropdownMenuButton" style="background-color: white;">
                                <div class="py-2">
                                    <a class="vac" style="text-decoration:none" href="lowongan-superadmin.php?id=<?php echo "$id"; ?>">Lowongan Tersedia</a>
                                </div>
                                <div class="pb-2">
                                    <a class="vac" style="text-decoration:none" href="arsip_lowongan_superadmin.php?id=<?php echo "$id"; ?>">Lowongan Terhapus</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="super_superadmin.php?id=<?php echo "$id"; ?>" class="nav-link text-white">
                            <i class="fa fa-superpowers me-3" aria-hidden="true"></i>
                            Super Admin
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="admin-superadmin.php?id=<?php echo "$id"; ?>" class="nav-link text-white" aria-current="page">
                            <i class="fa fa-user me-3" aria-hidden="true"></i>
                            Admin
                        </a>
                    </li>
                </ul>
                <hr>

                <div class="log-out text-white text-center">
                    <p><a href="logout.php" class="lg-ot">Keluar</a></p>
                </div>
            </div>
            <!-- Main -->
            <main class="container container__main ">
                <div class="container row mt-3 me-3">
                    <div class="col">
                        <h3>Artikel</h3>
                    </div>
                    <div class="text-end col">
                        <div class="row">
                            <div class="col text-end ms-4 pt-1">
                                <h4><?= $data_superadmin["first_name"] ?> <?= $data_superadmin["last_name"] ?></h4>
                            </div>
                            <!-- <img class="rounded-circle" src="../assets/images/profile.jpg" style="width: 55px;
                            height: 30px;" /> -->
                        </div>
                    </div>
                </div>

                <div class="container mt-3 pb-3 mb-2 rounded-3 shadow" style="background-color: white;">
                    <div class="content">
                        <div class="list_admin">
                            <div class="header row pt-3 ps-3">
                                <?php
                                if (isset($_GET['error'])) { ?>
                                    <p class="error"><?php echo $_GET['error']; ?></p>
                                <?php } ?>

                                <?php if (isset($_GET['success'])) { ?>
                                    <p class="success"><?php echo $_GET['success']; ?></p>
                                <?php } ?>
                                <div class="judul col">
                                    <p class="fw-bold">Semua Artikel</p>
                                </div>
                                <div class="col new-arc text-end pe-4">
                                    <button class="btn rounded-pill btn-nw-company fa fa-plus-circle" data-bs-toggle="modal" data-bs-target="#modalAdd"> Tulis Artikel Baru</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table" id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col" style="color: grey;">Judul</th>
                                <th scope="col" style="color: grey;">Penulis</th>
                                <th scope="col" style="color:grey">Tanggal</th>
                                <th scope="col" style="color: grey;">Akasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data_artikel as $index => $value) {
                            ?>
                                <tr>
                                    <td scope="row">
                                        <div class="tb-name">
                                            <p class="fw-bold pt-3 ps-2">
                                                <?php echo $value['judul_artikel'] ?>
                                            </p>
                                        </div>
                                    </td>
                                    <td style="margin: 8px; ">
                                        <p class="pt-3 ps-2">
                                            <?php echo $value['nama_penulis'] ?>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="pt-3 ps-2">
                                            <?php echo $value['tanggal_upload'] ?>
                                        </p>
                                    </td>
                                    <td>
                                        <div class="pt-2">
                                            <a href="edit_article_superadmin.php?id=<?= $id, '&id_artkl=', $value['id_artikel']  ?>" style="text-decoration: none; color:white"><button type="button" class="btn btn-success rounded-pill">Ubah</button></a>
                                            <button type="button" class="btn del-article-btn shadow rounded-pill" data-bs-toggle="modal"> <a href="delete_article.php?id=<?= $id ?>&id_artkl=<?php echo $value['id_artikel'] ?>" style="text-decoration: none; color:white">Hapus</a></button>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </main>
            <!-- Modal Add -->
            <div class="modal fade" id="modalAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Buat Artikel</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="add_article.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
                                <div class="edit-profile-client">
                                    <div class="row col-md-12 mt-3">
                                        <div class="col-md-4">
                                            <p for="inputFirstName" class="form-label fw-bold">Judul</p>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="text" id="inputJobName" name="judul" class="form-control shadow" required></input>
                                        </div>
                                    </div>
                                    <div class="row col-md-12 mt-3">
                                        <p for="inputLastName" class="form-label fw-bold">Isi</p>
                                        <div class="col-md-12">
                                            <textarea type="text" id="isi" rows="10" name="isi" class="form-control shadow" required></textarea>
                                        </div>
                                    </div>
                                    <div class="my-3">

                                        <input value="<?= $data_penulis['id_penulis'] ?>" name="id_penulis" type="hidden">

                                    </div>

                                    <div class="mt-3 ">
                                        <label for="gambar" class="fw-bold">Foto</label>
                                        <!-- <input type="file" name="gambar" id="gambar" required> -->
                                        <input id="file" type="file" name="gambar_contoh" />
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn cancel-btn" data-bs-dismiss="modal">Batal</button>
                                    <!-- <button type="button" class="btn save-btn shadow rounded-pill">Save</button> -->
                                    <input id="btn-signup" type="submit" name="submit" class="btn save-btn" value="Simpan">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Akhir Modal Add -->
            </div>
            <script src="../node_modules/jquery/dist/jquery.min.js" crossorigin="anonymous"></script>
            <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
            <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
            <script src="node_modules/jquery/dist/jquery.min.js" crossorigin="anonymous"></script>
            <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

            <!--Boostrap jQuery-->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
            </script>

            <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

            <script>
                /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
                var dropdown = document.getElementsByClassName("dropdown-btn");
                var i;

                for (i = 0; i < dropdown.length; i++) {
                    dropdown[i].addEventListener("click", function() {
                        this.classList.toggle("active");
                        var dropdownContent = this.nextElementSibling;
                        if (dropdownContent.style.display === "block") {
                            dropdownContent.style.display = "none";
                        } else {
                            dropdownContent.style.display = "block";
                        }
                    });
                }
            </script>
    </body>

    </html>
<?php
} else {
    header("Location: ../view_client/login.php");
    exit();
}
?>