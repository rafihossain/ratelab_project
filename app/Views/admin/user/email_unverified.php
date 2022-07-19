 <?= $this->extend('admin/master'); ?>
 <?= $this->section('content'); ?>

 <div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
        	<h4>Manage Email Unverified Users</h4>
        	     <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        		   <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                            <thead class="bg-primary">
                                            <tr>
                                                <th>User</th>
                                                <th>Email-Phone</th>
                                                <th>Country</th>
                                                <th>Joined At</th>
                                                <th>Action</th>
                                                <
                                            </tr>
                                            </thead>
    
    
                                            <tbody>
                                            <?php foreach($email_unverified as $row){

                                                    $time=$row->created_at;
                                                    $time_str=strtotime($time);

                                                    $show_date=date('Y-m-d h:i a',$time_str);
                                                    $cuurent_time=time();

                                                    $new_time=$cuurent_time - $time_str;
                                                  
                                                    $min=$new_time/60;
                                                    $new_min=number_format((float)$min, 0, '.', '');
                                                    $days=$new_time/86400;
                                                    $new_days=number_format((float)$days, 0, '.', '');
                                                    // echo  $new_days;
                                                    // die();
                                                    $hour=$new_time/3600;
                                                    $new_hour=number_format((float)$hour, 0, '.', '');
                                                ?>	
                                            <tr>
                                                <td><?php echo $row->user_name; ?></td>
                                                <td>
                                                	<?php echo $row->email_address; ?>
                                                	<?php echo '<br>'.$row->phone_number; ?>
                                                </td>
                                                <td><?php echo $row->user_country; ?></td>
                                                <td>
                                                <?php echo $show_date;?>
                                                <?php 
                                                   
                                                       if($new_days>0)
                                                        {
                                                           
                                                            if($new_days == 1){
                                                              echo '<br>'.$new_days.' '.'day ago';
                                                            }
                                                            else
                                                            {
                                                                 echo '<br>'.$new_days.' '.' days ago';
                                                            }
                                                        } 
                                                        else if($min>60)
                                                        {
                                                            
                                                            if($new_hour == 1){
                                                              echo '<br>'.$new_hour.' '.'hour ago';
                                                            }
                                                            else if($new_hour <= 24)
                                                            {
                                                                echo '<br>'.$new_hour.' '.'hours ago';
                                                            }
                                                        }
                                                        else if($min<60)
                                                        {
                                                            
                                                            if($min==1){
                                                                echo '<br>'.$new_min.' '.'minute ago';
                                                            }
                                                            else
                                                            {
                                                                echo '<br>'.$new_min.' '.'minutes ago';
                                                            }
                                                            
                                                        }
                                                     
                                                ?>
                                            </td> 
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