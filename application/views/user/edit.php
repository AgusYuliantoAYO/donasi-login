<ol class="breadcrumb float-sm-right mb-2 mr-5">
    <li class="breadcrumb-item active"><a href="http://localhost/donasi-login/User/profil/">Profil</a></li>
    <li class="breadcrumb-item active"><a href="http://localhost/donasi-login/User/edit/">Edit</a></li>
    <!-- <li class="breadcrumb-item "><a href="#">Dashboard</a></li> -->
</ol>



<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg-8">

            <?= form_open_multipart('user/edit');?>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>"
                        readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                    <?=form_error('name','<small class="text-danger pl-3">','</small>');?>
                </div>
            </div>

            <!-- ======================================== -->
            <!-- =========================== -->
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path
                        d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                </symbol>
            </svg>
            <!-- ==================== -->
            <div class="alert alert-primary d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
                    <use xlink:href="#info-fill" />
                </svg>
                <div>
                    Ubah Alamat Utama ?, <b><a href="<?=base_url();?>user/profil_alamat/">klik</a></b>
                    untuk
                    merubah.
                </div>
            </div>



            <!-- ===--------------------------------------- -->
            <!-- ============================================ -->
            <!-- ==================Alamat Combobox============= -->

            <!-- <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat Utama</label>
                <select class="form-control col-md-7" name="alamat" id="alamat">
                    ?php foreach ($alamat_terima as $at) :   ?>
                    <option value="?= $at['alamat']; ?> ">?= $at['alamat']; ?></option>
                    ?php endforeach; ?>
                </select>
            </div> -->

            <div class="form-group row">
                <label for="full_address" class="col-sm-3 col-form-label">Alamat Aktif</label>
                <textarea id="alamat" name="alamat" v-model="full_address" rows="5" class="form-control col-sm-9"
                    readonly><?= $user ['alamat']; ?></textarea>
            </div>

            <!-- =========================================================== -->
            <!-- <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">

                    <input type="text" class="form-control" id="alamat" name="alamat" value="?= $user['alamat']; ?>">
                    ?=form_error('alamat','<small class="text-danger pl-3">','</small>');?>

                </div>
            </div> -->


            <div class="form-group row">
                <label for="wa" class="col-sm-2 col-form-label">Whatsaap</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="wa" name="wa" value="<?= $user['wa']; ?>">
                    <?=form_error('wa','<small class="text-danger pl-3">','</small>');?>
                </div>
            </div>

        </div>
    </div>

    <div class="form-group row justify-content-end">
        <div class="col-sm-10">
            <?php echo anchor('User/profil/','<div class="btn btn-sm btn-danger">kembali</div>')?>
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