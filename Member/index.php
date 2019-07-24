<?php
  session_start();
  $nama = (isset($_SESSION['nama_user']))?$_SESSION['nama_user']:'';
  include 'config.php';
  $id = $_SESSION['id'];
  $query ="select * from user where idu='$id'";
  $sql= mysqli_query($db, $query);
  $tampil= mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- start: Css -->
    <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">

      <!-- plugins -->
      <link rel="stylesheet" type="text/css" href="../asset/css/plugins/font-awesome.min.css"/>
      <link rel="stylesheet" type="text/css" href="../asset/css/plugins/simple-line-icons.css"/>
      <link rel="stylesheet" type="text/css" href="../asset/css/plugins/animate.min.css"/>
      <link rel="stylesheet" type="text/css" href="../asset/css/plugins/fullcalendar.min.css"/>
    <link href="../asset/css/style.css" rel="stylesheet">
    <!-- end: Css -->
    <title>My Project</title>
  <link rel="shortcut icon" href="../asset/img/logomi.png">
</head>

 <body id="mimin" class="dashboard">
    <?php
    if( !isset($_SESSION['nama_user']) ){
      header('location:./../'.$_SESSION['akses']);
      exit();
    }else{
      $nama = $_SESSION['nama_user'];
    }
  ?>
      <!-- start: Header -->
        <nav class="navbar navbar-default header navbar-fixed-top">
          <div class="col-md-12 nav-wrapper">
            <div class="navbar-header" style="width:100%;">
              <div class="opener-left-menu is-open">
                <span class="top"></span>
                <span class="middle"></span>
                <span class="bottom"></span>
              </div>
                <a href="index.php" class="navbar-brand">
                <img src="../asset/img/perpustakaan.png" width="20%" style="margin-top: -15px"> 
                </a>

              <ul class="nav navbar-nav navbar-right user-nav">
                <li class="user-name"><span style="color:white">Hai, <?php echo $nama;?></span></li>
                  <li class="dropdown avatar-dropdown">
                   <img src="../asset/img/<?php if($tampil['gambar']==""){
                    echo 'avatar.jpg';
                   }else{
                    echo $tampil['gambar'];
                  }?>" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/>
                   <ul class="dropdown-menu user-dropdown" style="margin-right: 30px">
                     <li><a href="profil.php"><span class="fa fa-user"></span> My Profile</a></li>
                     <li><a href="../logout.php"><span class="fa fa-sign-out"></span> Logout </a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      <!-- end: Header -->

      <div class="container-fluid mimin-wrapper">
  
          <!-- start:Left Menu -->
            <div id="left-menu">
              <div class="sub-left-menu scroll">
                <ul class="nav nav-list">
                    <li><div class="left-bg"></div></li>
                    <li class="time">
                      <h1 class="animated fadeInLeft"></h1>
                      <p class="animated fadeInRight"></p>
                    </li>
                    <li class="active ripple">
                      <li class="ripple"><a href="index.php"><span class="fa fa-home fa-2x"></span>Beranda</a></li>
                    </li>
                    <li class="ripple">
                      <li class="ripple"><a href="buku.php"><span class="fa fa-book fa-2x"></span>Data Buku</a></li>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Header Isi -->
            <div id="content">
                <div class="panel">
                  <div class="panel-body">
                      <div class="col-md-6 col-sm-12">
                        <h3 class="animated fadeInLeft">Home/Beranda</h3>
                        <p class="animated fadeInDown">Selamat Datang di Perpustakaan Online</p>
                    </div>
                  </div>                    
                </div>
<!-- Tampilan Dibawah Header Isi  -->

      <div class="col-md-12 padding-0">
              <!--  -->
              <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="panel">
                <div class="panel-body">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class='col-md-12 padding-0'>
                      <div>
                        <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                          <!-- Bottom Carousel Indicators -->
                          <ol class="carousel-indicators">
                            <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#quote-carousel" data-slide-to="1"></li>
                            <li data-target="#quote-carousel" data-slide-to="2"></li>
                          </ol>

                          <!-- Carousel Slides / Quotes -->
                          <div class="carousel-inner">
                            <!-- Quote 1 -->
                            <div class="item active">
                              <blockquote>
                                <div class="col-md-12">
                                  <div class="col-sm-3 text-center">
                                    <img src="../asset/img/avatar.jpg" style="width: 100px;height:100px;">
                                  </div>
                                  <div class="col-sm-9">
                                    <p>Selamat Datang kembali <?php echo $nama;?></p>
                                    <small>Perpustakaan ini tempat untuk membaca buku secara online</small>
                                  </div>
                                </div>
                              </blockquote>
                            </div>
                            <!-- Quote 2 -->
                            <div class="item">
                              <blockquote>
                                <div class="col-md-12">
                                  <div class="col-sm-3 text-center">
                                    <img src="../asset/img/avatar.jpg" style="width: 100px;height:100px;">
                                  </div>
                                  <div class="col-sm-9">
                                    <p>Masuk Untuk Belajar Pulang Membawa Ilmu</p>
                                    <small>Admin</small>
                                  </div>
                                </div>
                              </blockquote>
                            </div>
                            <!-- Quote 3 -->
                            <div class="item">
                              <blockquote>
                                <div class="row">
                                  <div class="col-sm-3 text-center">
                                    <img src="../asset/img/avatar.jpg" style="width: 100px;height:100px;">
                                  </div>
                                  <div class="col-sm-9">
                                    <p>Di perpustakaan, di antara rak-rak buku di bagian terdalam, lorong kedua dari ujung. Kalian akan menemukanku. Aku ingin kalian membawa sesuatu milikku pulang. Kuburkan aku di sana.</p>
                                    <small>Book</small>
                                  </div>
                                </div>
                              </blockquote>
                            </div>
                          </div>

                          <!-- Carousel Buttons Next/Prev -->
                          <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
                          <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
                        </div>                          
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-14">
                <div class="panel"> 
                <?php
                  $sql = "SELECT count(*) AS jumlah FROM buku";
                  $query = mysqli_query($db,$sql);
                  $result = mysqli_fetch_array($query);
                ?>
                <div class="panel-body text-center">
                  <p>Banyak Buku yang tersedia di perpustakaan online ini</p>
                  <h1><?php echo $result['jumlah'];?></h1>
                </div>
              </div>
            </div>
            <!--  -->

            <!--  -->
                

 


    <!-- start: Javascript -->
    <script src="../asset/js/jquery.min.js"></script>
    <script src="../asset/js/jquery.ui.min.js"></script>
    <script src="../asset/js/bootstrap.min.js"></script>
   
    
    <!-- plugins -->
    <script src="../asset/js/plugins/moment.min.js"></script>
    <script src="../asset/js/plugins/fullcalendar.min.js"></script>
    <script src="../asset/js/plugins/jquery.nicescroll.js"></script>
    <script src="../asset/js/plugins/jquery.vmap.min.js"></script>
    <script src="../asset/js/plugins/maps/jquery.vmap.world.js"></script>
    <script src="../asset/js/plugins/jquery.vmap.sampledata.js"></script>
    <script src="../asset/js/plugins/chart.min.js"></script>


    <!-- custom -->
     <script src="../asset/js/main.js"></script>
  <!-- end: Javascript -->
  </body>
</html>