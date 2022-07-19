<?= $this->extend('admin/master'); ?>
 <?= $this->section('content'); ?>

 <div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
 
 
  

        	<h4 class="d-flex">Support Tickets</h4>

        	     <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        		   <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                          <thead class="text-white" style="background-color:#7367f0;">
                                                <tr>
                                                    <th>Subject</th>
                                                    <th>Submitted By</th>
                                                    <th>Status</th>
                                                    <th>Priority</th>
                                                    <th>Last Reply</th>
                                                    <th>Action</th>
                                                        
                                                </tr>
                                            </thead>
                                    <tbody>
                                          
                                <?php foreach($all_ticket as $all_tickets){
                                    
                                    $date=$all_tickets->created_at;

                                    $date_string=strtotime($date);
                                    
                                    $current_time=time();

                                    $new_time=$current_time - $date_string;


                                    $min=$new_time/60;
                                    $new_min=number_format((float)$min, 0, '.', '');
                                    $days=$new_time/86400;
                                    $new_days=number_format((float)$days, 0, '.', '');
                                    $hour=$new_time/3600;
                                    $new_hour=number_format((float)$hour, 0, '.', '');

                                    // $time = Time::parse($all_tickets->created_at, 'America/Chicago');
                                    // echo $time->toLocalizedString('MMM d, yyyy')
                                    ?>
                                <tr>
                                    <td>
                                       <?php echo '[Ticket#'.$all_tickets->ticket_id.']'.' '.$all_tickets->subject;?> 
                                    </td>
                                    <td>
                                       <?php echo $all_tickets->full_name;?>
                                    </td>
                                    <td class="text-center">
                                    <?php 
                                    if($all_tickets->status == 0){    
                                      echo '<span class="badge bg-success">Open</span>';
                                    }
                                    else if($all_tickets->status == 1)
                                    {
                                        echo '<span class="badge bg-dark text-white">closed</span>'; 
                                    }
                                    else if($all_tickets->status == 2)
                                    {
                                        echo '<span class="badge bg-warning text-white">Customer Reply</span>'; 
                                    }
                                    ?>
                                    </td>
                                    <td class="text-center">
                                        <?php 
                                            if($all_tickets->priority == 'high')
                                            {
                                                echo ' <span class="badge bg-info">High</span>';
                                            }
                                            else if($all_tickets->priority == 'medium')
                                            {
                                                echo ' <span class="badge bg-secondary">Medium</span>';
                                            }
                                            else
                                            {
                                                echo ' <span class="badge bg-danger">Low</span>'; 
                                            }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                    <?php 
                                        if($new_days > 0)
                                        {
                                            if($new_days == 1){
                                                echo '<br>'.$new_days.' '.'day ago';
                                            }
                                            else
                                            {
                                                    echo '<br>'.$new_days.' '.'days ago';
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
                                        else if($min>60)
                                        {
                                            if($new_hour == 1){
                                                echo '<br>'.$new_hour.' '.'hour ago';
                                            }
                                            else
                                            {
                                                echo '<br>'.$new_hour.' '.'hours ago';
                                            }
                                        }
                                    
                                ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?= base_url() ?>/admin/tickets/view/<?php echo $all_tickets->ticket_id;?>">
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


 <?= $this->endSection() ?>

