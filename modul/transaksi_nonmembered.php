<script type="text/javascript">
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip(); 
        //jquery format currency
        $('.format-price-item').number(true);
        $('#format_price_reglue').number(true);
        $("#filterform-nonmember").validate({
          rules: {
              nama_lengkap_nonmember:{
                    required: true
              },
              notelp_nonmember:{
                    required: true,
                    number : true,
              },
              email_nonmember:{
                    required :true,
                    email : true,
              },
              alamat_nonmember :{
                    required :true,
              },
              jumlah_sepatu :{
                    required : true,
              },
              nama_barangnonmember:{
                    required :true,
              },
              jenis_layanan :{
                    required :true,
              }
          },
          messages: {
                nama_lengkap_nonmember: "nama tidak boleh kosong !!",
                notelp_nonmember:{
                    required : "no telp tidak boleh kosong !!",
                    number : "no telp tidak valid !!",
                },
                email_nonmember:{
                    required: "email tidak boleh kosong !!",
                    email : "email tidak valid !!",
                },
                alamat_nonmember :{
                    required : "alamat tidak boleh kosong !!",
                },
                jumlah_sepatu :{
                    required : "jumlah tidak boleh kosong !!",
                },
                nama_barangnonmember:{
                    required : "nama barang tidak boleh kosong !!",
                },
                jenis_layanan :{
                    required : "jenis layanan tidak boleh kosong !!",
                },
                nama_layanan :{
                    required : "nama layanan tidak boleh kosong !!",
                } 
          },
        });
        //onchange val nama layanan
        $('select.change_nama_layanan').on('change',function(){
            var val_jenis_layanan = $(this).find(':selected').data('jenis');
            var val_nama_layanan  = $(this).find(':selected').data('value');
            var val_price_layanan = $(this).find(':selected').data('price');
            $('.container-transaction-jenis-service').html('<p>'+val_jenis_layanan+'</p>');
            $('.container-transaction2').html('<p class=format-price-item>'+val_nama_layanan+'</p>');
            $('.container-transaction3').html('<p class=format-price-item>'+val_price_layanan+'</p>');
            //replace this val to input total transaction
            $('.temp_value').val(val_price_layanan);
            $('.container-total-peritems').html('<p>'+val_price_layanan+'</p>');
        });
        //function jumlah bayar as total - jumlah bayar = kembalian / total
        $('button[type="submit"]').attr('disabled', true);
        $('#bayar').blur(function(){
            var total    = $('#subtotal').val();
            var bayarnya = $('#bayar').val();
            var get_returnprice = parseFloat(bayarnya)-parseFloat(total);
            $('#price-kembalian').val(get_returnprice);
            //statement jika pembayaran kurang dari total maka disable button
            if(total <= bayarnya) {
                $('button[type="submit"]').attr('disabled' , false);
            }else{
                $('button[type="submit"]').attr('disabled' , true);
            }
        });
        //jquery Clone Select Append All Service  
        $('.adding-shoes').click(function() {
            var new_input_shoes = $('div.cloning-namebarang .clone-input-shoes').clone();
            $('#new-contain-inputshoes').append(new_input_shoes);
        });
        $('#adding-services').click(function() {
            var new_services = $('div.cloning-jenislayanan .clone-jenis-service').clone();
            $('#new-contain-services').append(new_services);
        });
        //function counting subtotal
      /*  $("input[type='number']").bind("input", function() {
            var input_val = $("input[type='number']").val();
            var subtotal  = $('#subtotal_transaksi').val();
            var counting_price_all_shoes = parseFloat(input_val)*parseFloat(subtotal);
            $('#subtotal_transaksi').val(counting_price_all_shoes);
            //console.log(counting_price_all_shoes);
        });*/
        //function pembayaran cahsier
        //onchange function price repaint
        /*$('select.change_repaint_values').on('change',function(){
            var repaint_value      = $('select.change_repaint_values').find(':selected').data('id');
            var total_repaint      = $('#total_transaksi_values').val();
            var subtotal_repaint   = parseFloat(repaint_value)+parseFloat(total_repaint); 
            $('#subtotal_transaksi').val(subtotal_repaint);
            console.log(subtotal_repaint)
        });*/
        //onchange function price reglue
        /*$('select.change_reglue_values').on('change',function(){
            var reglue_value      = $('select.change_reglue_values').find(':selected').data('id');
            var total_reglue      = $('#total_transaksi_values').val();
            var subtotal_reglue   = parseFloat(reglue_value)+parseFloat(total_reglue); 
            $('#subtotal_transaksi').val(subtotal_reglue);
            console.log(subtotal_reglue);
        });*/
        //json change functon price on transaction
        $(".category_service").change(function(){
            var getValue = $(this).val();
            if(getValue =='') {
                $('.place-valueservice').html("<option value=''>Pilih kamarnya dulu !!</option>");
            }else{
                $.ajax({
                    url:'json/json_services.php',
                    type:'GET',
                    dataType:'json',
                    data: {'jenis_layanan' : getValue},
                    success:function (JSONObject) {
                    var all_service ="";
                        // Loop through Object and create peopleHTML
                        for (var key in JSONObject){
                            if (JSONObject.hasOwnProperty(key)) {
                                all_service +="<option value="+JSONObject[key]['id_kategori_layanan']+" data-jenis="+JSONObject[key]['jenis_layanan']+" data-name="+JSONObject[key]['nama_layanan']+" data-price="+JSONObject[key]['harga_layanan']+">"+JSONObject[key]['nama_layanan']+"</option>";
                            }
                        }
                    $('.place-valueservice').html(all_service);
                    }
                });
            }
        });
    });
   /* $('.category_service').change(function(){
        var option = $('.category_service').val();
        alert(option);
        if(option == "Cleaning") {
            $(".show_cleaning").addClass('show-elem');
            $(".show_repaint").removeClass('show-elem');
            $(".show_reglue").removeClass('show-elem');
            $(".hidding-default-select").addClass('hidden-elem');
        }else if (option == "Reglue") {
            $(".show_reglue").addClass('show-elem');
            $(".show_cleaning").removeClass('show-elem');
            $(".show_repaint").removeClass('show-elem');
            $(".hidding-default-select").addClass('hidden-elem');
        }else if(option == "Repaint") {
            $(".show_repaint").addClass('show-elem');
            $(".show_cleaning").removeClass('show-elem');
            $(".show_reglue").removeClass('show-elem');
            $(".hidding-default-select").addClass('hidden-elem');
        }else if(option ==""){
            $(".show_cleaning").addClass('hidden-elem');
            $(".show_repaint").addClass('hidden-elem');
            $(".show_reglue").addClass('hidden-elem');
            $(".hidding-default-select").addClass('show-elem');
        } 
    });*/
    <?php date_default_timezone_set('Asia/Jakarta'); ?>
    //buat object date berdasarkan waktu di server
    var serverTime = new Date(<?php print date('Y, m, d, H, i, s, 0'); ?>);
    //buat object date berdasarkan waktu di client
    var clientTime = new Date();
    //hitung selisih
    var Diff = serverTime.getTime() - clientTime.getTime();
    //fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
    function displayServerTime(){
        //buat object date berdasarkan waktu di client
        var clientTime = new Date();
        //buat object date dengan menghitung selisih waktu client dan server
        var time = new Date(clientTime.getTime() + Diff);
        //ambil nilai jam
        var sh = time.getHours().toString();
        //ambil nilai menit
        var sm = time.getMinutes().toString();
        //ambil nilai detik
        var ss = time.getSeconds().toString();
        //tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
        document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
    } 
</script>
<style type="text/css">
    .container-transaction{
        margin-bottom: 50px;
    }
</style>
<div class='main-containpages'>
    <div class="col-md-7">
        <h3>Transaksi masuk <span class="heading-notifier-transaction">(Non member)</span></h3>
        <form action="<?php echo $site;?>backend/proses_transaksi_shoes.php?act=add_transaksi" id="filterform-nonmember" method="post" enctype="multipart/form-data">
            <input type="hidden" name="status_member" value="non-member">
            <div class="row">
                <div class="col-md-6 form-group">
                    <label>Nama Pemesan</label>
                    <input type="text" name="nama_lengkap_nonmember" class="form-control" autofocus required="">
                </div>
                <div class='col-md-6 form-group'>
                    <label>No Telp</label>
                    <input type='text' name='notelp_nonmember' class='form-control' autofocus required="">
                </div>
                <div class='col-md-6 form-group'>
                    <label>Email</label>
                    <input type='text' name='email_nonmember' class='form-control' autofocus required="">
                </div>
            </div><!-- ROW -->
            <div class='form-group'>
                <label>Alamat</label>
                <textarea name="alamat_nonmember" cols="10" rows="5" class="form-control" autofocus required=""></textarea>
            </div>
            <div class="row">
                <div class="cloning-jenislayanan">
                    <div class="clone-jenis-service cloning-jenislayanan">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jenis Layanan</label>
                                <select name="jenis_layanan[]" class="category_service form-control" autofocus required="">
                                    <option value="">Pilih layanan</option>
                                    <?php 
                                        $get_services = mysqli_query($con,"SELECT * FROM kategori_layanan GROUP BY jenis_layanan");
                                        while ($result = mysqli_fetch_array($get_services)) {
                                            echo "<option value='".$result['jenis_layanan']."' data-val='".$result['jenis_layanan']."'>".$result['jenis_layanan']."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5">
                             <div class="form-group">
                                <label>Nama Layanan</label>
                                <select class="form-control place-valueservice change_nama_layanan" autofocus required="">
                                    <option value="">Pilih Jenis Layanan Dulu !</option>
                                </select>
                            </div>
                        </div>
                        <!-- ================================ Hidden Service Cleaning  =================================-->
                        <div class="col-md-5 show_cleaning" style="display:none;">
                             <div class="form-group">
                                <label>Nama Layanan</label>
                                <select name="nama_layanan[]" class="form-control change_nama_layanan" autofocus required="">
                                    <option value="">Pilih layanannya</option>
                                    <?php 
                                        $get_services = mysqli_query($con,"SELECT * FROM kategori_layanan WHERE jenis_layanan='Cleaning' ORDER BY id_kategori_layanan DESC");
                                        while ($result = mysqli_fetch_array($get_services)) {
                                            echo "<option value='".$result['id_kategori_layanan']."' data-jenis='".$result['jenis_layanan']."' data-value='".$result['nama_layanan']."' data-price='".$result['harga_layanan']."'>".$result['nama_layanan']."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- ================================ Hidden Service Repaint  =================================-->
                        <div class="col-md-5 show_repaint" style="display:none;">
                             <div class="form-group">
                                <label>Nama Layanan</label>
                                <select name="nama_layanan[]" class="form-control change_nama_layanan" autofocus required="">
                                    <option value="">Pilih layanannya</option>
                                    <?php 
                                        $get_services = mysqli_query($con,"SELECT * FROM kategori_layanan WHERE jenis_layanan='Repaint' ORDER BY id_kategori_layanan DESC");
                                        while ($result = mysqli_fetch_array($get_services)) {
                                            echo "<option value='".$result['id_kategori_layanan']."' data-jenis='".$result['jenis_layanan']."' data-value='".$result['nama_layanan']."' data-price='".$result['harga_layanan']."'>".$result['nama_layanan']."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- ================================ Hidden Service Reglue =================================-->
                        <div class="col-md-5 show_reglue" style="display:none;">
                             <div class="form-group">
                                <label>Nama Layanan</label>
                                <select name="nama_layanan[]" class="form-control change_nama_layanan" autofocus required="">
                                    <option value="">Pilih layanannya</option>
                                    <?php 
                                        $get_services = mysqli_query($con,"SELECT * FROM kategori_layanan WHERE jenis_layanan='Reglue' ORDER BY id_kategori_layanan DESC");
                                        while ($result = mysqli_fetch_array($get_services)) {
                                            echo "<option value='".$result['id_kategori_layanan']."' data-jenis='".$result['jenis_layanan']."' data-value='".$result['nama_layanan']."' data-price='".$result['harga_layanan']."'>".$result['nama_layanan']."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div><!-- clone-jenis-service -->
                </div><!-- cloning-jenislayanan-->
                <div class="col">
                    <button type="button" class="btn btn-danger" id="adding-services" data-toggle="tooltip" title="tambah layanan..?" data-placement="right">+</button>
                </div>
            </div><!-- row -->
            <div class="row">
                <div id="new-contain-services"></div><!-- new container shoes -->
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Jumlah sepatu</label>
                        <input type="number" name="jumlah_sepatu[]" id="jml_sepatu" class="form-control" datashoes="" min="1" max="50" autofocus required="">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <label>Nama sepatu / nama barang</label>
                        <textarea name="nama_barangnonmember[]" cols="10" rows="1" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-danger adding-shoes" data-toggle="tooltip" title="tambah barang..?" data-placement="right">+</button>
                </div>
            </div><!-- row -->
            <div id="new-contain-inputshoes"></div>
            <div class='form-actions'>
                <button id='proses' class="btn btn-success" type="submit">Submit</button>
                <button class="btn btn-danger" onclick="javascript:history.back();" type="reset">Cancel</button>
            </div>
    </div>
    <!-- sidebar right-->
    <div class='col-md-5'>
        <div class="panel panel-default">
            <div class="panel-heading"> Dashboard Cashier </div> 
            <div class="inner-box" style="padding:20px;">
                <!-- span class='transaksi-nonota' -->
                <div class="row">
                    <div class="hidden-xs">
                        <div class="logobasic-center">
                            <img class="img-responsive logos-shadow col-sm-push-8" src="<?php echo "frontend/logo/android-icon-96x96.png";?>" style="position:absolute;">
                        </div>
                    </div>
                </div>
                <div class='form-group'>
                    <div class="row">
                        <div class="col-xs-4 col-sm-3">No. Nota</div> 
                        <div class="col-xs-4 col-sm-3">
                            : <input type="text" name="kode_transaksi" value="TRK<?php echo acakangkahuruf(3);?>" style="display:inline-block;border:none;position:absolute;width:110px;margin-left:3px;">
                        </div>
                    </div>
                </div> 
                <div class='form-group'>
                    <div class="row">
                        <div class="col-sm-3 col-xs-4">Tanggal</div> 
                        <div class="col-sm-4 col-xs-4">
                             : <?php echo tgl_indo(date("Y-m-d"))?>
                        </div>
                    </div>
                </div>
                <div class='form-group'>
                    <div class="row">
                        <div class="col-sm-3 col-xs-4">Kasir</div>
                        <div class="col-sm-3 col-xs-5">
                            : <?php echo $_SESSION['nama_admin'];?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3 col-xs-4">Waktu</div>
                        <div class="col-sm-3 col-xs-5">
                            : <span id="clock"><?php print date('H:i:s'); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- PANEL CASHIER MONEY -->
        <div class="panel panel-default">
            <div class="panel-heading"> Cashier payment </div> 
            <div class="inner-box" style="padding:20px;">
                <div class="form-group">
                    <label>List Transaksi Item</label>
                    <div class="row" id="main-transaction-items">
                        <div class="col-md-3">
                            <div class="container-transaction-jenis-service"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="container-transaction2"></div>
                        </div>
                        <div class="col-md-3">
                            <div class="container-transaction3"></div>
                        </div>
                    </div>
                </div>
                <div class='form-group'>
                    <div class="row">
                        <div class="col-md-5 col-md-push-7">
                             <strong>Total</strong>
                        </div>
                        <div class="col-md-2 col-md-push-4">
                            <span class="container-total-peritems"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Jumlah Bayar</label>
                        <input id="bayar" type="text" name="jum_bayar" class="form-control bayar validation-payment">
                    </div> 
                    <div class="col-md-6">
                        <label>Kembalian</label>
                        <input id="price-kembalian" type="text" name="kembalian" class="form-control" value=""></input>
                    </div>
                </div>
                <input type="hidden" name="total_transcation_item" class="temp_value" value="" id="subtotal">
            </div>
        </form>
        </div>
    </div><!-- row-->
</div>
<!-- hiddin form input nama sepatu -->
<div style="display:none;" class="cloning-namebarang">
    <div class="clone-input-shoes">
        <div class="row">
            <div class="col-md-4">
                <label>Jumlah sepatu</label>
                <input type="number" id="jml_sepatu[]" class="form-control" datashoes="" min="1" max="50" name="jumlah_sepatu[]" autofocus required="">
            </div>
            <div class="col-md-7">
                <div class="form-group">
                    <label>Nama sepatu / Nama barang</label>
                    <textarea name="nama_barang[]" cols="10" rows="1" class="form-control"></textarea>
                </div>
            </div>
        </div>
    </div>
</div>
