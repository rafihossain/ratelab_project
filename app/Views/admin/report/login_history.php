 <?= $this->extend('admin/master'); ?>
 <?= $this->section('content'); ?>

 <div class="content-page">
 	<div class="content">

 		<!-- Start Content-->
 		<div class="container-fluid">
 			<h4>User Login History</h4>
 			<div class="row">
 				<div class="col-12">
 					<div class="card">
 						<div class="card-body">
 							<table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
 								<thead class="bg-primary">
 									<tr>
 										<th>User</th>
 										<th>Login at</th>
 										<th>IP</th>
 										<th>Location</th>
 										<th>Browser | OS</th>
									</tr>s
 								</thead>

 								<tbody>
 									<?php foreach ($all_report as $row) {

											$time = $row->last_login;
											$show_date = date('Y-m-d h:i a', $time);
											$cuurent_time = time();

											$new_time = $cuurent_time - $time;

											$min = $new_time / 60;
											$new_min = number_format((float)$min, 0, '.', '');
											$days = $new_time / 86400;
											$new_days = number_format((float)$days, 0, '.', '');
											$hour = $new_time / 3600;
											$new_hour = number_format((float)$hour, 0, '.', '');
										?>
 										<tr>
 											<td><?php echo $row->user_name ?></td>
 											<td>
 												<?php echo $show_date; ?>
 												<?php
													if ($new_days > 0) {
														if ($new_days == 1) {
															echo '<br>' . $new_days . ' ' . 'day ago';
														} else {
															echo '<br>' . $new_days . ' ' . 'days ago';
														}
													} else if ($min < 60) {
														if ($min == 1) {
															echo '<br>' . $new_min . ' ' . 'minute ago';
														} else {
															echo '<br>' . $new_min . ' ' . 'minutes ago';
														}
													} else if ($min > 60) {
														if ($new_hour == 1) {
															echo '<br>' . $new_hour . ' ' . 'hour ago';
														} else {
															echo '<br>' . $new_hour . ' ' . 'hours ago';
														}
													}

													?>
 											</td>
 											<td><?php echo $row->ip_address ?></td>
 											<td><?php echo $row->location ?></td>
 											<td><?php echo $row->windows_os ?></td>
 										</tr>
 									<?php } ?>


 								</tbody>
 							</table>

 						</div>
 					</div>
 				</div>
 			</div>

 		</div> <!-- container-fluid -->

 	</div> <!-- content -->
 </div>
 <?= $this->endSection() ?>