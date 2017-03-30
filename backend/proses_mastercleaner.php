<?php include "../config/koneksi.php";

$act= $_GET['act'];
// MANAGEMENT MASTER CLEANER
//add master cleaner
if ($act=='add_cleaner') {
  $filter_price = str_replace(',', '', $_POST['harga_cleaner']);
  $add_cleaning ="INSERT INTO cleaning (id_cleaning, nama_cleaning, harga_cleaning, deskripsi_cleaning) 
            VALUES ('$_POST[kode_cleaning]','$_POST[nama_cleaner]','$filter_price','$_POST[dekripsi_cleaner]')";
  $saved =mysqli_query($con,$add_cleaning);
  if ($saved) {
     echo "<script>alert('Master cleaning berhasil di simpan !!')</script>";
     echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=master_cleaner>";
  }else{
     echo "<script>alert('Master cleaning gagal di simpan !!')</script>";
     echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=master_cleaner>";
  }

}
//edit master cleaner
elseif ($act=='update_cleaner') {
  $update_cleaning = "UPDATE cleaning SET nama_cleaning='$_POST[nama_cleaner]', harga_cleaning='$_POST[harga_cleaner]', deskripsi_cleaning='$_POST[dekripsi_cleaner]'
                    WHERE id_cleaning='$_POST[kode_cleaning]'";
  $saved =mysqli_query($con,$update_cleaning);
  if ($saved) {
     echo "<script>alert('Master cleaning berhasil di diubah !!')</script>";
     echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=master_cleaner>";
  }else{
     echo "<script>alert('Master cleaning gagal di diubah !!')</script>";
     echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=master_cleaner>";
  }
}

//delete master cleaner
elseif ($act=='delete_cleaner') {
  $delete_cleaning = "DELETE FROM cleaning WHERE id_cleaning='$_GET[id]'";
  $saved =mysqli_query($con,$delete_cleaning);
  if ($saved) {
     echo "<script>alert('Master cleaning berhasil di hapus !!')</script>";
     echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=master_cleaner>";
  }else{
     echo "<script>alert('Master cleaning gagal di hapus !!')</script>";
     echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=master_cleaner>";
  }
}

?>