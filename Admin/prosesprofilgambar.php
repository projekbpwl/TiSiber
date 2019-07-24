<?php
include 'config.php';
if (isset($_POST['simpan'])) {
    $id=$_GET['id'];
    $nama = $_FILES['file']['name'];
    $ukuran = $_FILES['file']['size'];
    $tipe = $_FILES['file']['type'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $lokasi = "../asset/img/";
    move_uploaded_file($tmp_name, $lokasi.$nama);
    $query=("UPDATE user SET gambar='$nama' WHERE idu='$id'");
    	$sql=mysqli_query($db,$query);

    	if($sql){
    		?>
    		<script type="text/javascript">
    			alert("Edit Data Berhasil Disimpan");
    			window.location.href="profil.php";
    		</script>
    		
    		<?php
    	}
    }
    ?>