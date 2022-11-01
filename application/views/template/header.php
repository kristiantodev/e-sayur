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
                                <a href="<?php echo site_url();?>adm/dashboard" class="waves-effect">
                                    <font color=""><i class="far fa-lemon "></i></font><span> Dashboard </span>
                                </a>
                            </li>

                             <li>
                                <a href="<?php echo site_url();?>adm/kategori" class="waves-effect">
                                    <font color=""><i class="fas fa-bookmark"></i></font><span> Kategori</span>
                                </a>
                            </li>   


                             <li>
                                <a href="<?php echo site_url();?>adm/sayur" class="waves-effect">
                                    <font color=""><i class="fas fa-seedling"></i></font><span> Sayur</span>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo site_url();?>adm/pembelian" class="waves-effect">
                                    <font color=""><i class="fas fa-shopping-bag"></i></font><span> Pembelian Masuk</span>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo site_url();?>adm/laporan" class="waves-effect">
                                    <font color=""><i class="far fa-folder-open"></i></font><span> Laporan</span>
                                </a>
                            </li>
                           

                            <li>
                                <a href="<?php echo site_url();?>adm/ubah_password" class="waves-effect">
                                    <font color=""><i class="fas fa-cogs"></i></font><span> Ubah Password</span>
                                </a>
                            </li> 

                                 <li>
                                <a href="<?php echo base_url(). 'login/logout' ?>" class="waves-effect">
                                    <font color=""><i class="fas fa-sign-out-alt"></i></font><span> Logout</span>
                                </a>
                            </li>                                          
                           

                           

                            
                        </ul>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->