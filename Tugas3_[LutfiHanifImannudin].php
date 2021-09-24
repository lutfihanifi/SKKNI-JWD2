<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 3</title>
</head>

<body>
    <!-- membuat form input menggunakan metode post -->
    <form action="" method="POST">
        <label>Masukkan Bilangan ke-1</label>
        <input type="number" name="bil1" id="bil1"> <br> <br>
        <label>Masukkan Bilangan ke-2</label>
        <input type="number" name="bil2" id="bil2">
        <button type="submit" value="Kirim" name="Kirim">Kirim</button>
        <hr>
        <hr>
    </form>
    <?php
    //memeriksa apakah variable sudah tersedia atau belum
    if (isset($_POST['Kirim'])) {
        //membuat variabel bilangan pertama dan bilangan kedua dari data yg sudah dibawa
        $angka1 = $_POST['bil1'];
        $angka2 = $_POST['bil2'];
        //menampilkan bilangan pertama dan bilangan kedua
        echo "Bilangan Masukkan ke-1 : " . $angka1 . "<br>";
        echo "Bilangan Masukkan ke-2 : " . $angka2 . "<br>";
        echo "<br>";
    }

    //membuat fungsi penjumlahan
    function jumlah()
    {
        $angka1 = $_POST['bil1'];
        $angka2 = $_POST['bil2'];
        return ($angka1 + $angka2);
    }

    //membuat fungsi pengurangan
    function kurang()
    {
        $angka1 = $_POST['bil1'];
        $angka2 = $_POST['bil2'];
        return ($angka1 - $angka2);
    }

    //membuat fungsi pembagian
    function bagi()
    {
        $angka1 = $_POST['bil1'];
        $angka2 = $_POST['bil2'];
        return ($angka1 / $angka2);
    }

    //membuat funsgi perkalian
    function kali()
    {
        $angka1 = $_POST['bil1'];
        $angka2 = $_POST['bil2'];
        return ($angka1 * $angka2);
    }

    //membuat fungsi modulus
    function sisabagi()
    {
        $angka1 = $_POST['bil1'];
        $angka2 = $_POST['bil2'];
        return ($angka1 % $angka2);
    }

    //membuat fungsi perpangkatan
    function perpangkatan()
    {
        $angka1 = $_POST['bil1'];
        $angka2 = $_POST['bil2'];
        return ($angka1 ** $angka2);
    }

    //menampilkan semua hasil operasi
    echo "Hasil penjumlahan adalah : ", jumlah(), "<br>";
    echo "Hasil pengurangan adalah : ", kurang(), "<br>";
    echo "Hasil perkalian adalah : ", kali(), "<br>";
    echo "Hasil pembagian adalah : ", bagi(), "<br>";
    echo "Hasil sisa bagi adalah : ", sisabagi(), "<br>";
    echo "Hasil perpangkatan adalah : ", perpangkatan(), "<br>";
    ?>

</body>

</html>