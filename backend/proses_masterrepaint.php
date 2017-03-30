<?php include "../config/koneksi.php";

$act= $_GET['act'];
// MANAGEMENT MASTER REPAINT
//add  master repaint
if ($act=='add_repaint') {
  $filter_price = str_replace(',', '', $_POST['harga_repaint']);
  $add_repaint ="INSERT INTO repaint (id_repaint, jenis_repaint, harga_repaint, deskripsi_repaint) VALUES ('$_POST[kode_repaint]','$_POST[jenis_repaint]','$filter_price','$_POST[deskripsi_repaint]')";
  $saved =mysqli_query($con,$add_repaint);
  /*foreach ($array_stock_warna as $count_color) {
    $detail_repaint = "INSERT INTO detail_repaint (id_detail_repaint ,id_coloring, id_repaint) VALUES('',$count_color','$_POST[kode_repaint]')";
    $saved_detail_repaint =mysqli_query($con,$detail_repaint);
  }*/
  if ($saved) {
     echo "<script>alert('Master repaint berhasil di simpan !!')</script>";
     echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=master_repaint>";
  }else{
     echo "<script>alert('Master repaint gagal di simpan !!')</script>";
     echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=master_repaint>";
  }
}

//edit master repaint
elseif ($act=='update_repaint') {
  $filter_price = str_replace(',', '', $_POST['harga_repaint']);
  $update_repaint = "UPDATE repaint SET jenis_repaint='$_POST[jenis_repaint]', harga_repaint='$filter_price', deskripsi_repaint='$_POST[desk_repaint]' WHERE id_repaint='$_POST[kode_repaint]'";
  $saved =mysqli_query($con,$update_repaint);
  if ($saved) {
     echo "<script>alert('Master repaint berhasil di diubah !!')</script>";
     echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=master_repaint>";
  }else{
     echo "<script>alert('Master repaint gagal di diubah !!')</script>";
     echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=master_repaint>";
  }
}

//delete master repaint
elseif ($act=='delete_repaint') {
  $delete_repaint = "DELETE FROM repaint WHERE id_repaint='$_GET[id]'";
  $saved =mysqli_query($con,$delete_repaint);
  if ($saved) {
     echo "<script>alert('Master repaint repaint berhasil di hapus !!')</script>";
     echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=master_repaint>";
  }else{
     echo "<script>alert('Master repaint repaint di hapus !!')</script>";
     echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=master_repaint>";
  }


}


?>