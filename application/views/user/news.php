<div class="mb-5">
    <ol class=" breadcrumb float-md-right mb-2 mr-2" style="background: #F5F5F5;">
        <li class="breadcrumb-item "><small><a href="http://localhost/donasi-login/user">Dashboard</a></small></li>
        <li class="breadcrumb-item "><small><a href="http://localhost/donasi-login/user">News</a></small></li>
    </ol>
</div>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- ============================== -->
    <?php foreach ($pilihanNews as $Pn): ?>
    <div class="card border-success mb-3" style="max-width: 100rem;">
        <div align="center">
            <font color="black" size="5" face="comic sans ms">
                <b>
                    <div class="card-header"><?= $Pn->judul_news ?></div>
                </b>
            </font>
        </div>
        <img src="<?= base_url().'/assets/img/news/'.$Pn->gambar_news?>" class="card-img" alt="...">
        <div class="card-body text-dark">

            <?php if ($Pn->kategori_news==1) :?>
            <div class="card border-warning mb-3" style="max-width: 18rem;">
                <div class="card-header">Rincian</div>
                <div class="card-body">
                    <h5 class="card-title">Rincian</h5>
                    <p class="card-text">Nominal Penyaluran </br><b>Rp
                            <?= number_format($Pn->nominal_salur,0,',','.')?></b>
                    </p>
                    <p class="card-text">Tgl Penyaluran </br><b><?= format_indo($Pn->tgl_distribusi)?></b>
                    </p>
                </div>
            </div>
            <?php endif;?>

            <h5 class="card-title"><?=$Pn->deskripsi_news ?></h5>
            <p class="card-text"><?php echo time_ago($Pn->tgl_post); ?></p>
        </div>
    </div>
    <?php endforeach; ?>
    <!-- ================================== -->
    <a href="<?php echo base_url('user/berdonasi') ?>">
        <div class="btn btn-sm btn-danger">Kembali</div>
        <a href="#" class="badge badge-success btn-komen" data-kd="<?= $kdNews->kd_news;?>">
            Komentar</a>



        <!-- ======================== KOMENTAR -->
        <h5 class="mt-3"><b>Komentar :</b></h5>

        <?php
              $kd_news =  $kdNews->kd_news;
              $query = $this->db->query("SELECT * FROM data_komentar WHERE status_komen='0' AND kd_news = '$kd_news' ORDER BY tgl_komen  DESC");
              foreach ($query->result() as $k):
            ?>
        <!-- ================ KOmentar -->
        <!-- ?php foreach ($komentar as $k): ?> -->
        <div class="col-xl-10 col-md-6 mb-2 mt-3 ml-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">

                            <div class="row">
                                <img class="img-profile rounded-circle col-1"
                                    src="<?=base_url('assets/img/profile/') . $k->image?>">
                                <div class="col-md-7">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        <?php if($k->email=="ayo.agusyulianto@gmail.com"):?>
                                        <b><?=$k->name;?> <i class="fas fa-check-circle"></i> </b>
                                        <?php endif;?>
                                        <?php if($k->email != "ayo.agusyulianto@gmail.com"):?>
                                        <b><?=$k->name;?></b>
                                        <?php endif;?>
                                    </div>
                                    <small>
                                        <?= time_ago($k->tgl_komen); ?>
                                    </small>
                                </div>
                            </div>

                            <div class="h7 mb-0 font-weight-bold text-gray-800 mt-2">
                                <?= $k->komentar; ?></div>

                        </div>
                    </div>

                    <div class="col-12" align="right">
                        <?php
                        $kd_news = $kdNews->kd_news;
                        $id_komentar = $k->id_komentar;
                        $queryBalasan = $this->db->query("SELECT * FROM data_komentar WHERE status_komen='$id_komentar' AND kd_news = '$kd_news' ORDER BY tgl_komen  DESC");
                        
                    ?>

                        <!-- ===========coba komen  -->
                        <!-- <form action="<?= base_url('user/news/'.$kd_news);?>" method="post">
                            <div class="form-group">
                                <input type="hidden" class="form-control" name="getIDkomentar"
                                    value="<?= $id_komentar?>">
                            </div> -->

                        <div class="row">

                            <div class="col-12" align="right">

                                <a class=" btn-show" data-id="<?= $k->id_komentar;?>">
                                    <button class="btn text-dark" id="btnID"
                                        onclick="getDataFromButton('<?= $k->id_komentar;?>')"><b><?= $queryBalasan->num_rows();?></b>
                                        Balasan</button>
                                </a>
                                <!-- </form> -->
                                <!-- ============================ -->



                                <!-- <br><button class="btn btn-primary"
                            onclick="document.getElementById('?= $k->id_komentar?>')">Balas</button> -->
                                <a href="#" class="btn btn-primary btn-balas" data-kd="<?= $kdNews->kd_news;?>"
                                    data-id="<?= $k->id_komentar;?>" data-kom="<?= $k->komentar;?>"
                                    data-nam="<?= $k->name;?>">
                                    Balas</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================ KOmentar -->
        <!-- ================ Responsif Balasan Tampil -->

        <?php 
             $kd_news = $kdNews->kd_news;
             $id_komentar = $k->id_komentar;
            $query = $this->db->query("SELECT * FROM data_komentar WHERE status_komen='$id_komentar' AND kd_news = '$kd_news' ORDER BY tgl_komen  ASC"); ?>




        <?php 
        // $a= $IDkomen;
        // $a= 6;
        // $a=  $getIDkomentar; 
        // if($a==$id_komentar):
        ?>
        <div id="showHide<?= $id_komentar ?>" class="showHide">
            <!-- <div class="form-group col-3">
                <input type="text" class="form-control data_id" name="data_id" placeholder="buat cek ID masuk...."
                    readonly>
            </div> -->
            <!-- ========= bales komen  -->


            <!-- <button class="btn text-danger ml-5" id="tutupBalasan" data-id="?= $k->id_komentar;?>"><b> Tutup
                    Balasan</b></button> -->
            <!-- ===========coba Tutup balasan komen  -->
            <a class="btn btn-hide" data-id="<?= $k->id_komentar;?>">
                <button class="btn text-danger ml-5"><b>Tutup
                        Balasan</b></button>
            </a>
            <!-- ============================ -->

            <?php
            foreach ($query->result() as $balasan):
        ?>
            <!-- ========= bales komen  -->

            <!-- <button class="btn btn-danger" id="tutupBalasan"> Tutup Balasan</button> -->
            <div class="col-12" align="right">
                <div class="col-xl-10  mb-1 mt-1 ml-7">
                    <div class="card border-left-success shadow  h-100 py-2">
                        <div class="card-body">
                            <div class="col-12" align="left">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">

                                        <div class="row">

                                            <img class="img-profile rounded-circle col-sm-1"
                                                src="<?=base_url('assets/img/profile/') . $balasan->image;?>">
                                            <div class="col-7">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    <?php if($balasan->email=="ayo.agusyulianto@gmail.com"):?>
                                                    <b><?=$balasan->name;?> <i class="fas fa-check-circle"></i> </b>
                                                    <?php endif;?>
                                                    <?php if($balasan->email != "ayo.agusyulianto@gmail.com"):?>
                                                    <b><?=$balasan->name;?></b>
                                                    <?php endif;?>
                                                </div>
                                                <small>
                                                    <?= time_ago($balasan->tgl_komen); ?>
                                                </small>
                                            </div>
                                        </div>

                                        <div class="h7 mb-0 font-weight-bold text-gray-800 mt-2">
                                            <?= $balasan->komentar; ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-12" align="right">

                            <a href="#" class="btn btn-primary btn-balas2" data-kd="?= $kdNews->kd_news;?>"
                                data-id="?= $balasan->id_komentar;?>" data-kom="?= $balasan->komentar;?>"
                                data-nam="?= $balasan->name;?>">
                                Balas</a>
                        </div> -->
                            </div>
                            <!-- <div class="col-12" align="right"> -->
                            <!-- <br><button class="btn btn-primary"
                            onclick="document.getElementById('?= $k->id_komentar?>')">Balas</button> -->
                            <!-- <a href="#" class="btn btn-primary btn-balas" data-kd="?= $kdNews->kd_news;?>"
                            data-id="?= $k->id_komentar;?>">
                            Balas</a>
                    </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>


        <?php 
             // endif;
            ?>



        <?php endforeach; ?>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal 4 -->
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<div class="modal fade" id="komenModal" tabindex="-1" role="dialog" aria-labelledby="PembayaranModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="PembayaranModalLabel">Komentar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('user/komentarNews');?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control data_kd" name="data_kd">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control data_kd" name="data_kd">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="email" value="<?= $user['email'];?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="name" value="<?= $user['name'];?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="image" value="<?= $user['image'];?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="komentar" placeholder="Tulis komentar...."
                            autofocus>
                    </div>
                    <!-- <div class="form-group">
                    <label>#</label>
                    <input type="text" class="form-control data_name" name="data_name">
                </div> -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Komentar</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Modal 4 -->
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<div class="modal fade" id="balasModal" tabindex="-1" role="dialog" aria-labelledby="PembayaranModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="PembayaranModalLabel">Balas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('user/balaskomentarNews');?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control data_id" name="data_id">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control data_kd" name="data_kd">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control col-5 data_nam" name="data_nam" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control data_kom" name="data_kom" readonly>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="email" value="<?= $user['email'];?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="name" value="<?= $user['name'];?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="image" value="<?= $user['image'];?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="balasan" placeholder="Tulis balasan...."
                            autofocus>
                    </div>
                    <!-- <div class="form-group">
                    <label>#</label>
                    <input type="text" class="form-control data_name" name="data_name">
                </div> -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Balas</button>
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
    $('.showHide').hide();
    // get Pembayaran
    $('.btn-komen').on('click', function() {
        // get data from button edit
        const kd = $(this).data('kd');
        // const name = $(this).data('name');
        // Set data to Form Edit
        $('.data_kd').val(kd);
        // $('.data_name').val(name);
        $('#komenModal').modal('show');
    });


});
</script>

<script>
$(document).ready(function() {
    // get Pembayaran
    $('.btn-balas').on('click', function() {
        // get data from button edit
        const id = $(this).data('id');
        const kd = $(this).data('kd');
        const kom = $(this).data('kom');
        const nam = $(this).data('nam');
        // const name = $(this).data('name');
        // Set data to Form Edit
        $('.data_id').val(id);
        $('.data_kd').val(kd);
        $('.data_kom').val(kom);
        $('.data_nam').val(nam);
        // $('.data_name').val(name);
        $('#balasModal').modal('show');
    });
});
</script>



<!-- <script>
$(document).ready(function() {
    // get Pembayaran
    $('.btn-balas2').on('click', function() {
        // get data from button edit
        const id = $(this).data('id');
        const kd = $(this).data('kd');
        const kom = $(this).data('kom');
        const nam = $(this).data('nam');
        // const name = $(this).data('name');
        // Set data to Form Edit
        $('.data_id').val(id);
        $('.data_kd').val(kd);
        $('.data_kom').val(kom);
        $('.data_nam').val(nam);
        // $('.data_name').val(name);
        $('#balasModal').modal('show');
    });
});
</script> -->


<!-- <script>
function tampilBalasan() {
    var x = document.getElementById("tampilBalasan");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script> -->


<!-- ============== Sementara di HIDE dulu  -->
<!-- <script>
$(document).ready(function() {
    $("#tutupBalasan").click(function() {
        const id = $(this).data('id');
        $('.data_id').val(id);

        $("#show").hide(1000);
    })

    $("#tampilBalasan").click(function() {
        const id = $(this).data('id');
        $('.data_id').val(id);

        $("#show").show(1000);
    })
});
</script> -->

<script>
$(document).ready(function() {
    $('.btn-show').click(function() {
        const id = $(this).data('id');
        $('.data_id').val(id);
        // $("#data_id").val(id);
        // if (id == id_komentar) {
        $("#showHide" + id).show(1000);

        // } else {
        //     $("#showHide").hide(1000);

        // }
    })

    $('.btn-hide').click(function() {
        const id = $(this).data('id');
        $('.data_id').val(id);

        $("#showHide" + id).hide(1000);
    })

});
</script>



<script>
$('#btnID').click(function() {
    //Some code
    $("#data_id").val(id)
});
</script>