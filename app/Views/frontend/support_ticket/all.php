<?= $this->extend('frontend/master'); ?>
<?= $this->section('content'); ?>
<!-- home start -->
<section class="bg-home bg-gradient" id="home">
    <div class="home-center">
        <div class="home-desc-center">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-10 col-sm-10">
                  <!--       <div class="home-title">
                            <h5 class="mb-3 text-white-50">Discover Adminto Today</h5>
                            <h2 class="mb-4 text-white">Make your Site Amazing & Unique with Adminto</h2>
                            <p class="text-white-50 home-desc font-16 mb-5">Adminto is a fully featured premium Landing template built on top of awesome Bootstrap 4.3.1, modern web technology HTML5, CSS3 and jQuery. </p>
                            <div class="watch-video mt-5">
                                <a href="#" class="btn btn-custom me-4">Get Started <i class="mdi mdi-chevron-right ms-1"></i></a>
                                <a href="http://vimeo.com/99025203" class="video-play-icon text-white"><i class="mdi mdi-play play-icon-circle me-2"></i> <span>Watch The Video</span></a>
                            </div>

                        </div> -->
                        <h3 align="center" class="text-white">My Support Tickets</h3>
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
   
        <div class="row">
            <?php 
                   $this->session = \Config\Services::session();  
                  $session_data= $this->session->get('login_info');
               
            ?>
            <div class="col-md-12">
                     <div class="services-box p-4 bg-white mt-4">
                  
                        <table class="table table-bordered dt-responsive table-responsive nowrap mt-5">
                            <thead class="bg-black text-white">
                                <tr>
                                    <th>SUBJECT</th>
                                    <th>STATUS</th>
                                    <th>PRIORITY</th>
                                    <th>LAST REPLY</th>
                                    <th>ACTION</th>
                                        
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
                                        <a href="<?= base_url() ?>/support/ticket/view/<?php echo $all_tickets->ticket_id;?>">
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
    <!-- end container-fluid -->
</section>
<!-- services end -->
<?= $this->endSection() ?>

