<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bintang</title>
</head>
<body>
    <form action="" method="POST">
        <label for="bintang">Masukkan Bintang : </label>
        <input type="text" name="bintang" id="bintang">
        <label for="submit"></label>
        <input type="submit" name="submit" id="submit" value="Kirim">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $bintang = $_POST['bintang'];

        // for ($i = 0; $i <= $bintang; $i++) {
        //     for ($j = 1; $j <= $i; $j++) {
        //         echo "*";
        //     }
        //     echo "<br>";
        // }

        for ($i= 1; $i <= $bintang; $i++) {
            for ($j=1; $j < $bintang; $j++) { 
                echo "$i , $j <br>";
            }
        }
    }
    ?>
</body>
</html>