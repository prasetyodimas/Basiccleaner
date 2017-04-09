<?php include "../config/koneksi.php";
$act= $_GET['act'];
// MANAGEMENT MASTER KATEGORI LAYANAN
//add master category services
if ($act=='add_kategori_layanan') {

  $auto="SELECT max(id_kategori_layanan) AS id FROM kategori_layanan";
  $tampung = mysqli_query($con,$auto);
  $show=mysqli_fetch_array($tampung);
  //mengatur 3 karakter untuk jumlah karakter yang berubah-ubah
  $noUrut= (int) substr($show['id'],2,2);
  $counting_nomber = $noUrut + 1;
  //mengatur kode transaksi sebagai karakter tetap
  $char   = "BSC";
  //BSC untuk mengatur 3 karakter di belakang 6001
  $IDbaru = sprintf("%02s", $noUrut);
  //gabung ID
  $post_code    = $_POST['kode_layanan']; 
  $random_id    = mt_rand(10,90);
  $array_id     = array($post_code, $random_id);
  $gabung_char  = implode('',$array_id);

  $filter_price = str_replace(',', '', $_POST['harga_layanan']);
  $array_name   = array($post_code);
  $add_category_service ="INSERT INTO kategori_layanan (jenis_layanan, 
                                                       nama_layanan, 
                                                      harga_layanan, 
                                                  deskripsi_layanan) 
                                     VALUES ('$_POST[jenis_layanan]',
                                             '$_POST[nama_layanan]',
                                                     '$filter_price',
                                          '$_POST[deskripsi_layanan]')";
  $saved =mysqli_query($con,$add_category_service);
  if ($saved) {
     echo "<script>alert('Master kategori layanan berhasil di simpan !!')</script>";
     echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=master_kategori_layanan>";
  }else{
     echo "<script>alert('Master kategori layanan gagal di simpan !!')</script>";
     echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=master_kategori_layanan>";
  }
//edit master category services
}elseif($act=='update_kategori_layanan') {
  $filter_price = str_replace(',', '', $_POST['harga_layanan']);
  $update_category_services = "UPDATE kategori_layanan SET jenis_layanan        ='$_POST[jenis_layanan]', 
                                                           nama_layanan         ='$_POST[nama_layanan]', 
                                                           harga_layanan        ='$filter_price',
                                                           deskripsi_layanan    ='$_POST[deskripsi_layanan]'
                                                     WHERE id_kategori_layanan  ='$_POST[kode_layanan]'";
  //echo $update_category_services; die();
  $saved =mysqli_query($con,$update_category_services);
  if ($saved) {
     echo "<script>alert('Master kategori layanan berhasil di ubah !!')</script>";
     echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=master_kategori_layanan>";
  }else{
     echo "<script>alert('Master kategori layanan gagal di ubah !!')</script>";
     echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=master_kategori_layanan>";
  }
//delete master category services
}elseif ($act=='delete_kate_layanan') {
  $delete_category_services = "DELETE FROM kategori_layanan WHERE id_kategori_layanan='$_GET[id]'";
  $saved =mysqli_query($con,$delete_category_services);
  if ($saved) {
     echo "<script>alert('Master kategori layanan berhasil di hapus !!')</script>";
     echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=master_kategori_layanan>";
  }else{
     echo "<script>alert('Master kategori layanan gagal di hapus !!')</script>";
     echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=master_kategori_layanan>";
  }
}

?>