<?php 
   //transaksi_masuk
    $tgl=date('Y-m-d');
    //untuk autonumber di nota
    $auto="SELECT max(id_transaksi_shoes) AS id FROM transaksi_shoes";
    $tampung = mysqli_query($con,$auto);
    $show=mysqli_fetch_array($tampung);
    //mengatur 3 karakter untuk jumlah karakter yang berubah-ubah
    $noUrut= (int) substr($show['id'],2,2);
    $noUrut++;
    //mengatur kode transaksi sebagai karakter tetap
    $char   = "BSC";
    //BSC untuk mengatur 3 karakter di belakang 6001
    $IDbaru = sprintf("%02s", $noUrut);
?>