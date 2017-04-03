<?php $show_member = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM member WHERE id_member='$_GET[id_mem]'"));?>
<div class='main-containpages'>
    <div style="margin-bottom:20px;">
        <h3>Detail Member Basic Cleaner</h3>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-2">
                            <img class="img-responsive" src="<?php echo $site;?>frontend/logo/android-icon-144x144.png">
                        </div>
                        <div class="col-md-10 section-padd-header">
                            <div class="heading-member">
                                <h3 class="size-heading-member">Member Basic Cleaner Sneaker Care</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="custom-inner-styles">
                        <div class="row custom-inner">
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    <label>Id member </label>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    : <?php echo $show_member['id_member'];?>
                                </div>
                            </div>
                        </div>
                        <div class="row custom-inner">
                            <div class="col-sm-3 col-md-3">
                                <label>Nama lengkap </label>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                : <?php echo $show_member['nama_member'];?>
                            </div>
                        </div>
                        <div class="row custom-inner">
                            <div class="col-xs-3 col-sm-3 col-md-3">
                                <label>Alamat member </label>
                            </div>
                            <div class="col-xs-12 col-sm-9 col-md-8">
                                : <?php echo $show_member['alamat_member'];?>
                            </div>
                        </div>
                        <div class="row custom-inner">
                            <div class="col-sm-3 col-md-3">
                                <label>Email member</label>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                : <?php echo $show_member['nama_member'];?>
                            </div>
                        </div>
                        <div class="row custom-inner">
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <label>No telp member </label>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                : <?php echo $show_member['notelp_member'];?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        
<style type="text/css">
    .custom-inner-styles{
        padding: 10px;
    }
    .custom-inner{
        padding: 8px;
    }
</style>