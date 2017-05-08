<?php include '../config/koneksi.php'; include"../config/function_general.php";?>
<!DOCTYPE html>
<html>
	<head>
		<title>Laporan Pemasukan</title>
	    <link rel="stylesheet" href="<?php echo $site;?>frontend/css/bootstrap.min.css" media="screen">
	    <link rel="stylesheet" href="<?php echo $site;?>frontend/css/bootstrap.min.css" media="print">
	</head>
<body>
<style type="text/css">
	table {
		display: table;
	}
	table thead tr th {
		padding: 5px;
	}
	table tbody tr td{
		padding: 5px;
	}
	.control-action-pages{
		margin-top: 50px;
	}
	/* .control-action-pages{
		margin-top: 150px;
	} */
	h4.customize-size{
		font-size: 16px;
	}
	.main-detail-information{
		margin-top: 50px;
	}
	.main-detail-information .main-tanda-tangan ,.main-paraf-area{
		text-align:center;
		font-size:15px;
	}
	.main-detail-information .main-paraf-area{
		margin-top: 50px;
	}
	thead.custom-header-bordered{
		border: 1px solid #000;
		border-bottom: 1px solid #000;
	}
	.col-md-push-custom {
    	left: 4.333333%;
	}
	.col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7	, .col-md-8, .col-md-9{
		float: left;
	}
	.custom-heading-laporan{
    	margin-left: 100px;
    }
    @media print{
    	.control-action-pages{
    		display: none !important;
    	}
    }
  }
</style>
<div class="row" style="margin-top:50px;">
	<div class="container">
		<div class='main-containpages'>
			<div class="col-lg-12">
				<div class="col-sm-2 col-md-2">
					<img src="<?php echo $site;?>frontend/logo/android-icon-144x144.png">
				</div>
				<div class="col-md-8 col-md-push-custom">
					<h3 class="custom-heading-laporan">LAPORAN PEMASUKAN BASIC CLEANER</h3>
					<p class="col-md-8 custom-space-alamat" style="margin-left:115px;">Jln. Seturan I / 139A, RT 11 RW 01, Olivine Music Studio, 55281</p>			
				</div>
			</div>
		 	<div class="col-lg-12">
		 		<table class="" width="100%" border="1">
		 			<thead class="custom-header-bordered">
		 				<tr>
		 					<th width="50">No</th>
		 					<th>Kode</th>
		 					<th>Nama Pemesan</th>
		 					<th>Nama Barang</th>
		 					<th>Jumlah</th>
		 					<th>Jenis layanan</th>
		 					<th>Nama Layanan</th>
		 					<th>Harga</th>
		 				</tr>
		 			</thead>
		 			<tbody>
		 			<?php 
		 				$no =1;
						$get_datalaporan_transaction = mysqli_query($con,
							"SELECT ts.id_transaksi_shoes,
                                ts.id_member, 
                                ts.nama_lengkap,
                                ts.alamat,
                                ts.no_telp, 
                                ts.email, 
                                ts.tgl_transaksi,
                                dts.nama_barang, 
                                dts.harga, 
                                dts.jumlah_sepatu, 
                                kl.jenis_layanan, 
                                kl.nama_layanan,
                                kl.harga_layanan,
                                kl.deskripsi_layanan FROM transaksi_shoes ts
						     JOIN detail_transaksi_shoes dts ON ts.id_transaksi_shoes=dts.id_transaksi_shoes
						     JOIN kategori_layanan kl ON dts.id_kategori_layanan=kl.id_kategori_layanan");
						while ($result = mysqli_fetch_array($get_datalaporan_transaction)) {
						$showmember = mysqli_fetch_array(mysqli_query($con,
						"SELECT * FROM member m 
						JOIN transaksi_shoes ts ON m.id_member=ts.id_member 
						WHERE ts.id_transaksi_shoes='$result[id_transaksi_shoes]'")); 
		 			?>
 				    <tr>
				      <td><?php echo $no;?></td>
				      <td><?php echo $result['id_transaksi_shoes'];?></td>
				  <?php if($result['id_member']!='-'){ ?>
				      <td width="200"><?php echo $showmember['nama_member'];?></td>
				      <td><?php echo $result['nama_barang'];?></td>
				      <td><?php echo $result['jumlah_sepatu'];?></td>
				      <td><?php echo $result['jenis_layanan'];?></td>
				      <td><?php echo $result['nama_layanan'];?></td>
				      <td>Rp.<?php echo formatuang($result['harga_layanan']);?></td>
				  <?php }else{ ?>
				      <td><?php echo $showmember['nama_lengkap'];?></td>
				      <td><?php echo $result['nama_barang'];?></td>
				      <td><?php echo $result['jumlah_sepatu'];?></td>
				      <td><?php echo $result['jenis_layanan'];?></td>
				      <td><?php echo $result['nama_layanan'];?></td>
				      <td>Rp.<?php echo formatuang($result['harga_layanan']);?></td>
				  <?php } ?>
					</tr>
				  <?php $no++; } ?>
				  <?php
           			  $get_total = mysqli_query($con,"SELECT SUM(kl.harga_layanan) AS total FROM detail_transaksi_shoes dts 
           			  	INNER JOIN transaksi_shoes ts ON dts.id_transaksi_shoes=ts.id_transaksi_shoes
           			  	INNER JOIN kategori_layanan kl ON kl.id_kategori_layanan=dts.id_kategori_layanan");
        			  while ($total_result = mysqli_fetch_array($get_total)) {?>
					<tr>
            			<td colspan="8"><a style="color:#000;text-decoration:none;" class="pull-right">
            			<strong>Total</strong> Rp.<?php echo formatuang($total_result['total']);?></a></td>
         			</tr>
         			<?php } ?>
		 			</tbody>
		 		</table>
		 		<div class="col pull-right main-detail-information">
					<h4 class="customize-size">Yogyakarta <?php echo tgl_indo(date('Y-m-d'));?></h4>
					<div class="main-tanda-tangan">
						<p class="">Pimpinan</p>
					</div>
					<div class="main-paraf-area">(...................................)</div>
				</div>
		 		<div class="control-action-pages">
		 			<a href="" id="hidden-button" onclick="window.print();" class="btn btn-primary hidden-btnprint">Cetak Semua Laporan</a>
		 		</div>
		 	</div>
		</div>        
	</div>
</div>
</body>
</html>