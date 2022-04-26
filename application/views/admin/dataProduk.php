<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-1 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">


            <!-- ====================================================
                         ========================== sweet alert ========== -->

            <?php if ($this->session->flashdata('flashHpsPrdk')==TRUE) : ?>
            <!-- <div class="flash-data" data-flashdata="?= $this->session->flashdata('flash'); ?>"></div> -->
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flashHpsPrdk'); ?>"></div>
            <?php endif;?>
            <div class="flash-data" data-flashdata="<?= $this->session->unset_userdata('flashHpsPrdk'); ?>"></div>

            <!-- =================================== -->
            <div class="ml-2">
                <a href="" class="btn btn-success mb-3" data-toggle="modal" data-target="#newSubMenuModal"> Tambah
                    Produk</a>
            </div>



            <!-- baru -->

            <!-- Tabel Baru -->
            <div class="card shadow mb-4 ml-2">
                <div class="card-header py-3">
                    <!-- <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6> -->

                    <!--========== //Search ==============-->
                    <div class="row">
                        <div class="col-md-12" align="right">
                            <div class="col-md-5">
                                <form action="<?= base_url('admin/dataProduk'); ?>" method="post">
                                    <div class="input-group mb-1">
                                        <input type="text" class="form-control" placeholder="Cari..." name="keyword"
                                            autocomplete="off">
                                        <div class="input-group-append">
                                            <input class="btn btn-primary" type="submit" name="submit" value="Search">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- ............-->
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <h5>Results : <?= $total_rows; ?></h5>
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead class="bg-secondary text-white py-3">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">keterangan</th>
                                    <!-- <th scope="col">Kategori</th> -->
                                    <th scope="col">Harga Beli</th>
                                    <th scope="col">Harga Jual</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Status</th>
                                    <!-- <th scope="col">Gambar</th> -->
                                    <th scope="col">Action</th>
                                    <!-- <th scope="col">Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data_produk as $dp) : ?>
                                <tr>
                                    <!-- test -->
                                    <th><?= ++$start; ?></th>
                                    <th><?= $dp['nama_produk'];?></th>
                                    <th><?=  word_limiter($dp['keterangan'],4);?></th>
                                    <!-- <th>?= $dp['kategori_produk'];?></th> -->
                                    <th>Rp <?= number_format($dp['harga_beli'],0,',','.'); ?></th>
                                    <th>Rp <?= number_format($dp['harga_jual'],0,',','.'); ?></th>
                                    <th><?= $dp['stok']; ?></th>
                                    <!-- <th>?= $dp['status']; ?></th> -->
                                    <th>
                                        <img src="<?= base_url('assets/img/produk/').$dp['gambar']?>"
                                            class="img-thumbnail">
                                    </th>
                                    <th>
                                        <?php if($dp['status']==0) : ?>
                                        <h9 style="align-center">
                                            <small>
                                                <div class="alert alert-danger" role="alert">Close
                                                </div>
                                            </small>
                                        </h9>
                                        <?php endif;?>
                                        <?php if($dp['status']==1) : ?>
                                        <h9 style="align-center">
                                            <small>
                                                <div class="alert alert-success" role="alert">Open
                                                </div>
                                            </small>
                                        </h9>
                                        <?php endif;?>
                                    </th>
                                    <!-- <th>?= $dp['gambar'];?></th> -->

                                    <!-- ....... -->
                                    <th>
                                        <a>
                                            <?= anchor('admin/editProduk/'.$dp['id_produk'], '<i class="fas fa-edit btn btn-sm btn-primary"></i></div>' )?></a>
                                        <a href="<?=base_url();?>admin/hapusProduk/<?=$dp['id_produk']?>"
                                            class="far fa-trash-alt btn btn-sm btn-danger tombol-hapus"></a>
                                    </th>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <?php if(empty($data_produk)) : ?>
                            <tr>
                                <td colspan="9">
                                    <div class="alert alert-danger" role="alert"> Data Tidak Ada !!!</div>
                                </td>
                            </tr>
                            <?php endif;?>
                        </table>
                        <?= $this->pagination->create_links(); ?>
                    </div>
                </div>
            </div>

            <!-- ............... -->
            <!-- baru -->




        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->


    <!-- Modal -->
    <div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Data Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open_multipart('admin/dataProduk');?>
                <!-- <form action="?= base_url('admin/dataProduk');?>" method="post" enctype="multipart/form-data"> -->
                <form id=form>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control text-dark" id="nama_produk" name="nama_produk"
                                placeholder="Nama Produk">
                            <small class="form-text text-danger"><?=form_error('nama_produk'); ?></small>
                        </div>




                        <!-- <div class="form-group">
                            <input type="text" class="form-control" id="keterangan" name="keterangan"
                                placeholder="Keterangan">
                            <small class="form-text text-danger">?=form_error('keterangan'); ?></small>
                        </div> -->

                        <!-- 
                        <div class="form-group">
                            div class="col-sm-10">
                                <textarea id="keterangan" name="keterangan" v-model="full_address" rows="5"
                                    class="form-control" placeholder="Keterangan" required>
                    </textarea>
                            </div>
                        </div> -->

                        <!-- <div class="form-group">
                            <textarea id="keterangan" name="keterangan" v-model="full_address" rows="5"
                                class="form-control" placeholder="Keterangan" required></textarea>
                            <small class="form-text text-danger">?=form_error('keterangan'); ?></small>
                        </div> -->



                        <div class="form-group row">
                            <div for="full_address" class="col-form-label col-sm-3"><b>Keterangan :</b></div>
                            <div class="col-sm-12">
                                <textarea id="keterangan" name="keterangan" v-model="full_address" rows="5"
                                    class="form-control" required>
                    </textarea>
                            </div>
                        </div>


                        <div class="form-group">
                            <select name="kategori_produk" id="kategori_produk" class="form-control">
                                <option value="">Pilih Kategori Produk</option>
                                <?php foreach ($kategori as $k) : ?>
                                <option value="<?= $k['id']; ?>"><?= $k['kategori']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <small class="form-text text-danger"><?=form_error('kategori_produk'); ?></small>
                        </div>
                        <div class="form-group">
                            <?php foreach ($alamat_kirim as $ak) : ?>
                            <input type="hidden" class="form-control" id="id_alamat" name="id_alamat"
                                value="<?= $ak['id_alamat']; ?>" readonly>
                            <!-- ?= $ak['alamat']; ?> -->
                            <?php endforeach; ?>
                            <small class="form-text text-danger"><?=form_error('alamat'); ?></small>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control col-md-5" id="harga_beli" name="harga_beli"
                                placeholder="Harga Beli">
                            <small class="form-text text-danger"><?=form_error('harga_beli'); ?></small>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control col-md-5" id="harga_jual" name="harga_jual"
                                placeholder="Harga Jual">
                            <small class="form-text text-danger"><?=form_error('harga_jual'); ?></small>
                        </div>
                        <div class="form-group col-md-3">
                            <input type="number" class="form-control" id="stok" name="stok" placeholder="Stok">
                            <small class="form-text text-danger"><?=form_error('stok'); ?></small>
                        </div>

 
                        <div class="input-group mb-3">
                            <input type="number" class="form-control col-md-5" id="berat" name="berat"
                                placeholder="Berat Produk">
                            <span class="input-group-text">Gram</span>
                            <small class="form-text text-danger"><?=form_error('berat'); ?></small>
                        </div>

                        <!-- <div class="form-group">
                            <input type="text" class="form-control text-dark" id="berat" name="berat"
                                placeholder="Berat"> 
                            <small class="form-text text-danger"><?=form_error('berat'); ?></small>
                        </div> -->


                        <!-- //gambar -->
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                <label class="custom-file-label" for="gambar">Gambar</label>
                            </div>

                        </div>
                        <small class="form-text text-danger"><?=form_error('gambar'); ?></small>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="tombol-simpan" class="btn btn-primary">Add</button>
                        </div>
                </form>
            </div>
        </div>

    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script src="<?=base_url('vendor/ckeditor/ckeditor/ckeditor.js')?>"></script>
<script>
CKEDITOR.replace('keterangan');
</script>