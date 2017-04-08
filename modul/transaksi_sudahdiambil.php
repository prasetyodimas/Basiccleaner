<script type="text/javascript">
    $(document).ready(function(){
        $('#table-transaksipengambilan').DataTable();
    });
</script>
<div class='main-containpages'>
    <h3>List Transaksi Sudah Diambil</h3>
    <div class="table-responsive">
        <table class='table table-hover' id="table-transaksipengambilan">
            <thead class="custom-headtables-globalconf">
                <tr>
                    <td>No</td>
                    <td>No nota</td>
                    <td>Id Member</td>
                    <td>Nama Pemesan</td>
                    <td>No telp</td>
                    <td>Tanggal Masuk</td>
                    <td>Status</td>
                    <td>Status Member</td>
                    <td>Total Transaksi</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no =1;
                    $get_transaction = mysqli_query($con,
                        "SELECT * FROM transaksi_shoes ts 
                         JOIN detail_transaksi_shoes dts ON ts.id_transaksi_shoes=dts.id_transaksi_shoes
                         JOIN kategori_layanan kl ON dts.id_kategori_layanan=kl.id_kategori_layanan
                         WHERE ts.status_pengambilan='S' ORDER BY ts.id_transaksi_shoes DESC");
                         while ($result_transaction = mysqli_fetch_array($get_transaction)) {
                         $get_datamember = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM member WHERE id_member='$result_transaction[id_member]'"));
                 ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $result_transaction['id_transaksi_shoes'];?></td>
                    <?php if($result_transaction['id_member']!='-'){ ?>
                        <td><?php echo $get_datamember['id_member'];?></td>
                        <td><?php echo $get_datamember['nama_lengkap'];?></td>
                        <td><?php echo $get_datamember['notelp_member'];?></td>
                    <?php }else{ ?>
                        <td><?php echo $result_transaction['id_member'];?></td>
                        <td><?php echo $result_transaction['nama_lengkap'];?></td>
                        <td><?php echo $result_transaction['no_telp'];?></td>
                    <?php } ?>  
                        <td><?php echo tgl_indo($result_transaction['tgl_transaksi']);?></td>
                        <td class="<?php echo getstatus_pengambilan($result_transaction['status_pengambilan'])?>"><?php echo stat_pengambilan($result_transaction['status_pengambilan']);?></td>
                        <td><?php echo $result_transaction['status_member'];?></td>
                        <td>Rp.<?php echo formatuang($result_transaction['harga']);?></td>
                        <td>
                            <a href="homeadmin.php?page=transaksi_detail_sudahdiambil&id_nota=<?php echo $result_transaction['id_transaksi_shoes'];?>">View</a>
                        </td>
                    </tr>
                <?php $no++; } ?>
            </tbody>
        </table>
    </div>
</div>