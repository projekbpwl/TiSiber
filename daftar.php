<?php
   session_start();
?>

<title>Form Pendaftaran</title>
<div align='center'>
  <form action="proses.php" method="post">
  <table>
  <tbody>
  <tr><td colspan="2" align="center"><h1>Daftar Baru</h1></td></tr>
  <tr><td>Nama Lengkap</td><td> : <input name="nama" type="text"required></td></tr>
  <tr><td>Email</td><td> : <input name="email" type="email" required></td></tr>
  <tr><td>Username</td><td> : <input name="username" type="text" required></td></tr>
  <tr><td>Password</td><td> : <input name="password" type="password" required></td></tr>
  <tr><td>Jenis Kelamin</td><td> : <input type="radio" name="jenis" value="Laki-Laki"/ required>Laki-Laki
  <input type="radio" name="jenis" value="Perempuan"/ required>Perempuan</td></tr>
  <tr><td colspan="2" align="right"><input value="Daftar" name="simpan" type="submit"> <input value="Batal" type="reset"></td></tr>
  <tr><td colspan="2" align="center">Sudah Punya akun ? <a href="login.php"><b>Login</b></a></td></tr>
  </tbody>
  </table>
  </form>
</div>