<?php 
// view user member
$viewuser_transaction = mysqli_fetch_array(mysqli_query($con,
	"SELECT ts.id_transaksi_shoes, m.nama_member, m.alamat_member, m.notelp_member, m.email_member, ts.tgl_transaksi
	FROM member m JOIN transaksi_shoes ts ON m.id_member=ts.id_member WHERE ts.id_transaksi_shoes='$_GET[id_nota]'"));
?>

<!-- costum table -->
<script type="text/javascript">
	function window_print(){
		window.print();
	}
</script>
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
		border-bottom: 1px solid #000;
		text-align: center;
	}
	th.thead-custom{background: #3a3a3a; color: #fff; } 
	.desain-laporan-tanggal{margin-left: 33px; }
	.desain-laporan-nama{margin-left: 51px; } 
	.desain-laporan-notelp{margin-left: 41px; } 
	.attention-kwitansi{font-size: 10px; } 
	.postion-costum-sizing{position: relative; left: 20px; top: -3px; } 
	.margin-top-10{
		margin-top: 55px;
	}
</style> 
	<div class="row">
	 <div class='main-containpages'>
		<div class="col-lg-12 margin-top-10">
			<div class="col-md-9">
				<div>
					<label>Tanggal <span class="desain-laporan-tanggal">: <?php $date_nowing = date("Y-m-d"); echo tgl_indo($date_nowing);?></span></label>
				</div>
				<div>
					<label>Nama <span class="desain-laporan-nama">: <?php echo $viewuser_transaction['nama_member'];?></span></label>
				</div>
				<div>
					<label>No telp <span class="desain-laporan-notelp">: <?php echo $viewuser_transaction['notelp_member']; ?></span></label>
				</div>
			</div>
			<div class="col pull-right">
				<img class="postion-costum-sizing" src="<?php echo $site?>/frontend/logo/header-logolaps.png">
			</div>
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
						<td style="padding: 45px 20px;">1</td>
						<td>Nike Roshe Run Navy Size (7)</td>
						<td>Deep Cleaning</td>
						<td>Rp.45.000,-</td>
						<td>Rp.45.000,-</td>
					</tr>
					<tr>
						<td colspan="4">
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
								<div class="col-md-4">
									<p>Hormat kami</p></br>
									<p style="margin-top:45px;">....................</p>
								</div>
								<div class="col pull-right">
									Total :
								</div>
							</div>
						</td>
						<td></td>
					</tr>
				</tbody>
			</table>
			<div class="">
				<button class="btn btn-lg btn-warning" onclick="window_print();">Cetak Nota</button>
			</div>
		</div>		
	</div>
</div>
