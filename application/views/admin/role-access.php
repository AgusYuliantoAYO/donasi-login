                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


                    <div class="row">
                        <div class="col-lg-6">
                            <!-- kalo sukses -->
                            <?= $this->session->flashdata('message');?>


                            <h5>Role : <?= $role['role']; ?></h5>

                            <table class="table table-hover">
                                <thead>

                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Menu</th>
                                        <th scope="col">Access</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($menu as $m) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <th><?= $m['menu'];?></th>
                                        <th>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    <?= check_access($role['id'], $m['id']); ?>
                                                    data-role="<?= $role['id'];?>" data-menu="<?= $m['id']; ?>">
                                            </div>
                                        </th>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                <tbody>
                            </table>
                            <a href="<?php echo base_url('admin/role') ?>">
                                <div class="btn btn-sm btn-danger">Kembali</div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->