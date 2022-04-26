<div class="container-fluid">
    <h4>Konfirmasi Transfer <div class="btn btn-sm btn-success"> no. Invoice: <?php echo $invoice->id ?></div>
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
    foreach ($pesanan as $psn) :
        $subtotal = $psn->jumlah * $psn->harga;
        $total += $subtotal;
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
            <td colspan="4" align="right">Grand Total</td>
            <td align="right">Rp. <?php echo number_format($total,0,',','.') ?></td>
        </tr>
    </table>
    <a href="<?php echo base_url('user/riwayat_belanja') ?>">
        <div class="btn btn-sm btn-primary">Kembali</div>
    </a>
</div>