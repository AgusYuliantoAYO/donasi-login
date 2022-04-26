   <!-- Footer -->
   <footer class="sticky-footer bg-gradient-success">
       <div class="container my-auto">
           <div class="col-md-12">
               <div class="row">
                   <div class="col-md-5">
                       <div class="carousel-item active mr-2">
                           <div class="col-md-7 ml-2 mb-2">
                               <img src="<?= base_url('/assets/img/logo/LogoSSokbgtpolsip.png');?>"
                                   class="d-block w-100" alt="...">
                           </div>
                       </div>


                       <!-- <span style="color:white;font-weight:bold"> </span> -->
                       <p style="color:white">SinergiSubuh.id merupakan platform penggalangan dana online yang dikelola
                           oleh Komunitas AILERON HAMASAH untuk menghimpun dana Infak, Sedekah & Wakaf melalui
                           berbagai program yang dihadirkan.</p>

                       <div class="row">
                           <div class="col-1">
                               <a class="nav-link" href="https://www.instagram.com/aileronhamasah/"
                                   aria-expanded="true">
                                   <!-- <i class="fas fa-fw fa-instagram"></i> -->
                                   <i style="color:white;" class="fab fa-fw fa-instagram"></i>
                               </a>
                           </div>

                           <div class="col-1">
                               <a class="nav-link" href="https://www.facebook.com/Aileron-Hamasah-108684780676168"
                                   aria-expanded="true">
                                   <i style="color:white;" class="fab fa-fw fa-facebook"></i>
                               </a>
                           </div>

                           <div class="col-1">
                               <a class="nav-link" href="https://www.youtube.com/channel/UCV2cOhiXHLQDV1FP4IYUb7A"
                                   aria-expanded="true">
                                   <i style="color:white;" class="fab fa-fw fa-youtube"></i>
                               </a>
                           </div>
                       </div>
                   </div>
                   <div class="col-md-3">
                       <p style="color:white;font-weight:bold">Hubungi Kami:</p>
                       <p style="color:white">081226827411</p>
                       <p style="color:white">aileron.hamasah.info@gmail.com</p>

                   </div>
                   <div class="col-md-3">
                       <p style="color:white;font-weight:bold">Alamat:</p>
                       <p style="color:white">Made RT21, Gabus, Ngrampal, Sragen, Jawa Tengah.</p>

                   </div>
               </div>

           </div>

           <div class="copyright text-center my-auto">
               <span style="color:white; font-weight:bold">Copyright &copy; AYo Donasi <?= date
                        ('Y')?></span>
           </div>


       </div>
   </footer>
   <!-- End of Footer -->

   </div>
   <!-- End of Content Wrapper -->

   </div>
   <!-- End of Page Wrapper -->

   <!-- Scroll to Top Button-->
   <a class="scroll-to-top rounded" href="#page-top">
       <i class="fas fa-angle-up"></i>
   </a>

   <!-- Logout Modal-->
   <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">×</span>
                   </button>
               </div>
               <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
               <div class="modal-footer">
                   <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                   <a class="btn btn-primary" href="<?=base_url('auth/logout');?>">Logout</a>
               </div>
           </div>
       </div>
   </div>

   <!-- Bootstrap core JavaScript-->
   <script src="<?= base_url('assets/');?>vendor/jquery/jquery.min.js"></script>
   <script src="<?= base_url('assets/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

   <!-- Core plugin JavaScript-->
   <script src="<?= base_url('assets/');?>vendor/jquery-easing/jquery.easing.min.js"></script>

   <!-- Custom scripts for all pages-->
   <script src="<?= base_url('assets/');?>js/sb-admin-2.min.js"></script>

   <script>
$('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);

});



$('.form-check-input').on('click', function() {
    const menuId = $(this).data('menu');
    const roleId = $(this).data('role');

    $.ajax({
        url: "<?= base_url('admin/changeaccess'); ?>",
        type: 'post',
        data: {
            menuId: menuId,
            roleId: roleId
        },
        success: function() {
            document.location.herf = "<?= base_url('admin/roleaccess/'); ?>" + roleId;


        }
    });

});
   </script>



   <!-- Stylesheets -->
   <link href="<?= base_url('assets/');?>css/owl.carousel.min.css" rel="stylesheet">
   <link href="<?= base_url('assets/');?>css/owl.theme.default.min.css" rel="stylesheet">

   </body>

   </html>