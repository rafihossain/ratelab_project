 <?= $this->extend('admin/master'); ?>
 <?= $this->section('content'); ?>

 <div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
        	<h4>Manage All Users</h4>
        	     <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        		   <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                            <thead>
                                            <tr>
                                                <th>User</th>
                                                <th>Email-Phone</th>
                                                <th>Country</th>
                                                <th>Joined At</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                            </thead>
    
    
                                            <tbody>
                                            <?php foreach($all_user as $row){?>	
                                            <tr>
                                                <td><?php echo $row->user_name; ?></td>
                                                <td>
                                                	<?php echo $row->email_address; ?>
                                                	<?php echo '<br>'.$row->phone_number; ?>
                                                </td>
                                                <td><?php echo $row->user_country; ?></td>
                                                <td><?php echo $row->created_at; ?></td>
                                                <td> <a href="<?= base_url() ?>/admin/all_users/details/<?php echo $row->tbl_user_id;?>">
			                                        <i class="mdi mdi-desktop-mac mdi-36px"></i>
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
 <?= $this->endSection() ?>