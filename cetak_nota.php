<?php include 'config/koneksi.php';
	  include 'config/function_general.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <!--favicon-->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $site;?>frontend/logo/favicon-16x16.png">
    <link rel="stylesheet" href="<?php echo $site;?>frontend/css/print.css" media="print">
    <!--<link rel="stylesheet" href="<?php echo $site;?>frontend/css/bootstrap.min.css" media="all">-->
    <!-- CSS -->
    <!-- JS -->
    <script src="<?php echo $site;?>frontend/js/jquery.js"></script>
    <script src="<?php echo $site;?>frontend/lib/number/jquery.number.min.js"></script>
    <script src="<?php echo $site;?>frontend/lib/data_tables/jquery.dataTables.js"></script>
    <script type="text/javascript">
        var txt 	  = "Basic Cleaner - Shoes Care -";
        var kecepatan = 600;
        var segarkan  = null;
        function bergerak() { document.title=txt;
        	txt 	 =txt.substring(1,txt.length)+txt.charAt(0);
        	segarkan =setTimeout("bergerak()",kecepatan);}bergerak();
        //var global price
        $(document).ready(function(){
            $('#price').number(true);
            $('#price-subtotal').number(true);
            $('#price-jumlah-bayar').number(true);
            $('#price-kembalian-bayar').number(true);
        });
    </script>
    <!-- costum table -->
	<script type="text/javascript">
		function window_print(){
			window.print();
		}
	</script>
</head>
<style type="text/css">
	@media print{
		body, html, table {
			/*set coloring in tables in chrome*/
			-webkit-print-color-adjust: exact;
            width: 100%;
            font-size: 12px;
            font-family: arial,sans-serif;
	    }
	    button#hide-btn{
	    	display: none !important;
	    }
	    nav ul li {
	    	display: none;
	    }
	    table{
			width: 100%;
			border-collapse: collapse;
		}
		table.customs >thead.custom-tables>tr.tables>th.thead-custom {
			text-align: center;
			padding: 8px;
		}
		table>tbody>tr>td{
			border-bottom: 1px solid #3a3a3a;
			padding: 5px;
			border-left: 1px solid #000;
			border-right: 1px solid #000;
		}
		th.thead-custom{
			background: #3a3a3a; color: #fff; 
		}
		.custom-td-nobordered{
			border-left: 1px solid #fff !important;
			border-bottom:1px solid #fff !important;
			border-right: 1px solid #fff !important;
		}
		img.sizing-images-logo{
			width:160px;
			height: auto;
		}
		.no-outline-border-total{
			border-left: none;
		}
		.desain-laporan-tanggal{
			margin-left: 13px;
		}
		.desain-laporan-nama{
			margin-left: 26px;
		}
		.desain-laporan-notelp{
			margin-left: 18px;
		}
	}
	body,html,table{
        font-family: arial,sans-serif;
		box-sizing: border-box;
	}
	.col-lg-12{
		padding: 20px;
	}
	.col-md-9{
		width: 80%;
		float: left;
	}
	.col-md-3{
		width: 20%;
		float: right;
	}
	.col-md-5{
		float:left;
	}
	.col-md-5 .attention-kwitansi{
		
	}	
	table{
		width: 100%;
		border-collapse: collapse;
	}
	table.customs >thead.custom-tables>tr.tables>th.thead-custom {
	    border: 1px solid #3a3a3a;
		text-align: center;
		padding: 8px;
	}
	table>tbody>tr>td{
		border-bottom: 1px solid #3a3a3a;
		padding: 10px;
		border-left: 1px solid #000;
		border-right: 1px solid #000;
	}
	.custom-td-nobordered{
		border-left: 1px solid #fff !important;
		border-bottom:1px solid #fff !important;
		border-right: 1px solid #fff !important;
	}
	th.thead-custom{background: #3a3a3a; color: #fff; }
	.attention-kwitansi{font-size: 10px; }
	.margin-top-10{
		margin-top: 55px;
	}
	img.sizing-images-logo	{
	    width: 160px;
		height: auto;
		margin-bottom: 10px;
		float: right;
	}
	.no-outline-border{
		border-left: none;
		border-bottom:none;
		border-right: none;
	}
	.btn{
		display: inline-block;
		padding: 6px 12px;
		margin-bottom: 0;
		font-size: 14px;
		font-weight: 400;
		line-height: 1.42857143;
		text-align: center;
		white-space: nowrap;
		vertical-align: middle;
		-ms-touch-action: manipulation;
		touch-action: manipulation;
		cursor: pointer;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
		background-image: none;
		border: 1px solid transparent;
		border-radius: 4px;
	}	
	.btn-warning{
		color: #fff;
		background-color: #f19d2c;
		border-color: #ff8e17;
	}
	.no-outline-border-total{
		border-left: none;
	}
	.desain-laporan-tanggal{
		margin-left: 13px;
	}
	.desain-laporan-nama{
		margin-left: 26px;
	}
	.desain-laporan-notelp{
		margin-left: 18px;
	}
</style>
<body>
<?php $get_datacustomer = mysqli_fetch_array(mysqli_query($con,
						"SELECT * FROM transaksi_shoes ts JOIN detail_transaksi_shoes dts
						 WHERE ts.id_transaksi_shoes='$_GET[id_nota]'"));?>
<div class="col-lg-12">
	<div class="row">
		<?php if($get_datacustomer['status_member']!='non-member'){?>
		<div class="col-md-9">
			<div><label>Tanggal <span class="desain-laporan-tanggal">: <?php $date_nowing = date("Y-m-d"); echo tgl_indo($date_nowing);?></span></label></div>
			<div><label>Nama <span class="desain-laporan-nama">: <?php echo $show_member['nama_member'];?></span></label></div>
			<div><label>No telp <span class="desain-laporan-notelp">: <?php echo $show_member['notelp_member']; ?></span></label></div>
		</div>
		<?php }else{?>
		<div class="col-md-9">
			<div><label>Tanggal <span class="desain-laporan-tanggal">: <?php $date_nowing = date("Y-m-d"); echo tgl_indo($date_nowing);?></span></label></div>
			<div><label>Nama <span class="desain-laporan-nama">: <?php echo $get_datacustomer['nama_lengkap'];?></span></label></div>
			<div><label>No telp <span class="desain-laporan-notelp">: <?php echo $get_datacustomer['no_telp']; ?></span></label></div>
		</div>
		<?php } ?>
			<div class="col-md-3">
				<img class="sizing-images-logo" src="<?php echo $site?>/frontend/logo/header-logolaps.png">
			</div>
		</div>
		<table class="table customs">
			<thead class="custom-tables">
				<tr class="tables">
					<th class="thead-custom">Qty</th>
					<th class="thead-custom">Nama Barang</th>
					<th class="thead-custom">Treatment</th>
					<th class="thead-custom">Harga</th>
					<th class="thead-custom">Jumlah</th>
				</tr>
			</thead>
			<?php 
				$getall_transaction = mysqli_query($con,
				   "SELECT * FROM transaksi_shoes ts 
					INNER JOIN detail_transaksi_shoes dts ON ts.id_transaksi_shoes=dts.id_transaksi_shoes
					INNER JOIN kategori_layanan kl ON kl.id_kategori_layanan=dts.id_kategori_layanan 
					WHERE ts.id_transaksi_shoes='$_GET[id_nota]'");
				while ($res_transaction =mysqli_fetch_array($getall_transaction)) {
			 ?>
			<tbody>
				<tr>
					<td><?php echo $res_transaction['jumlah_sepatu']; ?></td>
					<td><?php echo $res_transaction['nama_barang'];?></br></td>
					<td><?php echo $res_transaction['jenis_layanan']." ( " .$res_transaction['nama_layanan']." )";?></td>
					<td>Rp.<?php echo formatuang($res_transaction['harga_layanan']);?></td>
					<td>Rp.<?php echo formatuang($res_transaction['harga_layanan']);?></td>
				</tr>
			<?php } ?>
			<?php 
				$gettotal = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM transaksi_shoes ts 
				INNER JOIN detail_transaksi_shoes dts ON ts.id_transaksi_shoes=dts.id_transaksi_shoes
				INNER JOIN kategori_layanan kl ON kl.id_kategori_layanan=dts.id_kategori_layanan 
				WHERE ts.id_transaksi_shoes='$_GET[id_nota]'"));
			 ?>
				<tr>
			   	 	<td colspan="4" rowspan="3" class="no-outline-border">
			   	 		<div class="col-md-5">
							<span class="attention-kwitansi">PERHATIAN
								<p>1. Cek nama barang yang ada di nota </br>(jenis sepatu warna dan ukuran)</br>
								2. Sampaikan kepada kami jika ada sepatu </br>yang perlu 'treatment' khusus</br>
								3. Pengaduan maksimal 1x24jam</br>
								4. Pengambilan barang harus disertai nota</br>
								5. Sepatu yang tidak diambil lebih daru 14 hari</br>setelah pemberitahuan bukan tanggung jawab kami.</br>
								6. Teliti sebelum meninggalkan toko.</p>
							</span>
						</div>
						<div class="row">
							<div class="col-md-3">
								<p>Hormat kami</p></br>
								<p style="margin-top:45px;">....................</p>
							</div>
						</div>
			   	 	</td>
			   	 	<td class="no-outline-border-total">
			   	 		<strong>Total : Rp.<?php echo formatuang($gettotal['harga']);?></strong>
		   	 		</td>
			  	</tr>
			</tbody>
		</table>
		<div class="">
			<button id="hide-btn" class="btn btn-warning" onclick="window_print();">Cetak Nota</button>
		</div>
	</div>
</div>
</body>
</html>
