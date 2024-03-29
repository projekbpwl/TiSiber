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
  <title>Projek BPWL</title>

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

    <body id="mimin" class="dashboard form-signin-wrapper"  style="margin-top: 35px">
    <?php
        /* handle error */
        if (isset($_SESSION['error_log'])){
          $errors=$_SESSION['error_log'];
          foreach ($errors as $error) {?>
            <p><?php echo $error;?></p>
            <?php
          }unset($_SESSION['error_log']);
      }?> 
      <div class="container">

        <form action="proses.php" method="post" class="form-signin">
          <div class="panel periodic-login">
              <div class="panel-body text-center">
                  <p class="atomic-mass"><h3>Pendaftaran Perpustakaan Online</h3></p><hr>
                  <p class="atomic-mass"><h5>Isilah data dengan benar</h5></p>

                  <i class="icons icon-arrow-down"></i>
                  <div class="form-group form-animate-text" style="margin-top:20px !important;">
                    <input type="text" name="nama" class="form-text" required>
                    <span class="bar"></span>
                    <label>Nama</label>
                  </div>
                  <div class="form-group form-animate-text" style="margin-top:20px !important;">
                    <input type="text" name="email" class="form-text" required>
                    <span class="bar"></span>
                    <label>Email</label>
                  </div>
                  <div class="form-group form-animate-text" style="margin-top:20px !important;">
                    <input type="text" name="username" class="form-text" required>
                    <span class="bar"></span>
                    <label>Username</label>
                  </div>
                  <div class="form-group form-animate-text" style="margin-top:20px !important;">
                    <input type="password" name="password" class="form-text" required>
                    <span class="bar"></span>
                    <label>Password</label>
                  </div>
                  <div class="form-group form-animate-text" style="margin-top:20px !important;">
                    <label>Jenis Kelamin</label><br><br><br>
                    <input type="radio" name="jenis" value="Laki-Laki"/>Laki-Laki
                    <input type="radio" name="jenis" value="Perempuan"/>Perempuan
                  </div>
                  <input type="submit" name="simpan" class="btn col-md-12" value="Daftar"/>
              </div>
                <div class="text-center">
                    <a href="login.php">Sudah Memiliki Akun?</a>
                </div>
          </div>
        </form>

      </div>

      <!-- end: Content -->
      <!-- start: Javascript -->
      <script src="asset/js/jquery.min.js"></script>
      <script src="asset/js/jquery.ui.min.js"></script>
      <script src="asset/js/bootstrap.min.js"></script>

      <script src="asset/js/plugins/moment.min.js"></script>
      <script src="asset/js/plugins/icheck.min.js"></script>

      <!-- custom -->
      <script src="asset/js/main.js"></script>
      <script type="text/javascript">
       $(document).ready(function(){
         $('input').iCheck({
          checkboxClass: 'icheckbox_flat-aero',
          radioClass: 'iradio_flat-aero'
        });
       });
     </script>
     <!-- end: Javascript -->
   </body>
   </html>