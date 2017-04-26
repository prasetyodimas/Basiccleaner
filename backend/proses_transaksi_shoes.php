<?php include "../config/koneksi.php"; error_reporting(0);
$act = $_GET['act'];
//var date now
$tgl_transaksi           = date('Y-m-d');
$jumlah_sepatu           = $_POST['jumlah_sepatu'];
$nama_barang             = $_POST['nama_barangnonmember'];
//jenis layanan
$jenis_layanan_cleaning  = $_POST['category_layanan_cleaning'];
$jenis_layanan_repaint   = $_POST['category_layanan_repaint'];
$jenis_layanan_reglue    = $_POST['category_layanan_reglue'];

$count_total_layanan1  = count($jenis_layanan_cleaning);
$count_total_layanan2  = count($jenis_layanan_cleaning);
$count_total_layanan3  = count($jenis_layanan_cleaning);

$count_all = ($count_total_layanan1 + $count_total_layanan2 + $count_total_layanan3);
//echo $count_all;

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
		  //check jenis layanan 
		if ($count_all == 3) {
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
			//add detail transaksi baru cleaning
			$add_transaksi_detail = "INSERT INTO detail_transaksi_shoes(id_detail_transaksi_shoes,
																	id_transaksi_shoes, 
																	id_kategori_layanan,
																    nama_barang,
																    harga,
																    jumlah_sepatu) 
															VALUES ('',
																	'$_POST[kode_transaksi]',
																	'$_POST[category_layanan_cleaning]',
																	'$nama_barang',
																	'$_POST[total_transcation_item]',
																	'$jumlah_sepatu')";
			$succes_detail_transaksi = mysqli_query($con,$add_transaksi_detail);

			//add detail transaksi baru repaint
			$add_transaksi_detail = "INSERT INTO detail_transaksi_shoes(id_detail_transaksi_shoes,
																	id_transaksi_shoes, 
																	id_kategori_layanan,
																    nama_barang,
																    harga,
																    jumlah_sepatu) 
															VALUES ('',
																	'$_POST[kode_transaksi]',
																	'$_POST[category_layanan_repaint]',
																	'$nama_barang',
																	'$_POST[total_transcation_item]',
																	'$jumlah_sepatu')";
			$succes_detail_transaksi = mysqli_query($con,$add_transaksi_detail);

			//add detail transaksi baru reglue
			$add_transaksi_detail = "INSERT INTO detail_transaksi_shoes(id_detail_transaksi_shoes,
																	id_transaksi_shoes, 
																	id_kategori_layanan,
																    nama_barang,
																    harga,
																    jumlah_sepatu) 
															VALUES ('',
																	'$_POST[kode_transaksi]',
																	'$_POST[category_layanan_reglue]',
																	'$nama_barang',
																	'$_POST[total_transcation_item]',
																	'$jumlah_sepatu')";
			$succes_detail_transaksi = mysqli_query($con,$add_transaksi_detail);

			if ($succes_transaksi) {
			    echo "<script>alert('Transaksi berhasil di simpan !!')</script>";
				echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=transaksi_keluar>";
			}

		}elseif ($_POST['x']=='Cleaning') {
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
			//add detail transaksi baru cleaning
			$add_transaksi_detail = "INSERT INTO detail_transaksi_shoes(id_detail_transaksi_shoes,
																	id_transaksi_shoes, 
																	id_kategori_layanan,
																    nama_barang,
																    harga,
																    jumlah_sepatu) 
															VALUES ('',
																	'$_POST[kode_transaksi]',
																	'$_POST[category_layanan_cleaning]',
																	'$nama_barang',
																	'$_POST[total_transcation_item]',
																	'$jumlah_sepatu')";
			$succes_detail_transaksi = mysqli_query($con,$add_transaksi_detail);

			if ($succes_transaksi) {
			    echo "<script>alert('Transaksi berhasil di simpan !!')</script>";
				echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=transaksi_keluar>";
			/*}else{
			    echo "<script>alert('Transaksi gagal di simpan !!')</script>";
				echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=transaksi_keluar>";
			*/
			}
			
		}elseif($_POST['y']=='Repaint') {
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
			//add detail transaksi baru repaint
			$add_transaksi_detail = "INSERT INTO detail_transaksi_shoes(id_detail_transaksi_shoes,
																	id_transaksi_shoes, 
																	id_kategori_layanan,
																    nama_barang,
																    harga,
																    jumlah_sepatu) 
															VALUES ('',
																	'$_POST[kode_transaksi]',
																	'$_POST[category_layanan_repaint]',
																	'$nama_barang',
																	'$_POST[total_transcation_item]',
																	'$jumlah_sepatu')";
			$succes_detail_transaksi = mysqli_query($con,$add_transaksi_detail);

			if ($succes_transaksi) {
			    echo "<script>alert('Transaksi berhasil di simpan !!')</script>";
				echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=transaksi_keluar>";
			/*}else{
			    echo "<script>alert('Transaksi gagal di simpan !!')</script>";
				echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=transaksi_keluar>";*/
			}	

		}elseif($_POST['z']=='Reglue') {
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
			//add detail transaksi baru reglue
			$add_transaksi_detail = "INSERT INTO detail_transaksi_shoes(id_detail_transaksi_shoes,
																	id_transaksi_shoes, 
																	id_kategori_layanan,
																    nama_barang,
																    harga,
																    jumlah_sepatu) 
															VALUES ('',
																	'$_POST[kode_transaksi]',
																	'$_POST[category_layanan_reglue]',
																	'$nama_barang',
																	'$_POST[total_transcation_item]',
																	'$jumlah_sepatu')";
			$succes_detail_transaksi = mysqli_query($con,$add_transaksi_detail);

			if ($succes_transaksi) {
			    echo "<script>alert('Transaksi berhasil di simpan !!')</script>";
				echo "<meta http-equiv=refresh content=0;url=$site"."homeadmin.php?page=transaksi_keluar>";
			}
		}

	  
	}
}//statement add_transaksi
?>