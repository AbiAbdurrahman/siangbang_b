
<?php
 // ob_start();
function connectDB() {
    try {
    $conn=pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=basdatb");
} Catch (Exception $e) {
    Echo $e->getMessage() + "haha";
}
        // Create connection

        // Check connection
    if (!$conn) {
        die("Connection failed: " + mysqli_connect_error());
    }
    return $conn;
}
 session_start();
 if (isset($_SESSION['role'])){
 $role = "Location: admin_".$_SESSION['role'].'.php';
 header($role);
}
 // it will never let you open index(login) page if session is set
 if (isset($_SESSION['guest'])!="" ) {
  header("Location: home.php");
  exit;
 }
 
 $conn = connectDB();
 $error = false;

if (isset($_POST['btn-login']) ) { 

    // prevent sql injections/ clear user invalid inputs
    $username = trim($_POST['username']);
    $username = strip_tags($username);
    $username = htmlspecialchars($username);

    // prevent sql injections / clear user invalid inputs
    $pass = trim($_POST['pass']);
    $pass = strip_tags($pass);
    $pass = htmlspecialchars($pass);
      
    if(empty($username)){
        $error = true;
        $usernameError = "Please enter your username";
    }

    if(empty($pass)){
        $error = true;
        $passError = "Please enter your password.";
    }

    // if there's no error, continue to login
    if (!$error) {

        // $res=pg_query($conn,"SELECT * FROM siangbang.admin_ruangan WHERE username='$username'");
        $resBarang=pg_query($conn,"SELECT * FROM siangbang.admin_barang WHERE username='$username' AND password='$pass'");
        $rowBarang=pg_fetch_array($resBarang);

        if(!empty( $rowBarang)){
                $_SESSION['user'] = $rowBarang['username'];
        		 $_SESSION['role'] = 'barang';
                header("Location: admin_barang.php");
            }

        $resRuangan=pg_query($conn,"SELECT * FROM siangbang.admin_ruangan WHERE username='$username' AND password='$pass'");
        $rowRuangan=pg_fetch_array($resRuangan);

        if(!empty($rowRuangan)){
                $_SESSION['user'] = $rowRuangan['username'];
                 $_SESSION['role'] = 'ruangan';
                header("Location: admin_ruangan.php");
            }

        $resManager=pg_query($conn,"SELECT * FROM siangbang.manager WHERE username='$username' AND password='$pass'");
        $rowManager=pg_fetch_array($resManager);

        if(!empty($rowManager)){
                $_SESSION['user'] = $rowManager['username'];
                 $_SESSION['role'] = 'manager';
                header("Location: admin_manager.php");
            }

        $resMahasiswa=pg_query($conn,"SELECT * FROM siangbang.mahasiswa WHERE username='$username' AND password='$pass'");
        $rowMahasiswa=pg_fetch_array($resMahasiswa);

        if(!empty($rowMahasiswa)){
                $_SESSION['user'] = $rowMahasiswa['username'];
                 $_SESSION['role'] = 'mahasiswa';
                header("Location: admin_mahasiswa.php");
            }

         else {
            $errMSG = "Password or Email address is not correct, Try again...";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>SIANGBANG</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"  />
    <link rel="stylesheet" href="css/login.css" type="text/css"  />
</head>
<style>
body{
	background-color: #0099cc;
	background-image: url('images/home.jpg');
}
</style>

<body>
    <div class="container">
        <div id="login-form">
            <form method="post" autocomplete="off">
                <div class="col-md-4 col-md-offset-4">        
                    <div class="form-group">
                        <h2 class="">Sign In</h2>
                    </div>
                    <div class="form-group"><hr /></div>                
                    <?php
                        if ( isset($errMSG) ) {      
                    ?>
                    <div class="form-group">
                        <div class="alert alert-danger">
                            <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG;?>
                        </div>
                    </div>
                    <?php
                        }
                    ?>        
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                            <input type="username" name="username" class="form-control" placeholder="Your Username" maxlength="50" />
                        </div>
                        <span class="text-danger">
                        <?php if(!empty($usernameError)){
                            echo $usernameError;} 
                        ?></span>
                    </div>            
                    <div class="form-group">        
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            <input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
                        </div>
                        <span class="text-danger">
                        <?php if(!empty($passError)){
                            echo $passError;} 
                        ?></span>                            
                        </span>
                    </div>
                    <div class="form-group"><hr /></div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary" name="btn-login">Sign In</button>
                    </div>
                </div>
            </form>
        </div> 
    </div>
</body>
</html>