<?php include "../config/koneksi.php";
$act = $_GET['act'];
//var date now
$tgl_transaksi = date('Y-m-d');
$array_jml_sepatu  = $_POST['jumlah_sepatu'];
$array_nama_barang = $_POST['nama_barangnonmember'];
$array_jenis_layanan = $_POST['id_layanan_service'];
print_r($array_jml_sepatu);
print_r($array_nama_barang);
exit();
if($act=='add_transaksi') {
	//var check member 
	if ($_POST['status_member']=='member') {
		//tambah member baru
		$addmember_new = "INSERT INTO member (id_member, nama_member, alamat_member, notelp_member, email_member) 
						  VALUES ('$_POST[id_member]','$_POST[nama_lengkap]','$_POST[alamat]','$_POST[notelp]','$_POST[email]')";
		//add transaksi baru
		$add_transaksi_member = "INSERT INTO transaksi_shoes (id_transaksi_shoes, 
															  id_member,
															  nama_lengkap, 
															  alamat, 
															  no_telp, 
															  email,
															  status_member,
															  tgl_transaksi,
															  total,
															  status_pengambilan) 
													  VALUES ('$_POST[kode_transaksi]',
													  		  '$_POST[id_member]',
													  		  '-',
													  		  '-',
													  		  '-',
													  		  '-',
													  		  '$_POST[status_member]',
													  		  '$tgl_transaksi',
													  		  '$subtotal',
													  		  'B')";
		//add detail transaksi baru
		$add_transaksi_detail = "INSERT INTO detail_transaksi_shoes(
																    id_transaksi_shoes, 
																    id_cleaning,
																    id_repaint, 
																    id_reglue,
																    nama_barang,
																    jumlah_sepatu) 
															VALUES ('$_POST[kode_transaksi]',
																	'$_POST[jenis_layanan]',
																	'-',
																	'-',
																	'$_POST[nama_barang]',
																	'$_POST[jumlah_sepatu]')";
		
		$saved_membered 		 = mysqli_query($con,$addmember_new);
		$succes_transaksi 		 = mysqli_query($con,$add_transaksi_member);
		$succes_detail_transaksi = mysqli_query($con,$add_transaksi_detail);

		if ($saved_membered  && $succes_transaksi && $succes_detail_transaksi) {
		    echo "<script>alert('Transaksi berhasil di simpan !!')</script>";
			echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=transaksi_keluar>";
		}else{
		    echo "<script>alert('Transaksi gagal di simpan !!')</script>";
			echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=transaksi_keluar>";
		}
	}elseif($_POST['status_member']=='non-member') {

		$add_transaksi_nonmember = "INSERT INTO transaksi_shoes (id_transaksi_shoes, 
															  id_member,
															  nama_lengkap, 
															  alamat, 
															  no_telp, 
															  email,
															  status_member,
															  tgl_transaksi,
															  status_pengambilan) 
													  VALUES ('$_POST[kode_transaksi]',
													  		  '-',
													  		  '$_POST[nama_lengkap_nonmember]',
													  		  '$_POST[alamat_nonmember]',
													  		  '$_POST[notelp_nonmember]',
													  		  '$_POST[email_nonmember]',
													  		  '$_POST[status_member]',
													  		  '$tgl_transaksi',
													  		  'B')";

		$succes_transaksi = mysqli_query($con,$add_transaksi_nonmember);
	$i=0;
	foreach ($array_jenis_layanan as $key=> $jenis_servis_layanan) {
		//add detail transaksi baru
		$add_transaksi_detail = "INSERT INTO detail_transaksi_shoes(id_transaksi_shoes, 
																	id_kategori_layanan,
																    nama_barang,
																    harga,
																    jumlah_sepatu) 
															VALUES ('$_POST[kode_transaksi]',
																	'$jenis_servis_layanan[$i]',
																	'$array_nama_barang[$i]',
																	'$_POST[total_transcation_item][$i]',
																	'$array_jml_sepatu[$i]')";
		$succes_detail_transaksi = mysqli_query($con,$add_transaksi_detail);
	}
	$i++;

		if ($succes_transaksi && $succes_detail_transaksi) {
		    echo "<script>alert('Transaksi berhasil di simpan !!')</script>";
			echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=transaksi_keluar>";
		}else{
		    echo "<script>alert('Transaksi gagal di simpan !!')</script>";
			echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=transaksi_keluar>";
		}
	}
}//statement add_transaksi
?>