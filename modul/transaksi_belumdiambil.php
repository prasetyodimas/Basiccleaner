<script type="text/javascript">
    $(document).ready(function(){
        $('#table-transaksipengambilan').DataTable();
    });
</script>
<div class='main-containpages'>
    <h3>List Transaksi Belum Diambil</h3>
    <div class="table-responsive">
    <form action="backend/proses_pengambilan_barang.php?act=update_statusbarang" method="post" enctype="multipart/form-data">
        <table class='table table-hover' id="table-transaksipengambilan">
            <thead class="custom-headtables-globalconf">
                <tr>
                    <td>No</td>
                    <td>No nota</td>
                    <td>Id Member</td>
                    <td>Nama Pemesan</td>
                    <td>No telp</td>
                    <td>Tanggal Masuk</td>
                    <td>Status pengerjaan</td>
                    <td>Status</td>
                    <td>Total Transaksi</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no=1;
                    $get_transaksi_pengambilan=mysqli_query($con,"SELECT * FROM transaksi_shoes ts JOIN detail_transaksi_shoes dts ON ts.id_transaksi_shoes=dts.id_transaksi_shoes WHERE status_pengambilan='B' ORDER BY ts.id_transaksi_shoes DESC");
                    while($result=mysqli_fetch_array($get_transaksi_pengambilan)){
                    $get_data_member = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM member WHERE id_member='$result[id_member]'"));
                ?>
                <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $result['id_transaksi_shoes']?></a></td>
                    <td><?php if($result['id_member']!=''){ ?> <?php echo $result['id_member'];?> <?php }else{ ?> <?php echo '-'; ?> <?php } ?> </td>
                <?php if ($result['status_member']=='member') { ?>
                    <td><?php echo $get_data_member['nama_member'];?></td>    
                    <td><?php echo $get_data_member['notelp_member'];?></td>
                    <td><?php echo tgl_indo($result['tgl_transaksi']);?></td>
                    <td><?php echo stat_pengambilan($result['status_pengambilan']);?></td>
                    <td><?php echo $result['status_member'];?></td>
                <?php }elseif ($result['status_member']=='non-member') { ?>
                    <td><?php echo $result['nama_lengkap'];?></td>    
                    <td><?php echo $result['no_telp'];?></td>
                    <td><?php echo tgl_indo($result['tgl_transaksi']);?></td>
                    <td><?php echo stat_pengambilan($result['status_pengambilan']);?></td>
                    <td><?php echo $result['status_member'];?></td>
                <?php } ?>
                    <td>Rp.<?php echo formatuang($result['total']);?></td>
                    <td>
                        <a href="homeadmin.php?page=transaksi_pengambilandetail&id_nota=<?php echo $result['id_transaksi_shoes']?>">View</a> ||
                        <a href="homeadmin.php?page=transaksi_pengambilanproses&id_nota=<?php echo $result['id_transaksi_shoes'];;?>" onclick="return confirm('Memproses pengambilan transaksi..?');">Pengambilan</a>
                    </td>
                </tr>
                <?php $no++; } ?>
            </tbody>
        </table>
    </form>
    </div>
</div>