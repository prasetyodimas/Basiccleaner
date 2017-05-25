<?php $shownon_member = mysqli_fetch_array(mysqli_query($con,
	"SELECT ts.id_transaksi_shoes,
			dts.id_kategori_layanan,
		 	ts.id_member, 
			ts.nama_lengkap,
			ts.alamat, 
			ts.no_telp,
			ts.email,
			ts.status_member,
			ts.tgl_transaksi, 
			ts.status_pengambilan,
			dts.nama_barang,
			dts.harga, 
			dts.jumlah_sepatu
	FROM transaksi_shoes ts
	JOIN detail_transaksi_shoes dts ON ts.id_transaksi_shoes=dts.id_transaksi_shoes
	WHERE ts.id_transaksi_shoes='$_GET[id_nota]' GROUP BY ts.id_transaksi_shoes")); 
	$showmember = mysqli_fetch_array(mysqli_query($con,
	"SELECT * FROM member m 
	JOIN transaksi_shoes ts ON m.id_member=ts.id_member 
	WHERE ts.id_transaksi_shoes='$_GET[id_nota]'")); 
?>
<!-- JIKA ADA ID MEMBER NYA -->
<div class='main-containpages'>
	<div style="margin-bottom:30px;">
		<h3>List Detail Transaksi Keluar</h3>
	</div>
    <section>
		<div class="col-md-6 box-detailtransaction_out">
	    	<div class="form-group"><strong>Detail Pemesan</strong></div>
	    	<div class="form-group">
	    		<div class="row">
	    			<div class="col-md-3"> Kode Transaksi </div> 
	    			<div class="col-md-5"> : <?php echo $_GET['id_nota'];?> </div>
    			</div>
	    	</div>
	    	<?php if ($shownon_member['status_member']=='member') { ?>
	        <div class="form-group">
	        	<div class="row">
	        		<div class="col-md-3"> Nama Pemesan </div> 
	        		<div class="col-md-9">: <?php echo $showmember['nama_member'] ;?></div>
	        	</div>
        	</div>
	        <div class="form-group">
	        	<div class="row">
	        		<div class="col-md-3"> Alamat </div> 
	        		<div class="col-md-9">: <?php echo $showmember['alamat_member'];?></div>
	        	</div>
        	</div>
	        <div class="form-group">
	        	<div class="row">
	        		<div class="col-md-3">No telp</div>
	        		<div class="col-md-9">: <?php echo $showmember['notelp_member'];?></div>
	        	</div>
        	</div>
	        <div class="form-group">
	        	<div class="row">
		        	<div class="col-md-3">Email</div>
		        	<div class="col-md-9">: <?php echo $showmember['email_member'];?></div>
	        	</div>
        	</div>
	        <div class="form-group">
	        	<div class="row">
	        		<div class="col-md-3">Status</div>
	        		<div class="col-md-9">: <?php echo $shownon_member['status_member'];?></div>
	        	</div>
	        </div>
		</div>
	    <?php }elseif ($shownon_member['status_member']=='non-member') { ?>
	    	<div class="form-group">
	    		<div class="row">
	        		<div class="col-md-3"> Nama Pemesan </div> 
	        		<div class="col-md-9">: <?php echo $shownon_member['nama_lengkap'] ;?></div>
	        	</div>
	        </div>
	        <div class="form-group">	
	        	<div class="row">
	        		<div class="col-md-3"> Alamat </div> 
	        		<div class="col-md-9">: <?php echo $shownon_member['alamat'];?></div>
	        	</div>
	        </div>
	        <div class="form-group">
	        	<div class="row">
	        		<div class="col-md-3">No telp</div>
	        		<div class="col-md-9">: <?php echo $shownon_member['no_telp'];?></div>
	        	</div>
	        </div>
	        <div class="form-group">
	        	<div class="row">
		        	<div class="col-md-3">Email</div>
		        	<div class="col-md-9">: <?php echo $shownon_member['email'];?></div>
	        	</div>
	        </div>
	        <div class="form-group">
	        	<div class="row">
	        		<div class="col-md-3">Status</div>
	        		<div class="col-md-9">: <?php echo $shownon_member['status_member'];?></div>
	        	</div>
	        </div>
        </div>
	    <?php } ?>
	    <div class="row">
	    	<div class="col-md-6">
	    		<div class="box-detailtransaction_out">
					<div class="form-group">
						<strong>Detail Barang</strong>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4"> Deskripsi Barang </div> 
							<div class="col-md-8"> : <?php echo $shownon_member['nama_barang'];?></div> 
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4"> Jumlah Sepatu </div> 
							<div class="col-md-8"> : <?php echo $shownon_member['jumlah_sepatu'];?></div>
						</div>
					</div>
					
					<div class="form-group">
						<div class="row">
							<div class="col-md-4"> Status Pengambilan </div> 
							<div class="col-md-8"> : <?php echo stat_pengambilan($shownon_member['status_pengambilan']);?></div> 
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4"> Total Transaksi</div> 
							<div class="col-md-8"> : Rp.<?php echo formatuang($shownon_member['harga']);?></div> 
						</div>
					</div>
	    		</div>
	    	</div>
	    </div>
		<div class="col-md-12" style="margin-top:50px;">
    		<div class="form-group"><strong>Detail Transaksi</strong></div>
    		<table class="table table-hover" style="font-size:14px;">
    			<thead class="custom-headtables-globalconf">
	    			<tr>
	    				<th>No</th>
	    				<th>Jenis Layanan</th>
	    				<th>Nama Layanan</th>
	    				<th>Deskripsi Layanan</th>
	    				<th>Harga</th>
	    				<th>Tanggal Pesan</th>
	    				<th>Estimasi Pengambilan</th>
    				</tr>
    			</thead>
    			<?php
    				$no =1;
    				$get_transaction = mysqli_query($con,
    					"SELECT * FROM transaksi_shoes ts 
					     JOIN detail_transaksi_shoes dts ON ts.id_transaksi_shoes=dts.id_transaksi_shoes
    					 JOIN kategori_layanan kl ON dts.id_kategori_layanan=kl.id_kategori_layanan 
    					 WHERE ts.id_transaksi_shoes='$_GET[id_nota]' ORDER BY ts.tgl_transaksi DESC");
						 while ($result_transaction = mysqli_fetch_array($get_transaction)) {
    			 ?>
    			<tbody>
    				<tr>
    					<td><?php echo $no;?></td>
    					<td><?php echo $result_transaction['jenis_layanan'];?></td>
    					<td><?php echo $result_transaction['nama_layanan'];?></td>
    					<td><?php echo $result_transaction['deskripsi_layanan'];?></td>
    					<td>Rp.<?php echo formatuang($result_transaction['harga_layanan']);?></td>
    					<td><?php echo tgl_indo($shownon_member['tgl_transaksi']);?></td>
    					<td><?php echo tgl_indo(adding_days($shownon_member['tgl_transaksi'])).tgl_indo(split_month_year($result_transaction['tgl_transaksi']));?></td>
    				</tr>
    			</tbody>
    			<?php $no++; } ?>
    		</table>
			<div style="margin-bottom:50px;"></div>
		</div>
    </section>
</div>
 