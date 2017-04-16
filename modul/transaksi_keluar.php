<script type="text/javascript">
    $(document).ready(function(){
        $('#table-transaksikeluar').DataTable();
    });
</script>
<div class='main-containpages'>
    <div style="margin-bottom:20px;">
        <h3>List Transaksi Keluar</h3>
    </div>
    <table class='table table-hover' id="table-transaksikeluar">
        <thead class="custom-headtables-globalconf">
            <tr>
                <td>No</td>
                <td>No nota</td>
                <td>Nama Pemesan</td>
                <td>No telp</td>
                <td>Estimasi</td>
                <td>Tgl masuk</td>
                <td>Saran pengambilan</td>
                <td>Total Transaksi</td>
                <td>Status</td>
                <td>Action</td>
            </tr>
        </thead>
    <tbody>
        <?php 
            $no=1;
            $query=mysqli_query($con,
            "SELECT ts.id_transaksi_shoes,
                    ts.id_member,
                    ts.nama_lengkap,
                    ts.no_telp,
                    ts.status_pengambilan,
                    ts.tgl_transaksi,
                    dts.harga,
                    ts.status_member
            FROM transaksi_shoes ts 
            JOIN detail_transaksi_shoes dts ON ts.id_transaksi_shoes=dts.id_transaksi_shoes
            GROUP BY ts.id_transaksi_shoes
            ORDER BY id_transaksi_shoes DESC");
            while($res=mysqli_fetch_array($query)){
            $cek_member  = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM member WHERE id_member='$res[id_member]'"));
        ?>
        <tr>
            <td><?php echo $no;?></td>
            <td><?php echo $res['id_transaksi_shoes'];?></td>
        <?php if ($res['status_member']=='member') { ?>
            <td><?php echo $cek_member['nama_member'];?></td>
            <td><?php echo $cek_member['notelp_member'];?></td>
        <?php }elseif ($res['status_member']=='non-member') { ?>
            <td><?php echo $res['nama_lengkap'];?></td>
            <td><?php echo $res['no_telp'];?></td>
        <?php } ?>
            <td>3 hari</td>
            <td><?php echo tgl_indo($res['tgl_transaksi']);?></td>
            <td><?php echo adding_days($res['tgl_transaksi']).tgl_indo(split_month_year($res['tgl_transaksi']));?></td>
            <td>Rp.<?php echo formatuang($res['harga']);?></td>
            <td><?php echo $res['status_member'];?></td>
            <td><a href="homeadmin.php?page=transaksi_keluardetail&id_nota=<?php echo $res['id_transaksi_shoes']?>">View</a> ||
                <a href="<?php echo $site;?>cetak_nota.php?id_nota=<?php echo $res['id_transaksi_shoes']?>" target="_blank">Cetak</a> ||
                <a href="backend/proses_deletepemesanan.php?act=delete_pemesanan&id=<?php echo $res['id_transaksi_shoes'];?>" onclick="return confirm('Anda Yakin Menghapus Pesanan !!');">Delete</a>
            </td>
         <?php $no++; } ?>
        </tr>
    </tbody>
    </table>
</div>
 