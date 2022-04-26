   <!-- Footer -->
   <footer class="sticky-footer bg-white">
       <div class="container my-auto">
           <div class="copyright text-center my-auto">
               <span>Copyright &copy; AILERON Hamasah <?= date
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
                   <h5 class="modal-title" id="exampleModalLabel">Yakin ingin LogOut ?</h5>
                   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">×</span>
                   </button>
               </div>
               <div class="modal-body">Klik "LogOut" untuk keluar !</div>
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

   <!-- ============ sweet alert =============== -->
   <script src="<?= base_url(); ?>/assets/js/sweetalert2.all.min.js"></script>
   <script src="<?= base_url(); ?>/assets/js/myscript.js"></script>
   <!-- ========================================= -->
   <!-- ===================== -->
   <script>
$(document).ready(function() {

    var quantity = 0;
    $('.quantity-right-plus').click(function(e) {

        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());

        // If is not undefined
        $('#quantity').val(quantity + 1);
        $('.cart-btn').attr('data-qty', quantity + 1);
        // Increment
    });

    $('.quantity-left-minus').click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());

        // If is not undefined

        // Increment
        if (quantity > 0) {
            $('#quantity').val(quantity - 1);
            $('.cart-btn').attr('data-qty', quantity - 1);
        }
    });

});
   </script>
   <!-- ================ -->

   <script>
function increment_quantity(cart_id) {
    var inputQuantityElement = $("#input-quantity-" + cart_id);
    var newQuantity = parseInt($(inputQuantityElement).val()) + 1;
    save_to_db(cart_id, newQuantity);
}

function decrement_quantity(cart_id) {
    var inputQuantityElement = $("#input-quantity-" + cart_id);
    if ($(inputQuantityElement).val() > 1) {
        var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
        save_to_db(cart_id, newQuantity);
    }
}

function save_to_db(cart_id, new_quantity) {
    var inputQuantityElement = $("#input-quantity-" + cart_id);
    $.ajax({
        url: "update_cart_quantity.php",
        data: "cart_id=" + cart_id + "&new_quantity=" + new_quantity,
        type: 'post',
        success: function(response) {
            $(inputQuantityElement).val(new_quantity);
        }
    });
}
   </script>

   <!-- ==================== -->

   </body>

   </html>