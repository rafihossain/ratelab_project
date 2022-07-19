<?= $this->extend('admin/master'); ?>
<?= $this->section('content'); ?>

<style>
	.btn-group.btn-toggle {
		white-space: nowrap;
		border: 1px solid #ced4da;
		padding: 0;
		border-radius: 5px;
		overflow: hidden;
		margin-left: 13px;
	}
</style>

<div class="content-page">
	<div class="content">

		<!-- Start Content-->
		<div class="container-fluid">
			<h4>User Detail</h4>
			<?php
			$name = $users[0]->first_name . ' ' . $users[0]->last_name;
			?>
			<div class="row">
				<div class="col-md-4">
					<div class="upper1">
						<div class="card">
							<div class="card-body">
								<div class="text-center">
									<img src="<?= base_url() ?>/admin/assets/images/350x300.jpg" height="208" width="242"><br>
								</div>
								<h4 class="mt-2 text-center"><?php echo $name; ?></h4>
								<p class="text-center">joined at <b><?php echo $users[0]->created_at ?></b></p>
							</div>
						</div>
					</div>
					<div class="lower1">
						<div class="card">
							<div class="card-body">

								<p>User information</p>
								<table class="table" border="1">
									<tr>
										<td><b>Username</b></td>
										<td><?php echo $users[0]->user_name ?></td>
									</tr>
									<tr>
										<td><b>Status</b></td>
										<td>
											<?php if ($users[0]->status == 0) { ?>
												<p class="badge bg-success">active</p>
											<?php } else { ?>
												<p class="badge bg-danger">banned</p>
											<?php } ?>

										</td>
									</tr>
								</table>

							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="upper">
						<div class="card">
							<div class="card-body">
								<a href="<?php echo base_url(); ?>/admin/user/login_history/<?php echo $users[0]->tbl_user_id ?>" class="btn btn-primary m-2">Login Logs</a>
								<a href="<?php echo base_url(); ?>/admin/user/send-email/<?php echo $users[0]->tbl_user_id ?>" class="btn btn-info  m-2">Send Email</a>
								<a href="<?php echo base_url(); ?>/user/user-profile/<?php echo $users[0]->tbl_user_id ?>" class="btn btn-dark  m-2" target="_blank">Login as user</a>
								<a href="" class="btn btn-warning  m-2">Email Log</a>
							</div>
						</div>
					</div>

					<div class="lower">
						<div class="card">
							<div class="card-body">
								<h4>Information of <?php echo $name; ?></h4>
								<hr>
								<form method="post" action="<?php echo base_url(); ?>/admin/all_users/details/<?php echo $users[0]->tbl_user_id ?>">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>First Name<span class="text-danger"> *</span></label>
												<input type="text" name="first_name" class="form-control" value="<?php echo $users[0]->first_name ?>">
												<small style="color:red;" class="text-danger">
													<?php if (isset($validation)) {

														echo $validation->getError('first_name');
													} ?>
												</small>
											</div><br>

											<div class="form-group">
												<label>Email<span class="text-danger"> *</span></label>
												<input type="text" name="email" class="form-control" value="<?php echo $users[0]->email_address ?>" readonly>
												<small style="color:red;" class="text-danger">
													<?php if (isset($validation)) {
														echo $validation->getError('email');
													} ?>
												</small>
											</div>
										</div>

										<div class="col-md-6">

											<div class="form-group">
												<label>Last Name<span class="text-danger"> *</span></label>
												<input type="text" name="last_name" class="form-control" value="<?php echo $users[0]->last_name ?>">
												<small style="color:red;" class="text-danger">
													<?php if (isset($validation)) {
														echo $validation->getError('last_name');
													} ?>
												</small>
											</div><br>

											<div class="form-group">
												<label>Mobile Number<span class="text-danger"> *</span></label>
												<input type="text" name="phone_number" class="form-control" value="<?php echo $users[0]->phone_number ?>">
												<small style="color:red;" class="text-danger">
													<?php if (isset($validation)) {
														echo $validation->getError('phone_number');
													} ?>
												</small>
											</div>
										</div>
									</div><br>

									<div class="form-group col-md-12">
										<label>Address<span class="text-danger"></span></label>
										<input type="text" name="address" class="form-control" placeholder="Address" value="<?php echo $users[0]->user_address ?>">
									</div><br>
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label>City<span class="text-danger"></span></label>
												<input type="text" name="city" class="form-control" value="<?php echo $users[0]->user_city ?>">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>State<span class="text-danger"></span></label>
												<input type="text" name="state" class="form-control" value="<?php echo $users[0]->user_state ?>">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Zip/Postal<span class="text-danger"></span></label>
												<input type="text" name="zip_code" class="form-control" value="<?php echo $users[0]->zip_code ?>">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label>Country<span class="text-danger"></span></label>
												<input type="text" name="country" class="form-control" value="<?php echo $users[0]->user_country ?>">
											</div>
										</div>

									</div><br>
									<div class="row">

										<div class="col-md-4 row mb-2">
											<label for="" class="mb-2">Status</label>
											<input type="hidden" name="status" value="1">

											<input type="checkbox" class="status" name="status" <?= ($users[0]->status == 0 ? 'checked' : ''); ?> value="0">
										</div>
										<div class="col-md-4 row mb-2">
											<label for="" class="mb-2">Email Verification</label>
											<input type="hidden" name="email_verification" value="1">

											<input type="checkbox" class="verify" name="email_verification" <?= ($users[0]->email_verification == 0 ? 'checked' : ''); ?> value="0">
										</div>
										<div class="col-md-4 row mb-2">
											<label for="" class="mb-2">SMS Verification</label>
											<input type="hidden" name="sms_verificaton" value="1">

											<input type="checkbox" class="verify" name="sms_verificaton" <?= ($users[0]->sms_verification == 0 ? 'checked' : ''); ?> value="0">
										</div>

									</div>

									<div class="form-group col-md-12">
										<button class="btn btn-info waves-effect waves-light w-100" type="submit">Save Changes</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>

			</div>



		</div><!-- container-fluid -->

	</div>

</div> <!-- content -->

<script src="<?= base_url() ?>/admin/assets/switch/bootstrap-switch.js"></script>

<script>
	$(".status").bootstrapSwitch({
		on: 'Active',
		off: 'Banned ',
		onLabel: '&nbsp;&nbsp;&nbsp;',
		offLabel: '&nbsp;&nbsp;&nbsp;',
		same: true, //same labels for on/off states
		size: 'md',
		onClass: 'success',
		offClass: 'danger'
	});

	$(".verify").bootstrapSwitch({
		on: 'Verified',
		off: 'Unverified ',
		onLabel: '&nbsp;&nbsp;&nbsp;',
		offLabel: '&nbsp;&nbsp;&nbsp;',
		same: true, //same labels for on/off states
		size: 'md',
		onClass: 'success',
		offClass: 'danger'
	});
</script>

<?= $this->endSection() ?>