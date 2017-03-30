<?php $getmember = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM member WHERE id_member='$_GET[id_member]'"));?>
<style type="text/css">
    .detail-member-idmember{margin-left: 50px; } 
    .detail-member-namalengkap{margin-left: 18px; } 
    .detail-member-alamat{margin-left: 71px; } 
    .detail-member-notelp{margin-left: 71px; } 
    .detail-member-email{margin-left: 80px; } 
</style>
<div class='main-containpages'>
    <div style="margin-bottom:20px;">
        <h3>Cetak Kartu Member Basic Cleaner</h3>
    </div>
    <div class="col-md-6" style="margin-bottom:50px;">
        <p><strong>PREVIEW DATA MEMBER</strong></p>
        <div class="form-group">
            <label>Id Member</label>
            <input type="text" name="id_member" class="form-control" value="<?php echo $_GET['id_member'];?>">            
        </div>           
        <div class="form-group">
            <label>Nama member</label>
            <input type="text" name="nama_member" class="form-control" value="<?php echo $getmember['nama_member'];?>">
        </div>
        <div class="form-group">
            <label>Alamat member</label>
            <input type="text" name="alamat_member" class="form-control" value="<?php echo $getmember['alamat_member'];?>">
        </div>
        <div class="form-group">
            <label>No telp</label>
            <input type="text" name="notelp_member" class="form-control" value="<?php echo $getmember['notelp_member'];?>">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email_member" class="form-control" value="<?php echo $getmember['email_member']; ?>">
        </div>
    </div><!-- col -md -6 -->
    <div class="col-md-6">
        <p><strong>PREVIEW KARTU MEMBER</strong></p>
        <div class="panel panel-default">
            <div class="panel-heading"><i>Basic Cleaner Membered</i></div>
            <div class="panel-body">
                <div class="col pull-right"> <img src="<?php echo $site;?>frontend/logo/android-icon-144x144.png"> </div> 
                <p>Id Member<span class="detail-member-idmember">: <?php echo $_GET['id_member'];?></span></p>
                <p>Nama Lengkap <span class="detail-member-namalengkap">: <?php echo $getmember['nama_member'];?></span></p>
                <p>Alamat <span class="detail-member-alamat">: <?php echo $getmember['alamat_member'];?></span></p>
                <p>No Telp<span class="detail-member-notelp">: <?php echo $getmember['notelp_member'];?></span></p>
                <p>Email <span class="detail-member-email">: <?php echo $getmember['email_member'];?></span></p>
            </div>
        </div>
        <div class="form-group">
            <a href="<?php echo $site;?>cetak.php" target="_blank" class="btn btn-danger">Cetak Kartu</a>
        </div>     
    </div>
</div>