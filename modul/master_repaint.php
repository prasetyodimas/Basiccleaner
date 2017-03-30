<script type="text/javascript">
	$(document).ready(function(){
    	$('#table-masterrepaint').DataTable();
    	$('.btn-clicked').click(function(){
    		$('.btn-show').slideToggle('slow');
    	});
	});
</script>
<?php  //get random ID
	
	$auto="SELECT MAX(id_repaint) AS id FROM repaint";
	$tampung = mysqli_query($con,$auto);
	$show=mysqli_fetch_array($tampung);
	//mengatur 3 karakter untuk jumlah karakter yang berubah-ubah
	$get_id_fromtb = $show['id'];
	$potong = substr($get_id_fromtb,4);
	$potong++;
	//mengatur kode transaksi sebagai karakter tetap
	$char   = "RPNT";
	//CLN untuk mengatur 3 karakter di belakang 6001
	$IDbaru = $char . sprintf("%02s", $potong);
?>
<div class="row">
	<div class='main-containpages'>
		<div class="col-md-6">
			<div class="heading-menubar"><h3>Master Repaint</h3></div>
			<button class="btn-clicked" style="margin-bottom:20px;">Tambah Repaint</button> 
			<div class="btn-show" style="display:none;">
				<form action="backend/proses_masterrepaint.php?act=add_repaint" method="post" id="" enctype="multipart/form-data">
					<div class="form-group">
						<label>Kode repaint</label>
						<input type="text" name="kode_repaint" value="<?php echo $IDbaru; ?>" readonly="" class="form-control">
					</div>
					<div class="form-group">
						<label>Jenis repaint</label>
						<select name="jenis_repaint" class="form-control" autofocus="">
							<option>Standart Material</option>
							<option>Special Material</option>
						</select>
					</div>
					<!-- <div class="form-group">
						<label>Stock warna</label>
							<?php
								$getcolor = mysqli_query($con,"SELECT * FROM coloring");
								while ($res = mysqli_fetch_array($getcolor)) {
							 ?>
							 <div class="form-inline">
								<input style="cursor:pointer;" name="stock_warna[]" type="checkbox" value="<?php echo $res['id_coloring']?>"> <?php echo $res['stock_color']; ?>
							 </div>
							<?php } ?>
					</div> -->
					<div class="form-group">
						<label>Harga repaint</label>
						<input type="text" name="harga_repaint" id="price" class="form-control" autofocus required="">
					</div>
					<div class="form-group">
						<label>Deskripsi</label> 
						<textarea name="deskripsi_repaint" class="form-control" autofocus required=""></textarea>
					</div>
					<div class="form-group">
						<button class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
		</div><!--col-md-6-->
		<div class="col-lg-12 clearfix-upertop clearfix-bottom">
			<table class="table table-hover" id="table-masterrepaint">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode repaint</th>
						<th>Jenis repaint</th>
						<th>Harga repaint</th>
						<th>Deskripsi</th>
						<th>Action</th>
					</tr>
				</thead>	
				<?php
					$no=1;
					$x = mysqli_query($con,"SELECT * FROM repaint ORDER BY id_repaint DESC");
					while ($res=mysqli_fetch_array($x)) {
				 ?>
				<tbody>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $res['id_repaint']; ?></td>
						<td><?php echo $res['jenis_repaint']; ?></td>
						<td>Rp.<?php echo formatuang($res['harga_repaint']); ?></td>
						<td><?php echo $res['deskripsi_repaint']; ?></td>
						<td>
							<a href="homeadmin.php?page=editrepaint&id=<?php echo $res['id_repaint']?>">Edit</a>
							<a onclick="return confirm('Anda yakin menghapus !!')" href="backend/proses_masterrepaint.php?act=delete_repaint&id=<?php echo $res['id_repaint'];?>">Hapus</a>
						</td>
					</tr>
					<?php $no++; } ?>
				</tbody>					
			</table>
		</div>
	</div><!--maincontain-page-->
</div><!--row-->



