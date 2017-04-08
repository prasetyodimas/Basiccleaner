<?php include 'config/koneksi.php';include 'config/function_general.php';?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <!--favicon-->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $site;?>frontend/logo/favicon-16x16.png">
    <link rel="stylesheet" href="<?php echo $site;?>frontend/css/style.css">
    <link rel="stylesheet" href="<?php echo $site;?>frontend/css/bootstrap.min.css">
    <!-- CSS -->
    <!-- JS -->
    <script src="<?php echo $site;?>frontend/js/jquery.js"></script>
    <script src="<?php echo $site;?>frontend/lib/number/jquery.number.min.js"></script>
    <script src="<?php echo $site;?>frontend/lib/data_tables/jquery.dataTables.js"></script>
    <script type="text/javascript">
        var txt="Basic Cleaner - Shoes Care -";
        var kecepatan=600;var segarkan=null;function bergerak() { document.title=txt;
        txt=txt.substring(1,txt.length)+txt.charAt(0);
        segarkan=setTimeout("bergerak()",kecepatan);}bergerak();
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
            width: 100%;
	    }
	    .col-sm-1,.pull-right,.btn,.btn-lg,.btn-warning,title{
	    	display: none;
	    }
	    nav ul li {
	    	display: none;
	    }
	    th.thead-custom{
	    	background: #000 !important;
	    }
	}
	table.customs >thead.custom-tables>tr.tables>th.thead-custom {
		text-align: center;
	}
	table>tbody>tr>td{
		border-bottom: 1px solid #3a3a3a !important;
	}
	.custom-td-nobordered{
		border-left: 1px solid #fff !important;
		border-bottom:1px solid #fff !important;
		border-right: 1px solid #fff !important;
	}
	th.thead-custom{background: #3a3a3a; color: #fff; }
	.desain-laporan-tanggal{margin-left: 33px; }
	.desain-laporan-nama{margin-left: 51px; }
	.desain-laporan-notelp{margin-left: 41px; }
	.attention-kwitansi{font-size: 10px; }
	.postion-costum-sizing{ position: relative; left: 88px; top: -8px; } 
	.margin-top-10{
		margin-top: 55px;
	}
</style>
<body>
<?php $get_datacustomer = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM transaksi_shoes WHERE id_transaksi_shoes='$_GET[id_nota]'"));?>
<div class="col-lg-12" style="padding:40px;">
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
		<div class="col-md-3 pull-right">
			<img class="postion-costum-sizing" src="<?php echo $site?>/frontend/logo/header-logolaps.png">
		</div>
	</div><!-- row -->
		<table class="table customs table-hover" border="1px">
			<thead class="custom-tables">
				<tr class="tables">
					<th class="thead-custom">Qty</th>
					<th class="thead-custom">Nama Barang</th>
					<th class="thead-custom">Treatment</th>
					<th class="thead-custom">Harga</th>
					<th class="thead-custom">Jumlah</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="padding: 15px 20px;"></td>
					<td></td>
					<td></br></td>
				</tr>
				<tr class="">
					<td colspan="5" class="custom-td-nobordered">
						<div class="row">
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
							<div class="col-md-3">
								<p>Hormat kami</p></br>
								<p style="margin-top:45px;">....................</p>
							</div>
							<div class="col-md-2 col-md-push-2">
								<p>Total : Rp.</p>
							</div>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
		<div class="">
			<button class="btn btn-lg btn-warning" onclick="window_print();">Cetak Nota</button>
		</div>
	</div>
</div>
</body>
</html>
