<ol class=" breadcrumb float-md-right mb-2 mr-5" style="background: #F5F5F5;">
    <li class="breadcrumb-item "><small><a href="http://localhost/donasi-login/User/profil/">Profil</a></small></li>
    <li class="breadcrumb-item active"><small><a href="http://localhost/donasi-login/User/profil_ubahPass/">Ubah
                Password</small></a>
    </li>
</ol>

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
                            <?php echo anchor('User/profil_ubahPass/','<button class="btn btn-outline-primary mb-2 active" type="button"><i class="fab fa-keycdn"></i> Ubah Sandi</button>')?>
                            <?php echo anchor('User/profil_poto/','<button class="btn btn-outline-primary mb-2 " type="button"><i class="fas fa-portrait"></i> Poto Profil</button>')?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card col-md-9 mb-4">
            <div class="card-header text-white  bg-secondary text-white ">
                Ubah Password
            </div>
            <div class="card-body">
                <!-- <blockquote class="blockquote mb-0"> -->
                <div class="col-md-12">

                    <div class="card-body col-md-12 mb-2">
                        <div class="form-group mb-2">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <tr>
                                    <th>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <?= $this->session->flashdata('message');?>

                                                <form action="<?= base_url('user/profil_ubahPass');?>" method="post">
                                                    <div class="form-group">
                                                        <label for="current_password">Current Password</label>
                                                        <input type="password" class="form-control"
                                                            id="current_password" name="current_password" required>
                                                        <?=form_error('current_password','<small class="text-danger pl-3">','</small>');?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="new_password1">New Password</label>
                                                        <input type="password" class="form-control" id="new_password1"
                                                            name="new_password1" required>
                                                        <?=form_error('new_password1','<small class="text-danger pl-3">','</small>');?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="new_password2">Repeat Password</label>
                                                        <input type="password" class="form-control" id="new_password2"
                                                            name="new_password2" required>
                                                        <?=form_error('new_password2','<small class="text-danger pl-3">','</small>');?>
                                                    </div>
                                                    <div class="form-group">
                                                        <?php echo anchor('User/profil/','<div class="btn btn-sm btn-danger">kembali</div>')?>
                                                        <button type="submit" class="btn btn-primary"> Ubah Password
                                                        </button>
                                                    </div>
                                                </form>

                                            </div>
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

    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->