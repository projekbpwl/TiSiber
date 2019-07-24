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
                <img src="../asset/img/Perpustakaan.png" width="20%" style="margin-top: -15px"> 
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
                <div class="panel">
                  <div class="panel-body">
                      <div class="col-md-6 col-sm-12">
                        <h3 class="animated fadeInLeft">Tabel Buku</h3>
                        <p class="animated fadeInDown">
                        	Data Buku <span class="fa-angle-right fa"></span> Tabel Buku</p>
                    </div>
                  </div>                    
                </div>
<!-- Tampilan Dibawah Header Isi  -->

			<div class="col-md-12">
                <div class="col-md-12">
                  <div class="panel panel-primary">
                    <div class="panel-heading"><h3 style="color: white">Data Buku</h3></div>
						            <div class="panel-body">
                            <div class="responsive-table">
                                <table class="table table-striped table-bordered table-hover" id="datatables-example"  width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Buku</th>
                                            <th>Jenis Buku</th>
                                            <th>Tahun Terbit</th>
                                            <th>Penerbit</th>
                                            <th>Link</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php
                                    		include 'config.php';
                  											$no=1;
                  											$sql = mysqli_query($db,"SELECT * FROM buku");
                  											while ($data = mysqli_fetch_array($sql)) {
                  										?>
                  										<tr>
                  					  						<td><div align="center"><?php echo $no++;?></div></td>
                  											<td><div align="center"><?php echo $data['nama_buku'];?></div></td>
                  											<td><div align="center"><?php echo $data['jenis_buku'];?></div></td>
                  											<td><div align="center"><?php echo $data['tahun_terbit'];?></div></td>
                  											<td><div align="center"><?php echo $data['penerbit'];?></div></td>
                                        <td><div align="center"><?php if ($data['link']=="") {
                                          echo "-";
                                        }else{
                                          ?>
                                          <a href="../asset/file/<?php echo $data['link'];?>"><span class="icons icon-note"></span></a><?php 
                                        } ?></div></td>
                  											<td>
                  												<a href="editbuku.php?id=<?php echo $data['idb']; ?>" class="btn btn-info">Edit</a>
                  												<a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')" href="hapusbuku.php?id=<?php echo $data['idb']; ?>" class="btn btn-danger">Hapus</a>
                  											</td>
                  										</tr>
                  										<?php }?>
                                    </tbody>
                                </table>
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