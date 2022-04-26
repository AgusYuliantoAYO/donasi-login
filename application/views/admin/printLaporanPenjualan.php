<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="col-md-12">
        <div class="carousel-item active col-md-3 mr-1">
            <img src="<?= base_url('/assets/img/logo/LogoSSokbgtpolsip.png');?>" class="d-block w-100" alt="...">
        </div>
        <br>
        <h1 class="mb-4 text-gray-800 text-center"><b><?= $title; ?></b></h1>
    </div>

    <body onload="window.print()">

        <br>
        <small class=" text-gray-800 text-center"><?= $subTitle; ?></small>
        <table class="table table-bordered table-hover table-striped">
            <tr>
                <th>No</th>
                <th>Id Invoice</th>
                <th>Email</th>
                <th>Nama Pemesan</th>
                <th>Alamat Pengiriman</th>
                <th>Ekspedisi</th>
                <th>NoResi</th>
                <th>Tgl Pesan</th>
                <!-- <th>Tgl Bayar</th> -->
                <!-- <th>Batas Pembayaran</th> -->
                <!-- <th>Omset</th>
                <th>Profit</th> -->

            </tr>
            <?php 
        $ttl = 0; $no=1; foreach ($dataFilter as $inv):
            //   $subtotal = $inv->nominal  ;
            //   $total += $subtotal + $psn->ongkir;
            //   $ttl += $subtotal ;
                 ?>
            <input type="hidden" name="id_invoice" value="<?php echo $inv->id_invoice_produk ?>">

            <tr>
                <td><?php echo $no++ ?></td>
                <!-- <td>?php echo ++$starts; ?></td> -->
                <td><?php echo $inv->id_invoice_produk ?></td>
                <td><?php echo $inv->email?></td>
                <td><?php echo $inv->nama ?></td>
                <td><?php echo $inv->alamat ?></td>
                <td><?php echo $inv->ekspedisi ?></td>
                <td><?php echo $inv->noResi ?></td>
                <td><?php echo format_indo ($inv->transaction_time) ?></td>
                <!-- <td><?php echo format_indo ($inv->tgl_bayar) ?></td> -->
                <!-- <td>?php echo $inv->batas_bayar ?></td> -->
                <!-- <td>?php echo anchor('admin/detail_invoice/'.$inv->id_invoice_produk,'<div class="btn btn-sm btn-primary">Detail</div>') ?> -->
                </td>
            </tr>



            <?php endforeach; ?>
            <!-- <tr>
                <td colspan="7" align="right">Total</td>
                <td align="right">Rp. ?php echo number_format($ttl,0,',','.') ?></td>
            </tr> -->

        </table>

        <!-- <tr> -->

        <br>
        <br>
        <div class="col-12">
            <div class="row">
                <div class="col-9"> </div>
                <div class="col-3" align="center"> <?php echo hari()?>, <?php echo tanggal() ?> </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="col-12">
            <div class="row">
                <div class="col-9"> </div>
                <div class="col-3" align="center"><?= $user['name']; ?></div>
                <div class="col-9"> </div>
                <div class="col-3" align="center">
                    <?php if($user['role_id']==1) : ?>
                    <div class="alert text-success"> ( Admin )</div>
                    <?php endif;?>
                </div>
            </div>
        </div>

    </body>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->