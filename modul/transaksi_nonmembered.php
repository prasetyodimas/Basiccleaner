<script type="text/javascript">
    $(window).load(function(){
        //hide element when load page
        $('#cleaning-hide').hide();
        $('#repaint-hide').hide();
        $('#reglue-hide').hide();
        //when click checkbox show elem services
        $('#choose-cleaning').click(function(){
            if ($(this).is(':checked')){
                $('#cleaning-hide').show(1000);
                $('.category_service_cleaning').removeAttr('disabled');
                $('.change_nama_layanan_cleaning').removeAttr('disabled');
                $('#val-replace-cleaning').val('Cleaning');
                //alert(elem);
            }else{
                var show_elem = $('#cleaning-hide').hide(1000);
                $('.container-category-services-cleaning').html('');
                $('.container-name-services-cleaning').html('');
                $('.container-price-services-cleaning').html('');
            }
        });
        $('#choose-repaint').click(function(){
            if($(this).is(':checked')){
                var show_elem = $('#repaint-hide').show(1000);
                $('.category_service_repaint').removeAttr('disabled');
                $('.change_nama_layanan_repaint').removeAttr('disabled');
                $('#val-replace-repaint').val('Repaint');
            }else{
                var show_elem = $('#repaint-hide').hide(1000);
                $('.container-category-services-repaint').html('');
                $('.container-name-services-repaint').html('');
                $('.container-price-services-repaint').html('');
            }
        });
        $('#choose-reglue').click(function(){
            if ($(this).is(':checked')) {
                var show_elem = $('#reglue-hide').show(1000);
                $('.category_service_reglue').removeAttr('disabled');
                $('.change_nama_layanan_reglue').removeAttr('disabled');
                $('#val-replace-reglue').val('Reglue');
            }else{
                var show_elem = $('#reglue-hide').hide(1000);
                $('.container-category-services-reglue').html('');
                $('.container-name-services-reglue').html('');
                $('.container-price-services-reglue').html('');
            }
        });
    });
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
        $('select.change_nama_layanan_cleaning').on('change',function(){
            var val_jenis_layanan = $(this).find(':selected').data('jenis');
            var val_nama_layanan  = $(this).find(':selected').data('name');
            var val_price_layanan = $(this).find(':selected').data('price');
                $('.container-category-services-cleaning').html('<p>'+val_jenis_layanan+'</p>');
                $('.container-name-services-cleaning').html('<p class=format-price-item>'+val_nama_layanan+'</p>');
                $('.container-price-services-cleaning').html('<p class=format-price-item>'+val_price_layanan+'</p>');
                //replace this val to input total transaction
                $('.temp_value-one').val(val_price_layanan);
        });
        //onchange val nama layanan
        $('select.change_nama_layanan_repaint').on('change',function(){
            var val_jenis_layanan = $(this).find(':selected').data('jenis');
            var val_nama_layanan  = $(this).find(':selected').data('name');
            var val_price_layanan = $(this).find(':selected').data('price');
            $('.container-category-services-repaint').html('<p>'+val_jenis_layanan+'</p>');
            $('.container-name-services-repaint').html('<p class=format-price-item>'+val_nama_layanan+'</p>');
            $('.container-price-services-repaint').html('<p class=format-price-item>'+val_price_layanan+'</p>');
            //replace this val to input total transaction
            $('.temp_value-two').val(val_price_layanan);
        });
         //onchange val nama layanan
        $('select.change_nama_layanan_reglue').on('change',function(){
            var val_jenis_layanan = $(this).find(':selected').data('jenis');
            var val_nama_layanan  = $(this).find(':selected').data('name');
            var val_price_layanan = $(this).find(':selected').data('price');
            $('.container-category-services-reglue').html('<p>'+val_jenis_layanan+'</p>');
            $('.container-name-services-reglue').html('<p class=format-price-item>'+val_nama_layanan+'</p>');
            $('.container-price-services-reglue').html('<p class=format-price-item>'+val_price_layanan+'</p>');
            //replace this val to input total transaction
            $('.temp_value-three').val(val_price_layanan);
        });
        //function jumlah bayar as total - jumlah bayar = kembalian / total
        $('button[type="submit"]').attr('disabled', true);
        $('#bayar').blur(function(){
            var vars      = 0;
            var total     = parseInt($('#subtotal').val());
            var bayarnya  = parseInt($('#bayar').val());
            var get_returnprice = bayarnya - total;
            var kembalian = $('#price-kembalian').val(get_returnprice);
            //jika pembayaran == null / kosong 
            if (bayarnya=='' || bayarnya== null) {
                $('#price-kembalian').val(vars);
                $('input[name="kembalian"]').attr('disabled',true);
            }else{
                $('button[type="submit"]').attr('disabled',true);
            }
            //statement jika pembayaran kurang dari total maka disable button
            if(bayarnya <= total) {
                $('button[type="submit"]').attr('disabled',true);
            }else{
                $('button[type="submit"]').attr('disabled',false);
            }
        });
        //function count total trans
        $('input[name=total_transcation_item]').mouseover(function(){
            $('#subtotal').val(function(){
                var harga1 = parseInt($('#count1').val());
                var harga2 = parseInt($('#count2').val());
                var harga3 = parseInt($('#count3').val());
                    harga1 = isNaN(harga1) ? 0 :harga1;
                    harga2 = isNaN(harga2) ? 0 :harga2;
                    harga3 = isNaN(harga3) ? 0 :harga3;
                    return harga1 + harga2 + harga3;
            });
        });
        //jquery clone select append all service  
        $('.adding-shoes').click(function() {
            var new_input_shoes = $('div.cloning-namebarang .clone-input-shoes').clone();
            $('#new-contain-inputshoes').append(new_input_shoes);
        });
        $('#adding-services').click(function() {
            var new_services = $('div.cloning-jenislayanan .clone-jenis-service').clone();
            $('#new-contain-services').append(new_services);
        });
        //json change functon price on transaction
        $(".category_service_cleaning").change(function(){
            var getValue = $('.category_service_cleaning').find(':selected').data('val');
            if(getValue =='') {
                $('.place-valueservice-cleaning').html("<option value=''>Pilih layananan dulu !!</option>");
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
                    $('.place-valueservice-cleaning').html(all_service);
                    }
                });
            }
        });
        $(".category_service_repaint").change(function(){
            var getValue = $('.category_service_repaint').find(':selected').data('val');
            if(getValue =='') {
                $('.place-valueservice-repaint').html("<option value=''>Pilih layananan dulu !!</option>");
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
                    $('.place-valueservice-repaint').html(all_service);
                    }
                });
            }
        });
        $(".category_service_reglue").change(function(){
            var getValue = $('.category_service_reglue').find(':selected').data('val');
            if(getValue =='') {
                $('.place-valueservice-reglue').html("<option value=''>Pilih layananan dulu !!</option>");
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
                    $('.place-valueservice-reglue').html(all_service);
                    }
                });
            }
        });
    });
    <?php date_default_timezone_set('Asia/Jakarta'); ?>
        function startTime() {
                var today = new Date();
                var h = today.getHours();
                var m = today.getMinutes();
                var s = today.getSeconds();
                m = checkTime(m);
                s = checkTime(s);
                document.getElementById('clock').innerHTML = h + ":" + m + ":" + s;
                var t = setTimeout(startTime, 500);
        }
        function checkTime(i) {
                if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
                return i;
        }
        startTime();
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
                        <div class="col-md-12 form-group">
                            <label>Pilih Jenis Layanan :</label>
                            <label class="checkbox-inline">
                                <input type="checkbox" name="cleaning" value="Cleaning" id="choose-cleaning" style="cursor:pointer;"> Cleaning
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" name="repaint" value="Repaint" id="choose-repaint" style="cursor:pointer;"> Repaint
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" name="reglue" value="Reglue" id="choose-reglue" style="cursor:pointer;"> Reglue
                            </label>
                        </div>
                        <!-- ===================== JENIS LAYANAN CLEANING ====================-->
                        <div class="col-lg-12 form-group" id="cleaning-hide">
                            <div class="col-md-12 main-inner-services">
                                <div class="heading-services"><h4>Cleaning Service</h4></div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jenis Layanan</label>
                                        <input type="hidden" name="x" value="" id="val-replace-cleaning">
                                        <select name"servis_cleaning" class="category_service_cleaning form-control" disabled>
                                            <option value="">Pilih layanan</option>
                                            <?php 
                                                $get_services = mysqli_query($con,"SELECT * FROM kategori_layanan WHERE jenis_layanan='Cleaning' GROUP BY jenis_layanan");
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
                                        <select name="category_layanan_cleaning" class="form-control place-valueservice-cleaning change_nama_layanan_cleaning" disabled>
                                            <option value="">Pilih Jenis Layanan Dulu !</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ===================== JENIS LAYANAN REPAINT ====================-->
                        <div class="col-lg-12 form-group" id="repaint-hide">
                            <div class="col-md-12 main-inner-services">
                                <div class="heading-services"><h4>Repaint Service</h4></div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jenis Layanan</label>
                                        <input type="hidden" name="y" value="" id="val-replace-repaint">
                                        <select name="id_repaint" class="category_service_repaint form-control" disabled>
                                            <option value="">Pilih layanan</option>
                                            <?php 
                                                $get_services = mysqli_query($con,"SELECT * FROM kategori_layanan WHERE jenis_layanan='Repaint' GROUP BY jenis_layanan");
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
                                        <select name="category_layanan_repaint" class="form-control place-valueservice-repaint change_nama_layanan_repaint" disabled>
                                            <option value="">Pilih Jenis Layanan Dulu !</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ===================== JENIS LAYANAN REGLUE ====================-->
                        <div class="col-lg-12 form-group" id="reglue-hide">
                            <div class="col-md-12 main-inner-services">
                                <div class="heading-services"><h4>Reglue Service</h4></div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jenis Layanan</label>
                                        <input type="hidden" name="z" value="" id="val-replace-reglue">
                                        <select name="id_reglue" class="category_service_reglue form-control" disabled>
                                            <option value="">Pilih layanan</option>
                                            <?php 
                                                $get_services = mysqli_query($con,"SELECT * FROM kategori_layanan WHERE jenis_layanan='Reglue' GROUP BY jenis_layanan");
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
                                        <select name="category_layanan_reglue" class="form-control place-valueservice-reglue change_nama_layanan_reglue" disabled>
                                            <option value="">Pilih Jenis Layanan Dulu !</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- clone-jenis-service -->
                </div><!-- cloning-jenislayanan-->
                <!-- <div class="col">
                    <button type="button" class="btn btn-danger" id="adding-services" data-toggle="tooltip" title="tambah layanan..?" data-placement="right">+</button>
                </div> -->
            </div><!-- row -->
            <div class="row">
                <div id="new-contain-services"></div><!-- new container shoes -->
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Jumlah sepatu</label>
                        <input type="number" name="jumlah_sepatu" id="jml_sepatu" class="form-control" datashoes="" min="1" max="50" autofocus required="">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <label>Nama sepatu / nama barang</label>
                        <textarea name="nama_barangnonmember" cols="10" rows="1" class="form-control"></textarea>
                    </div>
                </div>
               <!--  <div class="col">
                   <button type="button" class="btn btn-danger adding-shoes" data-toggle="tooltip" title="tambah barang..?" data-placement="right">+</button>
               </div> -->
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
                        <!-- ============= CLEANING TRANSACTION =============-->
                        <div class="col-md-3">
                            <div class="container-category-services-cleaning"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="container-name-services-cleaning"></div>
                        </div>
                        <div class="col-md-3">
                            <div class="container-price-services-cleaning"></div>
                        </div>
                        <!-- ============= REPAINT TRANSACTION =============-->
                        <div class="col-md-3">
                            <div class="container-category-services-repaint"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="container-name-services-repaint"></div>
                        </div>
                        <div class="col-md-3">
                            <div class="container-price-services-repaint"></div>
                        </div>
                        <!-- ============= REGLUE TRANSACTION =============-->
                        <div class="col-md-3">
                            <div class="container-category-services-reglue"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="container-name-services-reglue"></div>
                        </div>
                        <div class="col-md-3">
                            <div class="container-price-services-reglue"></div>
                        </div>
                    </div>
                </div>
                <div class='form-inline'>
                    <div class="row">
                        <div class="col-md-8 pull-right" style="padding-right:0;padding-left:50px;margin-bottom: 10px;">
                            <label class="form-group">
                             Total <input type="text" name="total_transcation_item" id="subtotal" class="form-control" style="width:194px;">
                            </label>
                        </div>
                        <div style="display:none;">
                            <input type="text" name="total_trans_one" id="count1" class="temp_value-one">
                            <input type="text" name="total_trans_two" id="count2" class="temp_value-two">
                            <input type="text" name="total_trans_three" id="count3" class="temp_value-three">
                         </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Jumlah Bayar</label>
                        <input id="bayar" type="number" name="jum_bayar" min="1" class="form-control bayar validation-payment">
                    </div> 
                    <div class="col-md-6">
                        <label>Kembalian</label>
                        <input id="price-kembalian" type="number" min="1" name="kembalian" class="form-control" value=""></input>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div><!-- row-->
</div>

