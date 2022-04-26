<div class="mb-5">
    <ol class=" breadcrumb float-md-right mb-2 mr-2" style="background: #F5F5F5;">
        <li class="breadcrumb-item "><small><a href="http://localhost/donasi-login/user">Dashboard</a></small></li>
        <li class="breadcrumb-item "><small><a href="http://localhost/donasi-login/menu/datauser">Data User</a></small>
        </li>
        <!-- <li class="breadcrumb-item active"><small><a href="http://localhost/donasi-login/User/profil_ubahPass/">Ubah
                    Photo</small></a>
        </li> -->
    </ol>
</div>

<!-- ========================== sweet alert ==========  -->

<?php if ($this->session->flashdata('flash')) : ?>
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>">
</div>
<?php endif;?>
<div class="flash-data" data-flashdata="<?= $this->session->unset_userdata('flash'); ?>"></div>
<!-- =========================== -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



    <div class="row">
        <div class="col-lg">
            <!-- kalo error -->

            <!-- ====================================================
                    ========================== sweet alert ========== -->

            <?php if ($this->session->flashdata('flash')) : ?>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
            <!-- <div class="flash-data" data-flashdata="?= $this->session->unset_flashdata('flash'); ?>"></div>                     -->
            <?php endif;?>
            <div class="flash-data" data-flashdata="<?= $this->session->unset_userdata('flash'); ?>"></div>
            <!-- =================================== -->
            <!-- <div class="ml-2">
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal"> Add New
                    Menu</a>
            </div> -->
            <!-- Tabel Baru -->
            <div class="card shadow mb-4 ml-2">
                <div class="card-header py-3">

                    <!--========== //Search ==============-->
                    <div class="row">
                        <div class="col-md-12" align="right">
                            <div class="col-md-4">
                                <form action="<?= base_url('menu/datauser'); ?>" method="post">
                                    <div class="input-group mb-1">
                                        <input type="text" class="form-control" placeholder="Cari..." name="keyword"
                                            autocomplete="off" autofocus>
                                        <div class="input-group-append">
                                            <!-- <button type="submit" name="submit" class="btn btn-success"> <i
                                        class="fas fa-cart-arrow-down"></i>
                                    </button> -->
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
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Whatsaap</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Position</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Act</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <!-- ?php $i = 1; ?> -->
                                    <?php foreach ($data_menu as $dm) : ?>
                                <tr>
                                    <!-- test -->
                                    <th scope="row"><?= ++$start; ?></th>
                                    <th><small><b><?= $dm['name'];?></b></small></th>
                                    <th><small><b><?= $dm['wa'];?></b></small></th>
                                    <th><small><b><?= $dm['alamat']; ?></b></small></th>
                                    <th><small><b><?= $dm['email'];?></b></small></th>
                                    <!-- <th>?= $dm['role_id'];?></th> -->
                                    <th>
                                        <?php if($dm['role_id']==1) : ?> <div class=" text-primary">
                                            CEO & Founder</div><?php endif;?>
                                        <?php if($dm['role_id']==2) : ?> <div class="text-warning">
                                            User</div><?php endif;?>
                                        <?php if($dm['role_id']==3) : ?> <div class="text-success">
                                            Member</div><?php endif;?>
                                    </th>
                                    <th>
                                        <?php if($dm['is_active']==1) : ?> <a class="text-success" role="alert">
                                            Active</a><?php endif;?>
                                        <?php if($dm['is_active']==0) : ?> <div class="alert alert-dark" role="alert">
                                            NonActive</div><?php endif;?>
                                    </th>

                                    <!-- ....... -->
                                    <th>
                                        <img src="<?= base_url('assets/img/profile/').$dm['image']?>"
                                            class="img-thumbnail">
                                        <!-- =============================== -->
                                        <!-- ?= anchor('admin/editDonasi/'.$dd['id_donasi'], '<i class="fas fa-edit btn btn-sm btn-primary"></i></div>' )?></a>

                                        <a href="?=base_url();?>admin/hapusDonasi/?=$dd['id_donasi']?>"
                                            class="far fa-trash-alt btn btn-sm btn-danger tombol-hapus"></a> -->
                                    </th>
                                    <th>
                                        <a href="#" class="badge badge-success btn-edit" data-id="<?= $dm['email'];?>"
                                            data-role="<?= $dm['role_id'];?>"
                                            data-isact="<?= $dm['is_active'];?>">Ubah</a>
                                    </th>
                                </tr>
                                <!-- ?php $i++; ?> -->
                                <?php endforeach; ?>

                            </tbody>
                            <?php if(empty($data_menu)) : ?>
                            <tr>
                                <td colspan="8">
                                    <div class="alert alert-danger" role="alert"> Data Tidak Ada !!!
                                    </div>
                                </td>
                            </tr>
                            <?php endif;?>

                        </table>
                        <?= $this->pagination->create_links();?>

                    </div>
                </div>
            </div>





        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->


    <!-- Modal 1 -->
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <div class="modal fade" id="EditUserModal" tabindex="-1" role="dialog" aria-labelledby="EditMenuModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditMenuModalLabel">Ubah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('menu/ubahUser');?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control data_id" name="data_id" readonly>
                        </div>


                        <div class="col-12" align="center">
                            <div class="form-group">
                                <label><b>Jabatan</b></label>
                                <input type="number" class="form-control col-3 data_role" name="data_role">
                            </div>



                            <div class="card text-dark shadow mb-3" style="max-width: 18rem;">
                                <div class="card-header bg-warning"><b>Info</b></div>
                                <div class="card-body">
                                    <h5 class="card-title"><b>Jabatan</b></h5>
                                    <p class="card-text">
                                        <?php $i=1; foreach ($userRole as $ur) : ?>
                                        <?=$i++;?>. <?= $ur['role']?> ;
                                        <?php endforeach; ?>
                                    </p>

                                    <br>
                                    <h5 class="card-title"><b>Status User</b></h5>
                                    <p>0 = Non Aktif ;
                                        1 = Aktif</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label><b class="text-danger">Status User</b></label>
                                <input type="number" class="form-control col-3 data_isact" name="data_isact">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>



    <!-- ================================================ -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script>
    $(document).ready(function() {

        // get Edit Product
        $('.btn-edit').on('click', function() {
            // get data from button edit
            const id = $(this).data('id');
            const role = $(this).data('role');
            const isact = $(this).data('isact');
            // Set data to Form Edit
            $('.data_id').val(id);
            $('.data_role').val(role);
            $('.data_isact').val(isact);
            $('#EditUserModal').modal('show');
        });



    });
    </script>