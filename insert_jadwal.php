<?php 
    function connectDB() {
    try {
    $conn=pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=postgres45");
} Catch (Exception $e) {
    Echo $e->getMessage() + "failed";
}
        // Create connection

        // Check connection
    if (!$conn) {
        die("Connection failed: " + mysqli_connect_error());
    }
    return $conn;
}
 session_start();
 
 $conn = connectDB();
 $error = false;

 $query = "INSERT INTO siangbang.jadwal VALUES ('$_POST[kode_jadwal]','$_POST[tahun_term]','$_POST[semester_term]','$_POST[nama_matkul]','$_POST[kelas]','$_POST[jam_mulai]','$_POST[jam_selesai]','$_POST[hari]','$_POST[kode_ruangan]','$_SESSION[user]')";
$result = pg_query($query);
 ?>