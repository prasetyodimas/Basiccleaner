<script type="text/javascript">
    $(document).ready(function(){
        $('#table-mastermember').DataTable();
        $('.btn-cliked').click(function(){
            $('.btn-show').slideToggle('slow');
        });
    });
</script>
<div class='main-containpages'>
    <div style="margin-bottom:20px;">
        <h3>List Data Member Basic Cleaner</h3>
    </div>
    <?php if ($_SESSION['level_admin']=='manajer') { ?>
    <button class="btn-cliked" style="margin-bottom:20px;">Tambah Member</button>
    <div class="btn-show" style="display:none;">
        <form action="backend/proses_member.php?act=add_member" method="post" enctype="multpart/form-data">
        <div class="col-md-6" style="margin-bottom:50px;">
            <div class="form-group">
                <label>Id Member</label>
                <input type="text" name="id_member" class="form-control" value="MBSC<?php echo acakangkahuruf(3);?>">            
            </div>           
            <div class="form-group">
                <label>Nama member</label>
                <input type="text" name="nama_member" class="form-control" autofocus required="">
            </div>
            <div class="form-group">
                <label>Alamat member</label>
                <input type="text" name="alamat_member" class="form-control" autofocus required="">
            </div>
            <div class="form-group">
                <label>No telp</label>
                <input type="text" name="notelp_member" class="form-control" autofocus required="">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email_member" class="form-control" autofocus required="">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>     
        </div>
        </form>
    </div>
    <?php } ?>   
    <table class='table table-hover' id="table-mastermember">
        <thead class="custom-headtables-globalconf">
            <tr>
                <th>No</th>
                <th>Id member</th>
                <th>Nama Lengkap</th>
                <th>Alamat </th>
                <th>No Telp</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $no=1;
                $query=mysqli_query($con,"SELECT * FROM member ORDER BY id_member DESC");
                while($res=mysqli_fetch_array($query)){
                //menampilkan data member
            ?>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $res['id_member']?></td>
                <td><?php echo $res['nama_member']?></td>
                <td><?php echo $res['alamat_member']?></td>
                <td><?php echo $res['notelp_member']?></td>
                <td><?php echo $res['email_member']?></td>
                <td>
                <?php if($_SESSION['level_admin']=='manajer'){ ?>
                    <a href="homeadmin.php?page=cetak_kartu_member&id_member=<?php echo $res['id_member'];?>">Cetak </a> ||
                    <a href="backend/proses_member.php?act=delete_member&id_member=<?php echo $res['id_member'];?>" onclick="return confirm('Anda Yakin Menghapus !!');">Delete</a> ||
                <?php } ?>
                    <a href="homeadmin.php?page=detail_member&id_mem=<?php echo $res['id_member'];?>">View</a>
                </td>
            </tr>
         <?php $no++; } ?>
        </tbody>
    </table>
    <div style="margin-bottom:50px;"></div>
</div>
 