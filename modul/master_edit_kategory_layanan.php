<?php $show_data_category_services=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kategori_layanan WHERE id_kategori_layanan='$_GET[id]'")) ?>
<div class="row">
	<div class='main-containpages'>
		<div class="col-md-6">
			<div class="heading-menubar"><h3>Edit Kategori Layanan</h3></div> 
			<form action="backend/proses_master_kategori_layanan.php?act=update_kategori_layanan" method="post" enctype="multipart/form-data">
				<input type="hidden" name="kode_layanan" value="<?php echo $_GET['id'];?>">
				<div class="form-group">
					<label>Jenis Layanan</label>
					<input type="text" name="jenis_layanan" value="<?php echo $show_data_category_services['jenis_layanan']; ?>" class="form-control" autofocus required="">
				</div>
				<div class="form-group">
					<label>Nama Layanan</label>
					<input type="text" name="nama_layanan" value="<?php echo $show_data_category_services['nama_layanan']; ?>" class="form-control" autofocus required="">
				</div>
				<div class="form-group">
					<label>Harga cleaner</label>
					<input type="text" id="price"  name="harga_layanan" value="<?php echo $show_data_category_services['harga_layanan']; ?>" class="form-control" autofocus required="">
				</div>
				<div class="form-group">
					<label>Deskripsi</label> 
					<textarea name="deskripsi_layanan" class="form-control" autofocus required=""><?php echo $show_data_category_services['deskripsi_layanan'];?></textarea>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Submit</button>
					<button type="reset" onclick="history.back(-1);" class="btn btn-danger">Cancel</button>
				</div>
			</form>
		</div><!--col-md-6-->
	</div>
</div>