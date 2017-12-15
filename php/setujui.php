<?php
	session_start();
	
	if (isset($_POST['kode-ruangan']) && isset($_POST['tgl-mulai']) && isset($_POST['username-mhs'])) {

		$kode_ruangan = pg_escape_string($_POST['kode-ruangan']);
		$tgl_mulai = pg_escape_string($_POST['tgl-mulai']);
		$username_mhs = pg_escape_string($_POST['username-mhs']);

		$conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=basdatb");

		if ($_SESSION['role'] == 'ruangan') {
			# code...
			if (isset($_POST['setuju'])) {
			# code...
				$sql = "UPDATE SIANGBANG.PEMINJAMAN_RUANG PR SET status = 2 WHERE kode_ruangan = '" . $kode_ruangan . "' AND tgl_mulai = '" . $tgl_mulai . "' AND username_mhs = '" . $username_mhs . "'";
				$result = pg_query($conn, $sql);

			} elseif (isset($_POST['tolak'])) {
				# code...
				$sql = "UPDATE SIANGBANG.PEMINJAMAN_RUANG PR SET status = 5 WHERE kode_ruangan = '" . $kode_ruangan . "' AND tgl_mulai = '" . $tgl_mulai . "' AND username_mhs = '" . $username_mhs . "'";
				$result = pg_query($conn, $sql);

			} else echo 'perintah invalid!';
		} elseif ($_SESSION['role'] == 'manager') {
			# code...
			if (isset($_POST['setuju'])) {
			# code...
				$sql = "UPDATE SIANGBANG.PEMINJAMAN_RUANG PR SET status = 4 WHERE kode_ruangan = '" . $kode_ruangan . "' AND tgl_mulai = '" . $tgl_mulai . "' AND username_mhs = '" . $username_mhs . "'";
				$result = pg_query($conn, $sql);

			} elseif (isset($_POST['tolak'])) {
				# code...
				$sql = "UPDATE SIANGBANG.PEMINJAMAN_RUANG PR SET status = 6 WHERE kode_ruangan = '" . $kode_ruangan . "' AND tgl_mulai = '" . $tgl_mulai . "' AND username_mhs = '" . $username_mhs . "'";
				$result = pg_query($conn, $sql);

			} else echo 'perintah invalid!';
		}


		

		if ($result) {
			header('location: ../daftar-peminjaman-ruangan.php');
		} else echo 'update gagal';
	} else echo 'connection failed';
?>
	