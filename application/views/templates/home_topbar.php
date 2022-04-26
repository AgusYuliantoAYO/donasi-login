 <!-- Content Wrapper -->
 <div id="content-wrapper" class="d-flex flex-column">

     <!-- Main Content -->
     <div id="content  ">


         <!-- Topbar -->
         <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

             <!-- Sidebar Toggle (Topbar) -->
             <!-- <button id="sidebarToggleHome" class="btn btn-link d-md-none rounded-circle mr-3">
                 <i class="fa fa-bars"></i>
             </button> -->


             <!-- <div class="col-3 ml-3"> -->
             <!-- TopBar JUDUL -->
             <form>
                 <!-- Sidebar - Brand -->
                 <a class="sidebar-brand d-flex align-items-center justify-content-left ml-2"
                     href="<?= base_url('user/berdonasi');?>">
                     <!-- <div class="sidebar-brand-icon rotate-n-15">
                         <i class="fab fa-atlassian"></i>
                     </div> -->
                     <!-- <div class="sidebar-brand-text mx-3 "> AYo Donasi </div> -->
                     <div class="carousel-item active col-md-5 mr-1">
                         <img src="<?= base_url('/assets/img/logo/LogoSSokbgtpolsip.png');?>" class="d-block w-100"
                             alt="...">
                     </div>
                 </a>
             </form>
             <form>
                 <!-- //Kategori -->
                 <div class="dropdown show">
                     <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                         aria-haspopup="true" aria-expanded="false">
                         <i class="fas fa-object-ungroup btn btn-sm btn-success"></i>
                     </a>

                     <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                         <div class="col-12" align="center">
                             <a class="btn  ml-3 mt-2" href="<?php echo base_url('user/berdonasi'); ?>"><b>
                                     Donasi</b></a>
                         </div>
                         <br>
                         <div class="col-12" align="center">
                             <a class="btn  ml-3 mt-2" href="<?php echo base_url('user/belanja'); ?>"><b>
                                     Belanja</b></a>
                         </div>
                         <!-- <button type="button" class="btn  dropdown-toggle dropdown-toggle-split mt-2"
                             data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <span class="sr-only">Toggle Dropright</span>
                         </button>
                         <div class="dropdown-menu">
                             <a class="dropdown-item" href="?php echo base_url('user/fashion') ?>">Fashion</a>
                             <a class="dropdown-item" href="?php echo base_url('user/merchant') ?>">Merchant</a>
                             <a class="dropdown-item" href="?php echo base_url('user/makanan') ?>">Makanan</a>
                             <a class="dropdown-item" href="?php echo base_url('user/elektronik') ?>">Elektronik</a>
                         </div> -->
                     </div>
                 </div>

             </form>


             <!-- Topbar Search -->
             <form
                 class="d-none d-sm-inline-block form-inline mr-auto ml-md-5 my-2 my-md-0 mw-100 navbar-search ml-5 col-md-4">
                 <div class="input-group col-12 ml-5 mr-5">
                     <!-- <input type="text" class="form-control bg-light border-0 small" placeholder="Cari"
                         aria-label="Search" aria-describedby="basic-addon2">
                     <div class="input-group-append">
                         <button class="btn btn-primary" type="button">
                             <i class="fas fa-search fa-sm"></i>
                         </button>
                     </div> -->
                 </div>
             </form>
             <!-- ======================== -->
             <!--========== //Search ==============-->
             <!--           
            <div class="row">
                        <div class="col-md-5">
                            <form action="<= base_url('user/belanja'); ?>" method="post">
                            <div class="input-group ml-5 mr-5">
                                <input type="text" class="form-control" placeholder="Cari..." name="keyword" autocomplete="off" autofocus>
                                <div class="input-group-append">
                                <input class="btn btn-primary" type="submit" name="submit">
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                     -->
             <!-- ............-->
             <!-- ======================== -->


             <?php if($this->cart->total_items()>0) : ?>
             <div class="navbar">
                 <ul class="nav navbar-nav navbar-right">
                     <li>
                         <?php
                                    $keranjang ='<span class ="badge badge-danger badge-counter">'.'<div class="fas fa-shopping-basket fa-sm"> '.$this->cart->total_items().'</div></span>'
                                    ?>

                         <?php echo anchor('user/detail_keranjang',$keranjang) ?>
                     </li>
                 </ul>
             </div>
             <?php endif;?>



             <!-- </div> -->
             <!-- </div> -->

             <!--  -->
             <!--     <form>
            <span class="mr-5 md-7 d-none d-lg-inline text-gray-1500" ><a href="?php echo base_url('/'); ?>">Bantuan?</a></span>
            <span class="mr-2 md-7 d-none d-lg-inline text-gray-1500" ><a href="?php echo base_url('/'); ?>">Home</a></span>
					!-- <li class="hvr-underline-from-left"><a href="?php echo base_url('/feedback/register'); ?>">Feedback</a></li> --
     </form> -->
             <!-- Topbar Navbar -->
             <ul class="navbar-nav ml-auto">
                 <div class="topbar-divider d-none d-sm-block"></div>
                 <!-- Nav Item - User Information -->

                 <li class="nav-item dropdown no-arrow mr-2">


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

                         <!-- Topbar Search -->
                         <!-- <form class="dropdown-item">
                             <div class="input-group ">
                                 <input type="text" class="form-control bg-light border-0 small" placeholder="Cari"
                                     aria-label="Search" aria-describedby="basic-addon2">
                                 <div class="input-group-append">
                                     !-- <button class="btn btn-primary" type="button">
                                         <i class="fas fa-search fa-sm"></i>
                                     </button> --
                                     <input class="btn btn-primary" type="submit" name="submit">
                                 </div>
                             </div>
                         </form> -->
                         <!-- ======================== -->
                         <?php 
                         if ($user['role_id']==1) {?>
                         <a class="dropdown-item" href="<?php echo base_url('admin') ?>">
                             <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                             Dashboard
                         </a>
                         <?php
}else{?>
                         <a class="dropdown-item" href="<?php echo base_url('user/profil') ?>">
                             <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                             Profil
                         </a>
                         <?php
}?>
                         <a class="dropdown-item" href="<?php echo base_url('user/berdonasi'); ?>">
                             <i class="fas fa-fw fa-donate fa-sm fa-fw mr-2 text-gray-400"></i>
                             Berdonasi</a>
                         <a class="dropdown-item" href="<?php echo base_url('user/belanja'); ?>">
                             <i class="fas fa-fw fa-shopping-cart fa-sm fa-fw mr-2 text-gray-400"></i>
                             Belanja</a>
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