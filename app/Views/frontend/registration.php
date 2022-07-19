<!doctype html>
<html lang="en">
  <head>
  	<title>Login 04</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="//unpkg.com/bootstrap@3.3.7/dist/css/bootstrap.min.css" type="text/css"/>
  <link rel="stylesheet" href="//unpkg.com/bootstrap-select@1.12.4/dist/css/bootstrap-select.min.css" type="text/css" />
  <link rel="stylesheet" href="//unpkg.com/bootstrap-select-country@4.0.0/dist/css/bootstrap-select-country.min.css" type="text/css" />

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
			      		
			      		</div>
							<!-- 	<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div> -->
			      	</div>
							<form action="<?php echo base_url();?>/user/user_registration" class="signin-form" method="post">
			      		<div class="row">
	                        <div class="form-group col-sm-6">
	                            <label>First Name<span class="text--danger">*</span></label>
	                            <input type="text" name="first_name" class="form-control" placeholder="First Name">
	                             <small style="color:red;" class="text-danger">
	                              <?php if (isset($validation)) {
	                              			
	                                        echo $validation->getError('first_name');
	                                        } ?>
	                              </small>  
	                        </div>
	                        <div class="form-group col-sm-6">
	                            <label>Last Name<span class="text--danger">*</span></label>
	                            <input type="text" name="last_name" class="form-control" placeholder="Last Name">
	                             <small style="color:red;" class="text-danger">
                              		<?php if (isset($validation)) {
                                        echo $validation->getError('last_name');
                                        } ?>
                                </small>  
	                        </div>
	                        <div class="form-group col-sm-6">
	                            <label>Username<span class="text--danger">*</span></label>
	                            <input type="text" name="user_name" class="form-control" placeholder="Username">
	                             <small style="color:red;" class="text-danger">
                                  <?php if (isset($validation)) {
                                            echo $validation->getError('user_name');
                                            } ?>
                                  </small>  
	                        </div>
	                        <div class="form-group col-sm-6">
	                            <label>Email<span class="text--danger">*</span></label>
	                            <input type="text" name="email" class="form-control" placeholder="Email Address">
	                             <small style="color:red;" class="text-danger">
                                  <?php if (isset($validation)) {
                                            echo $validation->getError('email');
                                            } ?>
                                  </small>  
	                        </div>
	                        <div class="form-group col-sm-6">
	                            <label>Country<span class="text--danger">*</span></label>
	                           <select class="selectpicker countrypicker" name="country" data-flag="true" ></select>
	                            <!-- <small style="color:red;" class="text-danger">
                              <?php if (isset($validation)) {
                                        echo $validation->getError('country');
                                        } ?>
                              </small>  --> 
	                        </div>
	                        <div class="form-group col-sm-6">
	                            <label>Phone Number<span class="text--danger">*</span></label>
	                            <input type="tel" name="phone_number" class="form-control" placeholder="Phone Number">
	                             <small style="color:red;" class="text-danger">
                                  <?php if (isset($validation)) {
                                            echo $validation->getError('phone_number');
                                            } ?>
                                  </small>  
	                        </div>
	                        <div class="form-group col-sm-6">
	                            <label>Password<span class="text--danger">*</span></label>
	                            <input type="text" name="password" class="form-control" placeholder="Password">
	                             <small style="color:red;" class="text-danger">
	                              <?php if (isset($validation)) {
	                                        echo $validation->getError('password');
	                                        } ?>
                              </small>  
	                        </div>
	                        <div class="form-group col-sm-6">
	                            <label>Confirm Password<span class="text--danger">*</span></label>
	                            <input type="text" name="passconf" class="form-control" placeholder="Confirm Password">
	                             <small style="color:red;" class="text-danger">
                                  <?php if (isset($validation)) {
                                            echo $validation->getError('passconf');
                                            } ?>
                                  </small>  
	                        </div>
	                     </div>   			     
			      	
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign Up</button>
		            </div>

		          </form>
		           <p class="mt-3">Have an account? <a href="<?php echo base_url();?>/user/login" class="text--base">Login Now </a></p>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
   <script src="//unpkg.com/bootstrap-select-country@4.0.0/dist/js/bootstrap-select-country.min.js"></script> 
<script type="text/javascript">
	 $('.countrypicker').countrypicker();
</script>
	</body>
</html>

