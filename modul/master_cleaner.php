<script type="text/javascript">
	$(document).ready(function(){
    	$('#table-mastercleaner').DataTable();
    	$('.btn-cliked').click(function(){
    		$('.btn-show').slideToggle('slow');
    	});
	});
</script>
<?php //get random ID
	$auto="SELECT MAX(id_cleaning) AS id FROM cleaning";
	$tampung = mysqli_query($con,$auto);
	$show=mysqli_fetch_array($tampung);
	//mengatur 3 karakter untuk jumlah karakter yang berubah-ubah
	$get_id_fromtb = $show['id'];
	$potong = substr($get_id_fromtb,4);
	$potong++;
	//mengatur kode transaksi sebagai karakter tetap
	$char   = "CLN";
	//CLN untuk mengatur 3 karakter di belakang 6001
	$IDbaru = $char . sprintf("%02s", $potong);
?>
<div class="row">
	<div class='main-containpages'>
		<div class="col-md-6">
		<div class="heading-menubar"><h3>Master Cleaner</h3></div>
		<button class="btn-cliked" style="margin-bottom:20px;">Tambah Cleaner</button>
			<div class="btn-show" style="display:none;">
				<form action="backend/proses_mastercleaner.php?act=add_cleaner" method="post" id="" enctype="multipart/form-data">
					<div class="form-group">
						<label>Kode cleaner</label>
						<input type="text" name="kode_cleaning" value="<?php echo $IDbaru;?>" readonly="" class="form-control">
					</div>
					<div class="form-group">
						<label>Jenis cleaner</label>
						<input type="text" name="nama_cleaner" class="form-control" autofocus required="">
					</div>
					<div class="form-group">
						<label>Harga cleaner</label>
						<input type="text" name="harga_cleaner" id="price" class="form-control" autofocus required="">
					</div>
					<div class="form-group">
						<label>Deskripsi</label> 
						<textarea name="dekripsi_cleaner" class="form-control" autofocus required=""></textarea>
					</div>
					<div class="form-group">
						<button class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div> 
		</div><!--col-md-6-->
		<div class="col-lg-12 clearfix-bottom clearfix-upertop">
			<table class="table table-hover" id="table-mastercleaner">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode cleaner</th>
						<th>Nama cleaner</th>
						<th>Harga cleaner</th>
						<th>Deskripsi</th>
						<th>Action</th>
					</tr>
				</thead>	
				<tbody>
					<?php
						$no=1;
						$x = mysqli_query($con,"SELECT * FROM cleaning ORDER BY id_cleaning ASC");
						while ($res=mysqli_fetch_array($x)) {
					 ?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $res['id_cleaning']; ?></td>
						<td><?php echo $res['nama_cleaning']; ?></td>
						<td>Rp.<?php echo formatuang($res['harga_cleaning']); ?></td>
						<td><?php echo $res['deskripsi_cleaning']; ?></td>
						<td>
							<a href="homeadmin.php?page=editcleaner&id=<?php echo $res['id_cleaning']?>">Edit</a> ||
							<a onclick="return confirm('Anda yakin menghapus !!')" href="backend/proses_mastercleaner.php?act=delete_cleaner&id=<?php echo $res['id_cleaning'];?>">Hapus</a>
						</td>
					</tr>
					<?php $no++; } ?>
				</tbody>					
			</table>
		</div>
	</div><!--maincontain-page-->
</div><!--row-->



