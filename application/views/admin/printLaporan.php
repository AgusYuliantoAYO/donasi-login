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
        $ttl = 0; $no=1; foreach ($dataFilter as $inv):
              $subtotal = $inv->gross_amount  ;
            //   $total += $subtotal + $psn->ongkir;
              $ttl += $subtotal ;
                 ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $inv->order_id ?></td>
                <td><?php echo $inv->id_donasi ?></td>
                <td><?php echo $inv->email?></td>
                <td><?php echo $inv->payment_type ?></td>
                <td><?php echo format_indoTgl ($inv->transaction_time) ?></td>
                <td><?php echo $inv->bank ?></td>
                <td><?php echo $inv->va_number ?></td>
                <td>Rp <?php echo number_format ($inv->gross_amount,0,',','.') ?></td>
                <!-- <td>?php echo anchor('admin/detail/'.$inv->id,'<div class="btn btn-sm btn-primary">Detail</div>') ?></td> -->
            </tr>

            <?php endforeach; ?>
            <tr>
                <td colspan="8" align="right">Total</td>
                <td align="right">Rp. <?php echo number_format($ttl,0,',','.') ?></td>
            </tr>

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