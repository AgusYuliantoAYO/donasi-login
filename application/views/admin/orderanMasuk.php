<div class="mb-5">
    <ol class=" breadcrumb float-md-right mb-2 mr-2" style="background: #F5F5F5;">
        <li class="breadcrumb-item "><small><a href="http://localhost/donasi-login/user/riwayat_belanja">Order
                    Masuk</a></small></li>
        <!-- <li class="breadcrumb-item active"><small><a href="http://localhost/donasi-login/User/profil_ubahPass/">Ubah
                    Photo</small></a>
        </li> -->
    </ol>
</div>

<!-- ========================== sweet alert ==========  -->

<?php if ($this->session->flashdata('flashTolak')) : ?>
<!-- <div class="flash-data" data-flashdata="?= $this->session->flashdata('flash'); ?>"></div> -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flashTolak'); ?>">
</div>
<?php endif;?>
<div class="flash-data" data-flashdata="<?= $this->session->unset_userdata('flashTolak'); ?>"></div>
<!-- =========================== -->
<div class="container-fluid ">

    <h4>Order Masuk</h4>
    <!-- <h5>Results : ?= $total_rows; ?></h5> -->
    <div class="card-body">
        <!--========== //Search ==============-->

        <div class="card shadow col-md-12 mb-4  ml-2">
            <div class="card-header align-right py-3">

                <!-- ............-->
                <div class="table-responsive">
                    <!-- <h5>Results : ?= $total_rows; ?></h5> -->
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
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
                                    <?php if($omb->status_code==200) { ?>
                                    <h9 style="align-center">
                                        <small>
                                            <div class="badge bg-success">Success</div>
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
                                </td>
                                </form>

                            </tr>

                            <?php endforeach; ?>
                        </tbody>
                        <?php if(empty($orderanMasukBaru)) : ?>
                        <tr>
                            <td colspan="6">
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

    <h1>Orderan Siap Kirim</h1>
    <div class="card-body">
        <!--========== //Search ==============-->

        <div class="card shadow col-md-12 mb-4  ml-2">
            <div class="card-header align-right py-3">

                <!-- ............-->
                <div class="table-responsive">
                    <!-- <h5>Results : ?= $total_rows; ?></h5> -->
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
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
                            <?php foreach ($orderanMasukBaruKirim as $omb): ?>
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
                                    <?php if($omb->status_code==200) { ?>
                                    <h9 style="align-center">
                                        <small>
                                            <div class="badge bg-success">Success</div>
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

                                    <?php echo anchor('admin/detail_riwayat_belanja_adm/'.$omb->id_invoice_produk,'<div class="btn btn-sm btn-primary col-md-12">Kirim</div>') ?>
                                </td>
                                </form>

                            </tr>

                            <?php endforeach; ?>
                        </tbody>
                        <?php if(empty($orderanMasukBaruKirim)) : ?>
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


</div>
<!-- </div> -->