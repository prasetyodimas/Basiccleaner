<?php $show_member = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM member WHERE id_member='$_GET[id_mem]'"));?>
<div class='main-containpages'>
    <div style="margin-bottom:20px;">
        <h3>Detail Member Basic Cleaner</h3>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Member Basic Cleaner Sneaker Cares</h4>
                </div>
                <div class="panel panel-body">
                    <p>Id member: <?php echo $show_member['id_member'];?></p>  
                    <p>Nama lengkap : <?php echo $show_member['nama_member'];?></p>  
                    <p>Alamat member : <?php echo $show_member['alamat_member'];?></p>  
                    <p>No telp member : <?php echo $show_member['notelp_member'];?></p>  
                    <p>Email member : <?php echo $show_member['notelp_member'];?></p>  
                </div>
            </div>
        </div>
    </div>
        
