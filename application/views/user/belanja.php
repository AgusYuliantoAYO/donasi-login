<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- ========================== sweet alert ========== -->
    <?php if ($this->session->flashdata('flash')) : ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <!-- <div class="flash-data" data-flashdata="?= $this->session->unset_flashdata('flash'); ?>"></div> -->
    <?php endif;?>

    <!-- =================================== -->

    <!-- ?php foreach ($subMenu as $sm) : ?> -->
    <!-- slider -->
    <div align="center">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li ml-5>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <!-- .Start ROW         -->

            <div class="row">
                <div class="carousel-inner col-md-7 mt-2 ">
                    <div class="carousel-item active ">
                        <img src="<?= base_url('/assets/img/slider/4.PNG');?>" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= base_url('/assets/img/slider/5.PNG');?>" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= base_url('/assets/img/slider/6.PNG');?>" class="d-block w-100" alt="...">
                    </div>
                </div>

                <div class="col-md-5">
                    <img src="<?= base_url('/assets/img/slider/3.PNG');?>" class="d-block w-50" align="left" alt="...">
                    <img src="<?= base_url('/assets/img/slider/2.PNG');?>" class="d-block w-50" align="left" alt="...">
                    <img src="<?= base_url('/assets/img/slider/1.PNG');?>" class="d-block w-100 " alt="...">
                </div>
                <!-- <div class="row"> -->
                <!-- </div> -->
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
        <!-- </div> -->
    </div>
    <!-- ........ -->

 


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
                <a class="btn btn-outline-success" class="dropdown-item" href="<?php echo base_url('user/makanan') ?>">
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
 
    <div class="row shodow text-center  mt-3 ml-1 mb-5">
        <?php foreach ($produkOk as $nd): ?>
        <div class="card ml-3 mt-3 " style="width: 15rem;">
            <img src="<?= base_url().'/assets/img/produk/'.$nd->gambar?>" class="card-img-top" alt="...">
            <div class="card-body" >
                <!-- <h5 class="hidden"><?= $nd->id_produk ?></h5> -->
                <h5 class="card-title mb-1"><?= $nd->nama_produk ?></h5>
                <small><?=  word_limiter ($nd->keterangan, 5) ?></small><br>
                <small>Stok: <?=   $nd->stok ?></small><br>
                <span class="badge badge-pill badge-warning mb-3">Rp. <?php echo number_format ($nd->harga_jual
                , 0,',','.')?></span><br>

                <!-- ========================================== -->
                <div class="row" align="center">
                    <div class="col-6">
                    
                    <?php
                            $stok=$nd->stok;
                            if($stok<=0)
                            { ?>
                                <small class="text-danger"><b>Habis !!!</b></small>  
                            <?php 
                            }else{
                            ?>
                            <?php echo anchor('User/detail/'.$nd->id_produk,'<div class="btn btn-sm btn-primary">Detail</div>')?>
                            </button>
                        <?php 
                    }
                     ?>

                        
                    </div>
                    <div class="col-6">
                        <form action="<?= base_url('user/tambah_keranjang/'.$nd->id_produk);?>" method="post">
                            <input type="hidden" class="form-control" value="1" id="qty_satu" name="qty_satu">
                            <?php
                            $stok=$nd->stok;
                            if($stok<=0)
                            { ?>
                                <button type="submit" class="btn btn-success" disabled> <i class="fas fa-cart-arrow-down"></i>         </button>    
                            <?php 
                            }else{
                            ?>
                            <button type="submit" class="btn btn-success"> <i class="fas fa-cart-arrow-down"></i>
                            </button>
                        <?php 
                    }
                     ?>
                        </form>
                    </div>
                </div>
                <!-- <a href="#" class="add-to-chart add-cart d-flex justify-content-center align-items-center mx-1"
                data-sku="?php echo $nd->sku; ?>" data-name="?php echo $nd->name; ?>"
                data-price="?php echo ($nd->current_discount > 0) ? ($nd->price - $nd->current_discount) : $nd->price; ?>"
                data-id="?php echo $nd->id; ?>"> -->
            </div>

        </div>

        <?php endforeach; ?>
        <!-- ?= $this->pagination->create_links();?> -->
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->