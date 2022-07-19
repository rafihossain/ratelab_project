<?= $this->extend('frontend/master'); ?>
<?= $this->section('content'); ?>

 <style>
 	.avatar-preview {
 		width: 11.25rem;
 		height: 11.25rem;
 		border-radius: 15px;
 		display: block;
 		position: relative;
 	}

 	.avatar-preview .profilePicPreview {
 		width: 11.25rem;
 		height: 11.25rem;
 		border-radius: 15px;
 		display: block;
 		background-size: cover;
 		background-position: center;
 	}

 	.avatar-preview .btn--base {
 		width: 40px;
 		height: 40px;
 		border-radius: 50%;
 		position: absolute;
 		padding: 5px;
 		display: flex;
 		align-items: center;
 		justify-content: center;
 		right: -5px;
 		bottom: -5px;
 		border: 4px solid #fff;
 		box-shadow: 0 2px 12px rgb(0 0 0 / 15%);
 		background: #FFA92B;
 		color: #fff;
 	}

 	.profilePicUpload {
 		font-size: 0;
 		opacity: 0;
 		width: 0;
 	}

 	/* .profile-thumb{
		display: flex;
		align-items: center;
	} */
 </style>

 <?php
	$date = date_create($users[0]->created_at);
	$name = $users[0]->first_name . ' ' . $users[0]->last_name;

	?>
 <!-- Navbar End -->

 <!-- home start -->
 <section class="bg-gradient" id="home">
 	<div class="home-center">
 		<div class="home-desc-center">
 			<div class="container-fluid">
 				<div class="row align-items-center">
 					<div class="col-lg-6 col-sm-6">
 						<!--       <div class="home-title">
                                    <h5 class="mb-3 text-white-50">Discover Adminto Today</h5>
                                    <h2 class="mb-4 text-white">Make your Site Amazing & Unique with Adminto</h2>
                                    <p class="text-white-50 home-desc font-16 mb-5">Adminto is a fully featured premium Landing template built on top of awesome Bootstrap 4.3.1, modern web technology HTML5, CSS3 and jQuery. </p>
                                    <div class="watch-video mt-5">
                                        <a href="#" class="btn btn-custom me-4">Get Started <i class="mdi mdi-chevron-right ms-1"></i></a>
                                        <a href="http://vimeo.com/99025203" class="video-play-icon text-white"><i class="mdi mdi-play play-icon-circle me-2"></i> <span>Watch The Video</span></a>
                                    </div>
    
                                </div> -->
 					</div>
 					<div class="col-lg-5 offset-lg-1 col-sm-6">
 						<div class="home-img mo-mt-20">
 							<img src="<?php echo base_url(); ?>/frontend/images/home-img.png" alt="" class="img-fluid mx-auto d-block">
 						</div>
 					</div>
 				</div>
 				<!-- end row -->

 			</div>
 			<!-- end container-fluid -->
 		</div>
 	</div>
 </section>
 <!-- home end -->



 <!-- services start -->
 <section class="bg-light">
 	<div class="container-fluid">
 		<div class="" style="background-color: black !important;">

 		</div>
 		<div class="row">
 			<div class="col-md-4">

 				<div class="services-box p-4 bg-white mt-4">
 					<div class="overflow-hidden">
						<?php if($users[0]->user_image){?>
 							<img src="<?= base_url() ?>/frontend/images/users/<?php echo $users[0]->user_image;?>" class="rounded-circle" height="200" width="200">
						 <?php } else {?>
							<img src="<?= base_url() ?>/frontend/images/users/avatar.jpg" class="rounded-circle" height="200" width="200">
						 <?php } ?>
 						<p class="text-muted mt-2"><?php echo $name; ?></p>

 					</div>

 				</div>

 				<div class="services-box p-4 bg-white mt-4">
 					<div class="card-header">
 						<h5 class="text-dark">Profile Overview</h5>
 					</div><br>
 					<div class="overflow-hidden">
 						<p>Member since <?php echo date_format($date, "Y"); ?></p>
 						<p><?php echo $users[0]->email_address; ?></p>
 						<p>Total Reviews 0</p>
 					</div>

 				</div>
 			</div>
 			<div class="col-md-8">
 				<div class="services-box p-4 bg-white mt-4">
 					<div class="card-header bg-dark">
 						<h5 class="text-white">Profile Setting</h5>
 					</div><br>
 					<form action="<?php echo base_url(); ?>/user/user-profile/<?php echo $users[0]->tbl_user_id ?>" class="signin-form" method="post" enctype="multipart/form-data">

					 <input type="hidden" name="old_image" value="<?php echo $users[0]->user_image;?>">

 						<div class="overflow-hidden">
 							<div class="row">
 								<div class="col-md-6">
 									<!-- <div class="form-group col-md-12" style="height: 36%;">
 										<label>Image<span class="text--danger">*</span></label>
 										<input type="file" name="">
 									</div><br> -->

 									<div class="col-lg-6 mb-2">
 										<div class="profile-thumb-wrapper">
 											<label class="mb-1">Image</label>
 											<div class="profile-thumb justify-content-center">
											 <div class="thumb">
 												<div class="avatar-preview">
												 <?php if($users[0]->user_image){?> 
 													<div class="profilePicPreview" style="background-image: url(<?= base_url() ?>/frontend/images/users/<?php echo $users[0]->user_image;?>)">
 													</div>
												<?php } else {?>
													<div class="profilePicPreview" style="background-image: url('https://script.viserlab.com/ratelab/placeholder-image/350x300');">
 													</div>
													
												<?php } ?>	
 													<div class="avatar-edit">
 														<input type='file' class="profilePicUpload" name="image" id="profilePicUpload" accept=".png, .jpg, .jpeg" />
 														<label for="profilePicUpload" class="btn btn--base mb-0"><i class="fas fa-camera"></i></label>
 													</div>
 												</div>
												 </div>
 											</div>
 										</div><!-- profile-thumb-wrapper end -->
 									</div>



 									<div class="form-group col-md-12">
 										<label>Email<span class="text--danger">*</span></label>
 										<input type="email" name="email" class="form-control" placeholder="Email Address" value="<?php echo $users[0]->email_address; ?>" readonly>
 									</div>
 									<br>
 									<div class="form-group col-md-12">
 										<label>Address<span class="text--danger">*</span></label>
 										<input type="text" name="address" class="form-control" placeholder="Address" value="<?php echo $users[0]->user_address; ?>">
 									</div>
 									<br>
 									<div class="form-group col-md-12">
 										<label>State<span class="text--danger">*</span></label>
 										<input type="text" name="state" class="form-control" placeholder="State" value="<?php echo $users[0]->user_state; ?>">
 									</div>

 								</div>
 								<div class="col-md-6">
 									<div class="form-group col-md-12">
 										<label>First Name<span class="text--danger">*</span></label>
 										<input type="text" name="first_name" class="form-control" placeholder="First Name" value="<?php echo $users[0]->first_name; ?>">
 										<small style="color:red;" class="text-danger">
 											<?php if (isset($validation)) {

													echo $validation->getError('first_name');
												} ?>
 										</small>
 									</div><br>
 									<div class="form-group col-md-12">
 										<label>Last Name<span class="text--danger">*</span></label>
 										<input type="text" name="last_name" class="form-control" placeholder="Last Name" value="<?php echo $users[0]->last_name; ?>">
 										<small style="color:red;" class="text-danger">
 											<?php if (isset($validation)) {

													echo $validation->getError('last_name');
												} ?>
 										</small>
 									</div><br>
 									<div class="form-group col-md-12">
 										<label>Mobile Number<span class="text--danger">*</span></label>
 										<input type="text" name="phone_number" class="form-control" placeholder="Mobile Number" value="<?php echo $users[0]->phone_number; ?>" readonly>
 									</div><br>
 									<div class="form-group col-md-12">
 										<label>Country<span class="text--danger">*</span></label>
 										<input type="text" name="country" class="form-control" placeholder="Country" value="<?php echo $users[0]->user_country; ?>">
 									</div><br>
 									<div class="form-group col-md-12">
 										<label>City<span class="text--danger">*</span></label>
 										<input type="text" name="city" class="form-control" placeholder="city" value="<?php echo $users[0]->user_city; ?>">
 									</div>
 								</div>
 							</div>
 							<br><br>
 							<div class="form-group col-md-12">
 								<label>Zip Code<span class="text--danger">*</span></label>
 								<input type="text" name="zip_code" class="form-control" placeholder="Zip Code" value="<?php echo $users[0]->zip_code; ?>">
 							</div>
 							<br>
 							<div class="form-group col-md-12">
 								<label for="exampleFormControlTextarea1" class="form-label">About</label>
 								<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="user_about"><?php echo $users[0]->user_about; ?></textarea>
 							</div><br>
 							<div class="form-group col-md-12">
 								<button class="btn btn-warning waves-effect waves-light w-100" type="submit">Submit</button>
 							</div>
 						</div>

 					</form>

 				</div>
 			</div>
 		</div>

 	</div>
 	<!-- end container-fluid -->
 </section>
 <!-- services end -->

 <script>
 	$(document).ready(function() {

 		$(document).on('change', '.profilePicUpload', function(e) {
 			readUrl(this);
 		});

 		$('.remove-image').on('click', function(e) {
 			$(this).parents('.profilePicPreview').css('background-image', 'none');
 			$(this).parents('.profilePicPreview').removeClass('has-image');
 			$(this).parents('.thumb').find('input[type=file]').val('');
 		});

 	});

 	function readUrl(input) {

 		console.log(input.files);

 		if (input.files && input.files[0]) {
 			// console.log('hello');
 			var reader = new FileReader();
 			reader.onload = function(e) {
 				var preview = $(input).parents('.thumb').find('.profilePicPreview');
 				var check = $(preview).css('background-image', 'url(' + e.target.result + ')');

 				$(preview).addClass('has-image');
 			}
 			reader.readAsDataURL(input.files[0]);
 		}


 	}
 </script>
<?= $this->endSection() ?>