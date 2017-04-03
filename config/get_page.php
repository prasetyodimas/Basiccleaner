 <?php
    $p=isset($_GET['page'])?$_GET['page']:null;
    switch($p){
        // ===================  ALL MODUL MASTER START HERE ============================!!
        case 'homebase':
            include "modul/homebase.php";
        break;
        case 'pengguna':
            include "modul/pengguna.php";
        break;
        case 'editpengguna':
            include "modul/editpengguna.php";
        break;
        case 'setting':
            include "modul/setting.php";
        break;
        case 'master_kategori_layanan':
            include "modul/master_kategori_layanan.php";
        break;
        case 'master_edit_kategory_layanan':
            include "modul/master_edit_kategory_layanan.php";
        break;
        case 'data_member':
            include "modul/data_member.php";
        break;
        case 'detail_member':
            include "modul/detail_member.php";
        break;
        // ===================  ALL MODUL TRANSAKSI START HERE ============================!!
        case "transaksi":
            include "modul/transaksi.php";
        break;
        case 'transaksi_addmembered':
            include "modul/transaksi_addmembered.php";
        break;
        case 'transaksi_membered':
            include "modul/transaksi_membered.php";
        break;
        case 'transaksi_nonmembered':
            include "modul/transaksi_nonmembered.php";
            break;
        case "transaksi_belumdiambil":
            include "modul/transaksi_belumdiambil.php";
        break;
        case "transaksi_sudahdiambil":
            include "modul/transaksi_sudahdiambil.php";
        break;
        case 'transaksi_detail_sudahdiambil':
            include "modul/transaksi_detail_sudahdiambil.php";
        break;
        case 'transaksi_pengambilandetail':
            include "modul/transaksi_pengambilandetail.php";
        break;
        case 'transaksi_pengambilanproses':
            include "modul/transaksi_pengambilanproses.php";
        break;
        case 'transaksi_keluar':
            include "modul/transaksi_keluar.php";
        break;
        case 'transaksi_keluardetail':
            include "modul/transaksi_keluardetail.php";
        break;
        case 'cetak_kartu_member':
            include "modul/cetak_kartu_member.php";
        break;
        // ===================  ALL MODUL LAPORAN START HERE ============================!!
        case 'laporan_transaksi_shoes':
            include "modul/laporan_transaksi_shoes.php";
        break;
        case 'laporan_pemasukan':
            include "modul/laporan_pemasukan.php";
        break;
        case 'laporan_member':
            include "modul/laporan_member.php";
        break;
    }
?> 