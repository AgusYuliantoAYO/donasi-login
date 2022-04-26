 <!-- Content Wrapper -->
 <div id="content-wrapper" class="d-flex flex-column">

     <!-- Main Content -->
     <div id="content">

         <!-- Topbar -->
         <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

             <!-- Sidebar Toggle (Topbar) -->
             <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                 <i class="fa fa-bars"></i>
             </button>

             <!-- <div class="col-3 ml-3"> -->
             <!-- TopBar JUDUL -->
             <form>
                 <!-- Sidebar - Brand -->
                 <a class="sidebar-brand d-flex align-items-center justify-content-center"
                     href="<?= base_url('user');?>">

                     <div class="sidebar-brand-icon rotate-n-15">
                         <i class="fab fa-atlassian"></i>
                     </div>
                     <div class="sidebar-brand-text mx-3">AYo Donasi </div>

                 </a>
             </form>
             <!-- //Kategori -->
             <!-- <form >
            <div class="form-group">
                <select name="kategori_produk" id="kategori_produk" class="form-control">
                    <option value="">Pilih Kategori</option>
                    ?php foreach ($kategori as $k) : ?>
                    <option value="?= $k['id']; ?>">?= $k['kategori']; ?></option>
                    ?php endforeach; ?>
                </select>
            </div>
</form> -->
             <!-- Topbar Search -->
             <form
                 class="d-none d-sm-inline-block form-inline mr-auto ml-md-5 my-2 my-md-0 mw-100 navbar-search ml-5 col-md-5">
                 <div class="input-group ml-5">
                     <input type="text" class="form-control bg-light border-0 small" placeholder="Cari"
                         aria-label="Search" aria-describedby="basic-addon2">
                     <div class="input-group-append">
                         <button class="btn btn-primary" type="button">
                             <i class="fas fa-search fa-sm"></i>
                         </button>
                     </div>
                 </div>
             </form>

             <div class="navbar">
                 <ul class="nav navbar-nav navbar-right">
                     <li>
                         <?php
                                    $keranjang ='keranjang belanja: '.$this->cart->total_items().'items'
                                    ?>

                         <?php echo $keranjang?>
                     </li>
                 </ul>
             </div>
             <!-- </div> -->
             <!-- </div> -->

             <!--  -->
             <!--     <form>
            <span class="mr-5 md-7 d-none d-lg-inline text-gray-1500" ><a href="<?php echo base_url('/'); ?>">Bantuan?</a></span>
            <span class="mr-2 md-7 d-none d-lg-inline text-gray-1500" ><a href="<?php echo base_url('/'); ?>">Home</a></span>
					!-- <li class="hvr-underline-from-left"><a href="?php echo base_url('/feedback/register'); ?>">Feedback</a></li> --
    </form> -->
             <!-- Topbar Navbar -->
             <ul class="navbar-nav ml-auto">

                 <div class="topbar-divider d-none d-sm-block"></div>




                 <!-- Nav Item - User Information -->
                 <li class="nav-item dropdown no-arrow">


                     <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                         aria-haspopup="true" aria-expanded="false">
                         <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name'];?></span>
                         <img class="img-profile rounded-circle"
                             src="<?=base_url('assets/img/profile/') . $user['image'];?>">
                     </a>
                     <!-- Dropdown - User Information -->
                     <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                         aria-labelledby="userDropdown">

                         <ul>

                             <a class="dropdown-item"><?= $user['email'];?></span></a>
                             <a class="dropdown-item"><?= $user['name'];?></span></a>
                             <a class="dropdown-item"><?= $user['wa'];?></span></a>

                         </ul>
                         <div class="dropdown-divider"></div>

                         <a class="dropdown-item" href="index">
                             <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                             Profile
                         </a>
                         <!--                     <a class="dropdown-item" href="#">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Settings
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        Activity Log
                    </a> -->
                         <div class="dropdown-divider"></div>
                         <a class="dropdown-item" href="<?=base_url('auth/logout');?>" data-toggle="modal"
                             data-target="#logoutModal">
                             <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                             Logout
                         </a>
                     </div>

                 </li>

             </ul>

         </nav>
         <!-- End of Topbar -->