<?php
	session_start();
	include 'connect.php';
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
	        		<a class="nav-link" href="adminbarang.php">Dashboard</a>
	          		<button type="button" class="btn btn-outline-danger">Logout</button>
	        	</form>
	      	</div>
	    </nav>
	    
	    <div class="container-fluid">
	    	<div class="jumbotron">
	    		<div class="row">
		    		<h3>Cari peminjaman</h3>
		    	</div>
		    	<hr>
		    	<div class="row">	
		            <form method="post" action=''>
					  <div class="form-group row">
					    <label for="inputTglMulai" class="col-sm-2 col-form-label">tgl mulai</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control form-control-sm" name="tglMulai" placeholder="tgl_mulai" required>
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="inputUsernameMhs" class="col-sm-2 col-form-label">username mhs</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control form-control-sm" name="usernameMhs" placeholder="username" required>
					    </div>
					  </div>
					  <div class="form-group row">
					    <div class="col-sm-10">
					      <button name='action' type="submit" class="btn btn-success">Cari</button>
					    </div>
					  </div>
					</form>
					<?php
							if(isset($_POST['action'])) {
								$_SESSION['tglMulai']=$_POST['tglMulai'];
								$_SESSION['usernameMhs']=$_POST['usernameMhs'];
								header('location: pengembalianbarang.php');
							}	
						?>
		    	</div>
	    	</div>
	    </div>
	    
	    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	</body>
</html>