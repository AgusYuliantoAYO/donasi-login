<div class="mb-5">
    <ol class=" breadcrumb float-md-right mb-2 mr-2" style="background: #F5F5F5;">
        <li class="breadcrumb-item "><small><a href="http://localhost/donasi-login/user/riwayat_donasi">Riwayat
                    Donasi</a></small></li>
        <!-- <li class="breadcrumb-item active"><small><a href="http://localhost/donasi-login/User/profil_ubahPass/">Ubah
                    Photo</small></a>
        </li> -->
    </ol>
</div>
<div class="container-fluid">
    <!--========== //Search ==============-->

    <div class="card shadow col-md-12 mb-4 ml-2">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-5">
                    <form action="<?= base_url('user/riwayat_donasi'); ?>" method="post">
                        <div class="input-group mb-1">
                            <input type="text" class="form-control" placeholder="Cari..." name="keyword"
                                autocomplete="off" autofocus>
                            <div class="input-group-append">
                                <input class="btn btn-primary" type="submit" name="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- ............-->
            <h4>Riwayat Donasi</h4>
            <!-- <h5>Results : ?= $total_rows; ?></h5> -->
            <div class="card-body">
                <div class="table-responsive">
                    <!-- <h5>Results : ?= $total_rows; ?></h5> -->
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <!-- <th>Id Riwayat</th> -->
                                <!-- <th>Email</th> -->
                                <!-- <th>Nama Donatur</th> -->
                                <th>Judul Donasi</th>
                                <th>Tanggal Donasi</th>
                                <th>nominal</th>
                                <th>Pesan</th>
                                <!-- <th>Aksi</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($riwayat_donasi as $inv): ?>
                            <tr>
                                <!-- <td>?php echo $inv->id_invoice_donasi ?></td> -->
                                <!-- <td>?php echo $inv->email?></td> -->
                                <!-- <td>?php echo $inv->name ?></td> -->
                                <td><?php echo $inv->nama_donasi ?></td>
                                <td><?php echo $inv->tgl_donasi ?></td>
                                <td>Rp <?php echo number_format ($inv->nominal, 0,',','.') ?></td>
                                <td><?php echo $inv->pesan ?></td>
                                <!-- <td>?php echo $inv-> ?></td> -->

                                <!-- <form action="?= base_url('user/riwayat_belanja'); ?>" method="post">
                <input type="hidden" class="form-control" value="1" id="status" name="status"> -->

                                <!-- <td> -->
                                <!-- ?php echo anchor('user/detail_riwayat_belanja/'.$inv->id,'<div class="btn btn-sm btn-primary">Detail</div>') ?> -->
                                <!-- ?php echo anchor('user/riwayat_belanja/','<div class="btn btn-sm btn-primary">Detail</div>') ?> -->
                                <!-- ?php echo anchor('User/riwayat_belanja/'.$inv->id,'<input type="submit" name="submit" class="btn btn-sm btn-danger"></input>')?> -->
                                <!-- <button type="submit" class="btn btn-success">Add</button> -->
                                <!-- </td> -->
                                </form>

                            </tr>

                            <?php endforeach; ?>
                        </tbody>
                        <?php if(empty($riwayat_donasi)) : ?>
                        <tr>
                            <td colspan="4">
                                <div class="alert alert-danger" role="alert"> Data Tidak Ada !!!
                                </div>
                            </td>
                        </tr>
                        <?php endif;?>
                    </table>
                    <!-- ?= $this->pagination->create_links(); ?> -->
                </div>
            </div>
        </div>
    </div>
</div>