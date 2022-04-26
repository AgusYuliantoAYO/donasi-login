<ol class="breadcrumb float-sm-right mb-2 mr-5" style="background: #F5F5F5;">
    <li class="breadcrumb-item active"><small><a href="http://localhost/donasi-login/user">Dashboard</a></small>
    <li class="breadcrumb-item active"><small><a
                href="http://localhost/donasi-login/user/belanja_masuk">Orderku</a></small></li>
    <!-- <li class="breadcrumb-item "><a href="#">Dashboard</a></li> -->
</ol>


<div class="container-fluid ">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- <h4>Belanjaku</h4> -->
    <!-- <h5>Results : ?= $total_rows; ?></h5> -->
    <div class="card-body">
        <!--========== //Search ==============-->

        <div class="card shadow mb-4 ml-1 col-md-12">
            <div class="card-header bg-secondary py-3">
                <h6 class="m-0 font-weight-bold  text-white">Belum Transfer</h6>
            </div>


            <div class="card-body">
                <div class="table-responsive">
                    <!-- <h5>Results : ?= $total_rows; ?></h5> -->
                    <!-- ====================== -->
                    <table class="table table-bordered col-md-12" width="100%" cellspacing="0">
                        <!-- <div class="table-responsive"> -->
                        <thead class="bg-secondary text-white">
                            <tr>
                                <th><small><b>ID</small></th>
                                <!-- <th><small><b>ID Donasi</small></th> -->
                                <!-- <th><small><b>Nama Donasi</small></th> -->
                                <!-- <th><small><b>Nominal</small></th> -->
                                <!-- <th><small><b></small></th> -->
                                <th><small><b>Nominal</small></th>
                                <th><small><b>Metode</small></th>
                                <th><small><b>Tgl</small></th>
                                <th><small><b>Bank</small></th>
                                <th><small><b>VA (rekening)</small></th>
                                <th><small><b>Status</small></th>
                                <th><small><b>Aksi</small></th>
                                <!-- </small> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($donasiMasukBaru as $ombTF): ?>
                            <tr>
                                <td><?php echo $ombTF->order_id ?></td>
                                <!-- <td><small>?php echo $ombTF->id_donasi ?></small></td> -->
                                <!-- <td><small>?php echo $ombTF->email ?></small></td> -->
                                <!-- <td><small>?php echo $ombTF->name ?></small></td> -->
                                <!-- <td><small>?php echo $ombTF->nama_donasi ?></small></td> -->
                                <!-- <td><small><b>Rp ?php echo number_format ($ombTF->nominal,0,',','.') ?></b></small></td> -->
                                <!-- <td><small>?php echo $ombTF->pesan ?></small></td> -->
                                <td><small>Rp <?php echo number_format ($ombTF->gross_amount,0,',','.') ?></small></td>
                                <td><small><?php echo $ombTF->payment_type ?></small></td>
                                <td><small><?php echo $ombTF->transaction_time ?></small></td>
                                <td><small><?php echo $ombTF->bank ?></small></td>
                                <td><small><?php echo $ombTF->va_number ?></small></td>
                                <!-- <td><small>?php echo $ombTF->status_code ?></small></td> -->
                                <td>
                                    <?php if($ombTF->status_code==201) { ?>
                                    <h9 style="align-center">
                                        <small>
                                            <div class="badge bg-warning">Pending</div>
                                        </small>
                                    </h9>
                                    <?php 
                        } else { 
                        ?>
                                    <div class="badge bg-danger">-</div>
                                    <?php
                      }
                      ?>
                                </td>

                                <!-- <td><small>?php echo $ombTF->pdf_url ?></small></td> -->

                                <td>
                                    <a href="<?= $ombTF->pdf_url?>" target="_blank"
                                        class="btn btn-sm col-md-12 btn-success">Download
                                    </a>
                                    <a href="<?=base_url();?>user/batalDonasi/<?=$ombTF->order_id?>"
                                        class="btn btn-sm col-md-12 btn-danger tombol-hapus">Batal</a>
                                </td>
                                </form>

                            </tr>

                            <?php endforeach; ?>
                        </tbody>
                        <?php if(empty($donasiMasukBaru)) : ?>
                        <tr>
                            <td colspan="8">
                                <div class="alert alert-danger" role="alert"> Data Tidak Ada !!!
                                </div>
                            </td>
                        </tr>
                        <?php endif;?>
                </div>
                </table>

            </div>
        </div>
    </div>
</div>
</div>
<!-- </div> -->

<!-- Modal 4 -->
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<div class="modal fade" id="PembayaranModal" tabindex="-1" role="dialog" aria-labelledby="PembayaranModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="PembayaranModalLabel">Pembayaran Donasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('user/konfirmasiPembayaranDonasi');?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control data_id" name="data_id">
                    </div>
                    <!-- <div class="form-group">
                    <label>#</label>
                    <input type="text" class="form-control data_name" name="data_name">
                </div> -->
                    <b class="text-success">Transfer Sekarang !!!</b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Transfer</button>
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

    // get Pembayaran
    $('.btn-pembayaran').on('click', function() {
        // get data from button edit
        const id = $(this).data('id');
        // const name = $(this).data('name');
        // Set data to Form Edit
        $('.data_id').val(id);
        $('.data_name').val(name);
        $('#PembayaranModal').modal('show');
    });


});
</script>