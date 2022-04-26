        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

            <!-- ==================================== -->
            <?php foreach ($produk as $dpr) : ?>

            <!-- <form method="post" action="?= base_url().'admin/updateProduk'?>"> -->
            <?= form_open_multipart('admin/updateProduk');?>
            <div class="for-group">
                <!-- <label > ID Produk </label> -->
                <input type="hidden" name="id_produk" class="form-control" value="<?= $dpr['id_produk']?>">
            </div>

            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Nama Produk</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_produk" name="nama_produk"
                        value="<?= $dpr['nama_produk']?>">
                </div>
            </div>

            <!-- <div class="for-group">
                    <label> Nama Produk </label>
                    <input type="text" name="nama_produk" class="form-control" value="?= $dpr->nama_produk?>">
                </div> -->


            <!-- <div class="for-group"> -->
            <!-- <label > Kategori </label>
                            <select name="kategori_produk" id="kategori_produk" class="form-control">
                                <option value="">Pilih Kategori</option>
                                ?php foreach ($kategori as $k) : ?>
                                <option value="?= $k['id']; ?>">?= $k['kategori']; ?></option>
                                ?php endforeach; ?>
                            </select>
                        </div> -->
            <!-- <div class="for-group">
                            <label > Kategori </label>
                            <input type="text"  name="Kategori_produk" class="form-control" value="?= $dpr->kategori_produk?>">
                        </div> -->

            <!-- 
                <div class="for-group">
                    <label> Keterangan </label>
                    <input type="text" name="keterangan" class="form-control" value="?= $dpr->keterangan?>">
                </div> -->

            <div class="form-group row">
                <label for="full_address" class="col-form-label col-sm-2">Keterangan</label>
                <div class="col-sm-10">
                    <textarea id="keterangan" name="keterangan" v-model="full_address" rows="5" class="form-control"
                        required><?= $dpr['keterangan']?>
                    </textarea>
                </div>
            </div>


            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Harga Beli</label>
                <span class="input-group-text">Rp</span>
                <div class="col-4">
                    <input type="text" class="form-control" id="harga_beli" name="harga_beli"
                        value="<?= $dpr['harga_beli']?>">
                </div>
                <div class="col-5">
                    <label for="title" class="col-sm-6 col-form-label">
                        Rp <?= number_format ($dpr['harga_beli'],0,',','.')?></label>
                </div>
            </div>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Harga Jual</label>
                <span class="input-group-text">Rp</span>
                <div class="col-4">
                    <input type="text" class="form-control" id="harga_jual" name="harga_jual"
                        value="<?= $dpr['harga_jual']?>">
                </div>
                <div class="col-5">
                    <label for="title" class="col-sm-6 col-form-label">
                        Rp <?= number_format ($dpr['harga_jual'],0,',','.')?></label>
                </div>
            </div>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Stok</label>
                <div class="col-sm-1">
                    <input type="text" class="form-control" id="stok" name="stok" value="<?= $dpr['stok']?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-5">
                    <select name="status" id="status" class="form-control">
                        <option value="<?= $dpr['status'] ?>">
                            <?php if($dpr['status']==1) : ?> Aktif
                            <?php endif;?>
                            <?php if($dpr['status']==0) : ?> Tidak Aktif <?php endif;?>
                        </option>

                        <option value="1"> Aktif </option>
                        <option value="0"> Tidak Aktif </option>

                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-2">Ubah Gambar</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img class="img-thumbnail" src="<?= base_url('assets/img/produk/').$dpr['gambar']?>"
                                class="img-thumbnail">
                        </div>
                        <div class="col-sm-5 mt-5">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                <label class="custom-file-label" for="gambar">Choose File</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row-5">
                <div class="col-sm-10">
                    <a href="<?php echo base_url('admin/dataproduk') ?>">
                        <div class="btn btn-sm btn-danger">Kembali</div>
                        <button type="submit" class="btn btn-primary ">Simpan</button>
                </div>
            </div>


            <!-- <a> <button type="submit" class="btn btn-primary btn-sm mt-3 ml-3"> Simpan </button> </a> -->

            </form>
            <?php endforeach;?>

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