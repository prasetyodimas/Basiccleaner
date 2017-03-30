<script type="text/javascript">
	$(document).ready(function(){
    	$('#table-masterreglue').DataTable();
    	$('.btn-cliked').click(function(){
    		$('.btn-show').slideToggle('slow');
    	});
	});
</script>
<?php  //get random ID
	$auto="SELECT MAX(id_reglue) AS id FROM reglue";
	$tampung = mysqli_query($con,$auto);
	$show=mysqli_fetch_array($tampung);
	//mengatur 3 karakter untuk jumlah karakter yang berubah-ubah
	$get_id_fromtb = $show['id'];
	$potong = substr($get_id_fromtb,4);
	$potong++;
	//mengatur kode transaksi sebagai karakter tetap
	$char   = "RGLU";
	//CLN untuk mengatur 3 karakter di belakang 6001
	$IDbaru = $char . sprintf("%02s", $potong);
?>
<div class="row">
	<div class='main-containpages'>
		<div class="col-md-6">
			<div class="heading-menubar"><h3>Master Reglue</h3></div>
			<button class="btn-cliked" style="margin-bottom:20px;">Tambah Reglue</button>
			<div class="btn-show" style="display:none;">
				<form action="backend/proses_masterreglue.php?act=add_reglue" method="post" id="" enctype="multipart/form-data">
					<div class="form-group">
						<label>Kode Reglue</label>
						<input type="text" name="kode_reglue" value="<?php echo $IDbaru;?>" readonly="" class="form-control">
					</div>
					<div class="form-group">
						<label>kategori reglue</label>
						<select name="kategori_reglue" class="form-control">
							<option value="Light damage">Light Damage</option>
							<option value="Heavy damage">Heavy Damage</option>
						</select>
					</div>
					<div class="form-group">
						<label>Harga reglue</label>
						<input type="text" name="harga_reglue" id="price" class="form-control" autofocus required="">
					</div>
					<div class="form-group">
						<label>Deskripsi</label> 
						<textarea name="dekripsi_reglue" class="form-control" autofocus required=""></textarea>
					</div>
					<div class="form-group">
						<button class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div> 
		</div><!--col-md-6-->
		<div class="col-lg-12 clearfix-upertop">
			<table class="table table-hover" id="table-masterreglue">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode reglue</th>
						<th>Kategori reglue</th>
						<th>Harga reglue</th>
						<th>Deskripsi</th>
						<th>Action</th>
					</tr>
				</thead>	
				<?php
					$no=1;
					$x = mysqli_query($con,"SELECT * FROM reglue ORDER BY id_reglue DESC");
					while ($res=mysqli_fetch_array($x)) {
				 ?>
				<tbody>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $res['id_reglue']; ?></td>
						<td><?php echo $res['kategori_reglue']; ?></td>
						<td>Rp.<?php echo formatuang($res['harga_reglue']); ?></td>
						<td><?php echo $res['deskripsi_reglue']; ?></td>
						<td>
							<a href="homeadmin.php?page=editreglue&id=<?php echo $res['id_reglue']?>">Edit</a> ||
							<a onclick="return confirm('Anda yakin menghapus !!')" href="backend/proses_masterreglue.php?act=delete_reglue&id=<?php echo $res['id_reglue'];?>">Hapus</a>
						</td>
					</tr>
					<?php $no++; } ?>
				</tbody>					
			</table>
		</div>
	</div><!--maincontain-page-->
</div><!--row-->



