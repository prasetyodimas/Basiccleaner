<?php include "../config/koneksi.php";

$act = $_GET['act'];
//var date now
$tgl_transaksi = date('Y-m-d');
//variable POST dari form 
$servis_cleaner = $_POST['jenis_cleaner'];
$servis_repaint = $_POST['jenis_repaint'];
$servis_reglue  = $_POST['jenis_reglue'];
//perhitungan jumlah sepatu dikali setiap harga treatment
$subtotal 	  = $_POST['total_trans'];
//$subtotal_transacation  =($count_barang*$subtotal);
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
													  		  '-',
													  		  '$_POST[nama_lengkap_nonmember]',
													  		  '$_POST[alamat_nonmember]',
													  		  '$_POST[notelp_nonmember]',
													  		  '$_POST[email_nonmember]',
													  		  '$_POST[status_member]',
													  		  '$tgl_transaksi',
													  		  '$subtotal',
													  		  'B')";
			$succes_transaksi 		 = mysqli_query($con,$add_transaksi_member);
		//memesan 3 layanan servis sekaligus
		if ($_POST['jenis_cleaner']!='' && $_POST['jenis_repaint']!='' && $_POST['jenis_reglue']!='') {

			//add detail transaksi baru
			$add_transaksi_detail = "INSERT INTO detail_transaksi_shoes(
																    id_transaksi_shoes, 
																    id_cleaning,
																    id_repaint, 
																    id_reglue,
																    nama_barang,
																    jumlah_sepatu) 
															VALUES ('$_POST[kode_transaksi]',
																	'$servis_cleaner',
																	'$servis_repaint',
																	'$servis_reglue',
																	'$_POST[nama_barang]',
																	'$_POST[jumlah_sepatu]')";
			
			$succes_detail_transaksi = mysqli_query($con,$add_transaksi_detail);

			if ($succes_transaksi && $succes_detail_transaksi) {
			    echo "<script>alert('Transaksi berhasil di simpan !!')</script>";
				echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=transaksi_keluar>";
			}else{
			    echo "<script>alert('Transaksi gagal di simpan !!')</script>";
				echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=transaksi_keluar>";
			}	
		//memesan servis cleaning saja
		}elseif ($_POST['jenis_cleaner']!='') {
			//add detail transaksi baru
			$add_transaksi_detail = "INSERT INTO detail_transaksi_shoes(
																    id_transaksi_shoes, 
																    id_cleaning,
																    id_repaint, 
																    id_reglue,
																    nama_barang,
																    jumlah_sepatu) 
															VALUES ('$_POST[kode_transaksi]',
																	'$servis_cleaner',
																	'-',
																	'-',
																	'$_POST[nama_barang]',
																	'$_POST[jumlah_sepatu]')";
			
			$succes_detail_transaksi = mysqli_query($con,$add_transaksi_detail);

			if ($succes_transaksi && $succes_detail_transaksi) {
			    echo "<script>alert('Transaksi berhasil di simpan !!')</script>";
				echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=transaksi_keluar>";
			}else{
			    echo "<script>alert('Transaksi gagal di simpan !!')</script>";
				echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=transaksi_keluar>";
			}
		//memesan servis repaint saja		
		}elseif ($_POST['jenis_repaint']!='') {
			//add detail transaksi baru
			$add_transaksi_detail = "INSERT INTO detail_transaksi_shoes(
																    id_transaksi_shoes, 
																    id_cleaning,
																    id_repaint, 
																    id_reglue,
																    nama_barang,
																    jumlah_sepatu) 
															VALUES ('$_POST[kode_transaksi]',
																	'-',
																	'$servis_repaint',
																	'-',
																	'$_POST[nama_barang]',
																	'$_POST[jumlah_sepatu]')";
			
			$succes_detail_transaksi = mysqli_query($con,$add_transaksi_detail);

			if ($succes_transaksi && $succes_detail_transaksi) {
			    echo "<script>alert('Transaksi berhasil di simpan !!')</script>";
				echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=transaksi_keluar>";
			}else{
			    echo "<script>alert('Transaksi gagal di simpan !!')</script>";
				echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=transaksi_keluar>";
			}
		}elseif ($_POST['jenis_reglue']!='') {
			//add detail transaksi baru
			$add_transaksi_detail = "INSERT INTO detail_transaksi_shoes(
																    id_transaksi_shoes, 
																    id_cleaning,
																    id_repaint, 
																    id_reglue,
																    nama_barang,
																    jumlah_sepatu) 
															VALUES ('$_POST[kode_transaksi]',
																	'-',
																	'-',
																	'$servis_reglue',
																	'$_POST[nama_barang]',
																	'$_POST[jumlah_sepatu]')";
			
			$succes_detail_transaksi = mysqli_query($con,$add_transaksi_detail);

			if ($succes_transaksi && $succes_detail_transaksi) {
			    echo "<script>alert('Transaksi berhasil di simpan !!')</script>";
				echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=transaksi_keluar>";
			}else{
			    echo "<script>alert('Transaksi gagal di simpan !!')</script>";
				echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=transaksi_keluar>";
			}
		}
	}//statement non member
}//statement add_transaksi
?>