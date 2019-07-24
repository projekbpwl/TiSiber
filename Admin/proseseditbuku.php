<?php
include 'config.php';
if (isset($_POST['simpan'])) {
	$id= $_GET['id'];
	$namabk=$_POST['nama_buku'];
	$jenisbk=$_POST['jenis_buku'];
	$prodigt = $_POST['prodi'];
    $tahunbk=$_POST['tahun_terbit'];
    $penerbitbk=$_POST['penerbit'];
    $sql= ("UPDATE buku set nama_buku='$namabk', jenis_buku='$jenisbk', prodi='$prodigt', tahun_terbit='$tahunbk', penerbit='$penerbitbk'
	where idb='$id'");
	$query= mysqli_query($db,$sql);
	if($sql){
		?>
	<script type="text/javascript">
		alert("Edit Data Berhasil Disimpan");
		window.location.href="buku.php";
		</script>
		<?php
   	}else{
        ?>
    		<script type='text/javascript'>
   			alert('Data Gagal Disimpan');
   			window.location.href='buku.php';
    		</script>;
        <?php
   	}
}
?>
