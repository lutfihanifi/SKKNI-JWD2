<?php

	//array barang
	//baris1: merk coach, baris2: merk guess, baris3: merk zara, kolom1: member, kolom2: nonmember
$barang = array (
	array(2000000, 3000000), //indeks 0
	array(1500000, 2000000), //indeks 1
	array(1200000, 1500000)); //indeks 2
$pajak = 100000;

	//	Menentukan merk berdasarkan baris array
function jenisMerk($merk){
	if ($merk == "Guess"){
		$barangB = 0;
	}
	elseif ($merk == "Zara"){
		$barangB = 1;
	}elseif ($merk == "Coach"){
		$barangB = 2;
	}
	return $barangB;
}

	//	Menentukan jenis member berdasarkan kolom array
function jenisMember($member){
	if ($member == "Member" ){
		$barangK = 0;
	}
	elseif ($member == "Non-Member" ){
		$barangK = 1;
	}
	return $barangK;
}

	//	Menghitung harga barang
function hitungBarang($barang, $member, $merk){
	$barangB = jenisMerk($merk);
	$barangK = jenisMember($member);
	$hargaBarang = $barang[$barangB][$barangK];
	return $hargaBarang;
}

//	Menghitung total harga barang yang dikalikan dengan jumlah
function totalHarga($barang, $member, $merk, $jumlah, $pajak){
	$hargaBarang = hitungBarang($barang, $member, $merk);
	$totalHarga = ($hargaBarang  * $jumlah) + $pajak;
	return $totalHarga;
}

//	Array jenis tas
	$jenis = ["Sling Bag", "Hand Bag","Tote Bag", "Ransel", "Clutch"];

//	Mengurutkan array
	sort($jenis);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Perhitungan Harga Tas Toko XYZ</title>
	<!-- Memanggil CSS. -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
	
	<h3>Perhitungan Harga Tas Toko XYZ</h3>
	<!-- Form untuk memasukkan data pelanggan. -->
	<table style="width:100%">
		<form action="" method="post" id="formTagihan">
			<tr>
				<!-- nomor transaksi -->
				<td><label for="nomor">Nomor Transaksi:</label></td>
				<td><input type="number" id="nomor" name="nomor"></td>
			</tr>
			<tr>
				<!-- Masukan data jenis. -->
				<td><label for="jenis">Jenis Tas:</label></td>
				<td><select id="jenis" name="jenis">
					<option value="">- Jenis Tas -</option>
					<?php
						
						foreach ($jenis as $jenisTas) {
							echo "<option value=".$jenisTas.">".$jenisTas."</option>";
						}
					?>	
				</select></td>
			</tr>
			<tr>
				<!-- jenis member -->
				<td><label for="member">Jenis Member:</label></td>
				<td>
					<input type="radio" name="member" value="Non-Member">
					<label for="Non-Member">Non-Member</label><br>
					<input type="radio" name="member" value="Member">
					<label for="Member">Member</label><br>
				</tr>
				<tr>
					<!-- merk -->
					<td><label for="merk">Pilih Merk:</label></td>
					<td><select name="merk" id="merk">
						<option>- Pilihan -</option>
						<option value="Guess">Guess</option>
						<option value="Zara">Zara</option>
						<option value="Coach">Coach</option>
					</select></td>
				</tr>
				<tr>
					<!-- Jumlah Barang -->
					<td><label for="nomor">Jumlah Barang:</label></td>
					<td><input type="number" id="jumlah" name="jumlah"></td>
				</tr>
				<tr>
					<!-- Tombol Hitung/Submit -->
					<td><button type="submit" form="formTagihan" value="Hitung" name="Hitung" class="btn btn-primary">Hitung</button></td>
					<td></td>
				</tr>
			</form>
		</table>

		<p><br><br>


			<?php
			if(isset($_POST['Hitung'])) {
				$jumlah = $_POST['jumlah'];
				
				//	Memanggil fungsi totalHarga untuk ditampilkan pada tabel
				$bill = totalHarga($barang, $_POST['member'],$_POST['merk'], $jumlah, $pajak);
				
				//	Menampilkan bill
				echo "
				<table style='width:500px' class='table table-success table-striped'>
				<tr>
				<!-- Menampilkan Nomor Transaksi -->
				<td>Nomor Transaksi:</td>
				<td>".$_POST['nomor']."</td>
				</tr>
				<tr>
				<!-- Menampilkan Jenis Tas -->
				<td>Jenis Tas:</td>
				<td>".$_POST['jenis']."</td>
				</tr>
				<tr>
				<!-- Menampilkan Jenis Member -->
				<td>member:</td>
				<td>".$_POST['member']."</td>
				</tr>
				<tr>
				<!-- Menampilkan Merk Barang -->
				<td>Merk Barang:</td>
				<td>".$_POST['merk']."</td>
				</tr>
				<tr>
				<!-- Menampilkan Harga Barang -->
				<td>Harga Barang:</td>
				<td>Rp ".number_format(hitungBarang($barang, $_POST['member'],$_POST['merk']), 0, ".", ".").",-</td>
				</tr>
				<tr>
				<!-- Menampilkan Jumlah Barang -->
				<td>Jumlah Barang:</td>
				<td>".$_POST['jumlah']."</td>
				</tr>
				<tr>
				<!-- Menampilkan Total Harga -->
				<td>Total Harga:</td>
				<td>Rp ".number_format($bill, 0, ",", ",").",-</td>
				</tr>
				</table>
				";
			}
			?>

		</body>
		</html>