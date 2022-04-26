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
        <div class="col-lg-8">

            <?= form_open_multipart('menu/updateSubMenu');?>

            <?php foreach ($subMenu as $sm) : ?>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" id="id" name="id" value="<?= $sm->id ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title" value="<?= $sm->title ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Url</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="url" name="url" value="<?= $sm->url ?>">
                </div>
            </div>

            <?php $i=1;?>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Menu</label>
                <div class="col-sm-7">
                    <select name="menu_id" id="menu_id" class="form-control">
                        <option value="<?= $sm->menu_id ?>"> (Saat ini, no Urut: <?= $sm->menu_id?>). 'pilih'
                            jika ingin
                            ubah
                        </option>
                        <!-- <option value="?= $sm->menu_id ?>">
                            ?php foreach ($kategoriMenu as $km) : ?>
                            ?= $km['menu']?>
                            ?php endforeach; ?>
                        </option> -->

                        <?php foreach ($menu as $m) : ?>

                        <option value="<?= $m['id']; ?>"><?=$i?>. <?= $m['menu']; ?></option>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">icon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="icon" name="icon" value="<?= $sm->icon ?>">
                </div>
            </div>


            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-5">
                    <select name="is_active" id="is_active" class="form-control">
                        <option value="<?= $sm->is_active ?>">
                            <?php if($sm->is_active==1) : ?> Aktif
                            <?php endif;?>
                            <?php if($sm->is_active==0) : ?> Tidak Aktif <?php endif;?>
                        </option>

                        <option value="1"> Aktif </option>
                        <option value="0"> Tidak Aktif </option>

                    </select>
                </div>
            </div>


            <?php endforeach;?>

            <!-- <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="?= $user['name']; ?>">
                    ?=form_error('name','<small class="text-danger pl-3">','</small>');?>
                </div>
            </div> -->

            <!-- ======================================== -->
            <!-- =========================== -->



            <!-- ===--------------------------------------- -->
            <!-- ============================================ -->
            <!-- ==================Alamat Combobox============= -->

            <!--  -->
            <!-- =========================================================== -->
            <!-- <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">

                    <input type="text" class="form-control" id="alamat" name="alamat" value="?= $user['alamat']; ?>">
                    ?=form_error('alamat','<small class="text-danger pl-3">','</small>');?>

                </div>
            </div> -->


            <!-- <div class="form-group row">
                <label for="wa" class="col-sm-2 col-form-label">Whatsaap</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="wa" name="wa" value="?= $user['wa']; ?>">
                    ?=form_error('wa','<small class="text-danger pl-3">','</small>');?>
                </div>
            </div> -->

        </div>
    </div>

    <div class="form-group row justify-content-end">
        <div class="col-sm-10">
            <!-- ?php echo anchor('User/profil/','<div class="btn btn-sm btn-danger">kembali</div>')?> -->
            <a href="<?php echo base_url('admin/role') ?>">
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