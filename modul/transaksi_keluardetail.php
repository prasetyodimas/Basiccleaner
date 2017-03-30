<?php $cek_layanan_status = 
mysqli_fetch_array(mysqli_query($con,"SELECT ts.id_transaksi_shoes,
											 ts.id_member, 
											 dts.id_cleaning, 
											 dts.id_repaint, 
											 dts.id_reglue, 
											 ts.status_member, 
											 ts.tgl_transaksi, 
											 dts.nama_barang, 
											 dts.jumlah_sepatu, 
											 ts.total, 
											 ts.status_pengambilan,
											 ts.nama_lengkap,
											 ts.alamat, 
											 ts.no_telp,
											 ts.email,
											 ts.status_member
										FROM transaksi_shoes ts
										JOIN detail_transaksi_shoes dts ON ts.id_transaksi_shoes=dts.id_transaksi_shoes
										WHERE ts.id_transaksi_shoes='$_GET[id_nota]'")); 
$cek_layanan_status['status_member'];
//$cek_jenis_layanan = mysqli_query($con,"");
$showmember = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM member m 
													JOIN transaksi_shoes ts ON m.id_member=ts.id_member 
													WHERE ts.id_transaksi_shoes='$_GET[id_nota]'")); ?>
<!-- JIKA ADA ID MEMBER NYA -->
<div class='main-containpages'>
	<div style="margin-bottom:30px;">
		<h3>List Detail Transaksi Keluar</h3>
	</div>
    <section>
		<div class="col-md-6 box-detailtransaction_out">
	    	<div class="form-group"><strong>Detail Pemesan</strong></div>
	    	<div class="form-group">
	    		<p>Kode Transaksi<span class="transaksi-idnota">: <?php echo $_GET['id_nota'];?></span></p>
	    	</div>
	    	<?php if ($cek_layanan_status['status_member']=='member') { ?>
		        <div class="form-group">
		            <p>Nama Pemesan<span class="transaksi-pemesan">: <?php echo $showmember['nama_member'] ;?></span></p>
		        </div>
		        <div class="form-group">
		            <p>Alamat <span class="transaksi-alamat">: <?php echo $showmember['alamat_member'];?></span></p>
		        </div>
		        <div class="form-group">
		            <p>No telp <span class="transaksi-notelp">: <?php echo $showmember['notelp_member'];?></span></p>
		        </div>
		        <div class="form-group">
		            <p>Email <span class="transaksi-email">: <?php echo $showmember['email_member'];?></span></p>
		        </div>
		        <div class="form-group">
		            <p>Status <span class="transaksi-status_member">: <?php echo $cek_layanan_status['status_member'];?></span></p>
		        </div>
		    <?php }elseif ($cek_layanan_status['status_member']=='non-member') { ?>
		    	<div class="form-group">
		            <p>Nama Pemesan<span class="transaksi-pemesan">: <?php echo $cek_layanan_status['nama_lengkap'] ;?></span></p>
		        </div>
		        <div class="form-group">
		            <p>Alamat <span class="transaksi-alamat">: <?php echo $cek_layanan_status['alamat'];?></span></p>
		        </div>
		        <div class="form-group">
		            <p>No telp <span class="transaksi-notelp">: <?php echo $cek_layanan_status['no_telp'];?></span></p>
		        </div>
		        <div class="form-group">
		            <p>Email <span class="transaksi-email">: <?php echo $cek_layanan_status['email'];?></span></p>
		        </div>
		        <div class="form-group">
		            <p>Status <span class="transaksi-status_member">: <?php echo $cek_layanan_status['status_member'];?></span></p>
		        </div>
		    <?php } ?>
		</div>
		<div class="col-md-6">
			<div class="form-group"><strong>Detail Barang</strong></div>
			<div class="form-group">
				<p>Deskripsi Barang <span class="transaksi-deskripsibarang"> : <?php echo $cek_layanan_status['nama_barang'];?></span></p>
			</div>
			<div class="form-group">
				<p>Jumlah Sepatu<span class="transaksi-sepatu">: <?php echo $cek_layanan_status['jumlah_sepatu'];?></span></p>
			</div>
			<div class="form-group">
				<p>Status Pengambilan<span class="transaksi-pengambilan">: <?php echo stat_pengambilan($cek_layanan_status['status_pengambilan']);?></span></p>
			</div>
		</div>
		<div class="col-md-12" style="margin-top:50px;">
    		<div class="form-group"><strong>Detail Transaksi</strong></div>
    		<table class="table table-hover" style="font-size:14px;">
    			<thead>
	    			<tr>
	    				<th>Nama Layanan</th>
	    				<th>Jenis Layanan</th>
	    				<th>Harga</th>
	    				<th>Deskripsi Layanan</th>
	    				<th>Tanggal Pesan</th>
	    				<th>Estimasi Pengambilan</th>
    				</tr>
    			</thead>
	    			<?php 
    					$services_cleaning = mysqli_query($con,"SELECT * FROM detail_transaksi_shoes WHERE id_transaksi_shoes='$_GET[id_nota]'");
	    				foreach ($services_cleaning as $key => $value_array) :
	    			?>
    			<tbody>
    				<?php if ($value_array['id_cleaning']!='-') {
    					$get_service_cleaning = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM cleaning WHERE id_cleaning='$value_array[id_cleaning]'"));?>
    				<tr>
    					<td>Cleaning</td>
    					<td><?php echo $get_service_cleaning['nama_cleaning'];?></td>
    					<td>Rp.<?php echo formatuang($get_service_cleaning['harga_cleaning']);?></td>
    					<td><?php echo $get_service_cleaning['deskripsi_cleaning'];?></td>
    					<td><?php echo tgl_indo($cek_layanan_status['tgl_transaksi']);?></td>
    					<td><?php echo tgl_indo(adding_days($cek_layanan_status['tgl_transaksi'])).tgl_indo(split_month_year($cek_layanan_status['tgl_transaksi']));?></td>
    				</tr>
    				<?php }elseif($value_array['id_cleaning']=='-'){ ?>
    				<?php }?>
    				<?php if ($value_array['id_repaint']!='-') {
    					$get_service_repaint = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM repaint WHERE id_repaint='$value_array[id_repaint]'"));?>
    				<tr>
    					<td>Repaint</td>
    					<td><?php echo $get_service_repaint['jenis_repaint']; ?></td>
    					<td>Rp.<?php echo formatuang($get_service_repaint['harga_repaint']);?></td>
    					<td><?php echo $get_service_repaint['deskripsi_repaint']; ?></td>
    					<td><?php echo tgl_indo($cek_layanan_status['tgl_transaksi']);?></td>
    					<td><?php echo tgl_indo(adding_days($cek_layanan_status['tgl_transaksi'])).tgl_indo(split_month_year($cek_layanan_status['tgl_transaksi']));?></td>
    				</tr>
    				<?php }elseif($value_array['id_repaint']=='-'){ ?>
    				<?php } ?>
    				<?php if($value_array['id_reglue']!='-') {
    					$get_service_repaint = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM reglue WHERE id_reglue='$value_array[id_reglue]'"));?>
    				<tr>
    					<td>Reglue</td>
    					<td><?php echo $get_service_repaint['kategori_reglue'];?></td>
    					<td>Rp.<?php echo formatuang($get_service_repaint['harga_reglue']);?></td>
    					<td><?php echo $get_service_repaint['deskripsi_reglue'];?></td>
    					<td><?php echo tgl_indo($cek_layanan_status['tgl_transaksi']);?></td>
    					<td><?php echo tgl_indo(adding_days($cek_layanan_status['tgl_transaksi'])).tgl_indo(split_month_year($cek_layanan_status['tgl_transaksi']));?></td>
    				</tr>
    				<?php }elseif ($value_array['id_reglue']=='-') { ?>
    				<?php } ?>
    				<?php endforeach;?>
    			</tbody>
    		</table>
			<div style="margin-bottom:50px;"></div>
		</div>
    </section>
</div>
 