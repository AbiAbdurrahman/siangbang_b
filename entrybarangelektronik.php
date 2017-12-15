<?php
	session_start();
	include 'connect.php';
?>

<!doctype html>
<html lang="en">
	<head>
	    <title>Entry Barang Elektronik</title>
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
	        		<a class="nav-link" href="admin_barang.php">Dashboard</a>
	        	</form>
	      	</div>
	    </nav>

	    <div class="container-fluid">
	    	<div class="jumbotron">
		    	<div class="row">
		    		<h1>Entry Barang Elektronik</h1>
		    	</div>
				<hr>
		    	<div class="row">
		            <form method="post" action='' >
		            	<div class="form-row">
		            		<div class="form-group row">
			                	<label for="inputKodeBarang" class="col-sm-2 col-form-label">Kode barang</label>
			                	<div class="col-sm-10">
			                  		<input type="text" class="form-control form-control-sm" name="kodeBarang" placeholder="Kode barang" required>
			                	</div>
			              	</div>
			              	<div class="form-group row">
			                	<label for="inputNamaBarang" class="col-sm-2 col-form-label">Nama barang</label>
			                	<div class="col-sm-10">
			                  		<input type="text" class="form-control form-control-sm" name="namaBarang" placeholder="Nama barang" required>
			                	</div>
			              	</div>
			              	<div class="form-group row">
			                	<label for="inputJumlahBarang" class="col-sm-2 col-form-label">Jumlah barang</label>
			                	<div class="col-sm-10">
			                  		<input type="text" class="form-control form-control-sm" name="jumlahBarang" placeholder="JumlahBarang" required>
			                	</div>
			              	</div>	
		            	</div>
		              	
		              	<div class="form-row">
		              		<div class="form-group row">
			                	<label for="inputJenisBarang" class="col-sm-2 col-form-label">Jenis barang</label>
			                	<div class="col-sm-10">
			                  		<select class="form-control form-control-sm" name="jenisBarang" disabled>
			                    		<option>Elektronik</option>
			                  		</select>
			                	</div>
			              	</div>
			              	<div class="form-group row">
			                	<label for="inputWatt" class="col-sm-2 col-form-label">Watt</label>
			                	<div class="col-sm-10">
			                  		<input type="text" class="form-control form-control-sm" name="wattBarang" placeholder="Watt" required>
			                	</div>
			              	</div>
			              	<div class="form-group row">
			                	<label for="inputMerk" class="col-sm-2 col-form-label">Merk</label>
			                	<div class="col-sm-10">
			                  		<input type="text" class="form-control form-control-sm" name="merkBarang" placeholder="Merk" required>
			                	</div>
			              	</div>
			              	<div class="form-group row">
			                	<label for="inputWarna" class="col-sm-2 col-form-label">Warna</label>
			                	<div class="col-sm-10">
			                  		<input type="text" class="form-control form-control-sm" name="warnaBarang" placeholder="Warna" required>
			               		</div>
			              	</div>
		              	</div>
		              	
		              	<div class="form-row">
		              		<div class="form-group row">
			                	<label for="inputKeterangan" class="col-sm-2 col-form-label">Keterangan</label>
			                	<div class="col-sm-10">
			                  		<textarea class="form-control form-control-sm" name="keteranganBarang" rows="3"></textarea>
			                	</div>
			              	</div>
			              	<div class="form-group row">
			                	<label for="inputFoto" class="col-sm-2 col-form-label">Foto</label>
			                	<div class="col-sm-10">
			                  		<input type="text" class="form-control form-control-sm" name="fotoBarang" placeholder="nama foto barang">
			                	</div>
			              	</div>
		              	</div>
		              	<div class="form-group">
		                	<div class="col-sm-10">
		                  		<button name='action' type="submit" class="btn btn-success">Masukkan barang</button>
		                  		<?php
									if(isset($_POST['action'])) {
										$kodeBarang=$_POST['kodeBarang'];
										$namaBarang=$_POST['namaBarang'];
										$jumlahBarang=$_POST['jumlahBarang'];
										$jenisBarang='elektronik';
										$wattBarang=$_POST['wattBarang'];
										$merkBarang=$_POST['merkBarang'];
										$warnaBarang=$_POST['warnaBarang'];
										$keteranganBarang=$_POST['keteranganBarang'];
										$fotoBarang=$_POST['fotoBarang'];
										$usernameAdmin=$_SESSION['user'];
										$conn=connectDB();
										$insert1="INSERT INTO BARANG VALUES ('$kodeBarang', '$namaBarang', '$jumlahBarang', '$jenisBarang', '$keteranganBarang', '$fotoBarang', '$usernameAdmin')";
										$result1=pg_query($conn, $insert1);
										if (!$result1) {
											die("Error in SQL query: " . pg_last_error());
										}
										var_dump($result1);
										$insert2="INSERT INTO BARANG_ELEKTRONIK VALUES ('$kodeBarang', '$wattBarang', '$merkBarang', '$warnaBarang')";
										$result2=pg_query($conn, $insert2);
										if (!$result2) {
											die("Error in SQL query: " . pg_last_error());
										}
										var_dump($result2);
										pg_close($conn);
										echo '<script type="text/javascript">alert("Barang berhasil dimasukkan!");</script>';
									}	
								?>
		                	</div>
		              	</div>
		            </form>
		    	</div>
	    	</div>
	    </div>

	    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	</body>
</html>