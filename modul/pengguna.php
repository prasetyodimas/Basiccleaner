<script type="text/javascript">
	$(document).ready(function(){
    	$('#table-masterpengguna').DataTable();
    	$('.btn-clicked').click(function(){
    		$('.btn-show').slideToggle('slow');
    	});
    	//VALIDATION RULES
    	$('#validate-pengguna').validate({
    		rules:{
    			nama_admin:{
    				required:true,
    				
    			},
    			password_admin:{
    				required:true,
    			},
    			level_pengguna:{
    				required:true,
    			},
    		},
    		messages:{
    			nama_admin : ' nama pengguna sistem tidak boleh kosong !!',
    			password_admin :'password admin tidak boleh kosong !!',
    			level_pengguna:'level pengguna tidak boleh kosong !!',
    		},
    	});
	});
</script>
<div class="col-md-6">
	<div class="heading-menubar"><h3>Tambah Pengguna</h3></div>
		<div class="form-group">
			<button class="btn-clicked btn btn-primary">Tambah Pengguna</button>
		</div>
		<div class="btn-show" style="display:none;">
			<form action="backend/proses_pengguna.php?act=add_pengguna" method="post" enctype="multipart/form-data" id="validate-pengguna">
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
					<div class="col-md-2 form-group">
						<div class="radio">
	     					 <input type="radio" name="blokir" value="Y">Ya
						</div>
					</div>
					<div class="col-md-2">
						<div class="radio">
	     					 <input type="radio" name="blokir" value="N" checked>Tidak
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<button class="btn btn-primary">Submit</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div><!--col-md-6-->
	<div class="col-lg-12">
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
					<td class="col-md-2">
						<a href="homeadmin.php?page=editpengguna&id=<?php echo $res['id_admin']?>">Edit</a> ||
						<a onclick="return confirm('Anda yakin menghapus !!')" href="backend/proses_pengguna.php?act=delete_pengguna&id=<?php echo $res['id_admin'];?>">Hapus</a>
					</td>
				<?php $no++; } ?>
				</tr>
			</tbody>
		</table>
	</div>
</div><!--maincontain-page-->
