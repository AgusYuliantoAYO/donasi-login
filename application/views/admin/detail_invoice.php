<div class="container-fluid">
    <h4>Detail Pesanan <div class="btn btn-sm btn-success"> no. Invoice: <?php echo $invoice->id_invoice_produk ?></div>
    </h4>


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
        $total += $subtotal + $psn->ongkir;
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
        <tr>
            <td colspan="4" align="right">Total</td>
            <td align="right">Rp. <?php echo number_format($ttl,0,',','.') ?></td>
        </tr>
        <tr>
            <td colspan="4" align="right">Ongkir
                <?php foreach ($orderanMasukBaru as $omb): ?>
                <h7><b class="text-danger"><?php echo $omb->ekspedisi ?></b></h7>
                <?php endforeach?>
            </td>
            <td align="right">Rp. <?php echo number_format($psn->ongkir,0,',','.') ?></td>
        </tr>
        <tr>
            <td colspan="4" align="right">Grand Total</td>
            <td align="right">Rp. <?php echo number_format($total,0,',','.') ?></td>
        </tr>
    </table>
    <div class="col-4">
        <a href="<?php echo base_url('admin/invoice') ?>">
            <div class="btn btn-sm btn-primary">Kembali</div>
        </a>
    </div>
    <div align="right">
        <div class="col-md-2 mr-1">
            <img src="<?= base_url('/assets/img/logo/success.png');?>" class="d-block w-100" alt="...">
        </div>
    </div>
</div>