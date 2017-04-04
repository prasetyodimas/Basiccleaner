<style type="text/css">
  .custom-headtables{
      background-color: #000;
      color: #fff;
  }
  .custom-alamat-pemasukan{
    margin-left: 21%;
  }
  @media print{
    .control-action-pages .hidden-btnprint{
      display: none !important;
    }
    .custom-alamat-pemasukan{
      margin-left: 21% !important;
    }
  }
</style>
<div class='main-containpages'>
    <div class="col-lg-12">
        <div class="col-sm-2 col-md-2">
          <img src="<?php echo $site;?>frontend/logo/android-icon-144x144.png">
        </div>
        <div class="col-md-8 col-md-push-custom">
          <h3 class="col-md-9 col-md-push-2">LAPORAN PEMASUKAN BASIC CLEANER</h3>
          <p class="col-md-8 custom-alamat-pemasukan">Jln. Seturan I / 139A, RT 11 RW 01, Olivine Music Studio, 55281</p>     
        </div>
    </div>
    <table class="table table-hover">
        <thead class="custom-headtables">
          <tr>
              <th>No</th>
              <th>Kode Transaksi</th>
              <th>Nama Pemesan</th>
              <th>Nama Barang</th>
              <th>Jumlah</th>
              <th>Jenis Layanan</th>
              <th>Nama Layanan</th>
              <th>Harga</th>
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
              <td>xxxx</td>
              <td>xxxx</td>
              <td>xxxx</td>
              <td>xxxx</td>
              <td>
                  <a href="<?php echo $site;?>">View</a>
              </td>
          </tr>
        </tbody>
        <?php $no++; } ?>
    </table>  
    <div class="control-action-pages">
      <a href="<?php echo $site;?>modul/laporan_pemasukan_cetak_all.php" target="_blank" class="btn btn-primary hidden-btnprint">Cetak Semua Laporan</a>
    </div>
  </div>
</div>