


       

                <!-- Begin Page Content -->
                <div class="container-fluid">
        <!-- ========================== sweet alert ========== -->

                         <?php if ($this->session->flashdata('flash')) : ?>
                           <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
                           <!-- <div class="flash-data" data-flashdata="?= $this->session->unset_flashdata('flash'); ?>"></div> -->
                    <?php endif;?>
                    
        <!-- =================================== -->
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <div class="row">
                        <div class="col-lg-6">
                        <?= $this->session->flashdata('message');?>

                        <form action="<?= base_url('user/changepassword');?>" method="post">
                          <div class="form-group">
                            <label for="current_password">Current Password</label>
                            <input type="password" class="form-control" id="current_password" name="current_password">
                            <?=form_error('current_password','<small class="text-danger pl-3">','</small>');?>
                          </div>
                          <div class="form-group">
                            <label for="new_password1">New Password</label>
                            <input type="password" class="form-control" id="new_password1" name="new_password1">
                            <?=form_error('new_password1','<small class="text-danger pl-3">','</small>');?>
                          </div>
                          <div class="form-group">
                            <label for="new_password2">Repeat Password</label>
                            <input type="password" class="form-control" id="new_password2" name="new_password2">
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


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

         