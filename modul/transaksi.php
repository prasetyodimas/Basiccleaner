<?php error_reporting(0);?>
<script type="text/javascript">
    $(document).ready(function(){
        //hidden content
        $('.cliked-content').click(function(){
             $('.showhide-content').slideToggle(1000);
        });
    }); 
</script>
<div class='main-containpages'>
    <h3>Transaksi masuk</h3>
        <div class="form-group">
            <label></label>
            <ul class="nav nav-tabs">
              <li class="active"><a href="">Apakah ingin menjadi member</a></li>
              <li><a href="homeadmin.php?page=transaksi_addmembered">Ya</a></li>
              <li><a href="homeadmin.php?page=transaksi_nonmembered">Tidak</a></li>
            </ul>
        </div>
        <div class="col-md-7 custom-innerstyles">
            <div class='row'>
                <div class="col-md-12">
                    <button class="btn btn-danger cliked-content"> Sudah punya akun check disini !</button>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="hidding-menus showhide-content" style="display:none;">
                             <?php
                                if (isset($_POST['check_id'])) {
                                    $check_member = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM member WHERE id_member='$_POST[check_id]'"));
                                        echo "<script>alert('Pencarian member telah ditemukan sebagai berikut !!');</script>";
                                }
                            ?>
                            <div class="form-group col-md-6" style="margin-top:10px;">
                                <label>Check Id member</label>
                                <input type="text" name="check_id" class="form-control" autofocus required="">
                                <div style="margin-top:10px;">
                                    <button>Check member</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col-md-5'>
                <div class="panel panel-default">
                    <div class="panel-heading"> Dashboard Cashier </div> 
                    <div class="inner-box" style="padding:20px;">
                        <div class="logobasic-center">
                            <img class="logos-shadow" src="<?php echo "frontend/logo/android-icon-96x96.png";?>">
                        </div>
                        <div class='form-group'>
                            Tanggal <span class="transaksi-tanggal">: <?php echo tgl_indo(date("Y-m-d"))?></span>
                        </div>
                        <div class='form-group'>
                            Kasir <span class="transaksi-namakasir">: <?php echo $_SESSION['nama_admin'];?></span>
                        </div>
                        <div class="form-group">
                          Waktu <span class="transaksi-clock" id="clock"><?php print date('H:i:s');?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($check_member==0){?> 
        <?php }else{ ?>
            <div class="find-datauser">
                <h5>Data Ditemukan sebagai berikut :</h5>
                <table class="table table-hover" style="font-size:14px;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id member</th>
                            <th>Nama Lengkap</th>
                            <th>Alamat</th>
                            <th>Notelp</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                        <?php 
                           $no=1;
                           $datamember=mysqli_query($con,"SELECT * FROM member WHERE id_member='$check_member[id_member]' ORDER BY id_member DESC");
                           while($res=mysqli_fetch_array($datamember)){
                        ?>
                    <tbody>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $res['id_member'];?></td>
                            <td><?php echo $res['nama_member'];?></td>
                            <td><?php echo $res['alamat_member'];?></td>
                            <td><?php echo $res['notelp_member'];?></td>
                            <td><?php echo $res['email_member'];?></td>
                            <td>
                                <a href="homeadmin.php?page=transaksi_membered&id_member=<?php echo $res['id_member'];?>">Lanjut</a>
                            </td>
                        </tr>
                    <?php $no++; } ?>
                    </tbody>
                </table>
            </div>
        <?php } ?>
    </div><!-- row-->
</div>

