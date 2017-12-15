<?php
	if (isset($_POST['kode_ruangan']) && isset($_POST['tgl_mulai']) && isset($_POST['username_mhs'])) {
		
		$kode_ruangan = $_POST['kode_ruangan'];
		$tgl_mulai = $_POST['tgl_mulai'];
		$username_mhs = $_POST['username_mhs'];

		$conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=basdatb");

		$sql = "UPDATE SIANGBANG.PEMINJAMAN_RUANG PR SET status = 4 WHERE kode_ruangan = " . $kode_ruangan . " AND tgl_mulai = " . $tgl_mulai . " AND username_mhs = " . $username_mhs . "";

		$result = pg_query($conn, $sql);

		if ($result) {
			# code...
			die('update berhasil!');
		} else die('update gagal');
	} else die('connection failed');
?>
	