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
                                    <h4>Invoice Pemesanan Produk</h4>
                                </div>
                            </div>

                            <div class="card shadow mb-4 ml-2">
                                <div class="card-header py-3">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <!-- <h5>Results : ?= $total_rows; ?></h5> -->

                                            <table class="table table-bordered" width="100%" cellspacing="0">
                                                <tr>
                                                    <th>No</th>
                                                    <!-- <th>Id Invoice</th> -->
                                                    <th>Email</th>
                                                    <th>Nama Pemesan</th>
                                                    <th>Alamat Pengiriman</th>
                                                    <th>Tgl Pesan</th>
                                                    <!-- <th>Batas Pembayaran</th> -->
                                                    <th>Aksi</th>
                                                </tr>
                                                <?php foreach ($invoice as $inv): ?>
                                                <tr>
                                                    <td><?php echo ++$starts; ?></td>
                                                    <!-- <td>?php echo $inv->id ?></td> -->
                                                    <td><?php echo $inv->email?></td>
                                                    <td><?php echo $inv->nama ?></td>
                                                    <td><?php echo $inv->alamat ?></td>
                                                    <td><?php echo format_indo ($inv->tgl_pesan) ?></td>
                                                    <!-- <td>?php echo $inv->batas_bayar ?></td> -->
                                                    <td><?php echo anchor('admin/detail_invoice/'.$inv->id_invoice_produk,'<div class="btn btn-sm btn-primary">Detail</div>') ?>
                                                    </td>
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
                                    <h4>Invoice Donasi</h4>
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
                                                                $ttl = 0; $no=1; foreach ($invoice_donasi as $inv): ?>
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