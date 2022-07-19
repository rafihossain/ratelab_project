 <?= $this->extend('admin/master'); ?>
 <?= $this->section('content'); ?>

 <div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
 
 
  

        	<h4 class="d-flex">Pending Companies</h4>
        
        	
        	     <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        		   <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                            <thead class="bg-info">
                                            <tr>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>URL</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                               
                                            </tr>
                                            </thead>
                                            <tbody>
                        					  <?php foreach($pending_company as $pending_companies){?>		
	                                            	<tr>
	                                            		<td><?php echo $pending_companies->company_name?></td>
	                                            		<td><?php echo $pending_companies->category_name?></td>
	                                            		<td><?php echo $pending_companies->url?></td>
	                                            		<td><?php echo $pending_companies->email_address?></td>
	                                            		<td>
						    							 <a href="<?= base_url() ?>/admin/companies/details/<?php echo $pending_companies->id;?>" class="company_hover">
									                        <i class="mdi mdi-desktop-mac mdi-24px"></i>
									                         </a>
    													</td>
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

<script type="text/javascript">



</script>

 <?= $this->endSection() ?>

