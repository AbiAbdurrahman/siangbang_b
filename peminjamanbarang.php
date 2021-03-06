<?php
	session_start();
	include 'connect.php';

	function getPeminjamanBarang() {
		$conn = connectDB();
		$string = "";
		$sql = "SELECT PB.tgl_req AS tanggal_request, PB.username_mhs AS username, LBP.kode_barang AS kode_barang, PB.tgl_mulai AS tanggal_mulai, PB.tgl_selesai AS tanggal_selesai, PB.waktu_mulai AS waktu_mulai, PB.waktu_selesai AS waktu_selesai, PB.nama_kegiatan AS nama_kegiatan, PB.tujuan AS tujuan, LBP.jumlah AS jumlah, PB.status AS status, PB.DENDA AS denda FROM PEMINJAMAN_BARANG PB, LIST_PINJAM_BARANG LBP WHERE PB.tgl_mulai = LBP.tgl_mulai AND PB.username_mhs = LBP.username_mhs AND (PB.status='1' OR PB.status='2' OR PB.status='3') ORDER BY tanggal_request ASC";
		$result = pg_query($conn, $sql);
		if (!$result) {
			die("Error in SQL query: " . pg_last_error());
		}   
		
		while ($row = pg_fetch_assoc($result)) {
			$string = $string . "<tr><form method='POST' action=''><th scope='row' name='tanggal_request'>".$row['tanggal_request']."</th><td name='username'>".$row['username']."</td><td>".$row['kode_barang']."</td><td name='tanggal_mulai'>".$row['tanggal_mulai']."</td><td name='tanggal_selesai'>".$row['tanggal_selesai']."</td><td name='waktu_mulai'>".$row['waktu_mulai']."</td><td name='waktu_selesai'>".$row['waktu_selesai']."</td><td name='nama_kegiatan'>".$row['nama_kegiatan']."</td><td name='tujuan'>".$row['tujuan']."</td><td>".$row['jumlah']."</td><td>".$row['status']."</td><td>".$row['denda']."</td><td><button name='terima' type='button' class='btn btn-outline-success'>Terima</button><button name='tolak'type='button' class='btn btn-outline-danger'>Tolak</button></td></form></tr>";
		}

		pg_close($conn);
		return $string;
	}
	
	$peminjamanBarang = getPeminjamanBarang();
?>

<!doctype html>
<html lang="en">
	<head>
	    <title>SISTEM INFORMASI RUANG DAN BARANG</title>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
	    	<a class="navbar-brand" href="#">SIANGBANG</a>
	      	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

	      	<div class="collapse navbar-collapse" id="navbarSupportedContent">
	        	<ul class="navbar-nav mr-auto"></ul>
	        	<form class="form-inline my-2 my-lg-0">
	        		<a class="nav-link" href="adminbarang.php">Dashboard</a>
	          		<button type="button" class="btn btn-outline-danger">Logout</button>
	        	</form>
	      	</div>
	    </nav>
	    
	    <div class="container-fluid">
	    	<div class="jumbotron">
	    		<div class="row">
		    		<h1>Daftar permintaan peminjaman barang</h1>
		    	</div>
		    	<hr>
		    	<div class="row">	
		            <table class="table table-hover table-sm table-responsive">
		            	<thead>
		                	<tr>
		                  		<th scope="col">Tanggal permintaan</th>
		                  		<th scope="col">Username mahasiswa</th>
		                  		<th scope="col">Kode barang</th>
		                  		<th scope="col">Tanggal mulai</th>
		                  		<th scope="col">Tanggal selesai</th>
		                  		<th scope="col">Waktu mulai</th>
		                  		<th scope="col">Waktu selesai</th>
		                  		<th scope="col">Nama kegiatan</th>
		                  		<th scope="col">Tujuan</th>
		                  		<th scope="col">Jumlah</th>
		                  		<th scope="col">Status</th>
		                  		<th scope="col">Denda</th>
		                  		<th scope="col">Action</th>
		                	</tr>
		              	</thead>
		              	<tbody>
		              		<?php 
								echo $peminjamanBarang;
							?>
		              	</tbody>
		            </table>
		    	</div>
		    	<?php
		    		$conn = connectDB();
					if(isset($_POST['terima'])) {
						$tglMulai=$_POST['tanggal_mulai'];
						$usernameMhs=$_POST['username'];
						$tglSelesai=$_POST['tanggal_selesai'];
						$tglReq=$_POST['tanggal_request'];
						$waktuMulai=$_POST['waktu_mulai'];
						$waktuSelesai=$_POST['waktu_selesai'];
						$namaKegiatan=$_POST['nama_kegiatan'];
						$tujuan=$_POST['tujuan'];
						$sql= "UPDATE PEMINJAMAN_BARANG SET status = '4' WHERE tgl_mulai= '$tglMulai' AND username_mhs= '$usernameMhs' AND tgl_selesai='$tglSelesai' AND tgl_req = '$tglReq' AND waktu_mulai ='$waktuMulai' AND waktu_selesai='$waktuSelesai' AND nama_kegiatan='$namaKegiatan' AND tujuan='$tujuan'";
						$result = pg_query($conn, $sql);
						if (!$result) {
							die("Error in SQL query: " . pg_last_error());
						}
						echo '<script type="text/javascript">alert("Action peminjaman tersimpan!");</script>'; 
					}
					if(isset($_POST['tolak'])) {
						$tglMulai=$_POST['tanggal_mulai'];
						$usernameMhs=$_POST['username'];
						$tglSelesai=$_POST['tanggal_selesai'];
						$tglReq=$_POST['tanggal_request'];
						$waktuMulai=$_POST['waktu_mulai'];
						$waktuSelesai=$_POST['waktu_selesai'];
						$namaKegiatan=$_POST['nama_kegiatan'];
						$tujuan=$_POST['tujuan'];
						$sql= "UPDATE PEMINJAMAN_BARANG SET status = '5' WHERE tgl_mulai= '$tglMulai' AND username_mhs= '$usernameMhs' AND tgl_selesai='$tglSelesai' AND tgl_req = '$tglReq' AND waktu_mulai ='$waktuMulai' AND waktu_selesai='$waktuSelesai' AND nama_kegiatan='$namaKegiatan' AND tujuan='$tujuan'";
						$result = pg_query($conn, $sql);
						if (!$result) {
							die("Error in SQL query: " . pg_last_error());
						} 
						echo '<script type="text/javascript">alert("Action peminjaman tersimpan!");</script>'; 
					}
					var_dump($result);
					
					pg_close($conn);
		    	?>
	    	</div>
	    </div>
	    
	    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	</body>
</html>