<?php
  session_start();
  if (!isset($_SESSION['user'])){
    header("Location: login.php");
  }
?>
<!DOcTYPE <html></html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Daftar Peminjaman Ruangan</title>

    <!-- Bootstrap -->

    <link href="css/daftar-peminjaman-ruangan.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container" id="tabel-hasil">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Tanggal Req</th>
                <th>Kode Ruangan</th>
                <th>Username Mhs</th>
                <th>Tgl Mulai Penggunaan</th>
                <th>Tgl Selesai Penggunaan</th>
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
                <th>Nama Kegiatan</th>
                <th>Tujuan</th>
                <th>Jumlah Peserta</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody id="table-result">
              <?php
                $conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=basdatb");

                $sql = "SELECT PR.tgl_req, PR.kode_ruangan, PR.username_mhs, PR.tgl_mulai, PR.tgl_selesai, PR.waktu_mulai, PR.waktu_selesai, PR.nama_kegiatan, PR.tujuan, PR.jumlah_peserta, PR.status FROM SIANGBANG.PEMINJAMAN_RUANG PR";

                if ($_SESSION['role'] == 'ruangan') {
                  # code...
                  $sql = $sql . " WHERE PR.status = 1";
                } elseif ($_SESSION['role'] == 'manager') {
                  # code...
                  $sql = $sql . " WHERE PR.status = 2 OR PR.status = 3";
                }

                $result = pg_query($conn,$sql);
                $row_id = 0;

                while ($row = pg_fetch_row($result)) {
                  echo "<tr id='$row_id'>
                      <td id='tgl-req' value='$row[0]'>$row[0]</td>
                      <td id='kode-ruangan' value='$row[1]'>$row[1]</td>
                      <td id='username-mhs' value='$row[2]'>$row[2]</td>
                      <td id='tgl-mulai' value='$row[3]'>$row[3]</td>
                      <td id='tgl-selesai' value='$row[4]'>$row[4]</td>
                      <td id='waktu-mulai' value='$row[5]'>$row[5]</td>
                      <td id='waktu-selesai' value='$row[6]'>$row[6]</td>
                      <td id='nama-kegiatan' value='$row[7]'>$row[7]</td>
                      <td id='tujuan' value='$row[8]'>$row[8]</td>
                      <td id='Jumlah-peserta' value='$row[9]'>$row[9]</td>";
                  $status = (int) $row[10];
                  if ($status === 1) {
                    echo "<td id='status' value='$row[10]'>Menunggu persetujuan admin</td>";
                  } elseif ($status === 2) {
                    echo "<td id='status' value='$row[10]'>Menunggu persetujuan manajer pendidikan dan kemahasiswaan</td>";
                  } elseif ($status === 3) {
                    echo "<td id='status' value='$row[10]'>Menunggu persetujuan manajer IT</td>";
                  }
                  // echo "<td><button id='setuju' type='button' class='btn btn-success'>Setujui</button><br><br>
                  //           <button id='tolak' type='button' class='btn btn-danger'>Tolak</button></td>";
                  echo "<td>
                          <form action='php/setujui.php' method='post'>
                            <input type='hidden' name='kode-ruangan' value='$row[1]'>
                            <input type='hidden' name='username-mhs' value='$row[2]'>
                            <input type='hidden' name='tgl-mulai' value='$row[3]'>
                            <input type='submit' name='setuju' value='setujui' class='btn btn-success'><br><br>
                            <input type='submit' name='tolak' value='tolak' class='btn btn-danger'>
                          </form>
                        </td>";
                  echo "</tr>";
                }
              ?>
            </tbody>
            
      </table> 
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript">
      function submitpreferences(form) {
        $.ajax({
          method: 'POST',
          url: 'php/list-ruangan-tersedia.php',
          data: $(form).serialize(),
          success: function(data) {
            $('#table-result').html(data);
          }
        });
      }

      $(document).ready(function() {
        $('.btn-success').on('click', function(){
        var row = $(this).closest('tr');
          $.ajax({
            method: 'POST',
            url: './php/setujui.php',
            data: {
              tgl_mulai: row.find('#tgl-mulai').text(),
              kode_ruangan: row.find('#kode-ruangan').text(),
              username_mhs: row.find('#username-mhs').text()
            },
            success: function() {
              // console.log('update query berhasil');
              // console.log(row.find('#tgl-mulai').text());
              // console.log(row.find('#kode-ruangan').text());
              // console.log(row.find('#username-mhs').text());
              location.reload();
            }
          });
        });
      });
    </script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>