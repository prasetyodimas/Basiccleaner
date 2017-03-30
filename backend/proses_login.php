<?php session_start();
include "../config/koneksi.php";
$username =mysqli_real_escape_string($con,$_POST['username']);
$password =mysqli_real_escape_string($con,md5($_POST['password']));
//cek querinya
$querinya =mysqli_query($con,"SELECT * FROM admin WHERE nama_admin='$username' AND password_admin='$password' AND level_admin='$_POST[level_akses]' AND blokir!='Y'");
$ketemu   =mysqli_fetch_array($querinya);
//note level 1=>admin sistem 2=>receptionist 3=>pimpinan 4=>roomboy
if ($ketemu['nama_admin']==$username AND $ketemu['password_admin']==$password) {
    $_SESSION['id_admin']   		= $ketemu ['id_admin'];
    $_SESSION['nama_admin']     	= $ketemu ['nama_admin'];
    $_SESSION['password_admin']     = $ketemu ['password_admin'];
    $_SESSION['level_admin']  		= $ketemu ['level_admin'];

    echo "<script>alert('Selamat datang ".$_SESSION['nama_admin']." !!')</script>";
    echo "<meta http-equiv=refresh content=0;url=".$site."homeadmin.php?page=homebase>";
}else{
    echo "<script>alert('maaf username dan password anda salah cek kolom username password dan level !!')</script>";
    echo "<script>history.go(-1)</script>";
}

?>
