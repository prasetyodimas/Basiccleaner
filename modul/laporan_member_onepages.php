<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="<?php echo $site;?>frontend/css/bootstrap.min.css" media="all">
	<link rel="stylesheet" href="<?php echo $site;?>frontend/css/print.css" media="print">
</head>
<body>
<style type="text/css">
	.custom-headtables{background-color: #000; color: #fff; }.col-md-push-custom {left: 4.333333%; } tbody tr td{border-bottom: 1px solid #ddd; }
	h4.customize-size{
		font-size: 16px;
	}
	.main-detail-information{
		margin-top: 50px;
	}
	.main-detail-information .main-tanda-tangan ,.main-paraf-area{
		text-align:center;
		font-size:15px;
	}
</style>
<?php 
	$view_user = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM member ORDER BY id_member DESC"));
?>
<div class='main-containpages'>
	<div class="col-lg-12">
		<div class="col-sm-2 col-md-2">
			<img src="<?php echo $site;?>frontend/logo/android-icon-144x144.png">
		</div>
		<div class="col-md-8 col-md-push-custom">
			<h3 style="margin-left:129px;">LAPORAN MEMBER BASIC CLEANER</h3>
			<p class="col-md-8 col-md-push-2">Jln. Seturan I / 139A, RT 11 RW 01, Olivine Music Studio, 55281</p>			
		</div>
	</div>
 	<div class="col-lg-12">
 		<div class="row">
	 		<div class="col-md-4">
				<div class="form-group">
					<label>Id member</label>
				</div>
	 		</div>
			<div class="col-md-4">
				<div class="form-group">
					: <?php echo $view_user['id_member'];?>
				</div>
			</div>
 		</div>
 		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Nama lengkap</label>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					: <?php echo $view_user['nama_member'];?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>No telp</label>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					: <?php echo $view_user['notelp_member'];?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Email</label>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					: <?php echo $view_user['email_member'];?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Alamat lengkap</label>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					: <?php echo $view_user['alamat_member'];?>
				</div>
			</div>
		</div>
 		<div class="col pull-right main-detail-information">
 			<h4 class="customize-size">Yogyakarta <?php echo tgl_indo(date('Y-m-d'));?></h4>
			<div class="main-tanda-tangan">
				<p class="">Pimpinan</p>
			</div>
			<div class="main-paraf-area">(...................................)</div>
 		</div>
 		<div class="control-action-pages">
 			<a class="btn btn-primary" id="btn-cetak-onepages" onclick="window_print();">Cetak Semua Laporan</a>
 		</div>
 	</div>
</div>    
<script type="text/javascript">
	function window_print(){
		window.print();
	}
</script>    
</body>
</html>