<!DOCTYPE html>
<html>

<head>
    <title>Membuat Kalkulator Sederhana Dengan HTML, PHP, dan CSS3</title>
    <link rel="stylesheet" type="text/css" href="style_kalkulator.css">
</head>

<body>
    <!-- membuat grup dengan nama class kalkulator -->
    <div class="kalkulator">
        <h2 class="judul">Kalkulator</h2>
        <!-- membuat form dengan method POST -->
        <form method="POST" action="">
            <input type="text" name="bil1" class="bil" autocomplete="off" placeholder="Bilangan Pertama">
            <input type="text" name="bil2" class="bil" autocomplete="off" placeholder="Bilangan Kedua">
            <select class="opt" name="operasi">
                <option value="tambah">+</option>
                <option value="kurang">-</option>
                <option value="kali">x</option>
                <option value="bagi">/</option>
                <option value="mod">%</option>
                <option value="pangkat">^</option>
            </select>
            <input type="submit" name="hitung" value="Hitung" class="tombol shadow-rounded">
        </form>
        <?php
        //isset memeriksa apakah data pd variable sudah tersedia atau belum
        if (isset($_POST['hitung'])) {
            $angka1 = $_POST['bil1'];
            $angka2 = $_POST['bil2'];
            $operasi = $_POST['operasi'];

            //fungsi untuk menghitung penjumlahan dengan 2 inputan bil1 dan bil 2
            //I.S $angka1, $angka2
            //F.S $hasil
            function penjumlahan($angka1, $angka2)
            {
                $hasil = $angka1 + $angka2;
                return $hasil;
            }
            //fungsi untuk menghitung pengurangan dengan 2 inputan bil1 dan bil 2
            function pengurangan($angka1, $angka2)
            {
                $hasil = $angka1 - $angka2;
                return $hasil;
            }
            //fungsi untuk menghitung perkalian dengan 2 inputan bil1 dan bil 2
            function perkalian($angka1, $angka2)
            {
                $hasil = $angka1 * $angka2;
                return $hasil;
            }
            //fungsi untuk menghitung pembagian dengan 2 inputan bil1 dan bil 2
            function pembagian($angka1, $angka2)
            {
                $hasil = $angka1 / $angka2;
                return $hasil;
            }
            //fungsi untuk menghitung mod atau sisa bagi dengan 2 inputan bil1 dan bil 2
            function mod($angka1, $angka2)
            {
                $hasil = $angka1 % $angka2;
                return $hasil;
            }
            //fungsi untuk menghitung pangkat dengan 2 inputan bil1 dan bil 2
            function pangkat($angka1, $angka2)
            {
                $hasil = $angka1 ** $angka2;
                return $hasil;
            }
            //membuat percabangan dengan switch case untuk membuat output hasil operasi satu-satu
            switch ($operasi) {
                case 'tambah':
                    $hasil = penjumlahan($angka1, $angka2);
                    break;
                case 'kurang':
                    $hasil = pengurangan($angka1, $angka2);
                    break;
                case 'kali':
                    $hasil = perkalian($angka1, $angka2);
                    break;
                case 'bagi':
                    $hasil = pembagian($angka1, $angka2);
                    break;
                case 'mod':
                    $hasil = mod($angka1, $angka2);
                    break;
                case 'pangkat':
                    $hasil = pangkat($angka1, $angka2);
                    break;
            }
        }
        ?>
        <?php if (isset($_POST['hitung'])) { ?>
            <input type="text" value="<?php echo $hasil; ?>" class="bil">
        <?php } else { ?>
            <input type="text" value="0" class="bil">
        <?php } ?>
    </div>
</body>

</html>