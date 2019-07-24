<?php
include "config.php";
$id = $_GET['id'];
if(!empty($id)){
	mysqli_query($db, "DELETE FROM buku WHERE idb='$id'");?>
	<script type="text/javascript">
	window.location.href="buku.php";	
	</script>
	<?php
}else{
	header('location: index.php?status=gagal');
}
?>
