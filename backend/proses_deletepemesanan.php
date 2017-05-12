<?php include '../config/koneksi.php'; 
$act  = $_GET['act'];
if ($act=='delete_pemesanan') {
	$transaksi_pesan = "DELETE ts, dts FROM transaksi_shoes ts 
	INNER JOIN detail_transaksi_shoes dts ON ts.id_transaksi_shoes=dts.id_transaksi_shoes 
	WHERE dts.id_transaksi_shoes='$_GET[id]' AND ts.id_transaksi_shoes='$_GET[id]'"; 
	$action_delete = mysqli_query($con,$transaksi_pesan);
	if ($action_delete) {
		echo "<script>alert('Transaksi keluar berhasil dihapus !!')</script>";
		echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=transaksi_keluar>";
	}else{
		echo "<script>alert('Transaksi keluar gagal dihapus !!')</script>";
		echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=transaksi_keluar>";
	}
}
?>