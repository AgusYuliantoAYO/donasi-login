        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

            <!-- ==================================== -->
            <?php foreach ($donasi as $dpr) : ?>

            <!-- <form method="post" action="?= base_url().'admin/updateDonasi'?>"> -->
            <?= form_open_multipart('admin/updateDonasi');?>
            <div class="form-group">
                <!-- <label > ID Produk </label> -->
                <input type="hidden" name="id_donasi" class="form-control" value="<?= $dpr['id_donasi']?>">
            </div>


            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Nama Donasi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_donasi" name="nama_donasi"
                        value="<?= $dpr['nama_donasi']?>">
                </div>
            </div>


            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Target Nominal</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="target_donasi" name="target_donasi"
                        value="<?= $dpr['target_donasi']?>">
                </div>
                <div class="col-sm-5">
                    <label for="title" class="col-sm-6 col-form-label">
                        Rp <?= number_format ($dpr['target_donasi'],0,',','.')?></label>
                </div>
            </div>

            <!-- <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="deskripsi_donasi" name="deskripsi_donasi"
                            value="?= $dpr->deskripsi_donasi?>">
                    </div>
                </div> -->


            <div class="form-group row">
                <label for="full_address" class="col-form-label col-sm-2">Deskripsi</label>
                <div class="col-sm-10">
                    <textarea id="deskripsi_donasi" name="deskripsi_donasi" v-model="full_address" rows="5"
                        class="form-control" required><?= $dpr['deskripsi_donasi']?>
                    </textarea>
                </div>
            </div>



            <div class=" form-group row">
                <label for="title" class="col-sm-2 col-form-label">Target Tanggal</label>
                <!-- <div class="col-sm-4"> -->
                <input type="hidden" class="form-control" id="masa_donasi" name="masa_donasi"
                    value="<?= $dpr['masa_donasi']?>" readonly>
                <!-- </div> -->
                <div class="col-sm-4">
                    <input type="text" class="form-control" value="<?= format_indo($dpr['masa_donasi'])?>" readonly>
                </div>

                <!-- <div class="col-4">
                        <input type="date" class="form-control" id="masa_donasi_update" name="masa_donasi_update">
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary">U</button>
                    </div> -->

                <div class="col-2">
                    <a href="#" class="badge badge-warning btn-edit-tgl" data-id="<?= $dpr['id_donasi'];?>">
                        Ubah Tanggal </a>
                </div>


                <!-- <span class="float-right"> -->

                <!-- BUAT MODEL UNTUK UBAH TANGGAL !!! -->
                <!-- <form action=" ?= base_url('admin/ubahTglCpgn/'.$dpr->id_donasi);?>" method="post">
                        <input type="hidden" class="form-control" value="?= $dpr->id_donasi ?>" id="id_donasi"
                            name="id_donasi">
                        <div class="col-4">
                            <input type="date" class="form-control" id="masa_donasi_update" name="masa_donasi_update">
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-success"> <i class="fas fa-power-off"></i>
                            </button>
                        </div>
                    </form> -->

                <!-- </span> -->



            </div>



            <!-- <div class="for-group">
                        <label> Masa Aktif </label>
                        <input type="text" name="masa_aktif" class="form-control" value="?= $dpr->masa_aktif?>">
                    </div> -->
            <!-- <div class="for-group">
                        <label> Status </label>
                        <input type="text" name="status" class="form-control" value="?= $dpr->status?>">
                    </div> -->

            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-5">
                    <select name="status" id="status" class="form-control">
                        <option value="<?= $dpr['status'] ?>">
                            <?php if($dpr['status']==1) : ?> Aktif
                            <?php endif;?>
                            <?php if($dpr['status']==0) : ?> Tidak Aktif <?php endif;?>
                        </option>

                        <option value="1"> Aktif </option>
                        <option value="0"> Tidak Aktif </option>

                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-2">Ubah Gambar</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img class="img-thumbnail"
                                src="<?= base_url('assets/img/dokdonasi/').$dpr['gambar_donasi']?>"
                                class="img-thumbnail">
                        </div>
                        <div class="col-sm-5 mt-5">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambar_donasi" name="gambar_donasi">
                                <label class="custom-file-label" for="gambar_donasi">Choose File</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- <div class="form-group row mt-3">
                            <div class="col-sm-1">Gambar</div>
                                <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img class="img-thumbnail" src="?= base_url('assets/img/dokdonasi/').$dpr->gambar_donasi?>">          
                                 </div>
                                 <div class="col-sm-5">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="gambar_donasi" name="gambar_donasi">
                                        <label class="custom-file-label" for="gambar_donasi" >Choose File</label>
                                    </div>
                                 </div>
                            </div> -->
            <!-- </div> -->

            <div class="form-group row-5">
                <div class="col-sm-10">
                    <a href="<?php echo base_url('admin/datadonasi') ?>">
                        <div class="btn btn-sm btn-danger">Kembali</div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>

            <!-- <a> <button type="submit" class="btn btn-primary btn-sm mt-3 ml-3"> Simpan </button> </a> -->

            </form>
            <?php endforeach;?>

        </div>
        </div>



        <!-- modal -->
        <!-- Modal 5 -->
        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <div class="modal fade" id="UbahTglModal" tabindex="-1" role="dialog" aria-labelledby="UbahTglModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="UbahTglModalLabel">Ubah Tanggal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- ?= form_open_multipart('admin/dataDonasi');?> -->
                    <form action=" <?= base_url('admin/ubahTglCpgn/');?>" method="post">

                        <!-- <form action="?= base_url('admin/dataDonasi');?>" method="post"> -->
                        <div class="modal-body">

                            <!-- <input type="hidden" class="form-control" value="?= $dpr->id_donasi ?>" id="id_donasi"
                                name="id_donasi"> -->
                            <input type="hidden" class="form-control data_id" name="data_id">
                            <div class="col-8">
                                <input type="date" class="form-control" id="masa_donasi_update"
                                    name="masa_donasi_update">
                            </div>
                            <!-- <div class="col-2">
                            <button type="submit" class="btn btn-success"> <i class="fas fa-power-off"></i>
                            </button>
                         </div> -->








                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>

                    </form>
                </div>

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

        <script src="/js/jquery.min.js"></script>
        <script src="/js/bootstrap.bundle.min.js"></script>

        <script>
$(document).ready(function() {

    $('.btn-edit-tgl').on('click', function() {
        const id = $(this).data('id');
        $('.data_id').val(id);
        $('#UbahTglModal').modal('show');
    });

});
        </script>