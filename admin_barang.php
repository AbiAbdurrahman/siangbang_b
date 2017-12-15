<?php 
session_start();
if (!isset($_SESSION['user'])){
 header("Location: login.php");
}
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>

<style>
body{
	background-image: url('images/hom1.jpg');
}

a:link, a:visited {
    background-color: #2268d8;
    color: white;
    padding: 28px 50px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 30px;
}

input.MyButton {
background-color: blue;
width: 300px;
padding: 20px;
cursor: pointer;
font-weight: bold;
font-size: 150%;
background: #3366cc;
color: #fff;
border: 1px solid #3366cc;
border-radius: 10px;
-moz-box-shadow:: 6px 6px 5px #999;
-webkit-box-shadow:: 6px 6px 5px #999;
box-shadow:: 6px 6px 5px #999;
}
input.MyButton:hover {
color: #ffff00;
background: #000;
border: 1px solid #fff;
}
.wrapper {
    text-align: center;   
}

.button {
    position: absolute;
    top: 50%;
}
input[type='button']
{
    margin:10px 10px 10px 10px; 
}
</style>

<body>
<form action="logout.php" method='GET'>
	<button name='logout' type='submit'>
		logout
	</button>
<div>
</div>
<div Class="wrapper">
<a href="entrybarang.php" >Entry Barang</a>
<br>
<br>
<a href="peminjamanbarang.php" >Daftar Peminjaman</a>
<br>
<br>
<a href="caribarang.php" >Pengembalian Barang</a>
<br>
<br>
<a href="barang-tersedia.php" >Barang Tersedia</a>
</div>
</form>
</body>
</html>

