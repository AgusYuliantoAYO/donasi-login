<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">?= $title; ?></h1> -->




    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <!-- <form method="post" action="<?php echo base_url() ?>user/proses_donasi"> -->
            <br><br>
            <h3></h3>
            <div class="card shadow mb-1 ml-2">
                <div class="card mb-2">

                    <div class="card-body mb-2">
                        <div class="row">
                            <div class="col-md-3 mb-4">
                                <img src="<?php echo base_url().'assets/img/dokdonasi/'.$jenis_donasi['gambar_donasi']; ?>"
                                    class="card-img-top">
                            </div>

                            <?php
                
                         $progres =  $jenis_donasi['perolehan_donasi'] / $jenis_donasi['target_donasi']  *100;
                   
                      //   echo "<h4>Total Belanja Anda ".(int)$progres;

                            ?>

                            <div class="col-md-9">
                                <!-- <label>Nama Donasi</label> -->
                                <input type="hidden" name="nama_donasi" placeholder="Nama Donasi" class="form-control"
                                    id="nama_donasi" value="<?= $jenis_donasi['nama_donasi'];?>" readonly>

                                <h4><?= $jenis_donasi['nama_donasi'];?>
                                </h4>
                                <!-- <h4 class="small font-weight-bold">
                                    ?=  $jenis_donasi['nama_donasi'] ?> -->

                                <h4 class="small font-weight-bold">
                                    <?=  $jenis_donasi['deskripsi_donasi'] ?>
                                </h4>

                            </div>


                        </div>
                        <h4 class="small font-weight-bold"> Didapat:
                            <?= number_format( $jenis_donasi['perolehan_donasi'], 0,',','.') ?><span
                                class="float-right">
                                Target: <?= number_format( $jenis_donasi['target_donasi'], 0,',','.') ?> </span>
                        </h4>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $progres?>%"
                                aria-valuenow="<?=$jenis_donasi['perolehan_donasi'];?>" aria-valuemin="0"
                                aria-valuemax="<?=$jenis_donasi['target_donasi'];?>"><?= (int)$progres ?>%
                            </div>
                        </div>
                        <div class="col-12" align="right">
                            <small>(<?php echo durasi_donasi($jenis_donasi['masa_donasi']); ?>)</small>
                        </div>

                        <div class="mt-5">
                            <h4 class="small font-weight-bold ">Opsi:</h4>
                        </div>
                        <!-- ==============Tombol============= -->
                        <div data-widget-group="group1">
                            <div class="row" align="center">
                                <div class="col-sm-12 mb-2 ">
                                    <!-- panel -->
                                    <div class="list-group list-group-alternate mb-n nav nav-tabs">
                                        <button href="#tab-handphone" role="tab" data-toggle="tab"
                                            class="list-group-item btn-success  active text-dark"><i
                                                class="ti ti-mobile"></i> <b> Berdonasi </b>
                                        </button>

                                        <button href="#tab-email" role="tab" data-toggle="tab"
                                            class="list-group-item btn-success text-dark"><i class="ti ti-email"></i>
                                            <b>Detail</b>
                                        </button>

                                        <button href="#tab-donatur" role="tab" data-toggle="tab"
                                            class="list-group-item btn-success text-dark "><i class="ti ti-donatur"></i>
                                            <b>Orang Baik
                                                <?php foreach ($totalDonatur_ as $dntr): ?>
                                                <?php $tot=$dntr['status_code']==200; if($tot) : ?>
                                                (<?=$tot?>)
                                                <?php endif;?>
                                                <?php endforeach; ?>
                                            </b>
                                        </button>

                                    </div>
                                    <div class="col-12 mt-3" align="left">
                                        <a href="<?php echo base_url('user/berdonasi') ?>">
                                            <div class="btn btn-sm btn-danger">Kembali</div>
                                        </a>
                                    </div>

                                </div>
                                <!-- ================================================= -->
                            </div>
                        </div>




                        <!-- ==============Tombol============= -->
                        <!-- <div data-widget-group="group1">
                            <div class="row" align="center">
                                <div class="col-sm-12 mb-2 mt-2">
                                    

                                    <div class="list-group list-group-alternate mb-n nav nav-tabs">

                                        <button href="#tab-handphone" role="tab" data-toggle="tab"
                                            class="list-group-item active"><i class="ti ti-mobile"></i> Berdonasi
                                        </button>

                                        <button href="#tab-email" role="tab" data-toggle="tab"
                                            class="list-group-item "><i class="ti ti-email"></i>
                                            Detail</button>

                                    </div>
                                </div> -->
                        <!-- ================================================= -->


                    </div><!-- col-sm-3 -->
                    <div class="col-md-12">
                        <div class="tab-content">
                            <!-- #tab-about -->


                            <!-- #tab-handphone -->
                            <div class="tab-pane active" id="tab-handphone">
                                <div class="panel panel-teal">
                                    <div class="panel-heading">
                                        <div class="card shadow mb-1 ml-2">

                                            <div class="card-body ">
                                                <h4>Form Berdonasi</h4>
                                            </div>
                                        </div>

                                        <div class="card shadow mb-4 ml-2">
                                            <div class="card-header py-3">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <!-- <h5>Results : ?= $total_rows; ?></h5> -->
                                                        <div class="card-body">
                                                            <!-- <form method="post" action="?php echo base_url() ?>user/proses_donasi"> -->




                                                            <!-- <button type="submit" class="btn btn-sm btn-success mb-3">Donasi
                                                            Sekarang</button> -->


                                                            <!-- ===============MIDTRANS========================== -->
                                                            <script type="text/javascript"
                                                                src="https://app.sandbox.midtrans.com/snap/snap.js"
                                                                data-client-key="SB-Mid-client-S_M2TLY19MbXwA2_">
                                                            </script>
                                                            <script
                                                                src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
                                                            </script>



                                                            <form id="payment-form" method="post"
                                                                action="<?=site_url()?>/user/finish">
                                                                <input type="hidden" name="result_type" id="result-type"
                                                                    value="">


                                                                <!-- -----------form------------------- -->
                                                                <div class="form-group">
                                                                    <label>Nominal Donasi</label>
                                                                    <input type="text" placeholder="Rp"
                                                                        class="form-control" id="nominal_donasi"
                                                                        name="nominal_donasi">

                                                                </div>

                                                                <input type="hidden" name="nama_donasi"
                                                                    placeholder="Nama Donasi" class="form-control"
                                                                    id="nama_donasi"
                                                                    value="<?= $jenis_donasi['nama_donasi'];?>">

                                                                <div class="form-group">
                                                                    <label>Pesan/Do'a</label>
                                                                    <label for="full_address"
                                                                        class="col-form-label sr-only">Pesan/Do'a</label>
                                                                    <textarea id="pesan" name="pesan"
                                                                        v-model="full_address" rows="5"
                                                                        class="form-control"
                                                                        placeholder="Tulis Pesan/Do'a......"
                                                                        required></textarea>
                                                                </div>

                                                                <div class="form-group">
                                                                    <!-- <label>Email</label> -->
                                                                    <input type="hidden" class="form-control" id="email"
                                                                        name="email" value="<?= $user['email']; ?>"
                                                                        readonly>

                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Nama Lengkap</label>
                                                                    <input type="text" name="name"
                                                                        placeholder="Nama Lengkap Anda" id="name"
                                                                        class="form-control"
                                                                        value="<?= $user['name']; ?>">
                                                                </div>


                                                                <input type="hidden" name="id_donasi"
                                                                    class="form-control" id="id_donasi"
                                                                    value="<?= $jenis_donasi['id_donasi'];?>">
                                                                <!-- ------------------------------ -->




                                                        </div>
                                                        <input type="hidden" name="result_data" id="result-data"
                                                            value="">
                                                    </div>
                                                    </form>

                                                    <button class="btn btn-primary" id="pay-button"><b>Donasi
                                                            Sekarang!</b></button>

                                                    <script type="text/javascript">
                                                    $('#pay-button').click(function(event) {
                                                        event.preventDefault();
                                                        $(this).attr("disabled", "disabled");


                                                        var id_invoice_donasi = $("#id_invoice_donasi").val();
                                                        var nama = $("#name").val();
                                                        var email = $("#email").val();
                                                        var nama_donasi = $("#nama_donasi").val();
                                                        var nominal = $("#nominal_donasi").val();
                                                        // var doa = $("#pesan").val();


                                                        $.ajax({
                                                            type: 'POST',
                                                            url: '<?=site_url()?>/user/token',
                                                            data: {
                                                                id_invoice_donasi: id_invoice_donasi,
                                                                nama: nama,
                                                                email: email,
                                                                nama_donasi: nama_donasi,
                                                                nominal: nominal,
                                                                // doa: doa
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
                                                                        console.log(
                                                                            result
                                                                            .status_message
                                                                        );
                                                                        console.log(
                                                                            result);
                                                                        $("#payment-form")
                                                                            .submit();
                                                                    },
                                                                    onPending: function(
                                                                        result) {
                                                                        changeResult(
                                                                            'pending',
                                                                            result);
                                                                        console.log(
                                                                            result
                                                                            .status_message
                                                                        );
                                                                        $("#payment-form")
                                                                            .submit();
                                                                    },
                                                                    onError: function(
                                                                        result) {
                                                                        changeResult(
                                                                            'error',
                                                                            result);
                                                                        console.log(
                                                                            result
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




                                                    <!-- </div> -->
                                                    <!-- MATIIN -->
                                                    <!-- </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- #tab-handphone -->

                            <!-- #tab-email -->
                            <div class="tab-pane " id="tab-email">
                                <div class="panel panel-teal">
                                    <div class="panel-heading">
                                        <div class="card shadow mb-1 ml-2">

                                            <div class="card-body ">
                                                <h4>Detail <i>Campign</i></h4>
                                            </div>

                                        </div>
                                        <div class="card shadow mb-4 ml-2">
                                            <div class="card-header py-3">
                                                <div class="card-body">
                                                    <div class="table-responsive">

                                                        <div class="card-body">


                                                            <?php foreach ($donasi as $brg): ?>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <img src="<?php echo base_url().'assets/img/dokdonasi/'.$brg->gambar_donasi ?>"
                                                                        class="card-img-top">
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <table class="table">
                                                                        <tr>
                                                                            <td>Nama Donasi</td>
                                                                            <td><strong><?php echo $brg->nama_donasi?></strong>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Kategori</td>
                                                                            <?php if($brg->kategori_donasi==1) : ?>
                                                                            <td colspan="7"> <strong>
                                                                                    <h9 style="align-center">
                                                                                        <div class="alert alert-success"
                                                                                            role="alert">
                                                                                            Bencana Alam
                                                                                        </div>
                                                                                    </h9>
                                                                                    <strong> </td>
                                                                            <?php endif;?>
                                                                            <?php if($brg->kategori_donasi==2) : ?>
                                                                            <td colspan="7"><strong>
                                                                                    <h9 style="align-center">
                                                                                        <div class="text">
                                                                                            Pendidikan
                                                                                        </div>
                                                                                        <strong>
                                                                                    </h9>
                                                                            </td>
                                                                            <?php endif;?>
                                                                            <?php if($brg->kategori_donasi==3) : ?>
                                                                            <td colspan="7"><strong>
                                                                                    <h9 style="align-center">
                                                                                        <div class="text"> Rumah
                                                                                            Ibadah
                                                                                        </div>
                                                                                        <strong>
                                                                                    </h9>
                                                                            </td>
                                                                            <?php endif;?>
                                                                            <?php if($brg->kategori_donasi==4) : ?>
                                                                            <td colspan="7"><strong>
                                                                                    <h9 style="align-center">
                                                                                        <div class="text"> Panti
                                                                                            Asuhan
                                                                                        </div>
                                                                                        <strong>
                                                                                    </h9>
                                                                            </td>
                                                                            <?php endif;?>
                                                                            <?php if($brg->kategori_donasi==5) : ?>
                                                                            <td colspan="7"><strong>
                                                                                    <h9 style="align-center">
                                                                                        <div class="text">
                                                                                            Miskin </div>
                                                                                        <strong>
                                                                                    </h9>
                                                                            </td>
                                                                            <?php endif;?>
                                                                            <?php if($brg->kategori_donasi==6) : ?>
                                                                            <td colspan="7"><strong>
                                                                                    <h9 style="align-center">
                                                                                        <div class="text">
                                                                                            Kesehatan
                                                                                        </div>
                                                                                        <strong>
                                                                                    </h9>
                                                                            </td>
                                                                            <?php endif;?>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Target Donasi</td>
                                                                            <td><strong><?php echo number_format ($brg->target_donasi,0,',','.')?></strong>
                                                                            </td>
                                                                        </tr>
                                                                        <td>Perolehan Donasi</td>
                                                                        <td><strong><?php echo number_format ( $brg->perolehan_donasi,0,',','.')?></strong>
                                                                        </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Mulai Donasi</td>
                                                                            <td><strong><?php echo format_indo ($brg->masa_donasi)?></strong>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Deskripsi</td>
                                                                            <td><strong><?php echo $brg->deskripsi_donasi?></strong>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Masa Aktif</td>
                                                                            <td><strong><?php echo durasi_donasi($brg->masa_donasi)?></strong>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Status</td>

                                                                            <?php if($brg->status==1) : ?>
                                                                            <!-- <tr> -->
                                                                            <td colspan="7">
                                                                                <h9 style="align-center">
                                                                                    <div class="alert alert-success"
                                                                                        role="alert">
                                                                                        Aktif
                                                                                    </div>
                                                                                </h9>
                                                                            </td>
                                                                            <!-- </tr> -->
                                                                            <?php endif;?>

                                                                            <!-- <td><strong><php echo $brg->status?></strong></td> -->
                                                                        </tr>

                                                                    </table>
                                                                    <!-- ?php echo anchor('User/pembayaran_donasi/'.$brg->id_donasi,'<div class="btn btn-sm btn-primary">Berdonasi</div>')?> -->

                                                                    <!-- ?php echo anchor('User/berdonasi/','<div class="btn btn-sm btn-danger">kembali</div>')?> -->
                                                                </div>

                                                            </div>
                                                            <?php endforeach; ?>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .tab-content -->
                            <!-- tab-donatur  -->
                            <div class="tab-pane " id="tab-donatur">
                                <div class="panel panel-teal">
                                    <div class="panel-heading">
                                        <div class="card shadow mb-1 ml-2">

                                            <div class="card-body ">
                                                <h4>Donatur</h4>
                                            </div>

                                        </div>
                                        <div class="card shadow mb-4 ml-2">
                                            <div class="card-header py-3">
                                                <div class="card-body">
                                                    <div class="table-responsive">

                                                        <div class="card-body">


                                                            <!-- <table class="table table-bordered" width="100%" cellspacing="0"> -->

                                                            <?php foreach ($donatur_ as $dntr): ?>
                                                            <?php if($dntr['status_code']==200) : ?>



                                                            <div class="mb-4 mt-2">

                                                                <h4 class="small font-weight-bold alert alert-success">
                                                                    <small><b><?= $dntr['name'] ?></b></small>

                                                                    <span class="float-right text-seccound">
                                                                        <h4 class="small font-weight-bold">
                                                                            <small><b><?php echo time_ago($dntr['transaction_time']) ?></b></small>
                                                                        </h4>
                                                                    </span>
                                                                    <h4 class="small font-weight-bold">

                                                                        <span class="float-right text-success"> <b>
                                                                                Rp
                                                                                <?= number_format ($dntr['nominal'], 0,',','.') ?></b>

                                                                        </span>

                                                                        <!-- <span class="float-right"><small><b>?= number_format(  $dntr->nominal, 0,',','.') ?></b> -->

                                                                        <h4 class="small font-weight-bold">
                                                                            <small><i class="fas fa-bullseye"></i><b>
                                                                                    <?= word_limiter ($dntr['pesan'],10) ?></b></small>
                                                                            <!-- ?=  word_limiter ($dntr->pesan,5) ?> </small> </span> -->
                                                                        </h4>


                                                            </div>

                                                            <?php
                                                             endif;
                                                            ?>

                                                            <?php endforeach; ?>

                                                            <!-- </table> -->
                                                        </div>

                                                        <!-- ?= $this->pagination->create_links();?> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .tab-content -->
                        </div><!-- col-sm-8 -->
                    </div>
                </div>


                <!-- =========================== -->






            </div>
            <!-- ====================================== -->




            <!-- <div class="card mb-2">
                    <h5 class="card-header">Form Donasi</h5>

                    <div class="card-body">
                     
                        <div class="form-group">
                            <label>Nominal Donasi</label>
                            <input type="text" placeholder="Rp" class="form-control" id="nominal_donasi"
                                name="nominal_donasi">

                        </div>

                        <label>Pesan</label>
                        <div class="form-group">
                            <label for="full_address" class="col-form-label sr-only">Pesan</label>
                            <textarea id="pesan" name="pesan" v-model="full_address" rows="5" class="form-control"
                                placeholder="Berikan Pesan" required></textarea>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                value="<?= $user['email']; ?>" readonly>

                        </div>
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="name" placeholder="Nama Lengkap Anda" id="name"
                                class="form-control" value="<?= $user['name']; ?>" readonly>
                        </div>


                        <button type="submit" class="btn btn-sm btn-success mb-3">Donasi
                            Sekarang</button>

                    </div>
                </div>
        </div> -->







            <div class="col-md-2 "></div>
        </div>
    </div>