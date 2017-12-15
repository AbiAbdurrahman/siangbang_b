<?php

	$nomorbulan = (int) pg_escape_string($_POST["bulan"]);
	$nomorterm = 0;

	if (isset($nomorbulan)) {
		
		/* localhost */
		$conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=basdatb");

		if (($nomorbulan >= 9) && ($nomorbulan <= 12)) {
			$nomorterm = 1;
		} elseif (($nomorbulan >= 1) && ($nomorbulan <= 5)) {
			$nomorterm = 2;
		} elseif (($nomorbulan >= 6) && ($nomorbulan <= 8)) {
			$nomorterm = 3;
		}

		/* kawung */
		// $conn = pg_connect("host=dbpg.cs.ui.ac.id dbname=b216 user=b216 password=bdb1622016");

		$sql = "SELECT * FROM SIANGBANG.BARANG B WHERE NOT EXISTS (SELECT LPB.kode_barang FROM SIANGBANG.PEMINJAMAN_BARANG PB, SIANGBANG.LIST_PINJAM_BARANG LPB WHERE LPB.kode_barang = B.kode_barang AND EXTRACT(Month FROM PB.tgl_selesai) = ". $nomorbulan ." AND EXTRACT(Month FROM PB.tgl_mulai) = ". $nomorbulan .")";

		$result = pg_query($conn, $sql);

		while ($row = pg_fetch_row($result)) {
			echo "<tr>
	                    <td>$row[0]</td>
	                    <td>$row[1]</td>
	                    <td>$row[3]</td>
	                    <td>$row[2]</td>
	                    <td>$row[4]</td>
	                    <td>$row[5]</td>
	              </tr>";
		}
	} else die("mohon masukkan data yang lengkap");
?>