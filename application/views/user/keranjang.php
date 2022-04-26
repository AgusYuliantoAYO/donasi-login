<div class="container-fluid">


    <!-- =========================== -->
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
    </svg>
    <!-- ==================== -->







    <!-- ===--------------------------------------- -->


    <!-- <div class="card col-md-8 mb-4">
                <div class="card-header text-white bg-primary ">
                    Alamat Kirim
                </div>

                <h5>A.....................</h5>

            </div> -->


    <!-- alamat -->
    <!-- <div class="card col-md-8 mb-4 mb-5"> -->
    <!-- <div class="card-header text-white bg-primary ">
                Alamat
            </div> -->
    <div class="row">
        <!-- <div class="col-md-12"> -->
        <div class="form-group col-md-4 mt-2 ">
            <input type="hidden" class="form-control" value="<?= $user['kota'] ?>" id="kota" name="kota">
            <input type="hidden" class="form-control" value="<?= $user['alamat'] ?>" id="alamat_penerima"
                name="alamat_penerima">
            <div class="card border-success mb-3" style="max-width: 28rem;">
                <small class="alert-success"><i class="fas fa-parachute-box"> <b> Alamat
                            Penerima:</b></i></small>
                <div align="center">
                    <small><b><?= $user['alamat'] ?> </b></small>
                </div>
            </div>
        </div>
        <div class="form-group col-md-5 mt-2 ">
            <div class="alert alert-primary d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
                    <use xlink:href="#info-fill" />
                </svg>
                <small>
                    Pilih Alamat Tujuan sesuai yang terdaftar pada Profil. <b><a
                            href="<?=base_url();?>user/profil_alamat/">klik</a></b>
                    untuk
                    mengubah.
                </small>
            </div>
        </div>
        <!-- </div> -->
    </div>


    <div class="row">

        <div class="card col-md-8 mb-4">
            <form method="post">
                <!-- <h4></h4> -->
                <div class="form-group">
                    <!-- <div class="row"> -->

                    <div class="form-group col-12 mt-0 ">

                        <!-- keranjang -->
                        <!-- <div class="card col-12 mb-4 mb-5">
                        <div class="card-header text-white bg-primary col-12 ">
                            Keranjang Belanja
                        </div>
                    </div> -->

                        <div class="card-header text-white bg-success col-12 ">
                            Keranjang Belanja
                        </div>

                        <?php
                                $ambilDataStok = mysqli_query($konek,"select * from data_produk where stok < 1");
                                while ($fetch=mysqli_fetch_array($ambilDataStok)) {
                                    $barang= $fetch['nama_produk'];
                            
                                ?>
                        <div class="alert alert-danger fade in alert-dismissible show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true" style="font-size:20px">&times;</span>
                            </button> <strong>Perhatian!</strong> Stok <b><?=$barang;?></b> Habis !!!
                        </div>

                        <?php
                            }
                       ?>


                        <div class="form-group col-md-2 mt-3">
                            <?php foreach ($alamat_kirim as $ak) : ?>
                            <input type="hidden" class="form-control" id="kota" name="kota" value="<?= $ak['kota']; ?>"
                                readonly>
                            <?php endforeach; ?>
                            <small class="form-text text-danger"><?=form_error('alamat'); ?></small>
                        </div>
                        <!-- ======================= -->



                    </div>
                    <!-- </div> -->
                </div>
                <table class="table table-bordered table-striped table-hover">

                    <tr>
                        <th><small><b>#</b></small></th>
                        <th><small><b>Nama Produk</b></small></th>
                        <th><small><b>Qty</b></small></th>
                        <!-- <th><small><b>Stok</b></small></th> -->
                        <th><small><b>Harga</b></small></th>
                        <!--<th><small><b>Sub-Total</b></small></th>-->
                        <th><small><b>Act</b></small></th>
                        <!-- <th><small><b>Ambil?</b></small></th> -->
                    </tr>

                    <?php
                    $no=1;
                    foreach ($this->cart->contents() as $items) :
                    // $subtotal = $items->qty * $items->price;
                    // $total += $subtotal;
                    ?>


                    <tr>

                        <td align="center"><small><?php echo $no++ ?></small></td>
                        <td align="center"><small><?php echo $items['name'] ?></small></td>
                        <td align="center"><small><?php echo $items['qty'] ?> x</small></td>
                        <!-- <td><small>?php echo $produk['stok'] ?></td> -->

                        <!-- ==================== -->
                        <!-- </td> -->

                        <td align="center"><small> Rp. <?php echo  number_format($items ['price'], 0,',','.') ?></small>
                        </td>
                        <!--<td align="right"><small>Rp. <?php echo number_format($items['subtotal'], 0,',','.') ?></small></td>-->
                        <!-- <div class="form-check">
                                <td align="center"><input type=checkbox name="?= $items['name']?>" value="?= $items['price'] ?>" onClick="this.form.total.value=checkChoice(this);"></td>
                        </div> -->
                        <td align="center">
                            <a href="<?=base_url();?>user/hapus_prdk_keranjang/<?=$items['rowid']?>"
                                class="far fa-trash-alt btn btn-sm btn-danger tombol-hapus">
                            </a>
                        </td>
                        <!-- <td> -->

                        <!-- </td> -->

                    </tr>

                    <?php endforeach; ?>
                    <!-- <td colspan="7" align="right">Total :
      <input type="text" name="total" value=""  readonly>
      <input type=hidden name=hiddentotal value=0></td> -->
                </table>
                <!-- =========== CANCEL ========== -->
                <div class="row">
                    <!-- ============== berat ========== -->
                    <div class="col-9">
                        <div align="left" class="input-group col-5">
                            <input type="hidden" class="form-control" aria-describedby="inputGroup-sizing-sm" id="berat"
                                name="berat" value="<?php
                            $grand_berat=0;
                            if ($keranjang = $this->cart->contents())
                            {   foreach ($keranjang as $item)
                              {
                                $grand_berat = $grand_berat+ ($items['qty'] *  $items['berat']) ;
                              }
                              
                              echo $grand_berat;
                              
                              ?>" readonly>

                            <!-- <text></text> -->
                            <text><b>Berat: </b><?=  $grand_berat/1000?> Kg</text>
                            <!-- <text> </text> -->
                            <small class="form-text text-danger"><?=form_error('berat'); ?></small>
                        </div>
                    </div>
                    <!-- </div> -->


                    <div class="col-3">
                        <div align="right">
                            <a href="<?php echo base_url('user/belanja') ?>">
                                <i class="fas fa-cart-plus btn-sm btn-info"></i>
                            </a>
                            <!-- <a href="  ?php echo base_url('user/hapus_keranjang') ?>">
                        <div class="btn btn-sm btn-danger">Hapus Keranjang</div>
                        </a> -->
                            <a href="<?=base_url();?>user/hapus_keranjang/"
                                class="fas fa-dumpster-fire btn-sm btn-danger"></a>
                        </div>
                    </div>
                </div>
                <!-- </div> -->


                <!-- ========coba ekspedisi======== -->
                <!-- ========coba ekspedisi======== -->
                <div class="col-12">


                    <div class="row mt-4">
                        <div class="col-5">

                            <div class="form-group">
                                <!-- <label for="exampleFormControlSelect1"> Provinsi</label> -->
                                <!-- <button class="btn col-md-12" type="submit"> -->
                                <!-- <button type="submit" class="btn btn-outline-primary"> -->
                                <select name="ekspedisi" id="ekspedisi" class="form-control">
                                    <!-- onChange="tutup(this.value)" requerd> -->
                                    <!-- onChange="tutup(this.value)" required> -->
                                    <option value="jne">JNE</option>
                                    <?php
                              $eks = ['pos' => 'POS', 'tiki'=>'TIKI'];
                              foreach ($eks as $key => $value ){
                                echo "<option type='submit' value='$key' ".($key == $this->input->post('ekspedisi') ? "Selected" : "").">$value </option>";
                              }
                              ?>
                                </select>
                                <!-- </button> -->
                                <small class="form-text text-danger"><?=form_error('provinsi'); ?></small>
                            </div>

                        </div>






                        <!-- =========Layanan============= -->
                        <div class="col-md-12  ">
                            <div class="row">

                                <form method="post">
                                    <div class="form-group">
                                        <button class="btn col-md-12" role="submit">
                                            <select class="form-control col-md-12" name="layanan" id="layanan"
                                                onchange="document.getElementById('ekspedisi').value=this.options[this.selectedIndex].text">
                                                <?php 
                                    $biaya = json_decode($ongkir, true);
                                    if($biaya['rajaongkir']['status']['code'] == '200'){
                                        foreach ($biaya['rajaongkir']['results'][0]['costs'] as $by){        
                                            $ongkosKirim =  number_format ($by['cost'][0]['value'],0,',','.');
                                            $deskripsi =  $by['description'] ;
                                            $estimasi =  $by['cost'][0]['etd'];
                                        ?>

                                                <!-- <button class="btn btn-outline-warning" type="submit"> -->
                                                <!-- <select name="lay" id="lay"> -->
                                                <option value="<?= number_format ($by['cost'][0]['value'],0,',','.')?>">
                                                    <!-- ?$deskripsi ; $ongkosKirim ; $estimasi ?> -->
                                                    <?= $by['description']?> - Rp.
                                                    <?= number_format ($by['cost'][0]['value'],0,',','.')?> -
                                                    <?= $by['cost'][0]['etd']?> day
                                                </option>
                                                <!-- </select> -->
                                                <!-- </button> -->

                                                <?php
                    
                                        }
                                        }
                                        ?>

                                </form>

                            </div>
                        </div>
                        </select>
                        </button>

                    </div>
                    <!-- ====================================================== -->
                    <!-- ====================================================== -->
                    <!-- <div class="col-12 ">
                        <div class="form-group">
                            <button type="submit" class="btn btn-warning shadow mb-2 text-dark"
                                id="pilihLayanan"><b>Pilih
                                    Layanan</b></button>
                        </div>
                    </div> -->
                </div>
                <!-- <div class="col-md-12 ">
                    <div class="form-group">
                        <button type="submit" class="btn btn-warning shadow mb-2 text-dark" id="pilihLayanan" onclick="myFunction()"><b>Pilih Layanan</b></button>
                    </div>
                </div> -->
                <!-- ========================== -->

            </form>
        </div>
        <!-- ======================================================= -->



        <!-- ======================================== -->
    </div>
    <!-- </tr> -->

</div>
</div>

<div class="card col-md-3 mb-4 ml-2">
    <div class="card-header text-white bg-success ">
        Ringkasan Belanja
    </div>
    <tr>
        <table class="table  table-striped ">
            <div class="row ml-2 mt-4">
                <div class="row">
                    <tr>
                        <td> <label>Total Belanja : </label> </td>
                        <td align="right">Rp.
                            <?php echo number_format($this->cart->total(), 0,',','.')?> </td>
                </div>
    </tr>
    <tr>
        <form method="post" type="text" id="fiks_layanan_ok" name="fiks_layanan_ok">
            <td> <label>Biaya Kirim : </label> </td>
            <td align="right"> Rp
                <?php
        if ($keranjang = $this->input->post('layanan'))
        {
            //  echo  "<h5>GRATIS</h5>";
            echo ($this->input->post('layanan'));
        }
        ?>
            </td>
        </form>
    </tr>


    <!-- <input type="text" class="form-control bg-warning text-white text-bold" id="fiks_layanan" name="fiks_layanan"
         value="Ekspedisi yang dipilih = ?php echo $this->input->post('ekspedisi');?>" readonly> ?php echo $this->input->post('ekspedisi');?> </input>
            <tr> -->
    <!-- 
            <span class="float-right text-seccound">
                                        <h4 class="small font-weight-bold">
                                            <b><i class="fas fa-truck-loading"></i><a class="bg-success">Ekspedisi :</a> ?php echo $this->input->post('ekspedisi');?></b>
                                        </h4>
                                    </span> -->

    <div class="card border-success mb-3" style="max-width: 28rem;">
        <small class="alert-success"><i class="fas fa-truck-loading"> <b>Ekspedisi:</b></i></small>
        <div align="center">
            <small><b class="text-uppercase">
                    <?php
                if ($keranjang = $this->input->post('layanan'))
                {
                                   echo 
                                   $this->input->post('ekspedisi'); 
                                } ?>
                </b></small>
            <!-- ?php $eksp = $this->input->post('ekspedisi')?> -->
            <!-- <div class="form-group">
                <input type="text" name="eksp" id="eksp" class="form-control" value="?= $eksp ?>">
            </div> -->
            <!-- // <small><b class="text-uppercase">?= $this->input->post('ekspedisi'); ?> </b></small> -->
        </div>
    </div>
    <!-- ====================================== -->


    <!-- =================== -->
    <td> <b>Total Bayar : </b> </td>
    <td align="right">Rp.
        <?php
            $total_bayar=0;
            $total_belanja=$this->cart->total();
            $layanan= (float) $this->input->post('layanan')*1000;
            // $layanan_value=  $this->input->post('layanan');
                            // if ($keranjang = $this->input->post('layanan'))
                            
                            //   {
                                $total_bayar = $total_belanja +  $layanan ;
                            //   }
                              
                              echo number_format ($total_bayar, 0,',','.');
                            //   var_dump( $layanan);
                              ?>

        <!-- =============================== -->
        <!-- <td> <b>Total Bayar : </b> </td>
                <td align="right">Rp. ?php echo number_format($this->cart->total(), 0,',','.')?> </td> -->
        </tr>

</div>
</table>
<div align="right">

    <!-- <a href="?php echo base_url('user/pembayaran') ?>"> -->
    <form method="post" action="<?php echo base_url() ?>user/proses_pesanan">

        <div class="form-group">
            <!-- <label>Email</label> -->
            <input type="hidden" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
        </div>
        <div class="form-group">
            <!-- <label>Nama Lengkap</label> -->
            <input type="hidden" name="nama" placeholder="Nama Lengkap Anda" id="nama" class="form-control"
                value="<?= $user['name']; ?>">
        </div>
        <div class="form-group">
            <!-- <label>AlamLengkap</label> -->
            <input type="hidden" name="alamat" placeholder="alamat" id="alamat" class="form-control"
                value="<?= $user['alamat']; ?>">
        </div>
        <div class="form-group">
            <!-- <label>AlamLengkap</label> -->
            <input type="hidden" name="wa" placeholder="wa" id="wa" class="form-control" value="<?= $user['wa']; ?>">
        </div>


        <div class="form-group">
            <input type="hidden" name="ekspedisi_fiks" id="ekspedisi_fiks" class="form-control"
                value="<?= $this->input->post('ekspedisi') ?>">
        </div>
        <div class="form-group">
            <input type="hidden" name="ongkos_kirim_fiks" id="ongkos_kirim_fiks" class="form-control"
                value="<?= $layanan ?>">
        </div>
        <div class="form-group">
            <input type="hidden" name="total_bayar_fiks" id="total_bayar_fiks" class="form-control"
                value="<?= $total_bayar ?>">
        </div>

        <!-- <div class="form-group"> -->
        <!-- ?php ($alamat_terima as $at) :   ?> -->
        <!-- <input type="hidden" name="alamat_penerima" id="alamat_penerima"
                value="?= $alamat_terima['alamat'] ?> "></input> -->
        <!-- ?php endforeach; ?> -->
        <!-- </div> -->

        <!-- <button type="submit" class="btn btn-sm btn-success mb-3" name="pesan" id="pesan">Pesan</button> -->

        <button class="btn btn-success" id="pay-button"><b>Checkout!</b></button>


    </form>

    <!-- ===============MIDTRANS========================== -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-_Ot1jLi2QVzHPdO6">
    </script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
    </script>



    <form id="payment-form" method="post" action="<?=site_url()?>salespay/finish_buy">
        <input type="hidden" name="result_type" id="result-type" value="">


        <!-- -----------form------------------- -->
        <div class="form-group">
            <!-- <label>Email</label> -->
            <input type="hidden" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
        </div>
        <div class="form-group">
            <!-- <label>Nama Lengkap</label> -->
            <input type="hidden" name="nama" placeholder="Nama Lengkap Anda" id="nama" class="form-control"
                value="<?= $user['name']; ?>">
        </div>
        <div class="form-group">
            <!-- <label>AlamLengkap</label> -->
            <input type="hidden" name="alamat" placeholder="alamat" id="alamat" class="form-control"
                value="<?= $user['alamat']; ?>">
        </div>
        <div class="form-group">
            <!-- <label>AlamLengkap</label> -->
            <input type="hidden" name="wa" placeholder="wa" id="wa" class="form-control" value="<?= $user['wa']; ?>">
        </div>


        <div class="form-group">
            <input type="hidden" name="ekspedisi_fiks" id="ekspedisi_fiks" class="form-control"
                value="<?= $this->input->post('ekspedisi') ?>">
        </div>
        <div class="form-group">
            <input type="hidden" name="ongkos_kirim_fiks" id="ongkos_kirim_fiks" class="form-control"
                value="<?= $layanan ?>">
        </div>
        <div class="form-group">
            <input type="hidden" name="total_bayar_fiks" id="total_bayar_fiks" class="form-control"
                value="<?= $total_bayar ?>">
        </div>

        <!-- ------------------------------ -->




</div>
<input type="hidden" name="result_data" id="result-data" value="">
</div>
</form>


<script type="text/javascript">
$('#pay-button').click(function(event) {
    event.preventDefault();
    $(this).attr("disabled", "disabled");


    // var id_invoice_donasi = $("#id_invoice_donasi").val();
    // var nama = $("#name").val();
    var email = $("#email").val();
    var nama = $("#nama").val();
    var alamat = $("#alamat").val();
    var wa = $("#wa").val();
    var ekspedisi_fiks = $("#ekspedisi_fiks").val();
    var ongkos_kirim_fiks = $("#ongkos_kirim_fiks").val();
    var total_bayar_fiks = $("#total_bayar_fiks").val();
    // var doa = $("#pesan").val();


    $.ajax({
        type: 'POST',
        url: '<?=site_url()?>/salespay/token_buy',
        data: {
            email: email,
            nama: nama,
            alamat: alamat,
            wa: wa,
            ekspedisi_fiks: ekspedisi_fiks,
            ongkos_kirim_fiks: ongkos_kirim_fiks,
            total_bayar_fiks: total_bayar_fiks,
        },
        cache: false,

        success: function(data) {
            //location = data;

            console.log('token = ' + data);

            var resultType = document
                .getElementById('result-type');
            var resultData = document
                .getElementById('result-data');

            function changeResult(type, data) {
                $("#result-type").val(type);
                $("#result-data").val(JSON
                    .stringify(data));
                //resultType.innerHTML = type;
                //resultData.innerHTML = JSON.stringify(data);
            }

            snap.pay(data, {

                onSuccess: function(
                    result) {
                    changeResult(
                        'success',
                        result);
                    console.log(result
                        .status_message
                    );
                    console.log(result);
                    $("#payment-form")
                        .submit();
                },
                onPending: function(
                    result) {
                    changeResult(
                        'pending',
                        result);
                    console.log(result
                        .status_message
                    );
                    $("#payment-form")
                        .submit();
                },
                onError: function(result) {
                    changeResult(
                        'error',
                        result);
                    console.log(result
                        .status_message
                    );
                    $("#payment-form")
                        .submit();
                }
            });
        }
    });
});
</script>
<!-- ========================================= -->

</div>




<?php   
    } else
    
    {
        redirect('user/belanja');
    }
        ?>



</form>
</div>
</div>

<script>
$('.remove-item').click(function(e) {
    e.preventDefault();

    var rowid = $(this).data('rowid');
    var tr = $('.cart-' + rowid);

    $('.product-name', tr).html('<i class="fa fa-spin fa-spinner"></i> Menghapus...');

    $.ajax({
        method: 'POST',
        url: '<?php echo site_url('user/hapus_prdk_keranjang?action=remove_item'); ?>',
        data: {
            rowid: rowid
        },
        success: function(res) {
            if (res.code == 204) {
                tr.addClass('alert alert-danger');

                setTimeout(function(e) {
                    tr.hide('fade');

                    $('.n-subtotal').text(res.total.subtotal);
                    $('.n-ongkir').text(res.total.ongkir);
                    $('.n-total').text(res.total.total);
                }, 2000);
            }
        }
    })
})
</script>



<!-- <script language="JavaScript">
function checkChoice(whichbox){
 with (whichbox.form){
  if (whichbox.checked == false)
   hiddentotal.value = eval(hiddentotal.value) - eval(whichbox.value);
  else
   hiddentotal.value = eval(hiddentotal.value) + eval(whichbox.value);
   return(formatCurrency(hiddentotal.value));
 }
}
function formatCurrency(num){
 num = num.toString().replace(/\$|\,/g,'');
 if(isNaN(num)) num = "0";
  cents = Math.floor((num*100+0.5)%100);
  num = Math.floor((num*100+0.5)/100).toString();
 if(cents < 10) cents = "0" + cents;
  for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
  num = num.substring(0,num.length-(4*i+3))+'.'+num.substring(num.length-(4*i+3));
  return ("Rp. " + num + "," + cents);
}
</script> -->

<script type="text/javascript">
function myFunction() {
    // var id_donasi = "";
    // var nominal_salur = "";
    document.getElementById("ekspedisi").disabled = true;
    document.getElementById("layanan").disabled = true;
    // document.getElementById("pilihLayanan").disabled = true;
}
</script>




<!-- ======= CHECKOUT DISABLE ============== -->
<script type="text/javascript">
function tutup(buy) {
    // var id_donasi = "";
    // var nominal_salur = "";
    switch (buy) {
        case "0": {
            // id_donasi =
            // document.getElementById("get_nominal_salur").style.display = 'none';
            // document.getElementById("get_id_donasi").style.display = 'none';
            document.getElementById("pay-button").disabled = true;
        }
        break;
    case "jne": {
        // id_donasi =
        // document.getElementById("get_nominal_salur").style.display = 'none';
        // document.getElementById("get_id_donasi").style.display = 'none';
        document.getElementById("pay-button").disabled = false;
    }
    break;
    case "pos": {
        // id_donasi =
        // document.getElementById("get_nominal_salur").style.display = 'none';
        // document.getElementById("get_id_donasi").style.display = 'none';
        document.getElementById("pay-button").disabled = false;
    }
    break;
    case "tiki": {
        // id_donasi =
        // document.getElementById("get_nominal_salur").style.display = 'none';
        // document.getElementById("get_id_donasi").style.display = 'none';
        document.getElementById("pay-button").disabled = false;
    }
    break;
    default:
        document.getElementById("pay-button").disabled = true;
    }
    // document.getElementById('id_donasi').innerHTML = id_donasi;
    // document.getElementById('nominal_salur').innerHTML = nominal_salur;
}
</script>