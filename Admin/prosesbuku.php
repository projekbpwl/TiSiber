<?php
include 'config.php';
if(isset($_POST['simpan'])){
	$namabk=$_POST['nama_buku'];
    $jenisbk=$_POST['jenis_buku'];
    $tahunbk=$_POST['tahun_terbit'];
    $penerbitbk=$_POST['penerbit'];
    $nama = $_FILES['file']['name'];
    $ukuran = $_FILES['file']['size'];
    $tipe = $_FILES['file']['type'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $lokasi = "../asset/file/";
    move_uploaded_file($tmp_name, $lokasi.$nama);
    $sql=mysqli_query($db,"INSERT into buku (nama_buku, jenis_buku, tahun_terbit, penerbit, link) 
   		values('$namabk', '$jenisbk', '$tahunbk', '$penerbitbk', '$nama')");
    echo $sql;
    if($sql){
    		?>
    		<script type="text/javascript">
   			alert("Data Berhasil Disimpan");
   			window.location.href="buku.php";
    		</script>
  		<?php
    	}else{
        ?>
    		<script type='text/javascript'>
   			alert('Data Gagal Disimpan Karena Ada yang Terlupakan');
   			window.location.href='?id?tambahbuku.php';
    		</script>;
        <?php
    	}
    }
?>
    	