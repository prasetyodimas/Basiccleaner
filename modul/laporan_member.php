<div class='main-containpages'>
    <h3>Laporan member</h3>
 	<div class="col-lg-12">
 		<table class="table table-hover">
 			<thead>
 				<tr>
 					<th>No</th>
 					<th>Id Pemesan</th>
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
 					<td><?php echo $no;?></td>
 					<td><?php echo $result['id_member'];?></td>
 					<td><?php echo $result['nama_member'];?></td>
 					<td><?php echo $result['alamat_member'];?></td>
 					<td><?php echo $result['notelp_member'];?></td>
 					<td><?php echo $result['email_member'];?></td>
					<td>
						<a href="homeadmin.php?page=detail_laporan_member">View</a> ||
						<a href="">Cetak</a>
					</td>
 				</tr>
			<?php $no++; } ?>
 			</tbody>
 		</table>
 		<div class="control-action-pages">
 			<button class="btn btn-primary">Cetak Semua Laporan</button>
 		</div>
 	</div>
</div>        