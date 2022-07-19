<!doctype html>
<html lang="en">
  <head>
  	<title>Login 04</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="<?php echo base_url();?>/frontend/css/style1.css" id="app-style" rel="stylesheet" type="text/css" />


	</head>
	<body>
	<section class="">
		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section"></h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
					
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign In</h3>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>
			      	</div>
							<form action="<?php echo base_url();?>/user/login" class="signin-form" method="post">
							 <?php
                                if(session()->getFlashdata('success')){
                                echo "<h4 style='color:red;text-align:center;'>".session()->getFlashdata('success')."</h4>";
                                }
                                ?> 
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Email</label>
			      			<input type="text" class="form-control" placeholder="Email" name="email">
			      			<small style="color:red;" class="text-danger">
                          		<?php if (isset($validation)) {
                                    echo $validation->getError('email');
                                    } ?>
                            </small>  
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input type="password" class="form-control" placeholder="Password" name="password">
		              <small style="color:red;" class="text-danger">
                  		<?php if (isset($validation)) {
                            echo $validation->getError('password');
                            } ?>
                    </small>  
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
		            </div>
		            <div class="form-group d-md-flex">
		            	<div class="w-50 text-left">
			            	<label class="checkbox-wrap checkbox-primary mb-0">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-md-right">
										<a href="#">Forgot Password</a>
									</div>
		            </div>
		          </form>
		           <p class="mt-3">Don't have an account? <a href="<?php echo base_url();?>/user/user_registration" class="text--base">Create Now</a></p>
		        </div>
		        	<div class="img" style="background-image: url(../frontend/images/bg-1.jpg);">

			      </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="<?php echo base_url();?>/frontend/js/jquery.min.js"></script>
  <script src="<?php echo base_url();?>/frontend/js/popper.js"></script>
  <script src="<?php echo base_url();?>/frontend/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>/frontend/js/main.js"></script>

	</body>
</html>


