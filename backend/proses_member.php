<?php include '../config/koneksi.php';

$act = $_GET['act'];
if ($act =='add_member') {
	$add_transaksi_member = "INSERT INTO member (id_member, nama_member, alamat_member, notelp_member, email_member) 
	VALUES ('$_POST[id_member]','$_POST[nama_member]','$_POST[alamat_member]','$_POST[notelp_member]','$_POST[email_member]')";
	$saved_transaksi_member = mysqli_query($con,$add_transaksi_member);
	if ($saved_transaksi_member) {
		echo "<script>alert('Data member berhasil di simpan !!');</script>";
		echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=data_member>";
	}else{
		echo "<script>alert('Data member gagal berhasil di simpan !!');</script>";
		echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=data_member>";
	}

}elseif ($act=='update_member') {
	$update_transaksi_member = "UPDATE member SET nama_member='$_POST[nama_member]',alamat_member='$_POST[alamat_member]',notelp_member='$_POST[notelp_member]',email_member='$_POST[email_member]',status_member='$_POST[status_member]' WHERE id_member='$_POST[id_member]'"; 
	$saved_transaksi_member = mysqli_query($con,$update_transaksi_member);
	if ($saved_transaksi_member) {
		echo "<script>alert('Data member berhasil di simpan !!');</script>";
		echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=data_member>";
	}else{
		echo "<script>alert('Data member gagal berhasil di simpan !!');</script>";
		echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=data_member>";
	}

}elseif ($act=='delete_member'){
	//proses delete member
	$get_member = mysqli_query($con,"DELETE FROM member WHERE id_member='$_GET[id_member]'");
	if ($get_member) {
		echo "<script>alert('Data member berhasil di hapus !!');</script>";
		echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=data_member>";
	}else{
		echo "<script>alert('Data member gagal berhasil di hapus !!');</script>";
		echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=data_member>";
	}
}
?>