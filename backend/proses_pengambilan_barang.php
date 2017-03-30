<?php include '../config/koneksi.php';
$act = $_GET['act'];
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

?>