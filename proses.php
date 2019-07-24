<?php
include 'config.php';
if (isset($_POST['simpan'])) {
	$error= array();
    // menyimpan variable yang dikirim Form
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $jk = $_POST['jenis'];
    // cek nilai variable
    /*Jika nama lengkap kosong maka akan timbul pemberitahuan*/
    if (empty($nama)) {
    	$error[]= "Nama Tidak Boleh Kosong";/* 
        echo "<script>alert('Nama Tidak Boleh Kosong');</script>";*/
    }
    /*Jika username kosong maka akan timbul pemberitahuan*/
    if (empty($username)) {
    	$error[]= "Username Tidak Boleh Kosong";/*
        echo "<script>alert('Username Tidak Boleh Kosong');</script>";*/   
    }
    /*Jika Password kosong maka akan timbul pemberitahuan*/
    if (empty($password)) {
    	$error[]= "Password Tidak Boleh Kosong";/*
        echo "<script>alert('password Tidak Boleh Kosong');</script>";*/   
    }
    /*Jika Email kosong maka akan timbul pemberitahuan*/
    if (empty($email)) {
    	$error[]= "Email Tidak Boleh Kosong";/*
        echo "<script>alert('Email Tidak Boleh Kosong');</script>";*/   
    }

    // // password dirubah ke md5
    // $password = md5($password);
    // default dari hak akses
    $level = 'Member';
    if (count($error)==0) {
    	// Memasukkan data ke database
    	$sql = "INSERT INTO user (nama, username, password, email, jenis, hak_akses) VALUES ('$nama', '$username', '$password', '$email', '$jk', '$level')";
        echo "$sql";
    	$query = mysqli_query($db, $sql);
    	if ($query) {
            echo "<script>alert('Insert Data Berhasil'); window.location.href = 'login.php';</script>";
        } else {
            echo "Oops Database Error";
        }
    }else{
    	session_start();
    	$_SESSION['error_log']=$error;
    	header("location:daftar.php?eror=daftar");
     } 
}else{
	echo "<script>alert('Error');</script>";
	header("location:daftar.php");
}
?>