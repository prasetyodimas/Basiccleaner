<style type="text/css">
  .custom-headtables{
      background-color: #000;
      color: #fff;
  }
</style>
<div class='main-containpages'>
    <div class="col-lg-12">
        <div class="col-sm-2 col-md-2">
          <img src="<?php echo $site;?>frontend/logo/android-icon-144x144.png">
        </div>
        <div class="col-md-8 col-md-push-custom">
          <h3>LAPORAN PEMASUKAN BASIC CLEANER SHOES AND CARES</h3>
          <p class="col-md-8 col-md-push-2">Jln. Seturan I / 139A, RT 11 RW 01, Olivine Music Studio, 55281</p>     
        </div>
    </div>
    <table class="table table-hover">
        <thead class="custom-headtables">
          <tr>
              <th>No</th>
              <th>Kode Transaksi</th>
              <th>Nama Pemesan</th>
              <th>Jenis Layanan</th>
              <th>Aksi</th>
          </tr>
        </thead>
          <?php
            $no =1;
            $get_data = mysqli_query($con,"SELECT * FROM member");
            while ($result = mysqli_fetch_array($get_data)) {
           ?>
        <tbody>
          <tr>
              <td><?php echo $no;?></td>
              <td>xxx</td>
              <td>xxxx</td>
              <td>xxxx</td>
              <td>
                  <a href="<?php echo $site;?>">View</a>
              </td>
          </tr>
        </tbody>
        <?php $no++; } ?>
    </table>  
  </div>
</div>