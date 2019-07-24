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
      <link rel="stylesheet" type="text/css" href="../asset/css/plugins/datatables.bootstrap.min.css"/>
    <link href="../asset/css/style.css" rel="stylesheet">
    <!-- end: Css -->
    <title>My Project</title>
	<link rel="shortcut icon" href="../asset/img/logomi.png">
</head>

 <body id="mimin" class="dashboard">
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
                <li class="user-name"><span style="color:white">Hai, <?php echo $nama;?></span></span></li>
                  <li class="dropdown avatar-dropdown">
                   <img src="../asset/img/<?php if('$tampil["gambar"]'){
                    echo 'avatar.jpg';
                   }else{
                    echo $tampil['gambar'];
                   }?>" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/>
                   <ul class="dropdown-menu user-dropdown" style="margin-right: 30px">
                     <li><a href="profil.php"><span class="fa fa-user"></span> My Profile</a></li>
                     <li><a href="#"><span class="fa fa-sign-out"></span> Logout </a></li>
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
                    <li class="active ripple">
                      <li class="ripple"><a href="mahasiswa.php"><span class="fa fa-users fa-2x"></span>Data Mahasiswa</a></li>
                    </li>
                    <li class="ripple">
                        <a class="tree-toggle nav-header"><span class="fa fa-book fa-2x"></span>Data Buku
                            <span class="fa-angle-right fa right-arrow text-right"></span></a>
                        <ul class="nav nav-list tree">
                          <li><a href="buku.php">Tabel Buku</a></li>
                          <li><a href="tambahbuku.php">Tambah Buku</a></li>
                      </ul>
                    </li>
                    <li class="active ripple">
                      <li class="ripple"><a href="soal.php"><span class="icon icons icon-docs fa-2x"></span>Data Soal <br>Dan Pembahasan</a></li>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Header Isi -->
            <div id="content">
                <div class="panel">
                  <div class="panel-body">
                      <div class="col-md-6 col-sm-12">
                        <h3 class="animated fadeInLeft">Tabel Buku</h3>
                        <p class="animated fadeInDown">
                        	Data Buku <span class="fa-angle-right fa"></span> Edit Buku</p>
                    </div>
                  </div>                    
                </div>
                
<!-- Tampilan Dibawah Header Isi  -->
<!--  -->
                  <?php
                    include 'config.php';
                    $id= $_GET['id'];
                    $query="select * from buku where idb='$id'";
                    // echo "$query";
                    $sql= mysqli_query($db, $query);
                    $tampil= mysqli_fetch_array($sql);
                    
                  ?>
                <div class="form-element">
                  <div class="col-md-12 padding-0">
                    <div class="col-md-8">
                      <div class="panel form-element-padding">
                        <div class="panel panel-primary">
                          <div class="panel-heading">
                            <h3 style="color: white">Profil</h3></div>
                          </div>
                          <div class="panel-body" style="padding-bottom:30px;">
                            <div class="row">
                              <div class="col-md-8">
                                <form action="proseseditbuku.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
                                  <div class="form-group">
                                              <label>Nama Buku</label>
                                              <input class="form-control" name="nama_buku" value="<?php echo $tampil['nama_buku'];?>"/>
                                          </div>
                                          <div class="form-group">
                                              <label>Jenis Buku</label>
                                              <input class="form-control" name="jenis_buku" value="<?php echo $tampil['jenis_buku'];?>" />
                                          </div>
                                          <div class="form-group">
                                            <label>Prodi Mahasiswa</label><br>
                                              <select name="prodi" />
                                                <option>Pilih</option>
                                                <option <?php if($tampil['prodi']=="Akuntansi"){echo "selected";} ?>>Akuntansi</option>
                                                <option <?php if($tampil['prodi']=="Teknik Komputer"){echo "selected";} ?>>Teknik Komputer</option>
                                                <option <?php if($tampil['prodi']=="Teknik Elektronika"){echo "selected";} ?>>Teknik Elektronika</option>
                                                <option <?php if($tampil['prodi']=="Teknik Mekatronika"){echo "selected";} ?>>Teknik Mekatronika</option>
                                                <option <?php if($tampil['prodi']=="Teknik Telekomunikasi"){echo "selected";} ?>>Teknik Telekomunikasi</option>
                                                <option <?php if($tampil['prodi']=="Teknik Informatika"){echo "selected";} ?>>Teknik Informatika</option>
                                                <option <?php if($tampil['prodi']=="Sistem Informasi"){echo "selected";} ?>>Sistem Informasi</option>
                                                <option <?php if($tampil['prodi']=="Teknik Elektronika Telekomunikasi"){echo "selected";} ?>>Teknik Elektronika Telekomunikasi</option>
                                                <option <?php if($tampil['prodi']=="Teknik Mesin"){echo "selected";} ?>>Teknik Mesin</option>
                                                <option <?php if($tampil['prodi']=="Teknik Listrik"){echo "selected";} ?>>Teknik Listrik</option>
                                              </select><br><br>
                                          </div>
                                          <div class="form-group">
                                              <label>Tahun Terbit Buku</label>
                                              <select class="form-control" name="tahun_terbit">
                                                  <?php for ($year = date ('Y'); $year > date ('Y')-100; $year--) {?>
                                                      <option value="<?php echo $year; ?>" <?php if($year==$tampil['tahun_terbit']) {echo "selected";} ?>><?php echo $year; ?></option>
                                      <?php } ?>
                                              </select>
                                          </div>
                                  <div class="form-group">
                                    <label>Nama Penerbit Buku</label>
                                    <input class="form-control" name="penerbit" value="<?php echo $tampil['penerbit'];?>" />
                                  </div>
                                  <input type="submit" name="simpan" value="Submit" class="btn btn-primary">
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4 col-sm-12">
                        <div class="col-md-12 panel form-element-padding" style="padding-bottom:50px;padding-right:0px;">
                          <div class="panel-body">
                            <div class="form-group">
                              <div class="col-md-2" style="margin-left: 110px;">
                                <form action="proseslinkbuku.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
                                  <h3>Upload Link Buku</h3>
                                  Link Buku :<br>
                                  <input type="file" name="file" id="file"><br>
                                  <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
<!--  -->
                

 


<!-- start: Javascript -->
<script src="../asset/js/jquery.min.js"></script>
<script src="../asset/js/jquery.ui.min.js"></script>
<script src="../asset/js/bootstrap.min.js"></script>



<!-- plugins -->
<script src="../asset/js/plugins/moment.min.js"></script>
<script src="../asset/js/plugins/jquery.datatables.min.js"></script>
<script src="../asset/js/plugins/datatables.bootstrap.min.js"></script>
<script src="../asset/js/plugins/jquery.nicescroll.js"></script>


<!-- custom -->
<script src="../asset/js/main.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#datatables-example').DataTable();
  });
</script>
<!-- end: Javascript -->
  </body>
</html>