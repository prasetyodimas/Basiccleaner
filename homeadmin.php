<?php session_start();
include 'config/koneksi.php';
include 'config/function_general.php';
if (empty($_SESSION['nama_admin'])) {
    echo "<h3 style='color: #c00;text-align: center;'>AKSES DENIED !!</h3>";
    echo "<meta http-equiv=refresh content=2;url=$site"."index.php>";  
    exit();      
}else{?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--favicon-->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $site;?>frontend/logo/favicon-16x16.png">
    <link rel="stylesheet" href="<?php echo $site;?>frontend/css/style.css">
    <link rel="stylesheet" href="<?php echo $site;?>frontend/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="<?php echo $site;?>frontend/css/build.css">
    <link rel="stylesheet" href="<?php echo $site;?>frontend/lib/data_tables/jquery.dataTables.css">
    <!-- CSS -->
    <!-- JS -->
    <script src="<?php echo $site;?>frontend/js/jquery-1.11.1.min.js"></script>
    <script src="<?php echo $site;?>frontend/js/bootstrap.min.js"></script>
    <script src="<?php echo $site;?>frontend/lib/number/jquery.number.min.js"></script>
    <script src="<?php echo $site;?>frontend/lib/validate/jquery.validate.min.js"></script>
    <script src="<?php echo $site;?>frontend/lib/data_tables/jquery.dataTables.js"></script>
    <script type="text/javascript">
        var txt="Basic Cleaner - Shoes Care -";
        var kecepatan=600;var segarkan=null;function bergerak() { document.title=txt;
        txt=txt.substring(1,txt.length)+txt.charAt(0);
        segarkan=setTimeout("bergerak()",kecepatan);}bergerak();
        //var global price
        $(document).ready(function(){
            $('#price').number(true);
            $('#price-subtotal').number(true);
            $('#price-jumlah-bayar').number(true);
            $('#price-kembalian-bayar').number(true);
        });
    </script>
</head>
<body onload="setInterval('displayServerTime()', 1000);">
    <div id="container">
    <!--menu -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><span class="margin-push-40"><img style="position:absolute;top:6px;" src="<?php echo "frontend/logo/android-icon-36x36.png";?>"></span>Basic Cleaner</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="homeadmin.php?page=homebase">Home</a></li>
                <?php if ($_SESSION['level_admin']=='manajer') { ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Data Master
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="homeadmin.php?page=master_kategori_layanan">Master Kategori Layanan</a></li>
                            <li><a href="homeadmin.php?page=data_member">Master Member</a></li>
                            <!-- <li><a href="homeadmin.php?page=master_cleaner">Master Cleaner</a></li>
                            <li><a href="homeadmin.php?page=master_repaint">Master Repaint</a></li>
                            <li><a href="homeadmin.php?page=master_reglue">Master Reglue</a></li> -->
                        </ul>
                    </li>
                <?php } ?>
                <?php if ($_SESSION['level_admin']=='admin') { ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Transaksi
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="homeadmin.php?page=transaksi">Transaksi Masuk</a></li>
                            <li><a href="homeadmin.php?page=transaksi_keluar">Transaksi Keluar</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">List Member
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="homeadmin.php?page=data_member">Data Member</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Pengambilan Barang
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="homeadmin.php?page=transaksi_belumdiambil">Belum diambil</a></li>
                            <li><a href="homeadmin.php?page=transaksi_sudahdiambil">Sudah diambil</a></li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if ($_SESSION['level_admin']=='manajer') { ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Laporan
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="homeadmin.php?page=laporan_member">Laporan Member</a></li>
                            <li><a href="homeadmin.php?page=laporan_pemasukan">Laporan Pemasukan</a></li>
                        </ul>
                    </li>
                <?php } ?>
                </li>
                <li><a>session user saat ini : <?php echo $_SESSION['nama_admin']. ' => ' .$_SESSION['level_admin'];?></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="homeadmin.php?page=pengguna"><span class="glyphicon glyphicon-cog"></span> Setting Pengguna</a></li> 
                <li><a href="homeadmin.php?page=setting"><span class="glyphicon glyphicon-cog"></span> Pusat Bantuan</a></li>
                <li><a href="backend/proses_logout.php" onclick="return confirm('Anda yakin keluar sistem !!')"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row">
        <?php include "config/get_page.php";?>
    </div>
    </body>
</html>
<?php } ?>