<?php $show_member=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM member WHERE id_member='$_GET[id_mem]'")) ?>
<div class="row">
	<div class='main-containpages'>
		<div class="col-md-6">
			<div class="heading-menubar"><h3>Edit Member</h3></div> 
			<form action="backend/proses_member.php?act=update_member" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id_member" value="<?php echo $show_member['id_admin']; ?>">
				<div class="form-group">
					<label>Id member</label>
					<input type="text" name="id_member" value="<?php echo $show_member['id_member'] ?>" class="form-control" autofocus required="" readonly>
				</div>
				<div class="form-group">
					<label>Nama Member</label>
					<input type="text" name="nama_member" value="<?php echo $show_member['nama_member']; ?>" class="form-control" autofocus required="">
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<input type="text" name="alamat_member" value="<?php echo $show_member['alamat_member']; ?>" class="form-control" autofocus required="">
				</div>
				<div class="form-group">
					<label>No Telp</label>
					<input type="text" name="notelp_member" value="<?php echo $show_member['notelp_member']; ?>" class="form-control" autofocus required="">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" name="email_member" value="<?php echo $show_member['email_member']; ?>" class="form-control" autofocus required="">
				</div>
				<div class="form-group">
					<label>Status Member</label>
					<input type="text" name="status_member" value="<?php echo $show_member['status_member']; ?>" class="form-control" autofocus required="" readonly>
				</div>
				<div class="form-group">
					<label>Non Aktif Member</label>
					<p>Jika ingin menonaktifkan member, klik pada pilihan dibawah ini</p>
					<label class="radio-inline">
     					 <input type="radio" name="status_member" value="Aktif" checked>Aktif
    				</label>
    				<label class="radio-inline">
     					 <input type="radio" name="status_member" value="Non-Aktif">Non-Aktif
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