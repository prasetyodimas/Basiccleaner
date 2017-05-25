<?php include "../config/koneksi.php"; error_reporting(0);
$act = $_GET['act'];
//var date now
$tgl_transaksi           = date('Y-m-d');
$tgl_pengambilan         = date('Y-m-d');
$potong_date             = substr($tgl_pengambilan,8)+3;
$month_and_year          = substr($tgl_pengambilan, 0,7); 
$gabung 				 = $month_and_year.'-'.$potong_date;
$jumlah_sepatu           = $_POST['jumlah_sepatu'];
$nama_barang_non_member  = $_POST['nama_barangnonmember'];
$nama_barang  			 = $_POST['nama_barang'];
//var kategori layanan
$x = $_POST['category_layanan_cleaning'];
$y = $_POST['category_layanan_repaint'];
$z = $_POST['category_layanan_reglue'];

if($act=='add_transaksi') {
	//var check member 
	if ($_POST['status_member']=='member') {
		
		if ($_POST['x']!='' && $_POST['y']!='' && $_POST['z']!='') {
			//echo "cleaning & reglue & repaint";
			//add transaksi baru
			$add_transaksi_member = "INSERT INTO transaksi_shoes (id_transaksi_shoes, 
																  id_member,
																  nama_lengkap, 
																  alamat, 
																  no_telp, 
																  email,
																  status_member,
																  tgl_transaksi,
																  tgl_pengambilan,
																  status_pengambilan) 
														  VALUES ('$_POST[kode_transaksi]',
														  		  '$_POST[id_member]',
														  		  '$_POST[nama_lengkap]',
														  		  '$_POST[alamat]',
														  		  '$_POST[notelp]',
														  		  '$_POST[email]',
														  		  '$_POST[status_member]',
														  		  '$tgl_transaksi',
														  		  '$gabung',
														  		  'B')";

			$succes_transaksi 		 = mysqli_query($con,$add_transaksi_member);
			//add detail transaksi cleaning
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
			//add detail transaksi repaint
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
			//add detail transaksi reglue
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
		}elseif($_POST['x']!='' && $_POST['y']){
			//echo "cleaning & repaint";
			//add transaksi baru
			$add_transaksi_member = "INSERT INTO transaksi_shoes (id_transaksi_shoes, 
																  id_member,
																  nama_lengkap, 
																  alamat, 
																  no_telp, 
																  email,
																  status_member,
																  tgl_transaksi,
																  tgl_pengambilan,
																  status_pengambilan) 
														  VALUES ('$_POST[kode_transaksi]',
														  		  '$_POST[id_member]',
														  		  '$_POST[nama_lengkap]',
														  		  '$_POST[alamat]',
														  		  '$_POST[notelp]',
														  		  '$_POST[email]',
														  		  '$_POST[status_member]',
														  		  '$tgl_transaksi',
														  		  '$gabung',
														  		  'B')";	

			$succes_transaksi 		 = mysqli_query($con,$add_transaksi_member);
			//add detail transaksi cleaning & repaint

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
			}

		}elseif($_POST['y']!='' && $_POST['z']!=''){
			//echo "repaint & reglue";
			$addmember_new = "INSERT INTO member (id_member, nama_member, alamat_member, notelp_member, email_member) 
						  VALUES ('$_POST[id_member]','$_POST[nama_lengkap]','$_POST[alamat]','$_POST[notelp]','$_POST[email]')";
			$saved_membered 		 = mysqli_query($con,$addmember_new);
			//add transaksi baru
			$add_transaksi_member = "INSERT INTO transaksi_shoes (id_transaksi_shoes, 
																  id_member,
																  nama_lengkap, 
																  alamat, 
																  no_telp, 
																  email,
																  status_member,
																  tgl_transaksi,
																  tgl_pengambilan,
																  status_pengambilan) 
														  VALUES ('$_POST[kode_transaksi]',
														  		  '$_POST[id_member]',
														  		  '$_POST[nama_lengkap]',
														  		  '$_POST[alamat]',
														  		  '$_POST[notelp]',
														  		  '$_POST[email]',
														  		  '$_POST[status_member]',
														  		  '$tgl_transaksi',
														  		  '$gabung',
														  		  'B')";	

			$succes_transaksi 		 = mysqli_query($con,$add_transaksi_member);

			//add detail transaksi repaint & reglue
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
			//echo 'cleaning';
			$addmember_new = "INSERT INTO member (id_member, nama_member, alamat_member, notelp_member, email_member) 
						  VALUES ('$_POST[id_member]','$_POST[nama_lengkap]','$_POST[alamat]','$_POST[notelp]','$_POST[email]')";
			$saved_membered 		 = mysqli_query($con,$addmember_new);

			//add transaksi baru
			$add_transaksi_member = "INSERT INTO transaksi_shoes (id_transaksi_shoes, 
																  id_member,
																  nama_lengkap, 
																  alamat, 
																  no_telp, 
																  email,
																  status_member,
																  tgl_transaksi,
																  tgl_pengambilan,
																  status_pengambilan) 
														  VALUES ('$_POST[kode_transaksi]',
														  		  '$_POST[id_member]',
														  		  '$_POST[nama_lengkap]',
														  		  '$_POST[alamat]',
														  		  '$_POST[notelp]',
														  		  '$_POST[email]',
														  		  '$_POST[status_member]',
														  		  '$tgl_transaksi',
														  		  '$gabung',
														  		  'B')";	

			$succes_transaksi 		 = mysqli_query($con,$add_transaksi_member);

			//add detail transaksi cleaning 
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
			}
		}elseif ($_POST['y']=='Repaint') {
			//echo 'repaint';
			$addmember_new = "INSERT INTO member (id_member, nama_member, alamat_member, notelp_member, email_member) 
						  VALUES ('$_POST[id_member]','$_POST[nama_lengkap]','$_POST[alamat]','$_POST[notelp]','$_POST[email]')";
			$saved_membered 		 = mysqli_query($con,$addmember_new);

			//add transaksi baru
			$add_transaksi_member = "INSERT INTO transaksi_shoes (id_transaksi_shoes, 
																  id_member,
																  nama_lengkap, 
																  alamat, 
																  no_telp, 
																  email,
																  status_member,
																  tgl_transaksi,
																  tgl_pengambilan,
																  status_pengambilan) 
														  VALUES ('$_POST[kode_transaksi]',
														  		  '$_POST[id_member]',
														  		  '$_POST[nama_lengkap]',
														  		  '$_POST[alamat]',
														  		  '$_POST[notelp]',
														  		  '$_POST[email]',
														  		  '$_POST[status_member]',
														  		  '$tgl_transaksi',
														  		  '$gabung',
														  		  'B')";	

			$succes_transaksi 		 = mysqli_query($con,$add_transaksi_member);

			//add detail transaksi cleaning 
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
			}
		}
	}
}