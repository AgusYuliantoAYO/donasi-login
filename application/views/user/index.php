<ol class="breadcrumb float-sm-right mb-2 mr-5" style="background: #F5F5F5;">
    <li class="breadcrumb-item active"><small><a href="http://localhost/donasi-login/user">Dashboard</a></small>
    <li class="breadcrumb-item active"><small><a href="http://localhost/donasi-login/user">News</a></small></li>
    <!-- <li class="breadcrumb-item "><a href="#">Dashboard</a></li> -->
</ol>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- ?php foreach  ($news as $nws): ?>
 
    <div class="card text-center mb-2">
        <div class="card-header">
            ?= $nws->kategori_news ?>
        </div>
        <div class="card-body card-primary">
            <h5 class="card-title ">?= $nws->judul_news ?></h5>
            <p class="card-text">?= word_limiter ($nws->deskripsi_news,10) ?></p>
            <a href="#" class="btn btn-primary">Selengkapnya</a>
        </div>
        <div class="card-footer text-muted">
            ?php echo time_ago($nws->tgl_post); ?>
        </div> 
    </div>
    ?php endforeach; ?> -->

    <?php foreach ($news as $nws): ?>

    <form action="<?= base_url().'user/news/'.$nws->kd_news?>">
        <button class="btn" type="submit">
            <div class="card bg-dark text-white">
                <img src="<?= base_url().'/assets/img/news/'.$nws->gambar_news?>" class="card-img" alt="...">
                <div class="card-img-overlay ">
                    <h5 align="left" class="card-title"><b class="stroke">
                            <font size="6" face="comic sans ms"><?= $nws->judul_news ?></font>
                        </b></h5>
                    <p align="left" class="card-text"><?=  word_limiter ($nws->deskripsi_news,5) ?></p>
                    <p align="left" class="card-text"><b
                            class="badge badge-pill badge-danger"><?php echo time_ago($nws->tgl_post); ?></b></p>
                </div>
            </div>
        </button>
    </form>

    <?php endforeach; ?>
    <!-- ?php echo anchor('user/detail_riwayat_belanja/'.$nws->kd_news,'<div class="btn btn-sm btn-primary">Detail</div>') ?> -->



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<style type="text/css">
/* body {
    font-family: 'Noto Sans';
    padding: 15% 20%;
    background: #00897b;
    text-align: center;
} */

.stroke {
    /* font-size: 100px; */
    color: #fff;
    font-weight: bolder;
    -webkit-text-stroke: 0.05em #000;
}
</style>