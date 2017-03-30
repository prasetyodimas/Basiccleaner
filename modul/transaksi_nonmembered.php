<script type="text/javascript">
    $(document).ready(function(){
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
        /* $("input[type='number']").bind("input", function() {
            var get_values_shoes = $('#jml_sepatu').val();
            $("#jml_sepatu").attr('datashoes',get_values_shoes);
        });*/
        //jquery Clone Select Append Service  
        $('.adding-shoes').click(function() {
            var new_input_shoes = $('div.cloning-namebarang .clone-input-shoes').clone();
            $('#new-contain-inputshoes').append(new_input_shoes);
        });
        $('#adding-services').click(function() {
            var new_services = $('div.cloning-jenislayanan .clone-jenis-service1').clone();
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
       /* $('#bayar').blur(function(){
            var total    = $('#subtotal_transaksi').val();
            var bayarnya = $('#bayar').val();
            var get_returnprice = parseFloat(bayarnya)-parseFloat(total);
            $('#price-kembalian').val(get_returnprice);
        });*/
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
         //format currency jquery
        $('#format_price_cleaning').number(true);
        $('#format_price_repaint').number(true);
        $('#format_price_reglue').number(true);
        //json change functon price on transaction
        $("#choose_service").change(function(){
            var getValue= $(this).val();
            if(getValue =='') {
                alert('no values here !!');
            }else{
                $.ajax({
                    url:'json/json_services.php',
                    type:'GET',
                    dataType:'json',
                    data: {'jenis_layanan' : getValue},
                    success:function (data) {
                        if(data !='') {
                            console.log(data);
                            $.each(data,function(index,value){
                                $("#x").val(value.nama_layanan);
                            });
                        }
                    }
                });
            }
        });
    });
    function show_services(){
        var option = $("#category_service").val();
        if(option == "Cleaning") {
            $("#show_cleaning").addClass('show-elem');
            $("#show_repaint").removeClass('show-elem');
            $("#show_reglue").removeClass('show-elem');
            $("#hidding-default-select").addClass('hidden-elem');
        }else if (option == "Reglue") {
            $("#show_reglue").addClass('show-elem');
            $("#show_cleaning").removeClass('show-elem');
            $("#show_repaint").removeClass('show-elem');
            $("#hidding-default-select").addClass('hidden-elem');
        }else if(option == "Repaint") {
            $("#show_repaint").addClass('show-elem');
            $("#show_cleaning").removeClass('show-elem');
            $("#show_reglue").removeClass('show-elem');
            $("#hidding-default-select").addClass('hidden-elem');
        }else if(option ==""){
            $("#hidding-default-select").addClass('show-elem');
            $("#show_cleaning").addClass('hidden-elem');
            $("#show_repaint").addClass('hidden-elem');
            $("#show_reglue").addClass('hidden-elem');
        } 
    }
</script>
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
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Jenis Layanan</label>
                        <select id="category_service" onchange="show_services()" class="form-control" autofocus required="">
                            <option value="">Pilih layanan</option>
                            <?php 
                                $get_services = mysqli_query($con,"SELECT * FROM kategori_layanan GROUP BY jenis_layanan");
                                while ($result = mysqli_fetch_array($get_services)) {
                                    echo "<option value='".$result['jenis_layanan']."'>".$result['jenis_layanan']."</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                 <div class="col-md-5" id="hidding-default-select">
                     <div class="form-group">
                        <label>Nama Layanan</label>
                        <select class="form-control" autofocus required disabled="">
                            <option value="">Pilih nama layanan dulu ! </option>
                        </select>
                    </div>
                </div>
                <!-- ================================ Hidden Service Cleaning  =================================-->
                <div class="col-md-5" id="show_cleaning" style="display:none;">
                     <div class="form-group">
                        <label>Nama Layanan</label>
                        <select name="nama_layanan[]" class="form-control" autofocus required="">
                            <option value="">Pilih layanannya</option>
                            <?php 
                                $get_services = mysqli_query($con,"SELECT * FROM kategori_layanan WHERE jenis_layanan='Cleaning' ORDER BY id_kategori_layanan DESC");
                                while ($result = mysqli_fetch_array($get_services)) {
                                    echo "<option value='".$result['id_kategori_layanan']."' data-value='".$result['jenis_layanan']."'>".$result['nama_layanan']."</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <!-- ================================ Hidden Service Repaint  =================================-->
                <div class="col-md-5" id="show_repaint" style="display:none;">
                     <div class="form-group">
                        <label>Nama Layanan</label>
                        <select name="nama_layanan[]" class="form-control" autofocus required="">
                            <option value="">Pilih layanannya</option>
                            <?php 
                                $get_services = mysqli_query($con,"SELECT * FROM kategori_layanan WHERE jenis_layanan='Repaint' ORDER BY id_kategori_layanan DESC");
                                while ($result = mysqli_fetch_array($get_services)) {
                                    echo "<option value='".$result['id_kategori_layanan']."' data-value='".$result['jenis_layanan']."'>".$result['nama_layanan']."</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <!-- ================================ Hidden Service Reglue =================================-->
                <div class="col-md-5" id="show_reglue" style="display:none;">
                     <div class="form-group">
                        <label>Nama Layanan</label>
                        <select name="nama_layanan[]" class="form-control" autofocus required="">
                            <option value="">Pilih layanannya</option>
                            <?php 
                                $get_services = mysqli_query($con,"SELECT * FROM kategori_layanan WHERE jenis_layanan='Reglue' ORDER BY id_kategori_layanan DESC");
                                while ($result = mysqli_fetch_array($get_services)) {
                                    echo "<option value='".$result['id_kategori_layanan']."' data-value='".$result['jenis_layanan']."'>".$result['nama_layanan']."</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-danger" id="adding-services">+</button>
                </div>
            </div><!-- row -->
            <div id="new-contain-services"></div><!-- new container shoes -->
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Jumlah sepatu</label>
                        <input type="number" id="jml_sepatu" class="form-control" datashoes="" min="1" max="50" name="jumlah_sepatu[]" autofocus required="">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <label>Nama sepatu / nama barang</label>
                        <textarea name="nama_barangnonmember[]" cols="10" rows="1" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-danger adding-shoes">+</button>
                </div>
            </div><!-- row -->

            <div id="new-contain-inputshoes"></div><!-- new container shoes -->
            <div class='form-actions'>
                <button id='proses' class="btn btn-success">Submit</button>
                <button class="btn btn-danger" onclick="javascript:history.back();">Cancel</button>
            </div>
    </div>
    <!-- sidebar right-->
    <div class='col-md-5'>
        <div class="panel panel-default">
            <div class="panel-heading"> Dashboard Cashier </div> 
            <div class="inner-box" style="padding:20px;">
                <div class="logobasic-center">
                    <img class="logos-shadow" src="<?php echo "frontend/logo/android-icon-96x96.png";?>">
                </div>
                <div class='form-group'>
                    No. Nota : 
                    <span class='transaksi-nonota'><input type="text" name="kode_transaksi" value="TRK<?php echo acakangkahuruf(3);?>" style="border:none;"></span>
                </div> 
                <div class='form-group'>
                    Tanggal <span class="transaksi-tanggal">: <?php echo tgl_indo(date("Y-m-d"))?></span>
                </div>
                <div class='form-group'>
                    Kasir <span class="transaksi-namakasir">: <?php echo $_SESSION['nama_admin'];?></span>
                </div>
                <div class="form-group">
                  Waktu <span class="transaksi-clock" id="clock">: <?php print date('H:i:s'); ?></span>
                </div>
            </div>
        </div>
        <!-- PANEL CASHIER MONEY -->
        <div class="panel panel-default">
            <div class="panel-heading"> Cashier payment </div> 
            <input type="hidden" name="subtotal" id="total_transaksi_values" class="price_cleaning price_repaint price_reglue">
            <div class="inner-box" style="padding:20px;">
                <div class="form-group">
                    <label>List Transaksi Item</label>
                    <p>-</p>
                </div>
                <div class='form-group'>
                    <label>Subtotal Transaksi</label>
                    <input type="text" id="subtotal_transaksi" name="total_trans" class="form-control">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Jumlah Bayar</label>
                        <input id="bayar" type="text" name="jum_bayar" class="form-control bayar">
                    </div> 
                    <div class="col-md-6">
                        <label>Kembalian</label>
                        <input id="price-kembalian" type="text" name="kembalian" class="form-control" value=""></input>
                    </div>
                </div>
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
                <input type="number" id="jml_sepatu" class="form-control" datashoes="" min="1" max="50" name="jumlah_sepatu[]" autofocus required="">
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
<!-- ================== CLONE MENU SERVIS ================== -->
<div style="display:none;" class="cloning-jenislayanan">
    <div class="clone-jenis-service1">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Jenis Layanan</label>
                    <select name="jenis_layanan[]" id="category_service" onchange="show_services()" class="form-control" autofocus required="">
                        <option value="">Pilih layanan</option>
                        <?php 
                            $get_services = mysqli_query($con,"SELECT * FROM kategori_layanan GROUP BY jenis_layanan");
                            while ($result = mysqli_fetch_array($get_services)) {
                                echo "<option value='".$result['id_kategori_layanan']."' data-value='".$result['jenis_layanan']."'>".$result['jenis_layanan']."</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <!-- ================================ Hidden Service  =================================-->
            <div class="col-md-5" id="show_cleaning" style="display:none;">
                 <div class="form-group">
                    <label>Nama Layanan</label>
                    <select name="nama_layanan[]" id="" class="form-control" autofocus required="">
                        <option value="">Pilih layanannya</option>
                        <?php 
                            $get_services = mysqli_query($con,"SELECT * FROM kategori_layanan WHERE jenis_layanan='Cleaning' ORDER BY id_kategori_layanan DESC");
                            while ($result = mysqli_fetch_array($get_services)) {
                                echo "<option value='".$result['id_kategori_layanan']."' data-value='".$result['jenis_layanan']."'>".$result['nama_layanan']."</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>