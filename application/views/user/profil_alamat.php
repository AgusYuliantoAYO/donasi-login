<!-- ==== RAJA ONKIR ======== -->



<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: f1af0ddefee7ec632633c86601ed584a"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $provinsi = json_decode($response,true);
}
?>
<!-- =============== -->




<ol class=" breadcrumb float-md-right mb-2 mr-5" style="background: #F5F5F5;">
    <li class="breadcrumb-item "><small><a href="http://localhost/donasi-login/User/profil/">Profil</a></small></li>
    <li class="breadcrumb-item active"><small><a
                href="http://localhost/donasi-login/User/profil_alamat/">Alamat</small></a>
    </li>
</ol>



<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <!-- <div class="col-lg-6">
                        ?= $this->session->flashdata('message');?>
                    </div> -->
        <!-- ========================== sweet alert ========== -->
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
        <?php if ($this->session->flashdata('flash')) : ?>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
        <!-- ?= $this->session->flashdata('flash')?>  -->
        <!-- ?= $this->session->flashdata('flash'); ?> -->

        <?php endif;?>
        <div class="flash-data" data-flashdata="<?= $this->session->unset_userdata('flash'); ?>"></div>
        <!-- ==================================================== -->
    </div>


    <!-- Card Profil -->
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <img src="<?= base_url('assets/img/profile/') . $user['image'];?>" class="card-img">
                            <!-- ================================== -->
                            <?php if($user['role_id']==2) : ?>
                            <tr>
                                <td colspan="7">
                                    <h9 style="align-center">
                                        <div class="alert alert-success" role="alert"> Member</div>
                                    </h9>
                                </td>
                            </tr>
                            <?php endif;?>
                            <!-- ========== -->
                            <?php if($user['role_id']==1) : ?>
                            <tr>
                                <td colspan="7">
                                    <h9 style="align-center">
                                        <div class="alert alert-success" role="alert"> Admin</div>
                                    </h9>
                                </td>
                            </tr>
                            <?php endif;?>
                            <!-- ================================  -->
                        </div>


                        <h7 class="card-text align-text-center">
                            <div class="text-muted">Join: <div class="btn btn-sm btn-secondary">
                                    <?= date('d F Y', $user['date_created']);?> </div>
                            </div>
                        </h7>



                        <!-- <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">?= $user ['name'];?></h5>
                            <h5 class="card-title">?= $user ['role_id'];?></h5>
                            <p class="card-text">?= $user ['alamat'];?></p>
                            <p class="card-text"> ?= $user ['wa'];?> </p>
                            <p class="card-text"> ?= $user ['email'];?> </p>
                            <p class="card-text"><small class="text-muted">Member since  
                                ?= date('d F Y', $user['date_created']);?>
                            </small></p>
                        </div>
                        </div> -->
                        <!-- <a  class="btn btn-sm collapse-item active" href="<php echo base_url('admin'); ?>">Dashboard</a>  -->
                        <br>
                        <!-- <hr class="sidebar-divider mt-3"> -->
                        <br>
                        <hr>
                        <div class="d-grid gap-2 col-9 mx-auto">
                            <?php echo anchor('User/profil/','<button class="btn btn-outline-primary mb-2" type="button"><i class="fas fa-address-card"></i> Data Diri</button>')?>
                            <?php echo anchor('User/profil_alamat/','<button class="btn btn-outline-primary mb-2 active" type="button"><i class="fas fa-map-marked-alt"></i> Alamat</button>')?>
                            <?php echo anchor('User/profil_ubahPass/','<button class="btn btn-outline-primary mb-2" type="button"><i class="fab fa-keycdn"></i> Ubah Sandi</button>')?>
                            <?php echo anchor('User/profil_poto/','<button class="btn btn-outline-primary mb-2 " type="button"><i class="fas fa-portrait"></i> Poto Profil</button>')?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card col-md-9 mb-4">
            <div class="card-header text-white  bg-secondary text-white">
                Alamat
            </div>

            <!-- ================ -->
            <div class="card-body col-md-12 mb-2">
                <div class="table-responsive">
                    <div class="form-group mb-2">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <tr>
                                <th>
                                    <!-- <div class="col-md-12"> -->
                                    <table class="table table-bordered table-hover table-striped">
                                        <div class="col-md-12 mb-2" align="right">
                                            <a href="" class="btn btn-warning " data-toggle="modal"
                                                data-target="#newSubMenuModal">
                                                Ubah Alamat Typo</a>
                                        </div>
                                        <tr>
                                            <!-- ======================== -->
                                            <th>No</th>
                                            <th>Alamat</th>
                                            <th>Action</th>
                                        </tr>
                                        <?php $i = 1; ?>
                                        <?php foreach ($data_alamat as $da): ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?php echo $da->alamat?></td>
                                            <!-- <td>?php echo $da->provinsi ?></td> -->
                                            <!-- <td>?php echo $da->kota ?></td> -->
                                            <!-- <td>?php echo $da->kota ?></td> -->
                                            <td>
                                                <!-- ?php foreach ($alamat_terima as $at): ?> -->
                                                <?php if($user['kota']==$da->kota) : ?>
                                                <div class="alert alert-success" role="alert"> Aktif</div>
                                                <?php endif;?>

                                                <?php if($user['kota']!=$da->kota) : ?>
                                                <form action=" <?= base_url('user/ubahAlamatUtama');?>" method="post">
                                                    <input type="hidden" class="form-control"
                                                        value="<?= $user['email'] ?>" id="id" name="id">
                                                    <input type="hidden" class="form-control" value="<?= $da->alamat ?>"
                                                        id="alamat" name="alamat">
                                                    <input type="hidden" class="form-control" value="<?= $da->kota ?>"
                                                        id="kotaTujuan" name="kotaTujuan">

                                                    <button type="submit" class="btn btn-danger">Aktifkan</button>
                                                </form>
                                                <?php endif;?>
                                            </td>

                                        </tr>
                                        <?php endforeach; ?>
                                    </table>
                                </th>
                            </tr>
                        </table>
                        <!-- </div>
             </div> -->


                        <!-- ============================== ALAMAT ================== -->
                        <!-- <div class="form-group">
                                <input type="text"  class="form-control" 
                                id="alamat" name="alamat" placeholder="Alamat">
                                <small class="form-text text-danger">?=form_error('alamat'); ?></small>
                        </div> -->

                        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </symbol>
                        </svg>
                        <!-- ==================== -->

                        <div class="alert alert-warning d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
                                <use xlink:href="#exclamation-triangle-fill" />
                            </svg>
                            <use xlink:href="#info-fill" />
                            </svg>
                            <div>
                                <b>Tulis Alamat</b> Secara <b>Lengkap</b> dan <b><i>Detail</i></b>.
                            </div>
                        </div>
                        <?= form_open_multipart('user/profil_alamat');?>
                        <div class="form-group">
                            <label for="full_address" class="col-form-label sr-only">Alamat Lengkap</label>
                            <textarea id="alamat" name="alamat" v-model="full_address" rows="5" class="form-control"
                                placeholder="Alamat Lengkap" required></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <!-- <label for="exampleFormControlSelect1"> Provinsi</label> -->

                                    <select name="provinsi" id="provinsi" class="form-control"
                                        id="exampleFormControlSelect1">
                                        <option value="">Provinsi</option>
                                        <?php
                                        if($provinsi['rajaongkir']['status']['code']=='200') {
                                        foreach ($provinsi['rajaongkir']['results'] as $pv ){
                    
                                            echo "<option value='$pv[province_id]' ".($pv['provinsi_id'] == $this->input->post('provinsi') ? "selected" : "")."> $pv[province] </option>";
                                        }
                                        }
                                        ?>
                                    </select>
                                    <small class="form-text text-danger"><?=form_error('provinsi'); ?></small>
                                </div>
                            </div>

                            <div class="form-group">
                                <select name="kota" id="kota" class="form-control" id="exampleFormControlSelect1">
                                    <option>Kota</option>
                                </select>
                                <small class="form-text text-danger"><?=form_error('kota'); ?></small>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="kode_pos" name="kode_pos"
                                placeholder="Kode Pos">
                            <small class="form-text text-danger"><?=form_error('kode_pos'); ?></small>
                        </div>
                        <!-- ========================== -->
                        <div class="form-group row justify-content-end">
                            <button type="submit" class="btn btn-success">Tambah</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



<!-- modal -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Ubah Alamat Lengkap</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <?php foreach ($alamat_terima as $dpr) : ?>
                    <form action=" <?= base_url('user/ubahAlamatUtamaDetail/'.$dpr->id_alamat);?>" method="post">
                        <label for="full_address" class="col-form-label sr-only">Alamat
                            Aktif</label>
                        <textarea id="alamat" name="alamat" v-model="full_address" rows="5"
                            class="form-control"><?= $dpr->alamat ?></textarea>
                </div>

                <input type="hidden" class="form-control" value="<?= $dpr->id_alamat ?>" id="id_alamat"
                    name="id_alamat">


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                </form>
                <?php endforeach;?>
            </div>

        </div>
    </div>
</div>






</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- variabel -->

<script>
document.getElementById('provinsi').addEventListener('change', function() {
    fetch("<?= base_url('user/kota/') ?>" + this.value, {
            method: 'GET',
        })
        .then((response) => response.text())
        .then((data) => {
            console.log(data)
            document.getElementById('kota').innerHTML = data
        })
})
</script>