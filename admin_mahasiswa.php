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
width: 300px;
padding: 20px;
cursor: pointer;
font-weight: bold;
font-size: 140%;
background: #3366cc;
color: #fff;
border: 1px solid #3366cc;
border-radius: 10px;
-moz-box-shadow:: 6px 6px 5px #999;
-webkit-box-shadow:: 6px 6px 5px #999;
box-shadow:: 6px 6px 5px #999; 
margin:0 auto;
}
input.MyButton:hover {
color: #ffff00;
background: #000;
border: 1px solid #fff;
margin:0 auto;
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
<a href="entry_jadwal.php" >Jadwal Ruangan</a>
<br>
<br>
<a href="ruangan-tersedia.php" >Ruangan Tersedia</a>
<br>
<br>
<a href="barang-tersedia.php" >Barang Tersedia</a>
<br>
<br>
<a href="jenisPeminjaman.php" >Buat Peminjaman</a>
<br>
<br>
<a href="riwayatPeminjaman.php" >Riwayat Peminjaman</a>
<br>
<br>
<a href="buktiPeminjaman.php" >Cetak Bukti Peminjaman</a>
</div>
</form>
</body>
</html>

