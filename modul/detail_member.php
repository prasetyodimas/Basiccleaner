<?php $show_member = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM member WHERE id_member='$_GET[id_mem]'"));?>
<div class='main-containpages'>
    <div style="margin-bottom:20px;">
        <h3>Detail Member Basic Cleaner</h3>
    </div>
    <style type="text/css">
        .detail-member_id{
            margin-left: 100px;
        }
        .detail-nama_member{
            margin-left: 77px;
        }
        .detail-alamat-member{
            margin-left: 68px;
        }
        .detail-telp-member{
            margin-left: 68px;
        }
        .detail-email-member{
            margin-left: 79px;
        }
    </style>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Member Basic Cleaner Sneaker Cares</h4>
                </div>
                <div class="panel-body">
                </div>
                <div class="panel panel-body">
                    <p>Id member <span class="detail-member_id">: <?php echo $show_member['id_member'];?></span></p>  
                    <p>Nama lengkap <span class="detail-nama_member">: <?php echo $show_member['nama_member'];?></span></p>  
                    <p>Alamat member <span class="detail-alamat-member">: <?php echo $show_member['alamat_member'];?></span></p>  
                    <p>No telp member <span class="detail-telp-member">: <?php echo $show_member['notelp_member'];?></span></p>  
                    <p>Email member <span class="detail-email-member">: <?php echo $show_member['notelp_member'];?></span></p>  
                </div>
            </div>
        </div>
    </div>
        
