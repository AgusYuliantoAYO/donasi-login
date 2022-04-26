<ol class="breadcrumb float-sm-right mb-2 mr-5" style="background: #F5F5F5;">
    <li class="breadcrumb-item active"><small><a href="http://localhost/donasi-login/admin">Dashboard</a></small>
        <!-- <li class="breadcrumb-item "><a href="#">Dashboard</a></li> -->
</ol>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- <div class="col-sm-6"> -->
    <!-- </div> -->
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h5 mb-0 text-gray-800">Donasi</h1>
            <!-- <div class="col-0" align="right">
                <small class="  text-gray-800">Rekap Bulan :
                    <a align="right"><b>?php echo bln() ?></b></a>
                </small>
            </div> -->

            <form action="<?= base_url();?>admin/filterDnsBlnLalu" method="POST" target='_blank'>
                <input type="hidden" name="tahun1" value="<?php echo Date('Y')?>">
                <input type="hidden" name="bulanAwal" value="<?php echo blnLalu() ?>">
                <!-- <input type="hidden" name="bulanAwal" value="8"> -->

                <div class="col-12 mt-2" align="right">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-print fa-sm text-white-50"></i><small
                            class="  text-white">Rekap DONASI Bulan :
                            <b><?php echo bln() ?></b>
                        </small></button>
                </div>
            </form>

            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-print fa-sm text-white-50"></i> <small class="  text-white">Rekap DONASI Bulan :
                    <b>?php echo bln() ?></b>
                </small> -->
            <!-- <i class="fas fa-download fa-sm text-white-50"></i> <small class="  text-white">Rekap DONASI Bulan :
                    <b>?php echo bln() ?></b>
                </small>  -->
            <!-- </a> -->
        </div>
        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Campign</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $this->db->get("data_donasi")->num_rows(); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    User</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $this->db->get("user")->num_rows() -1; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                                <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->


            <?php 
            $total = 0;
            // $ttl = 0;
            foreach ($donasiPending as $dp) :
                // $subtotal = $dp->jumlah * $dp->harga ;
                $total += $dp->nominal;
                // $ttl += $subtotal ;
                ?>
            <?php endforeach; ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Donasi Masuk</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <small>
                                        Rp
                                    </small> <?php echo number_format ($total,0,',','.') ?>
                                </div>
                            </div>
                            <!-- <div class="col-auto"> -->
                            <!-- <i class="fas fa-users fa-2x text-gray-300"></i> -->
                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Donasi
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Rp 0,-</div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div> 
                    </div>
                </div>
            </div> -->

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Invoice Donatur</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $this->db->get_where("bukti_tf_dns",array('status_code'=>200))->num_rows(); ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-cloud-download-alt fa-2x text-gray-300"></i>
                                <!-- <i class="fas fa-comments fa-2x text-gray-300"></i> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h5 mb-0 text-gray-800">Penjualan</h1>


            <form action="<?= base_url();?>admin/filterPrdkBlnLalu" method="POST" target='_blank'>
                <input type="hidden" name="tahun1" value="<?php echo Date('Y')?>">
                <input type="hidden" name="bulanAwal" value="<?php echo blnLalu() ?>">
                <!-- <input type="hidden" name="bulanAwal" value="8"> -->

                <div class="col-12 mt-2" align="right">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-print fa-sm text-white-50"></i><small
                            class="  text-white">Rekap PENJUALAN Bulan :
                            <b><?php echo bln() ?></b>
                        </small></button>
                </div>
            </form>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Produk</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $this->db->get("data_produk")->num_rows(); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    <b><i>Panding</i>(Checkout)</b>
                                </div>

                                <?php $jmlh= $this->db->get_where("tb_invoice_produk",array('status_code' => 201))->num_rows();?>

                                <?php if($jmlh==0) : ?>
                                <a href="http://localhost/donasi-login/admin/orderanMasuk"
                                    class="col-md-12 h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $this->db->get_where("tb_invoice_produk",array('status_code' => 200))->num_rows(); ?>
                                </a>
                                <?php endif;?>
                                <?php if($jmlh>=1) : ?>
                                <div class="mt-3">
                                    <a href="http://localhost/donasi-login/admin/orderanMasuk"
                                        class="col-md-12 h20 font-weight-bold text-gray-800 alert alert-danger">
                                        <?php echo $this->db->get_where("tb_invoice_produk",array('status_code' => 201))->num_rows(); ?>
                                    </a>
                                </div>
                                <?php endif;?>

                                <!-- <a href="admin/orderanMasuk"
                                    class="col-md-12 h5 mb-0 font-weight-bold text-gray-800 alert alert-danger">
                                    ?php echo $this->db->get_where("tb_invoice_produk",array('status' => 0))->num_rows(); ?>
                                </a> -->
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-shopping-basket"></i>
                                <!-- <i class=""></i> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- siap kirim -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    <b>Orderan <i>(Sudah Tf)</i></b>
                                </div>

                                <?php $jmlh= $this->db->get_where("tb_invoice_produk",array('status_code' => 200))->num_rows();?>

                                <?php if($jmlh==0) : ?>
                                <a href="http://localhost/donasi-login/admin/orderanMasuk"
                                    class="col-md-12 h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $this->db->get_where("tb_invoice_produk",array('status_code' => 200))->num_rows(); ?>
                                </a>
                                <?php endif;?>
                                <?php if($jmlh>=1) : ?>
                                <div class="mt-3">
                                    <a href="http://localhost/donasi-login/admin/orderanMasuk"
                                        class="col-md-12 h20 font-weight-bold text-gray-800 alert alert-success">
                                        <?php echo $this->db->get_where("tb_invoice_produk",array('status_code' => 200))->num_rows(); ?>
                                    </a>
                                </div>
                                <?php endif;?>

                                <!-- <a href="admin/orderanMasuk"
                                    class="col-md-12 h5 mb-0 font-weight-bold text-gray-800 alert alert-danger">
                                    ?php echo $this->db->get_where("tb_invoice_produk",array('status' => 0))->num_rows(); ?>
                                </a> -->
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-truck fa-2x text-gray-300"></i>
                                <!-- <i class=""></i> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Earnings (Monthly) Card Example -->
            <!-- <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Omset Timbunan
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Rp 0,-</div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Invoice Penjualan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <?php echo $this->db->get_where("tb_invoice_produk",array('status_code'=>202))->num_rows(); ?>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-cloud-download-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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


        <!-- Project Card Example -->
        <div class="row">
            <div class="card  mb-4 mr-3 col-md-6">
                <div class="card-header bg-secondary py-3">
                    <h6 class="m-0 font-weight-bold  text-white">Target Donasi (Aktif)</h6>
                </div>


                <div class="card-body">

                    <!-- ? date_default_timezone_set('Asia/Jakarta'); ?> -->

                    <!-- ?php $dpn= $donasiPending ?> -->
                    <!-- ?php if($dpn>=1) : ?> -->

                    <?php foreach ($donasi as $nd): ?>


                    <?php
                 $progres =  $nd->perolehan_donasi / $nd ->target_donasi  *100;
                
 
                 $durasi=  durasi_donasi($nd->masa_donasi);
                 
                 
      ?>

                    <div class="mb-4">

                        <?php if($durasi<1) : ?>
                        <h4 class="small font-weight-bold"><small><b><?= $nd->nama_donasi ?></b></small>

                            <span class="float-right">
                                <form action=" <?= base_url('admin/campaignStatus/'.$nd->id_donasi);?>" method="post">
                                    <input type="hidden" class="form-control" value="<?= $nd->id_donasi ?>"
                                        id="id_donasi" name="id_donasi">
                                    <input type="hidden" class="form-control" value="0" id="status" name="status">
                                    <button type="submit" class="btn btn-danger"> <i class="fas fa-power-off"></i>
                                    </button>
                                </form>
                            </span>
                            <span class="float-right  text-danger"> <small><b> (CLOSE Cpgn)</b></small></span>

                            <!-- <form action="?= form_open_multipart('admin/campaignStatus');?>" method="post"> -->
                            <!-- <div method="post"> -->
                            <!-- <form>
                                ?= form_open_multipart('admin/campaignStatus');?>
                                <input type="hidden" class="form-control" value="?= $nd['id_donasi']; ?>"
                                    id="id_donasi" name="id_donasi">
                                <input type="hidden" class="form-control" value="0" id="status" name="status">
                                <button type="submit" class="btn btn-danger"> <i class="fas fa-cart-arrow-down"></i>
                            </form> -->

                            <!-- <div class="col-md-6"> -->


                            <!-- </div> -->
                            <!-- </div> -->

                            <!--                            <div class="col-sm-10">
                                ?php echo anchor('User/profil/','<div class="btn btn-sm btn-danger">kembali</div>')?>
                                <button type="submit" class="btn btn-primary">Perbaharui</button>
                            </div> -->

                            <?php endif;?>

                            <?php if($durasi>=1) : ?>
                            <h4 class="small font-weight-bold"><small><b><?= $nd ->nama_donasi ?></b></small>
                                <span class="float-right text-success"> <small><b>
                                            (<?php echo durasi_donasi($nd->masa_donasi); ?>)</b></small></span>
                                <?php endif;?>


                                <span class="float-right"><small><b><?= number_format(  $nd ->perolehan_donasi, 0,',','.') ?></b>
                                        <i>
                                            dari</i>
                                        <?= number_format( $nd->target_donasi, 0,',','.') ?> </small> </span>
                            </h4>



                            <div class="progress mb-1 mt-3">
                                <div class="progress-bar progress-bar-striped progress-bar-animated " role="progressbar"
                                    style="width: <?= $progres ?>%" aria-valuenow="<?= $nd->perolehan_donasi ?>"
                                    aria-valuemin="0" aria-valuemax="100"><?= (int)$progres ?>%</div>
                            </div>

                    </div>
                    <!-- ?php var_dump(durasi_donasi($nd->masa_donasi));?> -->
                    <!-- ?echo $durasi?> -->

                    <?php endforeach; ?>
                    <!-- ?= $this->pagination->create_links();?> -->
                    <?php if(empty($donasi)) : ?>
                    <tr>
                        <td colspan="4">
                            <div class="alert alert-danger" role="alert"> Data <i> Campign</i> <b> Tidak Ada yg
                                    Aktif</b>, <a href="http://localhost/donasi-login/admin/datadonasi">klik</a> untuk
                                cek data !!!
                            </div>
                        </td>
                    </tr>
                    <?php endif;?>


                    <!-- <h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div> -->
                </div>
            </div>
            <!-- Project Card Example -->
            <div class="card  mb-4 ml-1 col-md-5">
                <div class="card-header bg-secondary py-3">
                    <h6 class="m-0 font-weight-bold  text-white">Donasi Masuk</h6>
                </div>


                <!-- ==============SHOW=========== -->
                <!-- ?= form_open_multipart('admin/index');?>
                <div class="form-group col-md-12  ">
                    <div class="row">
                        <div class="mt-3">
                            <small>
                                <p class="text-seccound"><i> Show: </i></p>
                            </small>
                        </div>
                        <div class="form-group col-md-3 mt-3 mr-l ">
                            <input type="number" class="form-control" id="per_page" name="per_page" value="2">
                        </div>
                        <div class="col-md-4 mt-3 ">
                            <button type="submit" class="btn btn-warning"> <i class="fas fa-list"></i> </button>
                        </div>

                    </div>
                </div>
                </form> -->

                <div class="card-body">

                    <div class="table-responsive">
                        <!-- <h5>Results : ?= $total_rows; ?></h5> -->
                        <table class="table table-bordered" width="100%" cellspacing="0">

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
                                            <small><b><?= word_limiter ($dntr['pesan'],10) ?></b></small>
                                            <!-- ?=  word_limiter ($dntr->pesan,5) ?> </small> </span> -->
                                        </h4>


                            </div>

                            <?php endif;?>
                            <?php endforeach; ?>

                        </table>
                        <?= $this->pagination->create_links();?>
                    </div>
                    <!-- <-- <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            ?php foreach ($donatur as $dntr): ?>

                            <div class="card border-success mb-3" style="max-width: 18rem;">
                                <div class="card-header bg-transparent border-success">
                                    <small>?= $dntr->name ?></small>
                                </div>
                                <div class="card-body text-success">
                                    <h5 class="card-title">
                                        ?= $dntr->nominal ?></h5>
                                    </h5>
                                    <p class="card-text">
                                        ?= word_limiter ($dntr->pesan,5) ?>
                                    </p>
                                </div>
                                <div class="card-footer bg-transparent border-success">
                                    ?= $dntr->tgl_donasi ?>
                                </div>
                            </div>
                        </table>
                    </div>
                    ?php endforeach; ?> -->


                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->