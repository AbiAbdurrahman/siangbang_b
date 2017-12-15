<!--<?php
//	session_start();
//	include 'connect.php';
//	if($_SESSION['user'] != 'adminbarang') {
//		echo '<script type="text/javascript">alert("You\'re not a customer");</script>';
	  	
//	  	if($_SESSION['user'] == 'mahasiswa'){
//	    	header('Location: home.php');
//	  	}
//	  	if($_SESSION['user'] == 'adminruangan'){
//	    	header('Location: adminruangan.php');
//	  	}
	  	
//	  	header('Location: index.php');
//	}
//?>-->

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
	        		<a class="nav-link" href="#">Dashboard</a>
	          		<button type="button" class="btn btn-outline-danger">Logout</button>
	        	</form>
	      	</div>
	    </nav>

	    <div class="container-fluid">
	    	<div class="jumbotron">
	    		<div class="row">
	    			<h1>Hi, admin! selamat datang di dashboard. Silahkan memilih kegiatan yang akan dilakukan</h1>
	    		</div>
	    		<hr>
		    	<div class="row">
		    		<div class="col-6">
		    			<div class="card" style="width: 20rem;">
						  	<img class="card-img-top" src="http://www.palmersstorage.com.au/images/gallery/Mobile-Storage-Box-Self-Storage-Boxes-Sydney-Parramatta.jpg" alt="Card image cap">
						  	<div class="card-body">
						    	<h4 class="card-title">Daftar Permintaan Peminjaman Barang</h4>
						    	<p class="card-text">Melihat daftar permintaan peminjaman barang</p>
						    	<a href="permintaanbarang.php" class="btn btn-primary">Buka</a>
						  	</div>
						</div>
		    		</div>
		    		<div class="col-6">
		    			<div class="card" style="width: 20rem;">
						  	<img class="card-img-top" src="https://d79i1fxsrar4t.cloudfront.net/assets/img/buyer-type-icons/list.8b8d9a64.svg" alt="Card image cap">
						  	<div class="card-body">
						    	<h4 class="card-title">Mengentry Barang</h4>
						    	<p class="card-text">Mendaftarkan barang ke SIANGBANG</p>
						    	<a href="entrybarang.php" class="btn btn-primary">Buka</a>
						  	</div>
						</div>
		    		</div>
		    	</div>
	    	</div>
	    </div>

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	</body>
</html>