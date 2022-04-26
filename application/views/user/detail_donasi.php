<div class="container-fluid">

    <div class="card">
        <h5 class="card-header">Detail Produk</h5>
        <div class="card-body">


            <?php foreach ($donasi as $brg): ?>
            <div class="row">
                <div class="col-md-4">
                    <img src="<?php echo base_url().'assets/img/dokdonasi/'.$brg->gambar_donasi ?>"
                        class="card-img-top">
                </div>
                <div class="col-md-8">
                    <table class="table">
                        <tr>
                            <td>Nama Donasi</td>
                            <td><strong><?php echo $brg->nama_donasi?></strong></td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <?php if($brg->kategori_donasi==1) : ?>
                            <td colspan="7"> <strong>
                                    <h9 style="align-center">
                                        <div class="alert alert-success" role="alert"> Bencana Alam </div>
                                    </h9>
                                    <strong> </td>
                            <?php endif;?>
                            <?php if($brg->kategori_donasi==2) : ?>
                            <td colspan="7"><strong>
                                    <h9 style="align-center">
                                        <div class="text"> Pendidikan </div>
                                        <strong>
                                    </h9>
                            </td>
                            <?php endif;?>
                            <?php if($brg->kategori_donasi==3) : ?>
                            <td colspan="7"><strong>
                                    <h9 style="align-center">
                                        <div class="text"> Rumah Ibadah </div>
                                        <strong>
                                    </h9>
                            </td>
                            <?php endif;?>
                            <?php if($brg->kategori_donasi==4) : ?>
                            <td colspan="7"><strong>
                                    <h9 style="align-center">
                                        <div class="text"> Panti Asuhan </div>
                                        <strong>
                                    </h9>
                            </td>
                            <?php endif;?>
                            <?php if($brg->kategori_donasi==5) : ?>
                            <td colspan="7"><strong>
                                    <h9 style="align-center">
                                        <div class="text"> Miskin </div>
                                        <strong>
                                    </h9>
                            </td>
                            <?php endif;?>
                            <?php if($brg->kategori_donasi==6) : ?>
                            <td colspan="7"><strong>
                                    <h9 style="align-center">
                                        <div class="text"> Kesehatan </div>
                                        <strong>
                                    </h9>
                            </td>
                            <?php endif;?>
                        </tr>
                        <tr>
                            <td>Target Donasi</td>
                            <td><strong><?php echo number_format ($brg->target_donasi,0,',','.')?></strong></td>
                        </tr>
                        <td>Perolehan Donasi</td>
                        <td><strong><?php echo number_format ( $brg->perolehan_donasi,0,',','.')?></strong></td>
                        </tr>
                        <tr>
                            <td>Mulai Donasi</td>
                            <td><strong><?php echo $brg->masa_donasi?></strong></td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td><strong><?php echo $brg->deskripsi_donasi?></strong></td>
                        </tr>
                        <tr>
                            <td>Masa Aktif</td>
                            <td><strong><?php echo durasi_donasi($brg->masa_donasi)?></strong></td>
                        </tr>
                        <tr>
                            <td>Status</td>

                            <?php if($brg->status==1) : ?>
                            <!-- <tr> -->
                            <td colspan="7">
                                <h9 style="align-center">
                                    <div class="alert alert-success" role="alert"> Aktif </div>
                                </h9>
                            </td>
                            <!-- </tr> -->
                            <?php endif;?>

                            <!-- <td><strong><php echo $brg->status?></strong></td> -->
                        </tr>

                    </table>
                    <?php echo anchor('User/pembayaran_donasi/'.$brg->id_donasi,'<div class="btn btn-sm btn-primary">Berdonasi</div>')?>

                    <?php echo anchor('User/berdonasi/','<div class="btn btn-sm btn-danger">kembali</div>')?>
                </div>

            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>