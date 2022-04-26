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

 <div class="container">

     <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
         <div class="card-body p-0">
             <!-- Nested Row within Card Body -->
             <div class="row">
                 <!-- Gambar Samping -->
                 <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                 <div class="col-lg">
                     <div class="p-5">
                         <!-- <div class="col"> -->
                         <div class="col-12" align="center">
                             <div class="col-5">
                                 <!-- <div class="carousel-item active col-md-5 mr-1"> -->
                                 <img src="<?= base_url('/assets/img/logo/LogoSSokbgtpolsip.png');?>"
                                     class="d-block w-100" alt="...">
                                 <!-- </div> -->
                             </div>
                             <div class="col-12">
                                 <div class="text-center">
                                     <h1 class="h4 text-gray-900 mb-4"><b>Buat Akun Baru</b></h1>
                                 </div>
                             </div>
                             <!-- </div> -->
                         </div>
                         <form class="user" method="post" action="<?= base_url('auth/reg');?>">
                             <!-- Nama Pendek dan Panjang -->
                             <!-- <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="First Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Last Name">
                                    </div>
                                </div> -->
                             <div class="form-group">
                                 <input type="text" class="form-control form-control-user" name="name" id="name"
                                     placeholder="Nama Lengkap" value="<?= set_value('name');?>">
                                 <?=form_error('name','<small class="text-danger pl-3">','</small>');?>
                             </div>

                             <div class="form-group">
                                 <input type="number" class="form-control form-control-user" name="wa" id="wa"
                                     placeholder="Whatsapp" value="<?= set_value('wa');?>">
                                 <?=form_error('wa','<small class="text-danger pl-3">','</small>');?>
                             </div>

                             <div class="form-group">
                                 <input type="text" class="form-control form-control-user" name="email" id="email"
                                     placeholder="Email Aktif" value="<?= set_value('email');?>">
                                 <?=form_error('email','<small class="text-danger pl-3">','</small>');?>
                             </div>

                             <div class="form-group row">
                                 <div class="col-sm-6 mb-3 mb-sm-0">
                                     <input type="password" class="form-control form-control-user" name="password1"
                                         id="password1" placeholder="Password">
                                     <?=form_error('password1','<small class="text-danger pl-3">','</small>');?>
                                 </div>
                                 <div class="col-sm-6">
                                     <input type="password" class="form-control form-control-user" name="password2"
                                         id="password2" placeholder="Repeat Password">
                                 </div>
                             </div>


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
                             <!-- ==================== ALAMAT ==============-->
                             <div class="alert alert-warning d-flex align-items-center" role="alert">
                                 <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                                     aria-label="Warning:">
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
                                 <textarea id="alamat" name="alamat" v-model="full_address" rows="5"
                                     class="form-control" placeholder="Alamat Lengkap" required></textarea>
                             </div>

                             <div class="row">
                                 <div class="col-md-6">

                                     <div class="form-group">
                                         <!-- <label for="exampleFormControlSelect1"> Provinsi</label> -->

                                         <select name="provinsi" id="provinsi" class="form-control">
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
                                     <select name="kota" id="kota" class="form-control">
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

                             <button type="submit" class="btn btn-success btn-user btn-block">
                                 Daftar
                             </button>
                             <!-- Gmail dan Fb -->
                             <!-- <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a> -->
                         </form>
                         <hr>
                         <div class="text-center">
                             <a class="small" href="<?= base_url('auth/forgotpassword');?>">Lupa Password?</a>
                         </div>
                         <div class="text-center">
                             <a class="small" href="<?=base_url('auth');?>">
                                 <b>Sudah punya akun?</b> Login sekarang!</a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

 </div>


 <script>
document.getElementById('provinsi').addEventListener('change', function() {
    fetch("<?= base_url('auth/kota/') ?>" + this.value, {
            method: 'GET',
        })
        .then((response) => response.text())
        .then((data) => {
            console.log(data)
            document.getElementById('kota').innerHTML = data
        })
})
 </script>