<div class="container-fluid">
    <!-- ========================= -->

    <div data-widget-group="group1">
        <div class="row" align="center">
            <div class="col-sm-12 mb-5">
                <!-- panel -->

                <d iv class="list-group list-group-alternate mb-n nav nav-tabs">

                    <button href="#tab-handphone" role="tab" data-toggle="tab" class="list-group-item active"><i
                            class="ti ti-mobile"></i> Belanja </button>

                    <button href="#tab-email" role="tab" data-toggle="tab" class="list-group-item "><i
                            class="ti ti-email"></i>
                        Donasi</button>

                </d>
            </div>
        </div><!-- col-sm-3 -->
        <div class="col-md-12">
            <div class="tab-content">
                <!-- #tab-about -->


                <!-- #tab-handphone -->
                <div class="tab-pane active" id="tab-handphone">
                    <div class="panel panel-teal">
                        <div class="panel-heading">
                            <div class="card shadow mb-1 ml-2">

                                <div class="card-body text-white bg-success">
                                    <h4>Riwayat Belanja Sukses</h4>
                                </div>
                            </div>

                            <div class="card shadow mb-4 ml-2">
                                <div class="card-header py-3">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <!-- <h5>Results : ?= $total_rows; ?></h5> -->

                                            <table class="table table-bordered" width="100%" cellspacing="0">
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
                                                    <!-- <th><small><b>Status</small></th> -->
                                                    <th><small><b>Aksi</small></th>
                                                    <!-- </small> -->
                                                </tr>
                                                <?php  $ttl = 0; $no=0; foreach ($riwayat_belanja as $omb): ?>
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


                                                    <!-- <td><small>?php echo $ombTF->pdf_url ?></small></td> -->

                                                    <td>
                                                        <!-- <a href="?= $omb->pdf_url?>" target="_blank"
                                                            class="btn btn-sm btn-success">download
                                                        </a> -->
                                                        <?php echo anchor('user/detail_riwayat_belanja/'.$omb->id_invoice_produk,'<div class="btn btn-sm btn-primary col-md-12">Detail</div>') ?>

                                                    </td>
                                                    </form>

                                                </tr>

                                                <?php endforeach; ?>

                                            </table>

                                        </div>
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

                                <div class="card-body text-white bg-success">
                                    <h4>Riwayat Donasi Sukses</h4>
                                </div>

                            </div>
                            <div class="card shadow mb-4 ml-2">
                                <div class="card-header py-3">
                                    <div class="card-body">
                                        <div class="table-responsive">


                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                <tr>
                                                    <th><small><b>No</small></th>
                                                    <th><small><b>ID</small></th>
                                                    <th><small><b>ID Donasi</small></th>
                                                    <th><small><b>Email</small></th>
                                                    <th><small><b>Metode</small></th>
                                                    <th><small><b>Tgl</small></th>
                                                    <th><small><b>Bank</small></th>
                                                    <th><small><b>VA (rekening)</small></th>
                                                    <th><small><b>Nominal</small></th>
                                                </tr>
                                                <?php 
                                                                $ttl = 0; $no=1; foreach ($riwayat_donasi as $inv): ?>
                                                <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><?php echo $inv->order_id ?></td>
                                                    <td><?php echo $inv->id_donasi ?></td>
                                                    <td><?php echo $inv->email?></td>
                                                    <td><?php echo $inv->payment_type ?></td>
                                                    <td><?php echo format_indoTgl ($inv->transaction_time) ?>
                                                    </td>
                                                    <td><?php echo $inv->bank ?></td>
                                                    <td><?php echo $inv->va_number ?></td>
                                                    <td>Rp
                                                        <?php echo number_format ($inv->gross_amount,0,',','.') ?>
                                                    </td>
                                                    <!-- <td>?php echo anchor('admin/detail/'.$inv->id,'<div class="btn btn-sm btn-primary">Detail</div>') ?></td> -->
                                                </tr>

                                                <?php endforeach; ?>

                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- .tab-content -->
            </div><!-- col-sm-8 -->
        </div>


        <!-- =========================== -->






    </div>