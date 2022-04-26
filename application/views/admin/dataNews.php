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
            <!-- kalo error -->
            <!-- ?php if(validation_errors()) : ?>
                            <div class="alert alert-danger" role="alert">
                                ?= validation_errors();?>
                            </div>
                            ?php endif; ?>
                            ?=form_error('menu','<div class="alert alert-danger" role="alert">',
                    '</div>');?> -->
            <!-- kalo sukses -->
            <!-- <div class="col-md-4"> ?= $this->session->flashdata('message');?> </div> -->


            <!-- //Search -->

            <!-- ............-->



            <!-- Tabel Baru -->
            <div class="card shadow mb-4">
                <div class="card-header bg-secondary py-3">
                    <h6 class="m-0 font-weight-bold  text-white">News</h6>
                </div>

                <div class="card-body">
                    <!--========== //Search ==============-->
                    <div class="row">
                        <div class="col-md-3" align="left">
                            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">
                                Add New News</a>
                        </div>
                        <div class="col-md-8" align="right">
                            <div class="col-md-5 mb-2">
                                <form action="<?= base_url('admin/dataNews'); ?>" method="post">
                                    <div class="input-group mb-1">
                                        <input type="text" class="form-control" placeholder="Cari..." name="keyword"
                                            autocomplete="off">
                                        <div class="input-group-append">
                                            <input class="btn btn-primary" type="submit" name="submit" value="Search">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- ............-->

                    <div class="table-responsive">
                        <h5>Results : <?= $total_rows; ?></h5>
                        <table class="table table-bordered  " id="dataTable" width="100%" cellspacing="0">
                            <thead class="bg-secondary text-white">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Judul News</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Dokumentasi</th>
                                    <th scope="col">Tgl post</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <?php $i = 1; ?>
                                    <?php foreach ($data_news as $dn) : ?>
                                <tr>
                                    <!-- test -->
                                    <th scope="row"><?= $i; ?></th>
                                    <th><?= $dn['judul_news'];?></th>
                                    <th>
                                        <?php if($dn['kategori_news']==1) : ?>
                                        <div class="text-danger" role="alert"> Sosial
                                        </div>
                                        <?php endif;?>
                                        <?php if($dn['kategori_news']==2) : ?>
                                        <div class="text-danger" role="alert"> Edukasi
                                        </div>
                                        <?php endif;?>
                                    </th>
                                    <th><?= $dn['deskripsi_news'];?></th>
                                    <!-- <th>?= $dn['gambar_news']; ?></th> -->
                                    <th>
                                        <img src="<?= base_url('assets/img/news/').$dn['gambar_news']?>"
                                            class="img-thumbnail">
                                    </th>
                                    <th><?= format_indo ($dn['tgl_post']) ?></th>
                                    <!-- ....... -->
                                    <th>
                                        <!-- <a>
                                                            <= anchor('admin/editProduk/'.$dn['id_produk'], '<i class="fas fa-edit btn btn-sm btn-primary"></i></div>' )?></a> -->
                                        <a href="<?= base_url('admin/editNews/').$dn['kd_news'];?>"
                                            class="badge badge-success">Edit</a>

                                        <!-- <a href="?=base_url();?>admin/hapusNews/"
                                            class="far fa-trash-alt btn btn-sm btn-danger tombol-hapus"></a> -->
                                        <a href="<?=base_url();?>admin/hapusNews/<?=$dn['kd_news']?>"
                                            class="far fa-trash-alt btn btn-sm btn-danger tombol-hapus"></a>

                                    </th>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tr>
                            </tbody>
                            <?php if(empty($data_news)) : ?>
                            <tr>
                                <td colspan="4">
                                    <div class="alert alert-danger" role="alert"> Data Tidak Ada !!!
                                    </div>
                                </td>
                            </tr>
                            <?php endif;?>
                        </table>
                        <?= $this->pagination->create_links(); ?>
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
                <h4 class="modal-title" id="newSubMenuModalLabel">Tambah Data News</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>



            <?= form_open_multipart('admin/dataNews');?>
            <!-- <form action="?= base_url('admin/dataDonasi');?>" method="post"> -->
            <div class="modal-body">

                <!-- <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Gerakan Sosial
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Edukasi Bisnis
                                        </label>
                                    </div>
                                </div> -->

                <!-- <script> 
                function tampilkan() {
                    var kategori_news_ok = document.getElementById("form1").kategori_news.value;
                    if (kategori_news_ok == "Gerakan Sosial") {
                        document.getElementById("tampil").innerHTML = "Anda Memilih <b>Gerakan Sosial</b>";
                    } else if (kategori_news_ok == "Edukasi Bisnis") {
                        document.getElementById("tampil").innerHTML = "Anda Memilih <b>Minuman</b>";
                    }
                } 
                </script> -->
                <div class="row">
                    <div class="form-group col-5">
                        <select name="id_news" id="id_news" class="form-control" onChange="tampil(this.value)" required>
                            <option value="0">Kategori News</option>
                            <?php foreach ($kategori as $k) : ?>
                            <option value="<?=$k['id']?>"><?=$k['kategori_news']?></option>
                            <!-- <option value="Edukasi Bisnis">Edukasi Bisnis</option> -->
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-3">
                        <!-- <input type=" text" class="form-control mb-2 " id="get_id_donasi" name="get_id_donasi"
                            placeholder="id donasi...."></input>
                             -->
                        <select name="get_id_donasi" id="get_id_donasi" class="form-control" style="display: none;">
                            <option value="0">Campign</option>
                            <?php foreach ($jenis as $j) : ?>
                            <option value="<?=$j['id_donasi']?>"><?=$j['nama_donasi']?> ||saldo:Rp
                                <?= number_format($j['perolehan_donasi'],0,',','.');?></option>
                            <!-- <option value="Edukasi Bisnis">Edukasi Bisnis</option> -->
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-4" id="get_nominal_salur" style="display: none;">
                        <input type="text" class="form-control mb-2 " id="get_nominal_salur" name="get_nominal_salur"
                            placeholder="Nominal...."></input>
                    </div>

                    <div class="form-group col-4" id="get_tgl_salur" style="display: none;">
                        <input type="date" class="form-control mb-2 " id="get_tgl_salur" name="get_tgl_salur"
                            placeholder="tgl salur..."></input>
                    </div>

                    <!-- <div class="col-8">
                        <input type="date" class="form-control" id="get_tgl_salur" style="display: none;"
                            name="get_tgl_salur"></input>
                    </div> -->

                </div>

                <!-- ============================ -->


                <div id="id_donasi"></div>
                <div id="nominal_salur"></div>
                <div id="tgl_salur"></div>

                <!-- <input type="hidden" class="form-control data_id" name="data_id"> -->



                <!-- <br /><br /> -->

                <!-- <div class="form-group">
                    <select name="jenis_donasi_news" id="jenis_donasi_news" class="form-control">
                        <option value="0">penyaluran Donasi ?</option>
                        php foreach ($jenis as $j) : ?>
                        <option value="= $j['id_donasi']; ?>">= $j['nama_donasi']; ?></option>
                        php endforeach; ?>
                    </select>
                    <small class="form-text text-danger">=form_error('domasi kategori'); ?></small>
                </div> -->
                <!-- <div class="form-group mb-2"> -->


                <!-- ============== AJAX Tampil select ===================================== -->
                <!-- <div class="form-group">
                    <select class="form-group mb-2" name="id_kab_dns" id="id_kab_dns"></select>
                </div>

                <script src="?= base_url();?>assets/js/jquery-3.2.1.min.js"></script>
                <script>
                $(document).ready(function() {
                    $("#id_kab_dns").hide();

                    loadjenisdonasi();
                    loadedukasi();
                });

                if ($("#id_news").val(1)) {
                    function loadjenisdonasi() {

                        $("#id_news").change(function() {
                            var getnews = $("#id_news").val();
                            $.ajax({
                                type: "POST",
                                dataType: "JSON",
                                url: "?= base_url();?>admin/getjenisdonasi",
                                data: {
                                    news: getnews
                                },
                                success: function(data) {
                                    console.log(data);

                                    var html = "";
                                    var i;
                                    for (i = 0; i < data.length; i++) {
                                        html += '<option value="' + data[i].id_donasi +
                                            '">' + data[
                                                i]
                                            .nama_donasi + '<option>';
                                    }
                                    $("#id_kab_dns").html(html);
                                    $("#id_kab_dns").show();
                                }
                            });
                        });
                    }
                }
                if ($("#id_news").val(2)) {
                    $(document).ready(function() {
                        $("#id_kab_dns").hide();

                    });
                }
                </script> -->
                <!-- ============== AJAX Tampil select ================================================ -->


                <!-- <div class="form-group">
                    <input type="text" class="form-control" id="tampil" name="tampil">
                </div> -->
                <!-- <div id="tampil"></div> -->
                <!-- =================Kategori Donasi========== -->
                <!-- ========== -->
                <!-- <script>
                function func2() {
                    if (document.getElementById('kategori_news').value == "Gerakan") {
                        echo "<h5>ok</h5>";
                    }
                }
                </script> -->
                <!-- ?php  if($a==TRUE) : ?>
                <tr>
                    <td colspan="7">
                        <h9 style="align-center">
                            <div class="alert alert-success" role="alert"> Admin</div>
                        </h9>
                    </td>
                </tr>
                ?php endif;?> -->

                <!-- ================================  -->




                <!-- <div class="form-group">
                    <input type="text" class="form-control" id="nominal_penyaluran" name="nominal_penyaluran"
                        placeholder="Rp">
                </div> -->
                <div class="form-group">
                    <input type="text" class="form-control" id="judul_news" name="judul_news" placeholder="Judul News">
                </div>


                <div class="form-group">
                    <!-- <label for="full_address" class="col-form-label sr-only">Alamat Lengkap</label> -->
                    <textarea id="deskripsi_news" name="deskripsi_news" v-model="full_address" rows="5"
                        class="form-control" placeholder="Deskripsi News" required></textarea>
                    <small class="form-text text-danger"><?=form_error('deskripsi_donasi'); ?></small>
                </div>

                <!-- <div class="form-group">
                                    <input type="text" class="form-control" id="deskripsi_news" name="deskripsi_news"
                                        placeholder="Deskripsi News">
                                </div> -->


                <!-- //gambar -->

                <div class="col-sm-9">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="gambar_news" name="gambar_news">
                        <label class="custom-file-label" for="gambar_news">Dokumentasi</label>
                    </div>
                </div>

                <!-- ................. -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="tambah" disabled>Tambah</button>
                </div>
                </form>
            </div>
        </div>
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
    var tgl_salur = "";
    switch (donasi) {
        case "0": {
            // id_donasi =
            document.getElementById("get_nominal_salur").style.display = 'none';
            document.getElementById("get_id_donasi").style.display = 'none';
            document.getElementById("get_tgl_salur").style.display = 'none';
            document.getElementById("tambah").disabled = true;
        }
        break;
    case "1": {
        id_donasi =
            "<small><h6>Sertakan ID DONASI dan Nominal Penyaluran</h6></small>";
        document.getElementById("get_nominal_salur").style.display = 'block';
        document.getElementById("get_id_donasi").style.display = 'block';
        document.getElementById("get_tgl_salur").style.display = 'block';
        document.getElementById("tambah").disabled = false;
    }
    break;
    case "2": {
        // id_donasi =
        document.getElementById("get_nominal_salur").style.display = 'none';
        document.getElementById("get_id_donasi").style.display = 'none';
        document.getElementById("get_tgl_salur").style.display = 'none';
        document.getElementById("tambah").disabled = false;
    }
    break;
    default:
        id_donasi = "";
        nominal_salur = "";
        tgl_salur = "";
    }
    document.getElementById('id_donasi').innerHTML = id_donasi;
    document.getElementById('nominal_salur').innerHTML = nominal_salur;
    document.getElementById('tgl_salur').innerHTML = tgl_salur;
}
</script>

<!-- <script>
$('#id_news').change(function() {
    var isi = $('#id_news').val();
    if (isi == 1) {
        document.getElementById("get_nominal_salur").style.display = 'block';
        document.getElementById("get_id_donasi").style.display = 'block';

    } else {
        document.getElementById("get_nominal_salur").style.display = 'none';
        document.getElementById("get_id_donasi").style.display = 'none';

    }
})
</script> -->