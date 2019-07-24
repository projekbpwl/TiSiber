<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="description" content="Miminium Admin Template v.1">
  <meta name="author" content="Isna Nur Azis">
  <meta name="keyword" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Halaman Login</title>

  <!-- start: Css -->
  <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">

  <!-- plugins -->
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/simple-line-icons.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/icheck/skins/flat/aero.css"/>
  <link href="asset/css/style.css" rel="stylesheet">
  <!-- end: Css -->

  <link rel="shortcut icon" href="asset/img/logomi.png">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
    </head>

    <body id="mimin" class="dashboard form-signin-wrapper" style="margin-top: 40px">

      <div class="container">

        <form action="check-login.php" method="post" class="form-signin">
          <div class="panel periodic-login">
              <div class="panel-body text-center">
                  <h1 class="nanomic-symbol">PERPOL</h1>
                  <p class="atomic-mass"><h4>Perpustakaan Online</h4></p><hr>
                  <p class="element-name">Membaca buku secara online</p>

                  <i class="icons icon-arrow-down"></i>
                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="text" name="username" class="form-text" required>
                    <span class="bar"></span>
                    <label>Username</label>
                  </div>
                  <div class="form-group form-animate-text" style="margin-top:40px !important;">
                    <input type="password" name="password" class="form-text" required>
                    <label>Password</label>
                  </div>
                  <input type="submit" class="btn col-md-12" value="Login"/>
              </div>
                <div class="text-center" style="padding:5px;">
                    <a href="daftar.php"> Ingin Membuat Akun Baru?</a>
                </div>
          </div>
        </form>
      </div>
<?php
if( isset($_SESSION['akses']) )
{
    header('location:'.$_SESSION['akses']);
    exit();
} 
$error = '';
if( isset($_SESSION['error']) ) {
 
     $error = $_SESSION['error']; // set error
 
     unset($_SESSION['error']);
} ?>
 
<?php echo $error;?> 
      <!-- end: Content -->
      <!-- start: Javascript -->
      <script src="asset/js/jquery.min.js"></script>
      <script src="asset/js/jquery.ui.min.js"></script>
      <script src="asset/js/bootstrap.min.js"></script>

      <script src="asset/js/plugins/moment.min.js"></script>
      <script src="asset/js/plugins/icheck.min.js"></script>

      <!-- custom -->
      <script src="asset/js/main.js"></script>
     <!-- end: Javascript -->
   </body>
   </html>