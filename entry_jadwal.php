<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>

<style>
body{
	background-image: url('images/register.jpg');
}
/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
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
<!-- <form action="logout.php" method='GET'>
	<button name='logout' type='submit'>
		logout
	</button>
</form> -->

<h2>Form Entry Jadwal</h2>

<form action="insert_jadwal.php" method="POST" style="border:1px solid #ccc">
  <div class="container">
    <label><b>Kode Jadwal</b></label>
    <input type="text" placeholder="Masukan kode" name="kode_jadwal" required>

    <label><b>Tahun</b></label>
    <input type="text" placeholder="Masukan tahun" name="tahun_term" required>

    <label><b>Semester</b></label>
    <input type="text" placeholder="Masukan semester" name="semester_term" required>

    <label><b>Nama Matkul</b></label>
    <input type="text" placeholder="Masukan mata kuliah" name="nama_matkul" required>

    <label><b>Kelas</b></label>
    <input type="text" placeholder="Masukan kelas" name="kelas" required>

    <label><b>Jam Mulai</b></label>
    <input type="text" placeholder="Masukan jam" name="jam_mulai" required>

    <label><b>Jam Selesai</b></label>
    <input type="text" placeholder="Masukan jam" name="jam_selesai" required>
    <br>

    <label><b>Hari</b>
    <br>
    <select name="hari">
    <option value="Senin">Senin</option>
    <option value="Selasa">Selasa</option>
    <option value="Rabu">Rabu</option>
    <option value="Kamis">Kamis</option>
    <option value="Jumat">Jumat</option>
    <option value="Sabtu">Sabtu</option>
    <option value="Minggu">Minggu</option>
     </select>
     </label>
     <br>
     <br>

    <label><b>Kode Ruangan</b></label>
    <input type="text" placeholder="Masukan kode ruangan" name="kode_ruangan" required>

    <div class="clearfix">
      <button type="submit" class="signupbtn" href="alert.html">Submit</button>
    </div>
  </div>
</form>


</body>
</html> 

