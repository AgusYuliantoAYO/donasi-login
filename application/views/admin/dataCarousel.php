<!-- ========================== sweet alert ========== -->

<?php if ($this->session->flashdata('flash')) : ?>
<!-- <div class="flash-data" data-flashdata="?= $this->session->flashdata('flash'); ?>"></div> -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>">
</div>
<?php endif;?>
<div class="flash-data" data-flashdata="<?= $this->session->unset_userdata('flash'); ?>"></div>
<!-- =================================== -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">

            <!-- Tabel Baru -->
            <div class="card shadow mb-4">
                <div class="card-header bg-secondary py-3">
                    <h6 class="m-0 font-weight-bold text-white">Carousel INFO Donasi</h6>
                </div>

                <div class="card-body">
                    <!--========== //Search ==============-->
                    <div class="row">
                        <!-- <div class="col-md-3" align="left">
                            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">
                                Add New Carousel</a>
                        </div> -->


                        <!-- <div class="col-md-8" align="right">
                            <div class="col-md-5 mb-2">
                                <form action="?= base_url('admin/dataCarouselDonasi'); ?>" method="post">
                                    <div class="input-group mb-1">
                                        <input type="text" class="form-control" placeholder="Cari..." name="keyword"
                                            autocomplete="off">
                                        <div class="input-group-append">
                                            <input class="btn btn-primary" type="submit" name="submit" value="Search">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div> -->
                    </div>

                    <!-- ............-->

                    <div class="table-responsive">
                        <!-- <h5>Results : ?= $total_rows; ?></h5> -->
                        <table class="table table-bordered  " id="dataTable" width="100%" cellspacing="0">
                            <thead class="bg-secondary text-white">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Gambar</th>
                                    <!-- <th scope="col">Dokumentasi</th> -->
                                    <!-- <th scope="col">Tgl post</th> -->
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <?php $i = 1; ?>
                                    <?php foreach ($dataCarousel as $dc) : ?>
                                <tr>
                                    <!-- test -->
                                    <th scope="row"><?= $i; ?></th>
                                    <th><?= $dc['judul'];?></th>
                                    <th><?= $dc['link'];?></th>
                                    <!-- <th>?= $dc['gambar_carousel'];?></th> -->
                                    <th>
                                        <img src="<?= base_url('assets/img/carousel/').$dc['gambar_carousel'];?>"
                                            class="img-thumbnail">
                                    </th>
                                    <!-- <th>?= $dc['gambar_news']; ?></th> -->
                                    <!-- <th>?= format_indo ($dc['tgl_post']) ?></th> -->
                                    <!-- ....... -->
                                    <th>
                                        <!-- <a>
                                                            <= anchor('admin/editProduk/'.$dc['id_produk'], '<i class="fas fa-edit btn btn-sm btn-primary"></i></div>' )?></a> -->
                                        <!-- <a href="?= base_url('admin/editCarousel/').$dc['id_carousel'];?>"
                                            class="badge badge-success">Edit</a> -->
                                        <a href="#" class="badge badge-success btn-carousel"
                                            data-id="<?= $dc['id_carousel'];?>" data-name="<?= $dc['judul'];?>"
                                            data-link="<?= $dc['link'];?>"
                                            data-carousel="<?= $dc['gambar_carousel'];?>">
                                            Edit</a>

                                        <!-- <a href="?=base_url();?>admin/hapusNews/"
                                            class="far fa-trash-alt btn btn-sm btn-danger tombol-hapus"></a> -->
                                        <!-- <a href="<?=base_url();?>admin/hapusNews/<?=$dc['kd_news']?>"
                                            class="far fa-trash-alt btn btn-sm btn-danger tombol-hapus"></a> -->

                                    </th>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tr>
                            </tbody>
                            <?php if(empty($dataCarousel)) : ?>
                            <tr>
                                <td colspan="4">
                                    <div class="alert alert-danger" role="alert"> Data Tidak Ada !!!
                                    </div>
                                </td>
                            </tr>
                            <?php endif;?>
                        </table>
                        <!-- ?= $this->pagination->create_links(); ?> -->
                    </div>
                </div>
            </div>

            <!-- ............... -->

        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="newSubMenuModalLabel">Tambah Data Carousel</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>



            <?= form_open_multipart('admin/dataCarousel');?>
            <div class="modal-body">


                <!-- <div class="row"> -->
                <!-- <div class="form-group col-5">
                        <select name="id_news" id="id_news" class="form-control" onChange="tampil(this.value)" required>
                            <option value="">Kategori News</option>
                            ?php foreach ($kategori as $k) : ?>
                            <option value="?=$k['id']?>">?=$k['kategori_news']?></option>
                            ?php endforeach; ?>
                        </select>
                    </div> -->


                <div class="form-group">
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Carousel...">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="link" name="link" placeholder="Link.....">
                </div>


                <!-- <div class="form-group">
                        <textarea id="deskripsi_news" name="deskripsi_news" v-model="full_address" rows="5"
                            class="form-control" placeholder="Deskripsi News" required></textarea>
                        <small class="form-text text-danger">?=form_error('deskripsi_donasi'); ?></small>
                    </div> -->

                <!-- <div class="form-group">
                                    <input type="text" class="form-control" id="deskripsi_news" name="deskripsi_news"
                                        placeholder="Deskripsi News">
                                </div> -->


                <!-- //gambar -->

                <div class="col-sm-9">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="gambar_carousel" name="gambar_carousel">
                        <label class="custom-file-label" for="gambar_carousel">Gambar Carousel</label>
                    </div>
                </div>

                <!-- ................. -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
                </form>
            </div>
            <!-- </div> -->
        </div>
    </div>
</div>

<script src="<?=base_url('vendor/ckeditor/ckeditor/ckeditor.js')?>"></script>
<script>
CKEDITOR.replace('deskripsi_news');
</script>
<!-- <script>
$("select").change(function() {
    document.getElementById("loc").innerHTML = "You selected: " + document.getElementById("kategori_news")
        .value;
});
</script> -->

<style>
h6 {
    color: red;
}

h5 {
    color: green;
}
</style>

<script type="text/javascript">
function tampil(donasi) {
    var id_donasi = "";
    var nominal_salur = "";
    switch (donasi) {
        case "1": {
            id_donasi =
                "<small><h6>Sertakan ID DONASI dan Nominal Penyaluran</h6></small>";
        }
        break;
    case "2": {
        id_donasi =
            "<h5>tidak perlu input <b>ID DONASI</b> dan <b>Nominal</b></h5>";
    }
    break;
    default:
        id_donasi = "";
        nominal_salur = "";
    }
    document.getElementById('id_donasi').innerHTML = id_donasi;
    document.getElementById('nominal_salur').innerHTML = nominal_salur;
}
</script>



<!-- ================================================ -->

<!-- Modal 4 -->
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<div class="modal fade" id="carouselModal" tabindex="-1" role="dialog" aria-labelledby="CarouselModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document"> 
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="CarouselModalLabel">Carousel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('admin/updateCarousel');?>
            <!-- <form method="post" enctype="admin/updateCarousel"> -->
            <!-- <form action="?= base_url('admin/updateCarousel');?>" method="post" enctype="multipart/form-data"> -->
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control data_id" name="data_id" readonly>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control data_name" name="data_name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control data_link" name="data_link">
                </div>

                <!-- <div class="col-sm-9">
                    <div class="form-group">
                        <input type="file" class="custom-file-input data_carousel" name="data_carousel">
                        <label class="custom-file-label data_carousel" for="data_carousel" name="data_carousel">Gambar
                            Carousel 2</label>
                    </div>
                </div> -->

                <div class="col-sm-9">
                    <div class="form-group">
                        <input type="file" class="custom-file-input" id="gambar_carousel" name="gambar_carousel">
                        <label class="custom-file-label" for="gambar_carousel">Gambar Carousel</label>
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label>#</label>
                    <input type="text" class="form-control data_name" name="data_name">
                </div> -->
                <!-- <b class="text-success">Transfer Sekarang !!!</b> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>


<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function() {

    // get Carousel
    $('.btn-carousel').on('click', function() {
        // get data from button edit
        const id = $(this).data('id');
        const name = $(this).data('name');
        const link = $(this).data('link');
        const carousel = $(this).data('carousel');
        // Set data to Form Edit
        $('.data_id').val(id);
        $('.data_name').val(name);
        $('.data_link').val(link);
        $('.data_carousel').val(carousel);
        $('#carouselModal').modal('show');
    });


});
</script>