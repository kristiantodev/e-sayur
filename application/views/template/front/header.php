<!DOCTYPE html>
<html>

    <head>
        
        <title>E-Sayur Om Hendrik</title>
        
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/logo2.png">
        <link href="<?php echo base_url();?>assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/morris/morris.css">
        <!-- DataTables -->
        <link href="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="<?php echo base_url();?>assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css">
    </head>

    <body class="bg-muted">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a class="logo">
                        <span>
                            <img src="<?php echo base_url();?>assets/images/logo2.png" alt="" height="70">
                        </span>
                        <i>
                            <img src="<?php echo base_url();?>assets/images/logo-sm-light.png" alt="" height="22">
                        </i>
                    </a>
                </div>

                <nav class="navbar-custom">

                    <ul class="navbar-right d-flex list-inline float-right mb-0">
                        
 <li><!-- <img src="<?php echo base_url();?>assets/images/cic.png" alt="" height="70" width="154">--></li>
                        


                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-effect waves-light">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>                        
                        <li class="d-none d-sm-block">
                            
                        </li>
                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu side-menu-light">
                <div class="slimscroll-menu" id="remove-scroll">


                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">
                          
                            <li>
                                <a href="<?php echo site_url();?>informasi" class="waves-effect">
                                    <font color=""><i class="far fa-lemon "></i></font><span> Home </span>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo site_url();?>informasi/about" class="waves-effect">
                                    <font color=""><i class="fas fa-info-circle"></i></font><span> Tentang Kami </span>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo site_url();?>informasi/sayur" class="waves-effect">
                                    <font color=""><i class="fas fa-seedling"></i></font><span> Sayur Mayur </span>
                                </a>
                            </li>

                             <?php if($this->session->userdata('level') == "Konsumen"){ ?>

                                <li>
                                <a href="<?php echo site_url();?>informasi/cart" class="waves-effect">
                                    <i class="fas fa-shopping-cart"></i><span class="badge badge-success float-right">
                                        
                                        <?php $array = array('status' => 1, 'deleted' => 0, 'id_user' => $this->session->userdata('id_user'));
  echo $totalNew1 = $this->db->where($array)->count_all_results('keranjang');?>

                                    </span><span> Keranjang </span>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo site_url();?>informasi/pembelian" class="waves-effect">
                                    <font color=""><i class="fas fa-shopping-bag"></i></font><span> Pembelian </span>
                                </a>
                            </li>
                                
                                <li>
                                <a href="<?= base_url('login/logout')?>" onclick="return confirm('Apakah anda ingin logout?')" class="waves-effect">
                                    <font color=""><i class="fas fa-sign-out-alt"></i></font><span> Logout </span>
                                </a>
                            </li>
                            
                           <?php }else{ ?>
                             <li>
                                <a href="<?php echo site_url();?>informasi/register" class="waves-effect">
                                    <font color=""><i class="fas fa-user-plus"></i></font><span> Register </span>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo site_url();?>login" class="waves-effect">
                                    <font color=""><i class="fas fa-sign-in-alt "></i></font><span> Login </span>
                                </a>
                            </li>
                           <?php } ?>
                            
                        </ul>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->