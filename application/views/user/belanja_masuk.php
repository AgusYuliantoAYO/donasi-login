<ol class="breadcrumb float-sm-right mb-2 mr-5" style="background: #F5F5F5;">
    <li class="breadcrumb-item active"><small><a href="http://localhost/donasi-login/user">Dashboard</a></small>
    <li class="breadcrumb-item active"><small><a
                href="http://localhost/donasi-login/user/belanja_masuk">Orderku</a></small></li>
    <!-- <li class="breadcrumb-item "><a href="#">Dashboard</a></li> -->
</ol>



<?php if ($this->session->flashdata('flashBatal')) : ?>
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flashBatal'); ?>">
</div>
<?php endif;?>
<div class="flash-data" data-flashdata="<?= $this->session->unset_userdata('flashBatal'); ?>"></div>
<!-- =========================== -->

<div class="container-fluid ">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- <h4>Belanjaku</h4> -->
    <!-- <h5>Results : ?= $total_rows; ?></h5> -->
    <div class="card-body">
        <!--========== //Search ==============-->

        <div class="card shadow mb-4 ml-1 col-md-12">
            <div class="card-header bg-secondary py-3">
                <h6 class="m-0 font-weight-bold  text-white">Menunggu Transfer</h6>
            </div>




            <div class="card-body">
                <div class="table-responsive">
                    <!-- <h5>Results : ?= $total_rows; ?></h5> -->
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead class=" bg-secondary text-white">
                            <tr>

                                <th><small><b>Id Invoice</small></th>
                                <!-- <th>Email</th> -->
                                <th><small><b>Nama </small></th>
                                <th><small><b>Alamat Pengiriman</small></th>
                                <th><small><b>Ekspedisi</small></th>
                                <th><small><b>Tgl</small></th>
                                <th><small><b>Metode</small></th>
                                <th><small><b>Bank</small></th>
                                <th><small><b>VA</small></th>
                                <th><small><b>Total Bayar</small></th>
                                <th><small><b>Status</small></th>
                                <th><small><b>Aksi</small></th>
                                <!-- </small> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orderanMasukBaru as $omb): ?>
                            <tr>
                                <td><?php echo $omb->id_invoice_produk ?></td>
                                <!-- <td>?php echo $omb->email?></td> -->
                                <td><small><?php echo $omb->nama ?></small></td>
                                <td><small><?php echo $omb->alamat ?></small></td>
                                <td><small><?php echo $omb->ekspedisi ?></small></td>
                                <td><small><?php echo  ($omb->transaction_time) ?></small></td>
                                <td><small><?php echo  ($omb->payment_type) ?></small></td>
                                <td><small><?php echo  ($omb->bank) ?></small></td>
                                <td><small><b><?php echo  ($omb->va_number) ?></b></small></td>
                                <td><small><b><?php echo  number_format ($omb->gross_amount,0,',','.') ?></b></small>
                                </td>
                                <!-- <td>?php echo $omb->batas_bayar ?></td> -->
                                <td>
                                    <?php if($omb->status_code==201) { ?>
                                    <h9 style="align-center">
                                        <small>
                                            <div class="badge bg-warning text-white">Pending</div>
                                        </small>
                                    </h9>
                                    <?php 
                        } else { 
                        ?>
                                    <div class="badge bg-warning">Pending</div>
                                    <?php
                      } 
                      ?>
                                </td>

                                <!-- <td><small>?php echo $ombTF->pdf_url ?></small></td> -->

                                <td>
                                    <a href="<?= $omb->pdf_url?>" target="_blank"
                                        class="btn btn-sm  col-md-12  btn-success">download
                                    </a>
                                    <?php echo anchor('user/detail_riwayat_belanja/'.$omb->id_invoice_produk,'<div class="btn btn-sm btn-primary col-md-12">Detail</div>') ?>
                                    <a href="<?=base_url();?>user/batalOrderan/<?=$omb->id_invoice_produk?>"
                                        class="btn btn-sm col-md-12 btn-danger tombol-hapus">Batal</a>
                                </td>
                                </form>

                            </tr>

                            <?php endforeach; ?>
                        </tbody>
                        <?php if(empty($orderanMasukBaru)) : ?>
                        <tr>
                            <td colspan="11">
                                <div class="alert alert-danger" role="alert"> Data Tidak Ada !!!
                                </div>
                            </td>
                        </tr>
                        <?php endif;?>
                    </table>
                    <!-- ?= $this->pagination->create_links(); ?> -->
                </div>
            </div>
        </div>
    </div>


    <div class="card-body">
        <!--========== //Search ==============-->

        <div class="card shadow mb-4 ml-1 col-md-12">
            <div class="card-header bg-secondary py-3">
                <h6 class="m-0 font-weight-bold  text-white">Status Transfer</h6>
            </div>


            <div class="card-body">
                <div class="table-responsive">
                    <!-- <h5>Results : ?= $total_rows; ?></h5> -->
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead class=" bg-secondary text-white">
                            <tr>

                                <th><small><b>Id Invoice</small></th>
                                <!-- <th>Email</th> -->
                                <th><small><b>Nama </small></th>
                                <th><small><b>Alamat Pengiriman</small></th>
                                <th><small><b>Ekspedisi</small></th>
                                <th><small><b>NoResi</small></th>
                                <th><small><b>Tgl</small></th>
                                <th><small><b>Metode</small></th>
                                <th><small><b>Bank</small></th>
                                <th><small><b>VA</small></th>
                                <th><small><b>Total Bayar</small></th>
                                <th><small><b>Status</small></th>
                                <th><small><b>Aksi</small></th>
                                <!-- </small> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orderanMasukBaruTf as $omb): ?>
                            <tr>
                                <td><?php echo $omb->id_invoice_produk ?></td>
                                <!-- <td>?php echo $omb->email?></td> -->
                                <td><small><?php echo $omb->nama ?></small></td>
                                <td><small><?php echo $omb->alamat ?></small></td>
                                <td><small><?php echo $omb->ekspedisi ?></small></td>
                                <td><small><?php echo $omb->noResi ?></small></td>
                                <td><small><?php echo  ($omb->transaction_time) ?></small></td>
                                <td><small><?php echo  ($omb->payment_type) ?></small></td>
                                <td><small><?php echo  ($omb->bank) ?></small></td>
                                <td><small><b><?php echo  ($omb->va_number) ?></b></small></td>
                                <td><small><b><?php echo  number_format ($omb->gross_amount,0,',','.') ?></b></small>
                                </td>
                                <!-- <td>?php echo $omb->batas_bayar ?></td> -->
                                <td>
                                    <?php if($omb->status_code==200) { ?>
                                    <h9 style="align-center">
                                        <small>
                                            <div class="badge bg-primary text-white">sukses</div>
                                        </small>
                                    </h9>
                                    <?php 
                        } else { 
                        ?>
                                    <div class="badge bg-warning">Pending</div>
                                    <?php
                      } 
                      ?>
                                </td>

                                <!-- <td><small>?php echo $ombTF->pdf_url ?></small></td> -->

                                <td>
                                    <a href="<?= $omb->pdf_url?>" target="_blank"
                                        class="btn btn-sm btn-success">download
                                    </a>
                                    <?php echo anchor('user/detail_riwayat_belanja/'.$omb->id_invoice_produk,'<div class="btn btn-sm btn-primary col-md-12">Detail</div>') ?>

                                </td>
                                </form>

                            </tr>

                            <?php endforeach; ?>
                        </tbody>
                        <?php if(empty($orderanMasukBaruTf)) : ?>
                        <tr>
                            <td colspan="12">
                                <div class="alert alert-danger" role="alert"> Data Tidak Ada !!!
                                </div>
                            </td>
                        </tr>
                        <?php endif;?>
                    </table>
                    <!-- ?= $this->pagination->create_links(); ?> -->
                </div>
            </div>
        </div>
    </div>


    <div class="card shadow mb-4 ml-1 col-md-12">
        <div class="card-header bg-secondary py-3">
            <h6 class="m-0 font-weight-bold  text-white">Cek <b>Produk Telah Dikirim ?</b> silahkan
                <?php echo anchor('user/history','<div class="btn btn-sm btn-success"> <b>Klik Disini !</b></div>') ?>
            </h6>
        </div>


        <!--  -->
    </div>
</div>
<!-- </div> -->