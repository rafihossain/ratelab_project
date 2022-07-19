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
                                
                                <div class="text-center mb-4">
                                    <h4 class="text-uppercase mt-0">Login In</h4>
                                </div>

								<?php

                                if(isset($error)){
                                    echo $error;
                                }
                                ?>
                                <?php 
                                if(session()->getFlashdata('success')){
                                    echo "<h4 style='color:green;text-align:center;'>".session()->getFlashdata('success')."</h4>";
                                }
                                ?>

                                <form method="post" action="<?= base_url() ?>/admin/login">
                                    <div class="mb-3">
                                        <label for="emailaddress" class="form-label">Email address</label>
                                        <input class="form-control" type="email" id="emailaddress" placeholder="Enter your email" name="admin_email" required>
										<small style="color:red;" class="text-danger"><?php if (isset($validation)) {
												echo $validation->getError('admin_email');
											} ?>
										</small>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input class="form-control" type="password" id="password" placeholder="Enter your password" name="admin_pass" required>
										<small style="color:red;" class="text-danger"><?php if (isset($validation)) {
												echo $validation->getError('admin_pass');
											} ?>
										</small>
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                            <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                        </div>
                                    </div>

                                    <div class="mb-3 d-grid text-center">
                                        <button class="btn btn-primary" type="submit"> Log In </button>
                                    </div>
                                </form>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p> <a href="<?= base_url() ?>/admin/forgot_pass" class="text-dark ms-1"><i class="fa fa-lock me-1"></i>Forgot your password?</a></p>
                                <p class="text-dark">Don't have an account? <a href="pages-register.html" class="text-dark ms-1"><b>Sign Up</b></a></p>
                            </div> <!-- end col -->
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