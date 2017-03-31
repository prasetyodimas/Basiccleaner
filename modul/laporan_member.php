<style type="text/css">
	.col-md-push-custom {left: 4.333333%; } tbody tr td{border-bottom: 1px solid #000; }
</style>
<div class='main-containpages'>
	<div class="col-lg-12">
		<div class="col-sm-2 col-md-2">
			<img src="<?php echo $site;?>frontend/logo/android-icon-144x144.png">
		</div>
		<div class="col-md-8 col-md-push-custom">
			<h3>LAPORAN MEMBER BASIC CLEANER SHOES AND CARES</h3>
			<p class="col-md-8 col-md-push-2">Jln. Seturan I / 139A, RT 11 RW 01, Olivine Music Studio, 55281</p>			
		</div>
	</div>
 	<div class="col-lg-12">
 		<table class="table table-hover">
 			<thead class="custom-headtables">
 				<tr>
 					<th>No</th>
 					<th>Kode</th>
 					<th>Nama Pemesan</th>
 					<th>Alamat</th>
 					<th>No telp</th>
 					<th>Email</th>
 					<th>Action</th>
 				</tr>
 			</thead>
 			<tbody>
 			<?php 
 				$no =1;
 				$get_datamember = mysqli_query($con,"SELECT * FROM member ORDER BY id_member DESC");
 				while ($result = mysqli_fetch_array($get_datamember)) {
 			?>
 				<tr>
 					<td width="50"><?php echo $no;?></td>
 					<td><?php echo $result['id_member'];?></td>
 					<td><?php echo $result['nama_member'];?></td>
 					<td><?php echo $result['alamat_member'];?></td>
 					<td><?php echo $result['notelp_member'];?></td>
 					<td><?php echo $result['email_member'];?></td>
					<td>
						<a href="homeadmin.php?page=detail_laporan_member">View</a>
					</td>
 				</tr>
			<?php $no++; } ?>
 			</tbody>
 		</table>
 		<div class="control-action-pages">
 			<a href="<?php echo $site;?>modul/laporan_member_cetak_all.php" target="_blank" class="btn btn-primary">Cetak Semua Laporan</a>
 		</div>
 	</div>
</div>        
