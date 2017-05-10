<?php include '../config/koneksi.php';
	  include '../config/function_general.php';
$act = $_GET['act'];
//validasi pengambilan barang
//if jika pengambilan barang kurang dari tanggal yang ditentukan
$date_now = tgl_indo(date('Y-m-d'));
$get_date_from_tran = mysqli_fetch_array(mysqli_query($con,"SELECT *
					  FROM transaksi_shoes WHERE id_transaksi_shoes='$_POST[id_nota]'"));
//$param_trans = tgl_indo($get_date_from_tran['tgl_transaksi']);
$saran_pengambilan = adding_days($get_date_from_tran['tgl_transaksi']).tgl_indo(split_month_year($get_date_from_tran['tgl_transaksi']));
//echo $date_now.'</br>'. $saran_pengambilan;
if ($date_now != $saran_pengambilan || $date_now < $saran_pengambilan) {
	echo "<script>alert('Maaf barang belum bisa di proses pengambilan karena tanggal anda tidak sesuai saran pengambilan!!');</script>";
	echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=transaksi_belumdiambil>";
}else{
	if ($act == 'update_status_barang') {
		$update_barang    = "UPDATE transaksi_shoes SET status_pengambilan='S' WHERE id_transaksi_shoes='$_POST[id_nota]'";
		$update_confirmed = mysqli_query($con,$update_barang);
		if ($update_confirmed) {
			echo "<script>alert('Update status barang berhasil di konfirmasi !!');</script>";
			echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=transaksi_sudahdiambil>";
		}else{
			echo "<script>alert('Update status barang gagal di konfirmasi !!');</script>";
			echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=transaksi_belumdiambil>";
		}
	}
}
?>