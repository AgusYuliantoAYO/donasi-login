<!--                ========================== sweet alert ========== -->
<?php if ($this->session->flashdata('flash')==TRUE) : ?>
<!-- <div class="flash-data" data-flashdata="?= $this->session->flashdata('flash'); ?>"></div> -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
<?php endif;?>
<div class="flash-data" data-flashdata="<?= $this->session->unset_userdata('flash'); ?>"></div>

<!-- =================================== -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- slider -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">

            <!-- ==============Looping Carosel -->
            <?php
             
            $i=0;
            $active="";
            if($i == 0){
                $active = 'active';
            }

            $sql = "SELECT * FROM data_carousel";
            $query = mysqli_query($konek, $sql) or die (mysqli_error($konek));
            
            while($data = mysqli_fetch_array($query)){ ?>
            <?php
                $active="";
                if($i == 0){
                    $active = 'active';
                }
                ?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i;?>" class="<?= $active?>"></li>

            <?php $i++;
            }
        ?>
        </ol>
        <div class="row">
            <div class="carousel-inner  col-12 ml-0">


                <!-- ===================Carosel Gambar Dinamis  -->

                <?php
            $sql ="SELECT * FROM data_carousel";
            $query = mysqli_query($konek, $sql) or die (mysqli_error($konek));

            $i=0;
            while($data = mysqli_fetch_array($query)){ ?>

                <?php
            $active = "";
            if($i == 0){
                $active = "active";
            }
            ?>
                <div class="carousel-item shadow <?= $active;?> ">
                    <a href="<?= $data['link'];?>">
                        <img src="<?= base_url().'/assets/img/carousel/'.$data['gambar_carousel'];?>"
                            class="d-block w-100" alt="...">
                    </a>
                </div>
                <?php $i++; }
            ?>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon btn btn-sm btn-success" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon btn btn-sm btn-success " aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- ........ -->
    <!-- </div> -->
    <!-- =========================== -->
    <!-- =========================== -->
    <!-- <div class="container-fluid col-12 ml-2 mt-5 mb-3"> -->
    <div class="col-12 mt-4">
        <div align="center">
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-success border-success shadow mb-3" style="max-width: 20rem;">
                        <div class="card-body ">
                            <h5 class="card-title">Orang Baik</h5>
                            <h3 class="card-text"> <b><?php echo $this->db->get("user")->num_rows() -1; ?> Orang
                                    Baik</b></h3>
                        </div>
                    </div>
                </div>
                <?php $total=0;
                    foreach ($DonasiAkumulasi as $dp) :
                    $total += $dp->nominal;
                    ?>
                <?php endforeach; ?>
                <div class="col-md-4">
                    <div class="card text-success border-success shadow mb-3" style="max-width: 20rem;">
                        <div class="card-body ">
                            <h5 class="card-title">Donasi Terkumpul (akumulasi)</h5>
                            <h3 class="card-text">Rp <b><?php echo number_format ($total,0,',','.') ?>,00</b></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-success border-success shadow mb-3" style="max-width: 20rem;">
                        <div class="card-body">
                            <h5 class="card-title">Donasi Masuk</h5>
                            <h3 class="card-text">
                                <b><?php echo $this->db->get_where("tb_invoice_donasi",array('status'=>1))->num_rows(); ?>
                                    Transaksi Sukses</b>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--   =========== news ============ -->
    <!-- ====Test PRIORITY -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/owl.carousel.js"></script>

    <!-- <div class="container-fluid col-md-12 ml-2 mt-5 mb-3"> -->
    <div class="carousel-inner ">
        <font color="black" size="5" face="comic sans ms">News</font>
    </div>
    <font color="gray" size="2" face="comic sans ms">Informasi penyaluar dan edukasi seputar SinergiSubuh</font>
    <section id="prioritas">
        <div class="row">
            <!-- <div class="col-md-12"> -->
            <div class="owl-carousel owl-theme">
                <?php foreach ($news as $nws): ?>
                <div class="item">

                    <form action="<?= base_url().'user/news/'.$nws->kd_news?>">
                        <button class="btn" type="submit">

                            <div class="card">
                                <img src="<?= base_url().'/assets/img/news/'.$nws->gambar_news?>" class="card-img-top"
                                    alt="...">
                                <div class="card-body">
                                    <p class="card-text"><b><?= $nws->judul_news ?></b></p>
                                    <div class="col-12" align="left">
                                        <small class="card-text"><?php echo time_ago($nws->tgl_post); ?></small>
                                    </div>
                                </div>
                            </div>
                        </button>
                    </form>
                </div>
                <?php endforeach; ?>
            </div>
            <!-- </div> -->
        </div>
    </section>
    <!-- </div> -->
    <!-- ====Test PRIORITY -->

    <!-- <div class="container-fluid col-md-12 ml-2 mt-5 mb-3"> -->
    <div class="carousel-inner ">
        <font color="black" size="5" face="comic sans ms">Pilih Donasi</font>
    </div>
    <font color="gray" size="2" face="comic sans ms">Terus menjadi #JembatanKebaikan dengan membantu sesama yang
        membutuhkan</font>
    <div class="row text-center mt-2 ml-3 mb-4">
        <?php foreach ($donasi as $nd): ?>
        <?php $progres =  $nd->perolehan_donasi /  $nd->target_donasi  *100;?>
        <div class="card ml-3 mt-3 shadow " style="width: 16rem ;">
            <img src="<?= base_url().'/assets/img/dokdonasi/'.$nd->gambar_donasi?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title mb-1"><?= $nd->nama_donasi ?></h5>
                <small><?=  word_limiter ($nd->deskripsi_donasi,5) ?></small><br>
                <div class="row text-center mt-10">
                    <div class="col-2">
                        <span class="badge badge-pill badge-danger mb-2">Rp
                            <?= number_format ($nd->perolehan_donasi, 0,',','.') ?></span><br>
                        <!-- ?= number_format( $jenis_donasi['target_donasi'], 0,',','.') ?> -->
                    </div>
                    <div class="col-md-7 ml-5">
                        <span
                            class="badge badge-pill badge-success mb-2">Rp.<?=  number_format ( $nd->target_donasi, 0,',','.' ) ?></span><br>

                    </div>
                </div>
                <div class="progress ">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $progres?>%"
                        aria-valuenow="<?=$nd->perolehan_donasi?>" aria-valuemin="0"
                        aria-valuemax="<?=$nd->target_donasi?>"><?= (int)$progres ?>%</div>
                </div>
                <?php echo anchor('User/pembayaran_donasi/'.$nd->id_donasi,'<div class="btn btn-sm  btn-success mt-2">Berdonasi</div>')?>
                <!-- ?php echo anchor('User/detail_donasi/'.$nd->id_donasi,'<div class="btn btn-sm btn-success mt-2">Detail</div>')?> -->
            </div>
        </div>

        <?php endforeach; ?>

    </div>
    <!-- /.container-fluid -->
</div>
<script>
var owl = $('.owl-carousel');
owl.owlCarousel({
    loop: false,
    margin: 10,
    responsiveClass: true,
    responsive: {
        0: {
            items: 1,
            nav: true
        },
        600: {
            items: 3,
            nav: false
        },
        1000: {
            items: 5,
            nav: true,
            loop: false
        }
    }
});

// });


// });
</script>