<ol class=" breadcrumb float-md-right mb-2 mr-5" style="background: #F5F5F5;">
    <li class="breadcrumb-item "><small><a href="http://localhost/donasi-login/User/">Dashboard</a></small></li>
    <li class="breadcrumb-item active"><small><a href="http://localhost/donasi-login/admin/role/">Role</small></a>
    </li>
</ol>



<!-- ========================== sweet alert ==========  -->

<?php if ($this->session->flashdata('flash')) : ?>
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>">
</div>
<?php endif;?>
<div class="flash-data" data-flashdata="<?= $this->session->unset_userdata('flash'); ?>"></div>
<!-- =========================== -->

<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">

        <!-- Page Heading -->
        <div class="card col-md-6 shadow">

            <h5 class="card-header">Role</h5>
            <div class="row">
                <div class="col-lg-12">
                    <!-- kalo error -->
                    <!-- ?=form_error('menu','<div class="alert alert-danger" role="alert">', -->
                    <!-- '</div>');?> -->
                    <!-- kalo sukses -->
                    <!-- ?= $this->session->flashdata('message');?> -->

                    <a href="" class="btn btn-primary mb-1 mt-2" data-toggle="modal" data-target="#newRoleModal">
                        Tambah Role</a>

                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>

                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($role as $r) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <th><?= $r['role'];?></th>
                                    <th>


                                        <!-- ============= -->
                                        <a href="#" class="badge badge-success btn-edit-role" data-id="<?= $r['id'];?>"
                                            data-role="<?= $r['role'];?>"> edit</a>
                                        <!-- ============= -->


                                        <a href="<?= base_url('admin/roleaccess/').$r['id'];?>"
                                            class="badge badge-warning">access</a>
                                        <!-- <a href="?= base_url('admin/hapusRole/').$r['id'];?>"
                                            class="badge badge-danger">delete</a> -->

                                    </th>
                                </tr>
                                <?php $i++; ?>
                                <?php endforeach; ?>
                            <tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- /.container-fluid -->
        </div>

        <!-- End of Main Content -->
        <!-- </div> -->



        <!-- ============================ -->





        <!-- Begin Page Content -->
        <!-- <div class="container-fluid"> -->

        <!-- Page Heading -->
        <!-- <h1 class="h3 mb-4 text-gray-800">?= $title; ?></h1> -->


        <div class="card col-md-5 ml-5 shadow">
            <h5 class="card-header">Menu Sidebar</h5>


            <div class="row">
                <div class="col-lg-12">
                    <!-- kalo error -->
                    <!-- ?=form_error('menu','<div class="alert alert-danger" role="alert">',
                    '</div>');?> -->
                    <!-- kalo sukses -->
                    <!-- ?= $this->session->flashdata('message');?> -->

                    <a href="" class="btn btn-primary mb-1 mt-2" data-toggle="modal" data-target="#MenuModal">
                        Tambah Menu</a>
                    <div class="card-body">

                        <table class="table table-hover">
                            <thead>

                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($menu as $m) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <th><?= $m['menu'];?></th>
                                    <th>
                                        <a href="#" class="badge badge-success btn-edit" data-id="<?= $m['id'];?>"
                                            data-menu="<?= $m['menu'];?>"> edit</a>
                                        <!-- <a href="?= base_url('menu/editMenuManagement');?>"
                                            class="badge badge-success">edit</a> -->
                                        <a href="<?= base_url('menu/hapusMenuManagement/').$m['id'];?>"
                                            class="badge badge-danger">delete</a>
                                        <!-- <a href="" class="badge badge-danger">delete</a> -->


                                        <!-- =========== -->
                                        <!-- <a href="#" class="btn btn-info btn-sm btn-edit" data-id="= $row->product_id;?>" data-name="= $row->product_name;?>" data-price="= $row->product_price;?>" data-category_id="= $row->product_category_id;?>">Edit</a> -->

                                        <!-- =========== -->

                                    </th>
                                </tr>
                                <?php $i++; ?>
                                <?php endforeach; ?>
                            <tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!-- /.container-fluid -->

        <!-- </div> -->
        <!-- End of Main Content -->


        <!-- ======================SUB MENU MANAGEMENT==================================== -->

        <!-- Begin Page Content -->
        <!-- <div class="container-fluid"> -->

        <!-- Page Heading -->
        <!-- <h1 class="h3 mb-4 text-gray-800">?= $title; ?></h1> -->



        <div class="card col-md-12 mt-2 shadow">
            <h5 class="card-header">Sub-Menu Sidebar</h5>

            <div class="row">
                <div class="col-lg-12">
                    <!-- kalo error -->
                    <!-- ?php if(validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        ?= validation_errors();?>
                    </div>
                    ?php endif; ?>
                    ?=form_error('menu','<div class="alert alert-danger" role="alert">',
                    '</div>');?> -->
                    <!-- kalo sukses -->
                    <!-- ?= $this->session->flashdata('message');?> -->

                    <a href="" class="btn btn-primary mb-1 mt-2" data-toggle="modal" data-target="#newSubMenuModal">
                        Tambah
                        Sub-Menu</a>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>

                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Menu</th>
                                        <th scope="col">Url</th>
                                        <th scope="col">Icon</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($subMenu as $sm) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <th><?= $sm['title'];?></th>
                                        <th><?= $sm['menu'];?></th>
                                        <th><?= $sm['url'];?></th>
                                        <th><?= $sm['icon'];?></th>

                                        <th><?php if($sm['is_active']==1) : ?> <div class="alert alert-success"
                                                role="alert"> Aktif</div><?php endif;?>
                                            <?php if($sm['is_active']==0) : ?> <div class="alert alert-danger"
                                                role="alert">
                                                NonAktif</div><?php endif;?></th>
                                        <!-- <th>?php if($sm['is_active']==0) : ?> Tidak Aktif?php endif;?></th> -->
                                        <!-- <th>?= $sm['is_active'];?></th> -->
                                        <th>
                                            <a href="<?= base_url('menu/editSubMenu/').$sm['id'];?>"
                                                class="badge badge-success">Edit</a>
                                            <!-- <a href="" class="badge badge-success">edit</a> -->
                                            <a href="" class="badge badge-danger">delete</a>
                                        </th>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                <tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

        <!-- </div> -->
        <!-- End of Main Content -->




    </div>





    <!-- ================Kumpulan Modal=============== -->




    <!-- Modal -->
    <div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newRoleModalLabel">Role Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/role');?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="role" name="role" placeholder="Role name">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>







    <!-- Modal 2 -->
    <div class="modal fade" id="MenuModal" tabindex="-1" role="dialog" aria-labelledby="MenuModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="MenuModalLabel">Menu Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('menu');?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Modal 3 -->
    <div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newSubMenuModalLabel">Add New Submenu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('menu/submenu');?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title">
                        </div>
                        <div class="form-group">
                            <select name="menu_id" id="menu_id" class="form-control">
                                <option value="">Select Menu</option>
                                <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="is_active"
                                    id="is_active" checked>
                                <label class="form-check-label" for="is_active">
                                    Active?
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal 4 -->
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <div class="modal fade" id="EditMenuModal" tabindex="-1" role="dialog" aria-labelledby="EditMenuModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditMenuModalLabel">Ubah Nama Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('menu/ubahMenu');?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <!-- <label>id</label> -->
                            <!-- <input type="text" class="form-control data-id" name="data-id"> -->
                            <input type="hidden" class="form-control data_id" name="data_id">
                        </div>
                        <div class="form-group">
                            <label>Nama Menu Baru</label>
                            <input type="text" class="form-control data_menu" name="data_menu">
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

    <!-- Modal 5 -->
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <div class="modal fade" id="EditRoleModal" tabindex="-1" role="dialog" aria-labelledby="EditRoleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditRoleModalLabel">Ubah Nama Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('menu/ubahRole');?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <!-- <label>id</label> -->
                            <!-- <input type="text" class="form-control data-id" name="data-id"> -->
                            <input type="hidden" class="form-control data_id" name="data_id">
                        </div>
                        <div class="form-group">
                            <label>Nama Menu Baru</label>
                            <input type="text" class="form-control data_role" name="data_role">
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
</div>


<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function() {

    // get Edit Product
    $('.btn-edit').on('click', function() {
        // get data from button edit
        const id = $(this).data('id');
        const menu = $(this).data('menu');
        // const menu = $(this).data['menu'];
        // const price = $(this).data('price');
        // const category = $(this).data('category_id');
        // Set data to Form Edit
        $('.data_id').val(id);
        $('.data_menu').val(menu);
        // $('.menu').val(menu1);
        // $('.product_price').val(price);
        // $('.product_category').val(category).trigger('change');
        // Call Modal Edit
        $('#EditMenuModal').modal('show');
    });

    // get Edit Role
    $('.btn-edit-role').on('click', function() {
        // get data from button edit
        const id = $(this).data('id');
        const role = $(this).data('role');
        $('.data_id').val(id);
        $('.data_role').val(role);
        $('#EditRoleModal').modal('show');
    });

});
</script>