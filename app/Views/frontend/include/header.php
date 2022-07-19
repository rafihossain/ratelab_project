<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <!-- <title>Adminto - Responsive Bootstrap 4 Landing Page Template</title> -->
        <title><?php if(isset($general['site_title'])){ echo $general['site_title']; } ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="<?php if(isset($seomanager['meta_description'])) { echo $seomanager['meta_description']; } ?>">
        <meta name="keywords" content="<?php if(isset($seomanager['meta_keywords'])) { echo $seomanager['meta_keywords']; } ?>">

        <meta property="og:title" content="<?php if(isset($seomanager['social_title'])) { echo $seomanager['social_title']; } ?>">
        <meta property="og:description" content="<?php if(isset($seomanager['social_description'])) { echo $seomanager['social_description']; } ?>">
        <meta property="og:image" content="<?php echo base_url();?>/admin/uploads/<?php if(isset($seomanager['image'])) {echo $seomanager['image']; } ?>"/>

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url();?>/admin/uploads/<?php if(isset($logoandfav['favicon'])) {echo $logoandfav['favicon']; } ?>">

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="<?php echo base_url();?>/frontend/css/bootstrap.min.css" type="text/css">

        <!--Material Icon -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/frontend/css/materialdesignicons.min.css" />
    
        <!--pe-7 Icon -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/frontend/css/pe-icon-7-stroke.css" />
        <!--Font Awesome css-->
		<link href="<?= base_url() ?>/frontend/fontawesome/css/all.css" rel="stylesheet" type="text/css" id="app-style" />
        
        <!-- Custom  sCss -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/frontend/css/style.css" />
        <script src="<?= base_url() ?>/admin/assets/libs/jquery/jquery.min.js"></script>

    </head>

    <body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="58" class="scrollspy-example">
        <!--Navbar Start-->
        <nav class="navbar navbar-expand-lg fixed-top navbar-custom sticky sticky-dark" id="nav-sticky">
            <div class="container-fluid">
                <!-- LOGO -->
                <a class="logo text-uppercase" href="index.html">
                    <img src="<?php echo base_url();?>/admin/uploads/<?php if(isset($logoandfav['favicon'])) { echo $logoandfav['logo']; } ?>" alt="" class="logo-light" height="18" />
                    <img src="<?php echo base_url();?>/admin/uploads/<?php if(isset($logoandfav['logo'])) { echo $logoandfav['logo']; } ?>s" alt="" class="logo-dark" />
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="mdi mdi-menu"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ms-auto" id="mySidenav">
                        <li class="nav-item">
                            <a href="<?php echo base_url();?>" class="nav-link active">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url();?>/companies/all" class="nav-link">Companies</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url();?>/blog" class="nav-link">Blog</a>
                        </li>
                        <?php 
                            $this->session = \Config\Services::session();
                            $session_data= $this->session->get('login_info');
                            // echo '<pre>';
                            // print_r($session_data);
                            // die();
                         
                       
                        ?>  
                       
                        <?php if(empty($session_data)){?>
                        <li class="nav-item">
                            <a href="<?php echo base_url();?>/contact" class="nav-link">Contact</a>
                        </li>
                        <?php } ?>
                        <?php if($session_data){?>
                           <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            My Company
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?php echo base_url();?>/user/company/list">Company List</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url();?>/user/company/create">Add Company</a></li>
                          </ul>
                        </li>
                      
                             <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $session_data['username']; ?>
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?php echo base_url();?>/user/user-profile/<?php echo $session_data['user_id'];?>">My Profile</a></li>
                            <li><a class="dropdown-item" href="#">Change Password</a></li>
                             <li><a class="dropdown-item" href="<?php echo base_url();?>/support/ticket">My Support Tickets</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url();?>/support/ticket/new">Open New Ticket</a></li>
                             <li><a class="dropdown-item" href="<?php echo base_url();?>/user/user_logout">Logout</a></li>
                           
                          </ul>
                        </li>
                        
                    </ul>
                    <div class="new_button">
                       <a href="https://script.viserlab.com/ratelab/user/dashboard" class="btn btn-md btn-warning btn--base d-flex align-items-center mx-2 mb-sm-2"><i class="fe-user"></i>Dashboard</a>
                    </div>
                    <?php } else {?>
                      <div class="new_button">
                       <a href="<?php echo base_url();?>/user/login" class="btn btn-md btn-warning btn--base d-flex align-items-center mx-2 mb-sm-2"><i class="fe-user"></i>Login</a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </nav>