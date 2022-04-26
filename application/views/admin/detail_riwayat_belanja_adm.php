<div class="container-fluid">
    <h4>Detail Pesanan <div class="btn btn-sm btn-success"> no. Invoice: <?php echo $invoice->id_invoice_produk ?></div>
    </h4>

    <div class="row">
        <div class="card text-dark bg-light  mb-3" style="max-width: 18rem;">
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
        </div>

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
                <p class="card-text">
                    ekspedisi: <?php echo $invoice->ekspedisi ?>
                </p>
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
        // $total += $subtotal + $psn->ongkir;
        $ttl += $subtotal ;
        ?>

        <tr>
            <td><?php echo $psn->id ?></td>
            <td><?php echo $psn->nama_brg ?></td>
            <td><?php echo $psn->jumlah ?></td>
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

            </td>
            <td align="right">Rp. <?php echo number_format($ongkir,0,',','.') ?></td>
        </tr>
        <tr>
            <td colspan="4" align="right">Grand Total</td>
            <td align="right">Rp. <?php echo number_format($total,0,',','.') ?></td>
        </tr>
    </table>

    <a href="<?php echo base_url('admin/orderanMasuk') ?>">
        <div class="btn btn-sm btn-danger">Kembali</div>
    </a>

    <?php if($psn->status==200) : ?>
    <a href="#" class="badge badge-success btn-pengiriman" data-id="<?= $invoice->id_invoice_produk;?>"
        data-name="<?= $total;?>">
        Kirim Produk</a>
    <!-- </a> -->


    <!-- ========== -->

    <div class="col-12" align="right">
        <div class="col-5 ">
            <a class="alert  alert-success"><i class="fas fa-check-circle">Transfer Sukses</i></a>
            <!-- <a></a> -->
        </div>
    </div>
    <?php endif;?>
    <!-- ================================  -->



</div>


<!-- Modal 4 -->
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<div class="modal fade" id="PengirimanModal" tabindex="-1" role="dialog" aria-labelledby="PembayaranModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="PembayaranModalLabel">Konfirmasi Pengiriman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/konfirmasiPengirimanProduk');?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control data_id" name="data_id">
                    </div>
                    <div class="form-group">
                        <b class="text-success">No. Resi Ekspedisi</b>
                        <!-- <label for="">Nomor Resi</label> -->
                        <input type="text" class="form-control" name="noResi">
                    </div>
                    <!-- <div class="form-group">
                    <label>#</label>
                    <input type="text" class="form-control data_name" name="data_name">
                </div> -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Konfirmasi</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- modal 2 -->

<div class="modal fade" id="TerimaModal" tabindex="-1" role="dialog" aria-labelledby="PembayaranModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="PembayaranModalLabel">Terima Orderan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/konfirmasiTerimaOrderan');?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control data_id" name="data_id">
                    </div>
                    <div class="form-group">
                        <b class="text-success">Terima Orderan</b>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Konfirmasi</button>
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
    $('.btn-pengiriman').on('click', function() {
        // get data from button edit
        const id = $(this).data('id');
        const name = $(this).data('name');
        // Set data to Form Edit
        $('.data_id').val(id);
        $('.data_name').val(name);
        $('#PengirimanModal').modal('show');
    });

    // get Pembayaran
    $('.btn-terima').on('click', function() {
        // get data from button edit
        const id = $(this).data('id');
        // const name = $(this).data('name');
        // Set data to Form Edit
        $('.data_id').val(id);
        // $('.data_name').val(name);
        $('#TerimaModal').modal('show');
    });


});
</script>