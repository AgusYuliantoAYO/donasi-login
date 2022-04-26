<ol class=" breadcrumb float-md-right mb-2 mr-5" style="background: #F5F5F5;">
    <li class="breadcrumb-item "><small><a href="http://localhost/donasi-login/User/profil/">Profil</a></small></li>
    <li class="breadcrumb-item active"><small><a href="http://localhost/donasi-login/User/profil_ubahPass/">Ubah
                Photo</small></a>
    </li>
</ol>



<!-- <div class="col-sm-6" style="text-align:right">
    <p>
    <ol class="breadcrumb" style="background: #F5F5F5; border: 1px solid #F5F5F5 !important">

        <li><a href="https://avo.hni.net/home">Dashboard</a></li>
        <li><a href="#">Perkembangan Bisnis</a></li>
        <li><a href="https://avo.hni.net/genealogi/downline">Genealogi Mitra</a></li>
    </ol>
    </p>
</div> -->




<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <!-- <div class="col-lg-6">
                        ?= $this->session->flashdata('message');?>
                    </div> -->
        <!-- ========================== sweet alert ========== -->
        <?php if ($this->session->flashdata('flash')) : ?>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

        <!-- ?= $this->session->flashdata('flash')?>  -->
        <!-- ?= $this->session->flashdata('flash'); ?> -->

        <?php endif;?>
        <div class="flash-data" data-flashdata="<?= $this->session->unset_userdata('flash'); ?>"></div>
        <!-- ==================================================== -->
    </div>


    <!-- Card Profil -->
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <img src="<?= base_url('assets/img/profile/') . $user['image'];?>" class="card-img">
                            <!-- ================================== -->
                            <?php if($user['role_id']==2) : ?>
                            <tr>
                                <td colspan="7">
                                    <h9 style="align-center">
                                        <div class="alert alert-success" role="alert"> Member</div>
                                    </h9>
                                </td>
                            </tr>
                            <?php endif;?>
                            <!-- ========== -->
                            <?php if($user['role_id']==1) : ?>
                            <tr>
                                <td colspan="7">
                                    <h9 style="align-center">
                                        <div class="alert alert-success" role="alert"> Admin</div>
                                    </h9>
                                </td>
                            </tr>
                            <?php endif;?>
                            <!-- ================================  -->
                        </div>


                        <h7 class="card-text align-text-center">
                            <div class="text-muted">Join: <div class="btn btn-sm btn-secondary">
                                    <?= date('d F Y', $user['date_created']);?> </div>
                            </div>
                        </h7>

                        <!-- <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">?= $user ['name'];?></h5>
                            <h5 class="card-title">?= $user ['role_id'];?></h5>
                            <p class="card-text">?= $user ['alamat'];?></p>
                            <p class="card-text"> ?= $user ['wa'];?> </p>
                            <p class="card-text"> ?= $user ['email'];?> </p>
                            <p class="card-text"><small class="text-muted">Member since  
                                ?= date('d F Y', $user['date_created']);?>
                            </small></p>
                        </div>
                        </div> -->
                        <!-- <a  class="btn btn-sm collapse-item active" href="<php echo base_url('admin'); ?>">Dashboard</a>  -->
                        <br>
                        <!-- <hr class="sidebar-divider mt-3"> -->
                        <br>
                        <hr>
                        <div class="d-grid gap-2 col-9 mx-auto">
                            <?php echo anchor('User/profil/','<button class="btn btn-outline-primary mb-2" type="button"><i class="fas fa-address-card"></i> Data Diri</button>')?>
                            <?php echo anchor('User/profil_alamat/','<button class="btn btn-outline-primary mb-2 " type="button"><i class="fas fa-map-marked-alt"></i> Alamat</button>')?>
                            <?php echo anchor('User/profil_ubahPass/','<button class="btn btn-outline-primary mb-2" type="button"><i class="fab fa-keycdn"></i> Ubah Sandi</button>')?>
                            <?php echo anchor('User/profil_poto/','<button class="btn btn-outline-primary mb-2 active" type="button"><i class="fas fa-portrait"></i> Poto Profil</button>')?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card col-md-9 mb-4">
            <div class="card-header text-white  bg-secondary text-white ">
                Ubah Poto Profil
            </div>
            <div class="card-body">
                <!-- <blockquote class="blockquote mb-0"> -->
                <!-- <div class="col-md-12"> -->

                <?= form_open_multipart('user/edit');?>
                <div class="form-group row">
                    <!-- <label for="email" class="col-sm-2 col-form-label">Email</label> -->
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control" id="email" name="email" value="<?= $user['email']; ?>"
                            readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <!-- <label for="name" class="col-sm-2 col-form-label">Name</label> -->
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
                        <?=form_error('name','<small class="text-danger pl-3">','</small>');?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control" id="alamat" name="alamat"
                            value="<?= $user['alamat']; ?>">
                        <?=form_error('alamat','<small class="text-danger pl-3">','</small>');?>

                    </div>
                </div>
                <div class="form-group row">
                    <!-- <label for="wa" class="col-sm-2 col-form-label">Whatsaap</label> -->
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control" id="wa" name="wa" value="<?= $user['wa']; ?>">
                        <?=form_error('wa','<small class="text-danger pl-3">','</small>');?>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">Picture</div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?= base_url('assets/img/profile/').$user['image']?>" class="img-thumbnail">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label class="custom-file-label" for="image">Choose File</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <!-- ?php echo anchor('User/profil/','<div class="btn btn-sm btn-danger">kembali</div>')?> -->
                        <button type="submit" class="btn btn-primary">Perbaharui</button>
                    </div>
                </div>

                </form>

                <!-- </div> -->
            </div>
            </th>
            </tr>
            </table>
        </div>
    </div>
</div>
<!-- </blockquote> -->
</div>

</div>

<!-- </div> -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->