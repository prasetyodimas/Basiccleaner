<script type="text/javascript">
	$(document).ready(function(){
    	$('#table-masterpengguna').DataTable();
    	$('.btn-clicked').click(function(){
    		$('.btn-show').slideToggle('slow');
    	});
	});
</script>
<div class='main-containpages'>
	<div class="col-md-6">
		<div class="heading-menubar"><h3>Tambah Pengguna</h3></div> 
		<button class="btn-clicked" style="margin-bottom:20px;">Tambah Pengguna</button>
		<div class="btn-show" style="display:none;">
			<form action="backend/proses_pengguna.php?act=add_pengguna" method="post" id="" enctype="multipart/form-data">
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="nama_admin" class="form-control" autofocus required="">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password_admin" class="form-control" autofocus required="">
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
					<button class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div><!--col-md-6-->
	<div class="col-lg-12 clearfix-upertop">
		<table class="table table-hover" id="table-masterpengguna">
			<thead class="custom-headtables-globalconf">
				<tr>
					<th>No</th>
					<th>Nama pengguna</th>
					<th>Level pengguna</th>
					<th>Blokir pengguna</th>
					<th>Action</th>
				</tr>
			</thead>	
			<tbody>
			<?php
				$no=1;
				$x = mysqli_query($con,"SELECT * FROM admin ORDER BY id_admin DESC");
				while ($res=mysqli_fetch_array($x)) {
			 ?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $res['nama_admin']; ?></td>
					<td><?php echo $res['level_admin']; ?></td>
					<td><?php echo status_level($res['blokir']); ?></td>
					<td>
						<a href="homeadmin.php?page=editpengguna&id=<?php echo $res['id_admin']?>">Edit</a> ||
						<a onclick="return confirm('Anda yakin menghapus !!')" href="backend/proses_pengguna.php?act=delete_pengguna&id=<?php echo $res['id_admin'];?>">Hapus</a>
					</td>
				<?php $no++; } ?>
				</tr>
			</tbody>					
		</table>
	</div>
</div><!--maincontain-page-->



