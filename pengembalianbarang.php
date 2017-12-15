<?php
	session_start();
	include 'connect.php';

	function getPengembalianBarang() {
		$conn = connectDB();
		$tglMulai=$_SESSION['tglMulai'];
		$username_mhs=$_SESSION['usernameMhs'];
		$string = "";
		$sql = "SELECT PB.tgl_mulai AS tgl_mulai, PB.username_mhs AS username_mahasiswa, LPB.kode_barang AS kode_barang, PB.tgl_selesai AS rencana_tanggal_selesai, PB.waktu_selesai AS rencana_waktu_selesai FROM PEMINJAMAN_BARANG PB, LIST_PINJAM_BARANG LPB WHERE PB.tgl_mulai = '$tglMulai' AND PB.username_mhs = '$username_mhs' AND PB.tgl_mulai=LPB.tgl_mulai AND PB.username_mhs=LPB.username_mhs";
		$result = pg_query($conn, $sql);
		if (!$result) {
			die("Error in SQL query: " . pg_last_error());
		}   
		
		while ($row = pg_fetch_assoc($result)) {
			$string = $string . "<tr><form method='POST' action=''><th scope='row'>".$row['tgl_mulai']."</th><td>".$row['username_mahasiswa']."</td><td name='kodeBarang'>".$row['kode_barang']."</td></form><td>".$row['rencana_tanggal_selesai']."</td><td>".$row['rencana_waktu_selesai']."</td><td><input type='text' class='form-control form-control-sm' name='tgl_kembali' placeholder='tanggal kembali'></td><td><input type='text' class='form-control form-control-sm' name='waktu_kembali' placeholder='waktu kembali'></td><td><button name='action' type='submit' class='btn btn-success'>update</button></td></form></tr>";
		}
		pg_close($conn);
		return $string;
	}
	
	$pengembalianBarang = getPengembalianBarang();
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
		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
	    	<a class="navbar-brand" href="#">SIANGBANG</a>
	      	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

	      	<div class="collapse navbar-collapse" id="navbarSupportedContent">
	        	<ul class="navbar-nav mr-auto"></ul>
	        	<form class="form-inline my-2 my-lg-0">
	        		<a class="nav-link" href="admin_barang.php">Dashboard</a>
	        	</form>
	      	</div>
	    </nav>
	    
	    <div class="container-fluid">
	    	<div class="jumbotron">
	    		<div class="row">
		    		<h1>Hasil pencarian</h1>
		    	</div>
		    	<hr>
		    	<div class="row">	
		            <table class="table table-hover table-sm table-responsive">
		            	<thead>
		                	<tr>
		                  		<th scope="col">Tanggal mulai</th>
		                  		<th scope="col">Username mahasiswa</th>
		                  		<th scope="col">Kode barang</th>
		                  		<th scope="col">Rencana tanggal selesai</th>
		                  		<th scope="col">Rencana waktu selesai</th>
		                  		<th scope="col">Tgl kembali</th>
		                  		<th scope="col">Waktu kembali</th>
		                  		<th scope="col">Action</th>
		                	</tr>
		              	</thead>
		              	<tbody>
		              		<?php 
								echo $pengembalianBarang;
							?>
		              	</tbody>
		            </table>
		    	</div>
		    	<?php
					if(isset($_POST['action'])) {
						$tglMulai=$_SESSION['tglMulai'];
						$usernameMhs=$_SESSION['usernameMhs'];
						$kodeBarang=$_POST['kodeBarang'];;
						$tglKembali=$_POST['tgl_kembali'];
						$conn=connectDB();
						$insert="INSERT INTO PENGEMBALIAN_BARANG VALUES ('$tglMulai', '$usernameMhs', '$kodeBarang', '$tglKembali')";
						$result=pg_query($conn, $insert);
						if (!$result) {
							die("Error in SQL query: " . pg_last_error());
						}
						var_dump($result);
						echo '<script type="text/javascript">alert("Barang berhasil dikembalikan!");</script>';
						pg_close($conn);
					}	
				?>
	    	</div>
	    </div>
	    
	    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	</body>
</html>