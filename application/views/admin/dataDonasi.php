                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

                    <div class="row">
                        <div class="col-lg">
                            <!-- kalo error -->

                            <!-- ====================================================
                    ========================== sweet alert ========== -->

                            <?php if ($this->session->flashdata('flashHpsDns')) : ?>
                            <!-- <div class="flash-data" data-flashdata="?= $this->session->flashdata('flash'); ?>"></div> -->
                            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flashHpsDns'); ?>">
                            </div>
                            <?php endif;?>
                            <div class="flash-data"
                                data-flashdata="<?= $this->session->unset_userdata('flashHpsDns'); ?>"></div>
                            <!-- =================================== -->
                            <div class="ml-2">
                                <a href="" class="btn btn-success mb-3" data-toggle="modal"
                                    data-target="#newSubMenuModal"> Tambah <i>Campign</i></a>
                            </div>
                            <!--  Baru -->
                            <!-- Tabel Baru -->
                            <div class="card shadow mb-4 ml-2">
                                <div class="card-header py-3">
                                    <!--    <h6 class="m-0 font-weight-bold text-primary">Data Donasi</h6> -->

                                    <!--========== //Search ==============-->
                                    <div class="row">
                                        <div class="col-md-12" align="right">
                                            <div class="col-md-5">
                                                <form action="<?= base_url('admin/dataDonasi'); ?>" method="post">
                                                    <div class="input-group mb-1">
                                                        <input type="text" class="form-control" placeholder="Cari..."
                                                            name="keyword" autocomplete="off">

                                                        <div class="input-group-append">
                                                            <!-- <input class="btn btn-primary" type="submit" name="submit"> -->
                                                            <input class="btn btn-primary" type="submit" name="submit"
                                                                value="Search">

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
                                            <thead class="bg-secondary text-white py-3">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nama Donasi</th>
                                                    <th scope="col">Tgl Target</th>
                                                    <th scope="col">Target</th>
                                                    <!-- <th scope="col">Perolehan</th> -->
                                                    <th scope="col">deskripsi</th>
                                                    <!-- <th scope="col">Masa Donasi</th>
                                                    <th scope="col">tanggal</th> -->
                                                    <th scope="col">Gambar</th>
                                                    <th scope="col">Status</th>
                                                    <!-- <th scope="col">Status</th> -->
                                                    <!-- <th scope="col">Gambar1</th>
                                        <th scope="col">Gambar2</th>
                                        <th scope="col">Gambar3</th>
                                        <th scope="col">Gambar4</th>
                                        <th scope="col">Gambar5</th> -->
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <!-- ?php $i = 1; ?> -->
                                                    <?php foreach ($data_donasi as $dd) : ?>
                                                <tr>
                                                    <!-- test -->
                                                    <th scope="row"><?= ++$start; ?></th>
                                                    <th><small><b><?= $dd['nama_donasi'];?></b></small></th>
                                                    <th><small><b><?= format_indo ($dd['masa_donasi']);?></b></small>
                                                    </th>




                                                    <th><small><b> Rp
                                                                <?= number_format ($dd['target_donasi'],0,',','.'); ?></b></small>
                                                    </th>
                                                    <!-- <th>?= $dd['perolehan_donasi']; ?></th> -->
                                                    <th> <small><b><?= word_limiter ( $dd['deskripsi_donasi'],4);?></b></small>
                                                    </th>
                                                    <!-- <th>?= $dd['masa_donasi'];?></th>
                                                    <th>?= $dd['tgl_donasi'];?></th> -->
                                                    <!-- <th>?= $dd['masa_aktif'];?></th> -->
                                                    <!-- <th><img style="widht : 50px; height: 50px;" scr="?= base_url('assets/'. $dd[img1); ?>" /> </th>
                                                    <th><img style="widht : 50px; height: 50px;" scr="?= base_url('assets/'. $dd[img2);?>" /></th>
                                                    <th><img style="widht : 50px; height: 50px;" scr="?= base_url('assets/'. $dd[img3);?>"/></th>
                                                    <th><img style="widht : 50px; height: 50px;" scr="?= base_url('assets/'. $dd[img4);?>"/></th>
                                                    <th><img style="widht : 50px; height: 50px;" scr="?= base_url('assets/'. $dd[img5);?>"/></th>  -->
                                                    <!-- <th>?= $dd['status'];?></th> -->

                                                    <th>
                                                        <img src="<?= base_url('assets/img/dokdonasi/').$dd['gambar_donasi']?>"
                                                            class="img-thumbnail">
                                                    </th>
                                                    <th>
                                                        <?php if($dd['status']==0) : ?>
                                                        <h9 style="align-center">
                                                            <small>
                                                                <div class="alert alert-danger" role="alert">Close
                                                                </div>
                                                            </small>
                                                        </h9>
                                                        <?php endif;?>
                                                        <?php if($dd['status']==1) : ?>
                                                        <h9 style="align-center">
                                                            <small>
                                                                <div class="alert alert-success" role="alert">Open
                                                                </div>
                                                            </small>
                                                        </h9>
                                                        <?php endif;?>
                                                    </th>
                                                    <!-- ....... -->
                                                    <th>
                                                        <!-- <a href="" class="badge badge-success">edit</a> -->
                                                        <a>
                                                            <?= anchor('admin/editDonasi/'.$dd['id_donasi'], '<i class="fas fa-edit btn btn-sm btn-primary"></i></div>' )?></a>

                                                        <a href="<?=base_url();?>admin/hapusDonasi/<?=$dd['id_donasi']?>"
                                                            class="far fa-trash-alt btn btn-sm btn-danger tombol-hapus"></a>
                                                    </th>
                                                </tr>
                                                <!-- ?php $i++; ?> -->
                                                <?php endforeach; ?>

                                            </tbody>
                                            <?php if(empty($data_donasi)) : ?>
                                            <tr>
                                                <td colspan="4">
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


                            <!-- ............... -->

                        </div>
                        <!-- /.container-fluid -->

                    </div>
                    <!-- End of Main Content -->


                    <!-- Modal -->
                    <div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog"
                        aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Data Donasi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <?= form_open_multipart('admin/dataDonasi');?>
                                <!-- <form action="?= base_url('admin/dataDonasi');?>" method="post"> -->
                                <div class="modal-body">

                                    <!-- =================Nama Donasi========== -->
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="nama_donasi" name="nama_donasi"
                                            placeholder="Nama Donasi">
                                        <small class="form-text text-danger"><?=form_error('nama_donasi'); ?></small>
                                    </div>
                                    <!-- =================Kategori Donasi========== -->
                                    <div class="form-group">
                                        <select name="kategori_donasi" id="kategori_donasi" class="form-control">
                                            <option value="">Select Menu</option>
                                            <?php foreach ($kategori as $k) : ?>
                                            <option value="<?= $k['id']; ?>"><?= $k['kategori']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <small class="form-text text-danger"><?=form_error('kategori'); ?></small>
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rp</span>
                                        <input type="text" class="form-control" id="target_donasi" name="target_donasi"
                                            placeholder="Target Donasi">
                                        <!-- <span class="input-group-text">.00</span> -->
                                        <small class="form-text text-danger"><?=form_error('target_donasi'); ?></small>
                                    </div>
                                    <!-- <div class="form-group">
                                        <input type="text" class="form-control" id="perolehan_donasi"
                                            name="perolehan_donasi" placeholder="Perolehan Donasi">
                                        <small
                                            class="form-text text-danger">?=form_error('perolehan_donasi'); ?></small>
                                    </div> -->

                                    <div class="form-group row">
                                        <label for="title" class="col-3 col-form-label">Tgl Target</label>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="date" class="form-control" id="masa_donasi"
                                                    name="masa_donasi" placeholder="masa Donasi">
                                                <small
                                                    class="form-text text-danger"><?=form_error('masa_donasi'); ?></small>
                                            </div>
                                        </div>
                                    </div>





                                    <div class="form-group">
                                        <!-- <label for="full_address" class="col-form-label sr-only">Alamat Lengkap</label> -->
                                        <textarea id="deskripsi_donasi" name="deskripsi_donasi" v-model="full_address"
                                            rows="5" class="form-control" placeholder="Deskripsi Donasi"
                                            required></textarea>
                                        <small
                                            class="form-text text-danger"><?=form_error('deskripsi_donasi'); ?></small>
                                    </div>


                                    <!-- <div class="input-group mb-5 col-md-5">
                                        <input type="text" class="form-control" id="masa_aktif" name="masa_aktif"
                                            placeholder="Masa Aktif">
                                        <span class="input-group-text">Hari</span>
                                    </div> -->


                                    <div class="col-sm-9 mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="gambar_donasi"
                                                name="gambar_donasi">
                                            <label class="custom-file-label" for="gambar_donasi">"Pilih" Gambar
                                                Donasi</label>
                                        </div>
                                    </div>

                                    <!-- ........... -->
                                    <!-- <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" name="status"
                                                id="status" checked>
                                            <label class="form-check-label" for="is_active">
                                                Active?
                                            </label>
                                        </div>
                                    </div> -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->


                </div>
                <!-- End of Main Content -->

                <script src="<?=base_url('vendor/ckeditor/ckeditor/ckeditor.js')?>"></script>
                <script>
CKEDITOR.replace('deskripsi_donasi');
                </script>