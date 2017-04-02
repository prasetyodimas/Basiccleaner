<script type="text/javascript">
	$(document).ready(function(){
    	$('#table-masterpengguna').DataTable();
    	$('.btn-clicked').click(function(){
    		$('.btn-show').slideToggle('slow');
    	});
	});
</script>
<style type="text/css">
.radio-s label, .radio-s input[type="radio"] + span, .radio-s input[type="radio"] + span::after, .checkboxe-s label, .checkboxe-s input[type="checkbox"] + span, .checkboxe-s input[type="checkbox"] + span::after {
    display:inline-block;
    vertical-align:middle
}
.radio-s, .checkboxe-s {
    position:relative
}
.radio-s label *, .checkboxe-s label * {
    cursor:pointer
}
.radio-s input[type="radio"], .checkboxe-s input[type="checkbox"] {
    position:absolute;
    display:none
}
.radio-s input[type="radio"] + span, .checkboxe-s input[type="checkbox"] + span {
    color:#333

}
.radio-s label:hover span, .checkboxe-s label:hover span {
    color:#000
}
.radio-s input[type="radio"] + span::after, .checkboxe-s input[type="checkbox"] + span::after {
    margin: 0 auto 0 10px;
    width: 13px;
    height: 13px;
    border: solid 2px #ccc;
    background-size: 13px;
    content:"";
    text-align: center;
    line-height: 17px;
    border-radius: 50%;
    /*display: block;*/
}
.checkboxe-s input[type="checkbox"] + span:hover::after {
    border:solid 2px #5a5a5a
}
.radio-s input[type="radio"]:checked + span::after, .checkboxe-s input[type="checkbox"]:checked + span::after {
    width:13px;
    height:13px;
    border: 2px solid #01A982;
    background-color:#FFFFFF;
    color:#01A982;
    line-height:17px
}
.radio-s input[type="radio"]:disabled + span, .checkboxe-s input[type="checkbox"]:disabled + span {
    opacity:.4;
    cursor:default
}
.checkboxe-s input[type="checkbox"] + span::after {
    border-radius:inherit;
}
.radio-s input[type="radio"]:checked + span::after {
    content:"\2022";
    font-size:24px
}
.checkboxe-s li {
    list-style: none;
}
:root .checkboxe-s input[type="checkbox"]:checked + span::after {
    content:"\2713";
    font-family: arial;
    font-size: 14px;
    font-weight: bold;
}
.checkboxe-s input[type="checkbox"]:checked + span::after {
    background-color: #FFFFFF;
    border: solid 2px #01A982;
    color: #01A982;
    line-height: 14px;
}
.checkboxe-s input[type="checkbox"]:checked + span::after {

    border: solid 2px #01A982;

}
</style>
<div class="col-md-6">
	<div class="heading-menubar"><h3>Tambah Pengguna</h3></div>
		<div class="form-group">
			<button class="btn-clicked btn btn-primary">Tambah Pengguna</button>
		</div> 
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
					<div class="col-md-2 form-group">
						<div class="radio">
							<label class="radio-inline">
		     					 <input type="radio" name="blokir" value="Y">Ya
		    				</label>
						</div>
					</div>
					<div class="col-md-2">
						<div class="radio">
		    				<label class="radio-inline">
		     					 <input type="radio" name="blokir" value="N" checked>Tidak
		    				</label>
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



