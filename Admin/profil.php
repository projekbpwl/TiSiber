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
                  </ul>
            </div>
        </div>
        <!-- Header Isi -->
            <div id="content">
                <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Data Profil</h3>
                        <p class="animated fadeInDown">
                          Data Profil <span class="fa-angle-right fa"></span> Edit Profil
                        </p>
                    </div>
                  </div>
                </div>
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
                                <form action="profiledit.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
                                  <div class="form-group">
                                    <!-- Inputan Pada Profil -->
                                    <label>Nama Anggota</label>
                                    <input class="form-control" name="nama" value="<?php echo $tampil['nama'];?>" />                                   </div>
                                  <div class="form-group">
                                    <label>Alamat Anggota</label>
                                    <textarea class="form-control" name="alamat" /><?php echo $tampil['alamat'];?></textarea> 
                                  </div>
                                  <div class="form-group">
                                    <label>Nomor Telepon</label>
                                    <input class="form-control" name="no_telp" value="<?php echo $tampil['no_telp'];?>"/>
                                  </div>  
                                  <div class="form-group">
                                    <label>E-Mail Anggota</label>
                                    <input class="form-control" type="email" name="email" value="<?php echo $tampil['email'];?>"/>
                                  </div>
                                  <div class="form-group">
                                    <label>Jenis Kelamin</label><br>
                                    <label class="checkbox-inline">
                                      <input type="radio" value="Laki-Laki" <?php if($tampil['jenis']=="Laki-Laki") {echo "checked";}?> name="jenis"/>Laki-Laki
                                    </label>
                                    <label class="checkbox-inline">
                                      <input type="radio" value="Perempuan" <?php if($tampil['jenis']=="Perempuan") {echo "checked";}?> name="jenis">Perempuan
                                    </label>
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
                              <div class="col-md-2" style="margin-left: 30px;">
                                <form action="prosesprofilgambar.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
                                  <h2>Upload Foto</h2>
                                  Foto:<br>
                                  <div><img src="../asset/img/<?php echo $tampil['gambar'];?>"; width="250px" height="250px"></div>
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