<div class='main-containpages'>
  <div class="col-lg-12">
    <div class="heading-laporan">
      <h3>Laporan Pemasukan Laundry Sepatu Sneakers Care</h3>   
    </div>
    <table class="table table-hover">
        <thead>
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
                  <a href="">Cetak</a>
                  <a href="">View</a>
              </td>
          </tr>
        </tbody>
        <?php $no++; } ?>
    </table>  

  </div>
</div>