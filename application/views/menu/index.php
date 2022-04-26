                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


                    <div class="card col-md-6 shadow">
                        <h5 class="card-header">Menu Sidebar</h5>


                        <div class="row">
                            <div class="col-lg-12">
                                <!-- kalo error -->
                                <?=form_error('menu','<div class="alert alert-danger" role="alert">',
                    '</div>');?>
                                <!-- kalo sukses -->
                                <?= $this->session->flashdata('message');?>

                                <a href="" class="btn btn-primary mb-1 mt-2" data-toggle="modal"
                                    data-target="#newMenuModal">
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
                                                    <a href="<?= base_url('menu/editMenuManagement');?>"
                                                        class="badge badge-success">edit</a>
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

                </div>
                <!-- End of Main Content -->


                <!-- Modal -->
                <div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog"
                    aria-labelledby="newMenuModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('menu');?>" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="menu" name="menu"
                                            placeholder="Menu name">
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