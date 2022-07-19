 <?= $this->extend('admin/master'); ?>
 <?= $this->section('content'); ?>

 <div class="content-page">
 	<div class="content">

 		<!-- Start Content-->
 		<div class="container-fluid">

 			<?php

				$name = $user[0]->first_name . ' ' . $user[0]->last_name;

				?>


 			<h4 class="d-flex"><?php echo $name; ?> Requested Company</h4>


 			<div class="col-md-6 m-auto">
 				<div class="card">
 					<div class="card-body">
 						<h4><b>Company Name :</b> <?php echo $details->company_name; ?></h4>
 						<table class="table" border="1">
 							<tr>
 								<td><b>Create Date</b></td>
 								<td align="right"><?php echo $details->created_at; ?></td>
 							</tr>
 							<tr>
 								<td><b>User Name</b></td>
 								<td align="right"><a href="<?= base_url() ?>/admin/all_users/details/<?php echo $details->user_id; ?>"><?php echo $user[0]->user_name; ?></a></td>
 							</tr>
 							<tr>
 								<td><b>E-mail</b></td>
 								<td align="right"><b><?php echo $details->email_address; ?></b></td>
 							</tr>
 							<tr>
 								<td><b>Website Link</b></td>
 								<td align="right"><a href="<?php echo $details->url; ?>"><?php echo $details->url; ?></a></td>
 							</tr>
 							<tr>
 								<td><b>Status</b></td>
 								<td align="right">
 									<?php if ($details->status == 0) {
											echo '<span class="badge bg-warning">Pending</span>';
										} else if ($details->status == 1) {

											echo '<span class="badge bg-success">Approved</span>';
										} else {
											echo '<span class="badge bg-danger">Rejected</span>';
										}
										?>
 								</td>
 							</tr>
 							<tr>
 								<td></td>
 								<?php if ($details->status == 0) { ?>
 									<td align="right">
 										<button data-bs-target="#approve_modal" data-bs-toggle="modal" class="btn btn-primary btn-xs add-tooltip" data-toggle="tooltip" data-placement="top" title="" onclick="approved_advertisements(<?= $details->id; ?>)"><i class="fa fa-check"></i> Approved</button>

 										<button data-bs-target="#reject_modal" data-bs-toggle="modal" class="btn btn-danger btn-xs add-tooltip" data-toggle="tooltip" data-placement="top" title="" onclick="reject_advertisements(<?= $details->id; ?>)"><i class="fa fa-ban"></i> Rejected</button>
 									</td>
 								<?php } ?>
 							</tr>
 						</table>

 					</div>
 				</div>
 			</div>


 		</div> <!-- container-fluid -->

 	</div> <!-- content -->
 </div>

 <!--Default Bootstrap Approved Modal-->
 <!--===================================================-->
 <div class="modal fade" id="approve_modal" role="dialog" tabindex="-1" aria-labelledby="approve_modal" aria-hidden="true">
 	<div class="modal-dialog" style="width: 400px;">
 		<div class="modal-content">
 			<input type="hidden" name="advertisements_id" id="approve_company_id" value="">
 			<!--Modal header-->
 			<div class="modal-header">
 				<h4 class="modal-title">Confirm approve</h4>
 				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

 			</div>
 			<!--Modal body-->
 			<div class="modal-body">
 				<p>are you sure you want to approve this?</p>
 				<div class="text-right">
 					<input type="hidden" id="approveMemberId">
 					<input type="hidden" id="approveImageType">
 					<input type="hidden" id="approveitemId">
 				</div>
 			</div>

 			<div class="modal-footer">
 				<button type="button" class="btn btn-default btn-sm" data-bs-dismiss="modal">Close</button>
 				<button type="submit" class="btn btn-success btn-sm" id="approve_company">approve</button>
 			</div>

 		</div>
 	</div>
 </div>

 <!--Default Bootstrap Rejected Modal-->
 <!--===================================================-->
 <div class="modal fade" id="reject_modal" role="dialog" tabindex="-1" aria-labelledby="reject_modal" aria-hidden="true">
 	<div class="modal-dialog" style="width: 400px;">
 		<div class="modal-content">
 			<input type="hidden" name="advertisements_id" id="reject_company_id" value="">
 			<!--Modal header-->
 			<div class="modal-header">
 				<h4 class="modal-title">Confirm reject</h4>
 				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

 			</div>
 			<!--Modal body-->
 			<div class="modal-body">
 				<p>are you sure you want to reject this?</p>
 				<div class="text-right">
 					<input type="hidden" id="approveMemberId">
 					<input type="hidden" id="approveImageType">
 					<input type="hidden" id="approveitemId">
 				</div>
 			</div>

 			<div class="modal-footer">
 				<button type="button" class="btn btn-default btn-sm" data-bs-dismiss="modal">Close</button>
 				<button type="submit" class="btn btn-success btn-sm" id="reject_company">Reject</button>
 			</div>

 		</div>
 	</div>
 </div>

 <script type="text/javascript">
 	function approved_advertisements(id) {
 		$("#approve_company_id").val(id);

 	}

 	//approved company----------
 	$("#approve_company").click(function() {
 		$.ajax({
 			url: "<?= base_url() ?>/admin/companies/approve/" + $("#approve_company_id").val(),

 			success: function(response) {
 				console.log(response);
 				window.location.href = "<?= base_url() ?>/admin/companies/all";
 			},
 			fail: function(error) {
 				alert(error);
 			}
 		});
 	})


 	function reject_advertisements(id) {
 		$("#reject_company_id").val(id);

 	}

 	//reject company----------
 	$("#reject_company").click(function() {
 		$.ajax({
 			url: "<?= base_url() ?>/admin/companies/reject/" + $("#reject_company_id").val(),

 			success: function(response) {
 				// console.log(response);
 				window.location.href = "<?= base_url() ?>/admin/companies/all";
 			},
 			fail: function(error) {
 				alert(error);
 			}
 		});
 	})
 </script>

 <?= $this->endSection() ?>