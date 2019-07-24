<?php
include 'config.php';
if (isset($_POST['simpan'])) {
    $id=$_GET['id'];
    $namagt = $_POST['nama'];
    $alamatgt = $_POST['alamat'];
    $no_telpgt = $_POST['no_telp'];
    $emailgt = $_POST['email'];
    $jenisgt = $_POST['jenis'];
    $query=("UPDATE user SET nama='$namagt', no_telp='$no_telpgt', email='$emailgt', jenis='$jenisgt' WHERE idu='$id'");
        $sql=mysqli_query($db,$query);
        if($sql){
            ?>
            <script type="text/javascript">
                alert("Edit Data Berhasil Disimpan");
                window.location.href="profil.php";
            </script>
            
            <?php
        }else{
            echo "Database ERROR";
        }
    }
    ?>