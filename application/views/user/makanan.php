<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- ?php foreach ($subMenu as $sm) : ?> -->
    <!-- slider -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li ml-5>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <!-- .Start ROW         -->

        <div class="row">
            <div class="carousel-inner col-md-6">
                <div class="carousel-item active">
                    <img src="<?= base_url('/assets/img/slider/4.PNG');?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('/assets/img/slider/5.PNG');?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('/assets/img/slider/6.PNG');?>" class="d-block w-100" alt="...">
                </div>
                <div class="col-6 ml-4 mt-4">
                    <!-- <form action="<?= base_url('user/berdonasi');?>" method="post">
                        <button action="<?=base_url('user/berdonasi');?>" method="post"
                            class="btn btn-success btn-lg">Berdonasi Sekarang !!!</button>
                    </form> -->
                </div>
            </div>
            <!-- ?php endforeach;?> -->
 
            <div class="carousel-inner col-md-6">
                <div class="carousel-item active">
                    <img src="<?= base_url('/assets/img/slider/1.PNG');?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('/assets/img/slider/2.PNG');?>" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('/assets/img/slider/3.PNG');?>" class="d-block w-100" alt="...">
                </div>
            </div>
        </div>

        <!-- .END ROW         -->
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

     <!-- =========KATEGORI=================== -->
    <!-- Three columns of text below the carousel -->
    <div class="col-md-12" align="center">
        <div class="row mt-3">
            <!-- <div class="col-12" align="center"> -->


            <div class="col-3">
                <a class="btn btn-outline-success" href="<?php echo base_url('user/fashion') ?>">
                    <i class="fas fa-tshirt"></i>
                    <!--<text>Fashion</text>-->
                </a>
            </div>
            <div class="col-3">
                <a class="btn btn-outline-success" href="<?php echo base_url('user/merchant') ?>">
                    <i class="fas fa-gifts"></i>
                    <!--<text>Merchant</text>-->
                </a>
            </div>
            <div class="col-3">
                <a class="btn btn-outline-success active" class="dropdown-item" href="<?php echo base_url('user/makanan') ?>">
                    <i class="fas fa-utensils"></i>
                    <!--<text>Makanan</text>-->
                </a>
            </div>
            <div class="col-3">

                <a class="btn btn-outline-success" href="<?php echo base_url('user/elektronik') ?>">
                    <i class="fas fa-robot"></i>
                    <!--<text>Elektronik</text>-->
                </a> 
            </div>
        </div>
    </div>
    <!-- ================================= -->

<!-- Page Heading -->
<!-- <h1 class="h3 mb-4 text-gray-800">?= $title; ?></h1> -->
<ol class="breadcrumb float-sm-left mb-2 mr-5" style="background: #F5F5F5;">
    <li class="breadcrumb-item active"><small><a
                href="http://localhost/donasi-login/user/belanja"><b>Belanja</b></a></small>
    <li class="breadcrumb-item active"><small><a
                href="http://localhost/donasi-login/user/makanan"><b>Makanan</b></a></small>
        <!-- <li class="breadcrumb-item "><a href="#">Dashboard</a></li> -->
</ol>
<div class="row text-center mt-3">
    <?php foreach ($makanan as $nd): ?>
    <div class="card ml-3 mt-3" style="width: 16rem;">
        <img src="<?= base_url().'/assets/img/produk/'.$nd->gambar?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title mb-1"><?= $nd->nama_produk ?></h5>
            <small><?= $nd->keterangan ?></small><br>
            <span class="badge badge-pill badge-success mb-3">Rp. <?php echo number_format ($nd->harga_jual
                , 0,',','.')?></span><br>

            <!-- ========================================== -->
            <div class="row" align="center">
                <div class="col-md-6">
                    <?php echo anchor('User/detail/'.$nd->id_produk,'<div class="btn btn-sm btn-primary">Detail</div>')?>
                </div>
                <div class="col-md-6">
                    <form action="<?= base_url('user/tambah_keranjang/'.$nd->id_produk);?>" method="post">
                        <input type="hidden" class="form-control" value="1" id="qty_satu" name="qty_satu">
                        <button type="submit" class="btn btn-success"> <i class="fas fa-cart-arrow-down"></i>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <?php endforeach; ?>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->