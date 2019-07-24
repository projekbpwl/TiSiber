<?php
session_start();
include 'config.php';
if (isset($_POST['username'])) {
    $error= array();
    // menyimpan variable yang dikirim Form
    $username = $_POST['username'];
    $password = $_POST['password'];
    // cek nilai variable
    if (empty($username||$password)) {
        echo "<script>alert('Username Dan password Tidak Boleh Kosong'); 
        window.location.href='login.php';</script>";
    }
    if (empty($username)) {
        echo "<script>alert('Username Tidak Boleh Kosong');
        window.location.href='login.php';</script>";  
    }
    if (empty($password)) {
        echo "<script>alert('password Tidak Boleh Kosong'); 
        window.location.href='login.php';</script>";
    }
    else{
    if (count($error)==0) {
        // SQL Insert
         $sql = "SELECT idu,nama, hak_akses FROM user 
            WHERE username='$username' 
            AND password='$password'";
        echo "$sql";
        $query = mysqli_query($db, $sql);
        if( !$query ){
            die( 'Oops!! Database gagal '. $db->error);
            header('location:login.php');
    }if( $query->num_rows == 1 )
    {    
        # jika data yang dimaksud ada
        # maka ditampilkan
        $row =$query->fetch_assoc();
        
        # data nama disimpan di session browser
        $_SESSION['nama_user'] = $row['nama']; 
        $_SESSION['akses']       = $row['hak_akses'];
        $_SESSION['id']= $row['idu'];
 
        if( $row['hak_akses'] == 'Admin')
        {
            # data hak Admin di set
            $_SESSION['saya_admin']= 'TRUE';
            $_SESSION['id']= $row['idu'];
            echo "<br>".$_SESSION['id'];

            # menuju halaman sesuai hak akses
        header('location:admin/index.php');
        exit();
        }elseif ($row['hak_akses'] == 'Member') {
            $_SESSION['saya_admin']= 'FALSE';
            $_SESSION['id']= $row['idu'];
            echo "<br>".$_SESSION['id'];
            header('location:member/index.php');
        exit();
        }
 
    }else{
        # jika data yang dimaksud tidak ada?>
        <script type="text/javascript">
            alert("Username dan Password tidak ditemukan");
        </script>
        <?php
    }
}
}
}
?>