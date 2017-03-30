<?php include "../config/koneksi.php";

$act= $_GET['act'];
// MANAGEMENT MASTER REGLUE
//add master reglue
if ($act=='add_reglue') {
  $filter_price = str_replace(',', '', $_POST['harga_reglue']);
  $add_reglue ="INSERT INTO reglue (id_reglue, kategori_reglue, harga_reglue, deskripsi_reglue) VALUES ('$_POST[kode_reglue]','$_POST[kategori_reglue]','$filter_price','$_POST[dekripsi_reglue]')";
  $saved =mysqli_query($con,$add_reglue);
  if ($saved) {
     echo "<script>alert('Master reglue berhasil di simpan !!')</script>";
     echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=master_reglue>";
  }else{
     echo "<script>alert('Master reglue gagal di simpan !!')</script>";
     echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=master_reglue>";
  }

}

//edit master reglue
elseif ($act=='update_reglue') {
  $filter_price = str_replace(',', '', $_POST['harga_reglue']);
  $update_reglue = "UPDATE reglue SET kategori_reglue='$_POST[kate_reglue]', harga_reglue='$filter_price', deskripsi_reglue='$_POST[dekripsi_reglue]' WHERE id_reglue='$_POST[kode_reglue]'";
  $saved =mysqli_query($con,$update_reglue);
  if ($saved) {
     echo "<script>alert('Master reglue berhasil di diubah !!')</script>";
     echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=master_reglue>";
  }else{
     echo "<script>alert('Master reglue gagal di diubah !!')</script>";
     echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=master_reglue>";
  }
}

//delete master reglue
elseif ($act=='delete_reglue') {
  $delete_reglue = "DELETE FROM reglue WHERE id_reglue='$_GET[id]'";
  $saved =mysqli_query($con,$delete_reglue);
  if ($saved) {
     echo "<script>alert('Master reglue berhasil di hapus !!')</script>";
     echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=master_reglue>";
  }else{
     echo "<script>alert('Master reglue gagal di hapus !!')</script>";
     echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=master_reglue>";
  }


}


?>