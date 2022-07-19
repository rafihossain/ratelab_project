<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Log In | Adminto - Responsive Admin Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url() ?>/admin/assets/images/favicon.ico">

		<!-- App css -->

		<link href="<?= base_url() ?>/admin/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

		<!-- icons -->
		<link href="<?= base_url() ?>/admin/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="loading authentication-bg authentication-bg-pattern">

        <div class="account-pages my-5">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <div class="text-center">   
                            <a href="index.html">
                                <img src="<?= base_url() ?>/admin/assets/images/logo-dark.png" alt="" height="22" class="mx-auto">
                            </a>
                            <p class="text-muted mt-2 mb-4">Responsive Admin Dashboard</p>

                        </div>
                        <div class="card">
                            <div class="card-body p-4">
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php
                                        if (isset($invalidToken)) {
                                            echo $invalidToken;
                                        }
                                        ?>
                                        <p class="text-black">Do you want to resend password reset link?
                                            <a href="<?php echo base_url() ?>/admin/forgot_pass" class="fw-medium text-primary"> Resend Link </a>
                                        </p>  
                                    </div>
                                </div>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!-- Vendor -->
        <script src="<?= base_url() ?>/admin/assets/libs/jquery/jquery.min.js"></script>
        <script src="<?= base_url() ?>/admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url() ?>/admin/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?= base_url() ?>/admin/assets/libs/node-waves/waves.min.js"></script>
        <script src="<?= base_url() ?>/admin/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="<?= base_url() ?>/admin/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
        <script src="<?= base_url() ?>/admin/assets/libs/feather-icons/feather.min.js"></script>

        <!-- App js -->
        <script src="<?= base_url() ?>/admin/assets/js/app.min.js"></script>
        
    </body>
</html>