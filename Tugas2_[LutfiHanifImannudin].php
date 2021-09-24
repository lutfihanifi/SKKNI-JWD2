<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- membuat form dengan method POST -->
    <Form action="" method="POST">
        Masukkan Bilangan : <input type="text" name="bil"> <input type="submit" name="submit">
    </Form>

    <?php
    if (isset($_POST['submit'])) { //isset untuk mengecek apakah variable $_POST['submit'] telah tersedia atau belum

        $bin = $_POST['bil']; //membuat variable baru dengan nama $bin untuk data variable $_POST['bil'] yang sudah tersedia
        for ($a = $bin; $a >= 0; $a--) { //membuat fungsi perulangan untuk mengurangi bilangan, decrement
            for ($b = 1; $b <= $a; $b++) { //membuat fungsi perulangan lg di dalam perulangan untuk membuat tingkatan bilangan, increment
                echo '(',$a,',',$b,')'; //menampilkan nilai
            }
            echo'<br>';
        }
    }
    ?>
</body>

</html>