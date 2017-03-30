<?php include "../config/koneksi.php";

$act= $_GET['act'];
// MANAGEMENT PENGGUNA 
//add pengguna 
if ($act=='add_pengguna') {
  $password_admin = md5($_POST['password_admin']);
  $add_pengguna ="INSERT INTO admin (id_admin, nama_admin, password_admin, level_admin, blokir) 
            VALUES ('','$_POST[nama_admin]','$password_admin','$_POST[level_pengguna]','$_POST[blokir]')";
  $saved =mysqli_query($con,$add_pengguna);
  if ($saved) {
     echo "<script>alert('Pengguna berhasil di simpan !!')</script>";
     echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=pengguna>";
  }else{
     echo "<script>alert('Pengguna gagal di simpan !!')</script>";
     echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=pengguna>";
  }

}
//edit pengguna 
elseif ($act=='update_pengguna') {
  $update_admin = "UPDATE admin SET nama_admin='$_POST[nama_admin]', password_admin='$_POST[password_admin]', level_admin='$_POST[level_pengguna]', blokir='$_POST[blokir]'
                    WHERE id_admin='$_POST[id_pengguna]'";
  $saved =mysqli_query($con,$update_admin);
  if ($saved) {
     echo "<script>alert('Pengguna berhasil di diubah !!')</script>";
     echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=pengguna>";
  }else{
     echo "<script>alert('Pengguna gagal di diubah !!')</script>";
     echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=pengguna>";
  }
}

//delete pengguna 
elseif ($act=='delete_pengguna') {
  $delete_pengguna = "DELETE FROM admin WHERE id_admin='$_GET[id]'";
  $saved =mysqli_query($con,$delete_pengguna);
  if ($saved) {
     echo "<script>alert('Pengguna berhasil di hapus !!')</script>";
     echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=pengguna>";
  }else{
     echo "<script>alert('Pengguna gagal di hapus !!')</script>";
     echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=pengguna>";
  }
}

?>