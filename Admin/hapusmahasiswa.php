<?php
include "config.php";
$id = $_GET['id'];
if(!empty($id)){
	$sql=mysqli_query($db, "DELETE FROM user WHERE idu='$id'");?>
	<script type="text/javascript">
	window.location.href="mahasiswa.php";	
	</script>
	<?php
}else{
	header('location: index.php?status=gagal');
}
?>
