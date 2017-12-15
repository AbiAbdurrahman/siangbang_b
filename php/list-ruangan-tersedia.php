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

		$sqlSenin = "SELECT DISTINCT R.nama_ruangan FROM SIANGBANG.RUANGAN R WHERE NOT EXISTS (SELECT PR.kode_ruangan FROM SIANGBANG.PEMINJAMAN_RUANG PR, SIANGBANG.JADWAL J WHERE R.no_ruangan = PR.kode_ruangan AND EXTRACT(Month FROM PR.tgl_mulai) = ". $nomorbulan ." AND EXTRACT(Month FROM PR.tgl_selesai) = ". $nomorbulan ." AND R.no_ruangan = J.kode_ruangan AND J.hari = 'Senin')";

		$sqlSelasa = "SELECT DISTINCT R.nama_ruangan FROM SIANGBANG.RUANGAN R WHERE NOT EXISTS (SELECT PR.kode_ruangan FROM SIANGBANG.PEMINJAMAN_RUANG PR, SIANGBANG.JADWAL J WHERE R.no_ruangan = PR.kode_ruangan AND EXTRACT(Month FROM PR.tgl_mulai) = ". $nomorbulan ." AND EXTRACT(Month FROM PR.tgl_selesai) = ". $nomorbulan ." AND R.no_ruangan = J.kode_ruangan AND J.hari = 'Selasa')";

		$sqlRabu = "SELECT DISTINCT R.nama_ruangan FROM SIANGBANG.RUANGAN R WHERE NOT EXISTS (SELECT PR.kode_ruangan FROM SIANGBANG.PEMINJAMAN_RUANG PR, SIANGBANG.JADWAL J WHERE R.no_ruangan = PR.kode_ruangan AND EXTRACT(Month FROM PR.tgl_mulai) = ". $nomorbulan ." AND EXTRACT(Month FROM PR.tgl_selesai) = ". $nomorbulan ." AND R.no_ruangan = J.kode_ruangan AND J.hari = 'Rabu')";

		$sqlKamis = "SELECT DISTINCT R.nama_ruangan FROM SIANGBANG.RUANGAN R WHERE NOT EXISTS (SELECT PR.kode_ruangan FROM SIANGBANG.PEMINJAMAN_RUANG PR, SIANGBANG.JADWAL J WHERE R.no_ruangan = PR.kode_ruangan AND EXTRACT(Month FROM PR.tgl_mulai) = ". $nomorbulan ." AND EXTRACT(Month FROM PR.tgl_selesai) = ". $nomorbulan ." AND R.no_ruangan = J.kode_ruangan AND J.hari = 'Kamis')";

		$sqlJumat = "SELECT DISTINCT R.nama_ruangan FROM SIANGBANG.RUANGAN R WHERE NOT EXISTS (SELECT PR.kode_ruangan FROM SIANGBANG.PEMINJAMAN_RUANG PR, SIANGBANG.JADWAL J WHERE R.no_ruangan = PR.kode_ruangan AND EXTRACT(Month FROM PR.tgl_mulai) = ". $nomorbulan ." AND EXTRACT(Month FROM PR.tgl_selesai) = ". $nomorbulan ." AND R.no_ruangan = J.kode_ruangan AND J.hari = 'Jumat')";

		$resultSenin = pg_query($conn, $sqlSenin);
		$resultSelasa = pg_query($conn, $sqlSelasa);
		$resultRabu = pg_query($conn, $sqlRabu);
		$resultKamis = pg_query($conn, $sqlKamis);
		$resultJumat = pg_query($conn, $sqlJumat);

		while (($row1 = pg_fetch_row($resultSenin)) && ($row2 = pg_fetch_row($resultSelasa)) && ($row3 = pg_fetch_row($resultRabu)) && ($row4 = pg_fetch_row($resultKamis)) && ($row5 = pg_fetch_row($resultJumat))) {
			echo "<tr>
	                    <td>$row1[0]</td>
	                    <td>$row2[0]</td>
	                    <td>$row3[0]</td>
	                    <td>$row4[0]</td>
	                    <td>$row5[0]</td>
	              </tr>";
		}
	} else die("mohon masukkan data yang lengkap");
?>