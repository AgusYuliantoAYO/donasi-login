<ol class="breadcrumb float-sm-right mb-2 mr-5" style="background: #F5F5F5;">
    <li class="breadcrumb-item active"><small><a href="http://localhost/donasi-login/admin">Dashboard</a></small>
    <li class="breadcrumb-item active"><small><a href="http://localhost/donasi-login/role">Role</a></small>
    <li class="breadcrumb-item active"><small><a href="http://localhost/donasi-login/role">SubMenu</a></small>
    <li class="breadcrumb-item active"><small><a href="http://localhost/donasi-login/role">Edit</a></small>
        <!-- <li class="breadcrumb-item "><a href="#">Dashboard</a></li> -->
</ol>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg-12">

            <?= form_open_multipart('admin/updateNews');?>

            <?php foreach ($news as $nw) : ?>

            <div class="form-group row">
                <div class="col-sm-2">Gambar</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/news/').$nw->gambar_news?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-4">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambar_news" name="gambar_news">
                                <label class="custom-file-label" for="gambar_news"><?=$nw->gambar_news?></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Kode News</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="kd_news" name="kd_news" value="<?= $nw->kd_news ?>"
                        readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Judul</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="judul_news" name="judul_news"
                        value="<?= $nw->judul_news ?>">
                </div>
            </div>


            <script src="<?=base_url('vendor/ckeditor/ckeditor/ckeditor.js')?>"></script>
            <div class="form-group">
                <!-- <label for="full_address" class="col-form-label sr-only">Deskripsi</label> -->
                <div class="col-12" align="center">
                    <label for="title" class="col-sm-2 col-form-label"><b>Deskripsi</b></label>
                    <textarea id="deskripsi_news" name="deskripsi_news" v-model="full_address" rows="5"
                        class="form-control" required><?= $nw->deskripsi_news ?></textarea>
                    <small class="form-text text-danger"><?=form_error('deskripsi_donasi'); ?></small>
                </div>
            </div>
            <?php endforeach;?>

        </div>
    </div>


    <div class="form-group row justify-content-end">
        <div class="col-sm-12">
            <!-- ?php echo anchor('User/profil/','<div class="btn btn-sm btn-danger">kembali</div>')?> -->
            <a href="<?php echo base_url('admin/dataNews') ?>">
                <div class="btn btn-sm btn-danger">Kembali</div>
                <button type="submit" class="btn btn-primary">Perbaharui</button>
        </div>
    </div>

    </form>

</div>
</div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script src="<?=base_url('vendor/ckeditor/ckeditor/ckeditor.js')?>"></script>
<script>
CKEDITOR.replace('deskripsi_news');
</script>