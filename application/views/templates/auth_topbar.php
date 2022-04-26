<link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/navbar-fixed-top/">
<link href="navbar-fixed-top.css" rel="stylesheet">




<!-- Content Wrapper -->
<div id="content-wrapper " class="d-flex flex-column">

    <!-- <nav class="navbar navbar-default navbar-fixed-top"> -->
    <!-- Main Content -->
    <div id="content ">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top  shadow">
            <form>
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-left ml-2"
                    href="<?= base_url('user');?>">
                    <div class="carousel-item active col-md-4 mr-1">
                        <img src="<?= base_url('/assets/img/logo/LogoSSokbgtpolsip.png');?>" class="d-block w-100"
                            alt="...">
                    </div>
                </a>
            </form>
            <!-- //Kategori -->
            <form>
                <div class="form-group mt-4 ml-3">
                    <!-- <select name="kategori_produk" id="kategori_produk" class="form-control">
                         <option value="">Pilih Kategori</option>
                         ?php foreach ($kategori as $k) : ?>
                         <option value="?= $k['id']; ?>">?= $k['kategori']; ?></option>
                         ?php endforeach; ?>
                     </select> -->
                </div>
            </form>
            <!-- Topbar Search -->
            <!-- <form
                 class="d-none d-sm-inline-block form-inline mr-auto ml-md-5 my-2 my-md-0 mw-100 navbar-search ml-5 col-md-6">
                 <div class="input-group ml-5 mr-5">
                     <input type="text" class="form-control bg-light border-0 small" placeholder="Cari"
                         aria-label="Search" aria-describedby="basic-addon2">
                     <div class="input-group-append">
                         <button class="btn btn-success" type="button">
                             <i class="fas fa-search fa-sm"></i>
                         </button>
                     </div>
                 </div>
             </form> -->
            <!-- </div> -->

            <!--  -->
            <!-- <form> -->
            <!-- <span class="mr-5 md-7 d-none d-lg-inline text-gray-1500" ><a href="?php echo base_url('/'); ?>">Bantuan?</a></span>
            <span class="mr-2 md-7 d-none d-lg-inline text-gray-1500" ><a href="?php echo base_url('/'); ?>">Home</a></span> -->
            <!-- <li class="hvr-underline-from-left"><a href="?php echo base_url('/feedback/register'); ?>">Feedback</a></li> -->
            <!-- </form> -->
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- <div class="topbar-divider d-none d-sm-block"></div>

             -->

                <!-- <h2><font  color="black" size="3" face="comic sans ms"><span class="btn  d-lg-inline btn-lg mt-4 mb-4"  href="?= base_url('auth/reg'); ?>">Daftar</font></h2></span> -->

                <div class="text-center mt-4 mb-4">
                    <font color="black" size="5" face="comic sans ms">
                        <a class="small" href="<?= base_url('auth/reg'); ?>">Daftar</a>
                    </font>
                </div>
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow ">


                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="btn btn-success d-lg-inline btn-md  mt-4 mb-2">
                            <!-- <div class="col-md-12"> -->
                            <h2>
                                <font size="3" face="comic sans ms"><b>Login</b></font>
                            </h2>
                            <!-- </div> -->
                        </span>
                    </a>
                    <!-- </nav> -->
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">
                            <!-- ........ -->
                            <!-- Outer Row -->


                            <div class="col-md-12">

                                <div class="text-center">
                                    <h1 class="h4 text-white  mb-4">====================</h1>
                                    <h1 class="h4 text-gray-700   mb-4">Login</h1>
                                </div>

                                <?= $this->session->flashdata('message'); ?>
                                <form class="user" method="post" action="<?=base_url('auth');?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email"
                                            name="email" placeholder="Enter Email Address..."
                                            value="<?=set_value('email');?>">
                                        <?=form_error('email','<small class="text-danger pl-3">','</small>');?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password"
                                            name="password" placeholder="Password">
                                        <?=form_error('password','<small class="text-danger pl-3">','</small>');?>
                                    </div>
                                    <!-- <div class="m-b-md">
                                         <input type="checkbox" id="toggle-password">
                                         <label for="toggle-password">
                                             Show Password
                                         </label>
                                     </div> -->
                                    <button type="submite" class="btn btn-success btn-user btn-block">
                                        Login
                                    </button>

                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('auth/forgotpassword');?>">Lupa
                                            Password?</a>
                                    </div>

                                </form>
                </li>
            </ul>
        </nav>


        <!-- End of Topbar -->

        <!-- <script>
         const password = document.getElementById("password");
         const togglePassword = document.getElementById("toggle-password");
         togglePassword.addEventListener("click", toggleClicked);
         $(document).ready(function() {
                     function toggleClicked() {
                         if (this.checked) {
                             password.type = "text";
                         } else {
                             password.type = "password";
                         }
                     }
         </script> -->