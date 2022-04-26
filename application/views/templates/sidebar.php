<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion  " id="accordionSidebar">


    <!-- Sidebar - Brand -->

    <a class="sidebar-brand d-flex  align-items-center justify-content-center" href="<?= base_url('user/berdonasi');?>">
        <!-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fab fa-atlassian"></i>
        </div>
        <div class="sidebar-brand-text mx-3">AYo Donasi </div> -->
        <div class="carousel-item active col-md-12 mr-1 mt-2">
            <img src="<?= base_url('/assets/img/logo/Aileron Logo HAMASAH PUTIH.png');?>" class="d-block w-100"
                alt="...">
        </div>
    </a>

    <!-- <style type="text/css">
    .outline {
        outline-width: 3px;
        outline-style: solid;
        outline-color: blue;
    }
    </style> -->


    <!-- Divider -->
    <hr class="sidebar-divider ">
    <!-- Poto user -->
    <div class="shadow">
        <div class="col-12" align="center">
            <img class="img-profile rounded-circle col-md-7 shadow "
                src="<?=base_url('assets/img/profile/') . $user['image'];?>">
            <br>
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name'];?></span>
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['email'];?></span>
        </div>
    </div>
    <hr class="sidebar-divider mt-2">
    <!-- query menu -->

    <?php
                        $role_id = $this->session->userdata('role_id');
                        $queryMenu = "SELECT `user_menu`.`id`,`menu`
                        FROM `user_menu` JOIN `user_access_menu` 
                        ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                        WHERE `user_access_menu`.`role_id`= $role_id 
                        ORDER BY `user_access_menu`.`menu_id` ASC
                        ";
                        $menu = $this->db->query($queryMenu)->result_array();
                        ?>


    <!-- ==========test -->
    <!-- Sidebar Menu -->

    <!-- Nav Item - Utilities Collapse Menu -->
    <!-- <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Admin</span>
                </a>
                <div id="collapseUtilities" class="collapse show" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Admin</h6>
                        <a  class="btn btn-sm collapse-item active" href="<php echo base_url('admin'); ?>">Dashboard</a> 
                        <a  class="btn btn-sm collapse-item active" href="?php echo base_url('admin/role'); ?>">Role</a> -->

    <!-- ================== -->
    <!-- query menu -->

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true"
            aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-user"></i>
            <span>User</span>
        </a>
        <!-- <div id="collapseUtilities" class="collapse show" aria-labelledby="headingUtilities" -->
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">User</h6>
                <!-- <a class="btn btn-sm collapse-item active" style="text-align:left"
                    href="<?php echo base_url('user/'); ?>">Dashboard</a> -->
                <a class="btn btn-sm collapse-item active" style="text-align:left"
                    href="<?php echo base_url('user/belanja_masuk'); ?>">Belanja Pending</a>
                <a class="btn btn-sm collapse-item active" style="text-align:left"
                    href="<?php echo base_url('user/donasi_masuk'); ?>">Donasi Pending</a>
                <a class="btn btn-sm collapse-item active" style="text-align:left"
                    href="<?php echo base_url('user/history'); ?>">History</a>
                <!-- <a class="btn btn-sm collapse-item active" style="text-align:left"
                    href="?php echo base_url('user/riwayat_donasi'); ?>">Riwayat Donasi</a> -->
                <!-- <a  class="btn btn-sm collapse-item active" style= "text-align:left" href="?php echo base_url('user/profil'); ?>">Profil</a> -->
                <!-- <ul></ul> -->
            </div>
        </div>
    </li>
    <hr>
    <!-- ================== -->
    <!-- query menu -->

    <?php
                        $role_id = $this->session->userdata('role_id');
                        $queryMenu = "SELECT `user_menu`.`id`,`menu`
                        FROM `user_menu` JOIN `user_access_menu` 
                        ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                        WHERE `user_access_menu`.`role_id`= $role_id 
                        ORDER BY `user_access_menu`.`menu_id` ASC
                        ";
                        $menu = $this->db->query($queryMenu)->result_array();
                        ?>



    <!-- =========================================================== -->

    <!-- ======================================================== -->


    <!-- LOOPING MENU -->
    <?php foreach ($menu as $m) : ?>
    <div class="sidebar-heading">
        <?= $m['menu'];?>
    </div>

    <!-- SIAPKAN SUB-MENU SESUAI MENU -->


    <?php
                $menuId = $m['id'];
                $querySubMenu = "SELECT *
                                FROM `user_sub_menu` JOIN `user_menu` 
                                ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                                WHERE`user_sub_menu`.`menu_id`= $menuId
                                AND `user_sub_menu`.`is_active`= 1
                                ";
                    $subMenu = $this->db->query($querySubMenu)->result_array();
                ?>


    <!-- Nav Item - Judul - Menyala-->
    <?php foreach ($subMenu as $sm ) : ?>
    <?php if ($title == $sm['title']) : ?>
    <li class="nav-item active">
        <?php else : ?>
    <li class="nav-item">
        <?php endif; ?>
        <a class="nav-link pb-0" href="<?=base_url($sm['url']);?>">
            <i class="<?= $sm['icon'];?>"></i>
            <span><?=$sm['title'];?></span></a>
    </li>
    <?php endforeach;?>

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <?php endforeach;?>


    <!-- Nav Item - Charts -->
    <!-- <li class="nav-item">
                <a class="nav-link" href="?=base_url('auth/logout')?>">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
                </li> -->


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->