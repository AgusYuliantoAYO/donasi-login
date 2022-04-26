<div class="container-fluid">
    <h4>Detail Pesanan <div class="btn btn-sm btn-success"> no. Invoice: <?php echo $invoice->id_invoice_produk ?></div>
    </h4>

    <div class="row">
        <!-- <div class="card text-dark bg-light  mb-3" style="max-width: 18rem;">
            <div class="card-header">
                <b class="text-primary">Pengirim</b>
            </div>
            <div class="card-body">
                <h5 class="card-title"><b>AILERON Store</b></h5>
                <p class="card-text">
                    Made RT21, Gabus, Ngrampal, Sragen, Jawa Tengah.
                </p>
                <p class="card-text">
                    081226827411
                </p>
            </div>
        </div> -->

        <div class="card text-dark bg-light  mb-3" style="max-width: 18rem;">
            <div class="card-header">
                <b class="text-primary">Penerima</b>
            </div>
            <div class="card-body">
                <h5 class="card-title"><b><?php echo $invoice->nama ?></b></h5>
                <p class="card-text">
                    <?php echo $invoice->alamat ?>
                </p>
                <p class="card-text">
                    <?php echo $invoice->wa ?>
                </p>
                <span class="card-text">
                    ekspedisi: <?php echo $invoice->ekspedisi ?>
                </span> </br>
                <span class="card-text">
                    No Resi: <?php echo $invoice->noResi ?>
                </span>
            </div>
        </div>
    </div>



    <table class="table table-border table-hover table-striped">
        <tr>
            <th>ID PRODUK</th>
            <th>NAMA PRODUK</th>
            <th>JUMLAH PESANAN</th>
            <th>HARGA SATUAN</th>
            <th>SUB-TOTAL</th>
        </tr>

        <?php 
    $total = 0;
    $ttl = 0;
    foreach ($pesanan as $psn) :
        $subtotal = $psn->jumlah * $psn->harga ;
        $ttl += $subtotal ;
        ?>
        <?php
         $id_brg        = $psn->id;
        $nama_brg      = $psn->nama_brg;
        $qty        = $psn->jumlah;
        ?>
        <tr>
            <td><?php echo $id_brg ?></td>
            <td><?php echo $nama_brg  ?></td>
            <td><?php echo $qty ?></td>
            <td><?php echo number_format($psn->harga,0,',','.')  ?></td>
            <td><?php echo number_format($subtotal,0,',','.') ?></td>
        </tr>
        <?php endforeach; ?>
        <?php
        $ongkir= $invoice->ongkir;
        $total = $ttl +$ongkir;  
        ?>

        <tr>
            <td colspan="4" align="right">Total</td>
            <td align="right">Rp. <?php echo number_format($ttl,0,',','.') ?></td>
        </tr>
        <tr>
            <td colspan="4" align="right">Ongkir
                <!-- ?php foreach ($orderanMasukBaru as $omb): ?>
                <h7><b class="text-danger">?php echo $omb->ekspedisi ?></b></h7>
                ?php endforeach?> -->
            </td>
            <td align="right">Rp. <?php echo number_format($ongkir,0,',','.') ?></td>
        </tr>
        <tr>
            <td colspan="4" align="right">Grand Total</td>
            <td align="right">Rp. <?php echo number_format($total,0,',','.') ?></td>
        </tr>
    </table>
    <a href="<?php echo base_url('user/belanja_masuk') ?>">
        <div class="btn btn-sm btn-danger">Kembali</div>
    </a>
    <!-- <a href="">
        <div class="btn btn-sm btn-success">Pembayaran</div>
    </a> -->
    <!-- ============= -->
    <!-- ================================== -->

    <!-- ?php
                            $stokSaatini=$stok['stok'];
                            if($stokSaatini<=0)
                            { ?>
                                <small class="text-danger"><b>Habis !!!</b></small>  
                            ?php 
                            }else{
                            ?>
                            <small class="text-success"><b>Masih</b></small>
                        ?php 
                    }
                     ?> -->


    <!-- ======STATUS STOK====== -->
    <!-- ?php  
$cekStokSekarang = mysqli_query($konek,"select * from data_produk where id_produk='$id_brg'");
        $ambilDatanya = mysqli_fetch_array($cekStokSekarang);
        
        $stokSekarang = $ambilDatanya['stok'];

 
        // if($stokSekarang >= $qty)
        if($stokSekarang >= $qty)
        {
    ?> -->
    <!-- ============= -->

    <!-- <?php if($invoice->status==0) : ?>
    <a href="#" class="badge badge-success btn-pembayaran" data-id="<?= $invoice->id_invoice_produk;?>"
        data-name="<?= $total;?>">
        Pembayaran</a>
    <?php endif;?> -->

    <!-- ?php
}else{
    echo'
    "Stok Produk '.$nama_brg.' Ga Cukup";
    ';
}
    ?>
</div> -->
    <!-- ======STATUS STOK====== -->


    <!-- Modal 4 -->
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <div class="modal fade" id="PembayaranModal" tabindex="-1" role="dialog" aria-labelledby="PembayaranModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="PembayaranModalLabel">Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('user/konfirmasiPembayaran');?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control data_id" name="data_id">
                        </div>
                        <!-- <div class="form-group">
                    <label>#</label>
                    <input type="text" class="form-control data_name" name="data_name">
                </div> -->
                        <b class="text-success">Transfer Sekarang !!!</b>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Transfer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>


    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script>
    $(document).ready(function() {

        // get Pembayaran
        $('.btn-pembayaran').on('click', function() {
            // get data from button edit
            const id = $(this).data('id');
            const name = $(this).data('name');
            // Set data to Form Edit
            $('.data_id').val(id);
            $('.data_name').val(name);
            $('#PembayaranModal').modal('show');
        });


    });
    </script>