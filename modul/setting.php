<script type="text/javascript">
	$(document).ready(function(){
		$('.click-menu-helper1').click(function(){
			$('.show-content1').slideToggle('slow');
			$('.show-content2').hide('slow');
		});
		$('.click-menu-helper2').click(function(){
			$('.show-content2').slideToggle('slow');
			$('.show-content1').hide('slow');
		});
        $('.click-menu-helper3').click(function(){
            $('.show-content3').slideToggle('slow');
            $('.show-content1').hide('slow');
        });
        $('.click-menu-helper4').click(function(){
            $('.show-content4').slideToggle('slow');
            $('.show-content1').hide('slow');
        });
        $('.click-menu-helper5').click(function(){
            $('.show-content5').slideToggle('slow');
            $('.show-content1').hide('slow');
        });
        $('.click-menu-helper6').click(function(){
            $('.show-content6').slideToggle('slow');
            $('.show-content1').hide('slow');
        });
	});
</script>
<style type="text/css">
    .custom-keterangan-pad{padding: 20px; } 
</style>
<div class='main-containpages'>
    <div style="margin-bottom:20px;">
        <h3 style="text-align:center;">Pusat Bantuan Basic Cleaner</h3>
    </div>
    <div class="col-md-12" style="margin-bottom:50px;">
        <div class="col-lg-12">
            <div class="panel panel-default" style="cursor:pointer;">
            	<div class="panel-heading click-menu-helper1" style="border-top: 2px solid #252525;"><span class="glyphicon glyphicon-cog"></span> Bagaimana Cara menambah Master Kategori Layanan ?</div>
            	<div class="panel-body show-content1" style="display:none;">
            		<div class="row">
                        <div class="col-md-12 custom-keterangan-pad">
                            <p>1. Langkah pertama klik pada menu data master.</p>
                            <p>2. Kemudian pilih menu master kategori layanan kemudian klik tambah, 
                                  maka anda akan melihat menu yang berisikan kebutuhan layanan / servis yang anda inginkan.
                            </p>
                            <p>3. Isikan data sesuai jenis serta pilihan layanan yang tersedia pada layanan Basic Cleaner Shoes Care
                                  Untuk lebih jelas nya seperti gambar di bawah ini.
                        </div>
                        <div class="col-md-12">
                            <img src="<?php echo $site;?>frontend/pusat_bantuan/master layanan.png" class="img-responsive">
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default" style="cursor:pointer;">
            	<div class="panel-heading click-menu-helper2" style="border-top: 2px solid #252525;"> <span class="glyphicon glyphicon-cog"></span> Bagaimana Cara melakukan transaksi baru ? </div>
            	<div class="panel-body show-content2" style="display:none;">
                    <div class="col-lg-12 custom-keterangan-pad">
                        <p>1. Langkah pertama klik pada menu transaksi, kemudian klik maka akan menuju pada halaman transaksi</p>
                        <p>2. Kemudian anda akan menemukan jenis transaksi yang ingin di lakukan, yang pertama transaksi jika member telah mendaftar menjadi seorang member,
                        yang kedua adalah transaksi jika seorang pelanggan belum memiliki akun atau member, yang ketiga adalah transaksi jika seorang
                        pelanggan tidak ingin mendaftarkan dirinya sebagai member basic cleaner.</p>
                    </div>
                    <div class="col-md-12">
                        <img src="<?php echo $site;?>frontend/pusat_bantuan/trnasaksi_masuk.png" class="img-responsive">
                    </div>
                </div>
            </div>
            <div class="panel panel-default" style="cursor:pointer;">
            <div class="panel-heading click-menu-helper4" style="border-top: 2px solid #252525;"> <span class="glyphicon glyphicon-cog"></span> Bagaimana Cara mengelola hak akses user / pengguna sistem ?</div>
                <div class="row">
                    <div class="panel-body show-content4" style="display:none;">
                        <div class="col-lg-12 custom-keterangan-pad">
                            <p>1. Langkah pertama klik pada menu setting pengguna</p>
                            <p>2. Kemudian akan muncul data pengguna sistem, jika ingin menambah user baru atau mengelola isikan pada kolom tambah pengguna, 
                            jika ingin mengelola hak akses atau memblokir hak pengguna cukup klik pada menu edit kemudian ubah hakases status penggunanya untuk
                            lebih jelas lihat pada gambar dibawah ini </p>
                        </div>
                        <div class="col-lg-12">
                            <img src="<?php echo $site;?>frontend/pusat_bantuan/tambah pengguna.png" class="img-responsive">
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default" style="cursor:pointer;">
            <div class="panel-heading click-menu-helper3" style="border-top: 2px solid #252525;"> <span class="glyphicon glyphicon-cog"></span> Bagaimana Cara mengetahui setiap transaksi yang telah masuk..?</div>
                <div class="row">
                    <div class="panel-body show-content3" style="display:none;">
                        <div class="col-lg-12 custom-keterangan-pad">
                            <p>1. Langkah pertama klik pada menu transaksi, kemudia pilih menu transaksi keluar, transaksi keluar ini adalah proses sebuah transaksi
                            yang telah di lakukan oleh seorang pelanggan atau <i>customer</i>.</p>
                            <p>2. Pengertian transaksi keluar di sini adalah setiap transaksi yang masuk pada hari apapun masuk kedalam list transaksi keluar,
                            kesimpulan nya adalah sebuah aktivitas yang di telah dilakukan.</p>
                        </div>
                        <div class="col-lg-12">
                            <img src="<?php echo $site;?>frontend/pusat_bantuan/list transaksi keluar.png" class="img-responsive">
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default" style="cursor:pointer;">
            <div class="panel-heading click-menu-helper5" style="border-top: 2px solid #252525;"> <span class="glyphicon glyphicon-cog"></span> Bagaimana Cara mengetahui transaksi jika sepatu belum siap diambil..?</div>
                <div class="row">
                    <div class="panel-body show-content5" style="display:none;">
                        <div class="col-lg-12 custom-keterangan-pad">
                            <p>1. Langkah pertama klik pada menu pengambilan barang</p>
                            <p>2. Kemudian akan muncul menu transaksi pengambilan barang belum diambil, kemudian klik pada menu tersebut untuk melihat detail transaksi yang telah dilakukan. </p>
                            <p>3. Pada status bar warna merah tersebut adalah sebuah status untuk mengetahui bahwa transaksi pencucian sepatu tersebut belum diambil oleh pemilik.
                            sepatu.</p>
                        </div>
                        <div class="col-lg-12">
                            <img src="<?php echo $site;?>frontend/pusat_bantuan/transaksi belum diambil.png" class="img-responsive">
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default" style="cursor:pointer;">
            <div class="panel-heading click-menu-helper6" style="border-top: 2px solid #252525;"> <span class="glyphicon glyphicon-cog"></span> Bagaimana Cara mengetahui transaksi jika sepatu sudah siap diambil..?</div>
                <div class="row">
                    <div class="panel-body show-content6" style="display:none;">
                        <div class="col-lg-12 custom-keterangan-pad">
                            <p>1. Langkah pertama klik pada menu pengambilan barang</p>
                            <p>2. Kemudian akan muncul menu transaksi pengambilan barang sudah diambil, kemudian klik pada menu tersebut untuk melihat detail transaksi yang telah dilakukan </p>
                            <p>3. Pada status bar warna hijau tersebut adalah sebuah status untuk mengetahui bahwa transaksi pencucian sepatu tersebut sudah diambil oleh pemilik
                            sepatu.</p>
                        </div>
                        <div class="col-lg-12">
                            <img src="<?php echo $site;?>frontend/pusat_bantuan/transaksi siap diambil.png" class="img-responsive">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>