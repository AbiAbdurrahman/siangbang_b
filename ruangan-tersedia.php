
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Daftar Ruangan Tersedia</title>

    <!-- Bootstrap -->

    <link href="css/hasilseleksi.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container" id="input-form">
      <form name="preference" id="post-preference" method="POST">
        <div class="form-group" id="opsi-periode">
          <label>Bulan</label>
          <select class="form-control" name="bulan" id="bulan-pilihan">
            <?php
              
              /* localhost */
              // $conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=basdatb");
              // /* kawung */
              // // $conn = pg_connect("host=dbpg.cs.ui.ac.id dbname=b216 user=b216 password=bdb1622016");
              // $sql = "SELECT * from SIRIMA.periode_penerimaan";

              // $result = pg_query($conn, $sql);

              // while ($row = pg_fetch_row($result)) {
              //   echo "<option value='$row[0]'>$row[0] - $row[1]</option>";
              // }
            ?>
            <option value="1">Januari</option>
            <option value="2">Februari</option>
            <option value="3">Maret</option>
            <option value="4">April</option>
            <option value="5">Mei</option>
            <option value="6">Juni</option>
            <option value="7">Juli</option>
            <option value="8">Agustus</option>
            <option value="9">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
          </select>
        </div>
        <br>
        <input type="button" class="btn btn-primary" onclick="submitpreferences(this.form)" name="submit" value="Submit"/>
      </form>
    </div>
    <div class="container" id="tabel-hasil">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Senin</th>
                <th>Selasa</th>
                <th>Rabu</th>
                <th>Kamis</th>
                <th>Jumat</th>
              </tr>
            </thead>
            <tbody id="table-result">
              <!-- tabel ini diisi melalui proses yang ada di seleksiprocess.php -->
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
    </script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>