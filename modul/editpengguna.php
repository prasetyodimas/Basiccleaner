<?php $show_pengguna=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM admin WHERE id_admin='$_GET[id]'")) ?>
<div class="row">
	<div class='main-containpages'>
		<div class="col-md-6">
			<div class="heading-menubar"><h3>Edit Pengguna</h3></div> 
			<form action="backend/proses_pengguna.php?act=update_pengguna" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id_pengguna" value="<?php echo $show_pengguna['id_admin']; ?>">
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="nama_admin" value="<?php echo $show_pengguna['nama_admin']; ?>" class="form-control" autofocus required="">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password_admin" value="<?php echo $show_pengguna['password_admin']; ?>" class="form-control" autofocus required="">
				</div>
				<div class="form-group">
					<label>Level</label>
					<select name="level_pengguna" class="form-control" autofocus required="">
						<option value="">Choose priority</option>
						<option value="admin">admin</option>
						<option value="manajer">manajer</option>
					</select>
				</div>
				<div class="form-group">
					<label>Blokir</label>
					<p>Jika ingin memblokir user / pengguna sistem,klik pada pilihan dibawah ini</p>
					<label class="radio-inline">
     					 <input type="radio" name="blokir" value="Y">Ya
    				</label>
    				<label class="radio-inline">
     					 <input type="radio" name="blokir" value="N" checked>Tidak
    				</label>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Submit</button>
					<button type="reset" onclick="history.back(-1);" class="btn btn-danger">Cancel</button>
				</div>
			</form>
		</div><!--col-md-6-->
	</div>
</div>