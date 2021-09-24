<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" concept="width=device-width, initial-scale=1.0">
    <title> Pengecekan Plat Nomor</title>
</head>
<body>
   <table>
       <!--membuat form menggunakan method post -->
       <form action="" method="POST">
           <tr>
               <td><label>Nomor Polisi</label></td>
               <td><input type="text" name="noPolisi" id="noPolisi"></td>
           </tr>
                <td><button type="submit" value="Kirim" name="Kirim">Cek</button></td>
                <td></td>
            </tr>
       </form>
   </table>

   <?php
   if(isset($_POST['Kirim'])){ //memeriksa apakah variable $_POST['Kirim'] telah tersedia atau belum
       $noPolisi = $_POST['noPolisi']; //membuat variable baru untuk data variable yang sudah tersedia

       $tanggalHariIni = date("d"); //membuat variable tanggal hari ini
       $tanggalGanjil = ($tanggalHariIni % 2)== 1; //membuat variable untuk tanggalan ganjil
       
       $noPolisiFiltered = filter_var($noPolisi, FILTER_SANITIZE_NUMBER_INT); //memfilter semua karakter kecuali angka/digit
       $noPolisiGanjil = ($noPolisiFiltered % 2) == 1; //membuat variable untuk no polisi yg ganjil

       echo "Tanggal Hari Ini: ".$tanggalHariIni."<br>"; //menampilkan tanggal hari ini

       if($noPolisiGanjil == $tanggalGanjil){ //membuat fungsi if-else untuk no polisi ganjil disamakan dengan tanggalan ganjil
           echo "[Hasil: Kendaraan ".$noPolisi." diizinkan lewat.]"; //untuk no polisi genap akan menyesuaikan atau berkebalikan dengan fungsi no polisi ganjil
       }else{
           echo "[Hasil: Kendaraan ".$noPolisi." dilakukan penilangan.]";
       }
   }
   ?> 

</body>