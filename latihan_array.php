<?php
    $letak = array  ("Roma" => "Italia", 
                    "Vienna" => "Austria",
                    "New York" => "Amerika",
                    "Tokyo" => "Jepang",
                    "Kairo" => "Mesir");

    //menampilkan data asal
    foreach ($letak as $kota => $negara)
        print("$kota => $negara<br>");
    print("<hr>");

    asort($letak); //Ascending

    //menampilkan hasil asort()
    print("Hasil asort(): <br>");
    foreach ($letak as $kota => $negara)
        print("$kota => $negara<br>");
        print("<hr>");
    asort($letak); //Descending

    arsort($letak); //Ascending

    //menampilkan hasil arsort()
    print("Hasil arsort(): <br>");
    foreach ($letak as $kota => $negara)
        print("$kota => $negara<br>");
        print("<hr>");
    arsort($letak); //Descending
?>
