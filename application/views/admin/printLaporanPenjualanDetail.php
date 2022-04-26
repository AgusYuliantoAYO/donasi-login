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
        <table class="table table-border table-hover table-striped">
            <tr>
                <th>No</th>
                <!-- <th>ID Inv. Det.</th> -->
                <th>ID Invoice</th>
                <th>ID PRODUK</th>
                <th>NAMA PRODUK</th>
                <th>Tgl Beli</th>
                <th>JUMLAH PESANAN</th>
                <th>HARGA SATUAN</th>
                <th>SUB-TOTAL</th>
            </tr>

            <?php 
        $total = 0;
        $donasi = 0;
        // $ttl = 0;  
        $no=1;
        foreach ($dataFilter as $psn) :
        $subtotal = $psn->jumlah * $psn->harga ;
        $total += $subtotal ;
        $donasi = $total * (2/100) ;
        // $total += $subtotal + $psn->ongkir;
        // $ttl += $subtotal ;
        ?>

            <tr>
                <td><?php echo $no++ ?></td>
                <!-- <td>?php echo $psn->id ?></td> -->
                <td><?php echo $psn->id ?></td>
                <td><?php echo $psn->id_brg ?></td>
                <td><?php echo $psn->nama_brg ?></td>
                <td><?php echo $psn->tgl_pesan ?></td>
                <td><?php echo $psn->jumlah ?></td>
                <td><?php echo number_format($psn->harga,0,',','.')  ?></td>
                <td><?php echo number_format($subtotal,0,',','.') ?></td>
            </tr>

            <?php endforeach; ?>
            <!-- <tr>
            <td colspan="4" align="right">Total</td>
            <td align="right">Rp. php echo number_format($ttl,0,',','.') ?></td>
        </tr>
        <tr>
            <td colspan="4" align="right">Ongkir
                php foreach ($orderanMasukBaru as $omb): ?>
                <h7><b class="text-danger">php echo $omb->ekspedisi ?></b></h7>
                php endforeach?>
            </td>
            <td align="right">Rp. php echo number_format($psn->ongkir,0,',','.') ?></td>
        </tr> -->
            <tr>
                <td class="bg-dark text-white" colspan="7" align="right">Omset</td>
                <td align="right"> <b>Rp. <?php echo number_format($total,0,',','.') ?></b></td>
            </tr>

        </table>
        <tr>
            <td align="left">Untuk Donasi</td>
            <td align="left"> <b class="alert-success">Rp. <?php echo number_format($donasi,0,',','.') ?></b></td>
            <td align="left">(2% dari Total Pendapatan omset)</td>
        </tr>


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