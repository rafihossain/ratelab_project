<?= $this->extend('admin/master'); ?>
 <?= $this->section('content'); ?>

 <div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
 
        <div class="row">

            <div class="col-md-12">
                     <div class="services-box p-4 bg-white mt-4">
                    <div class="card-header">
                        <h5>
                            <?php 
                            if($ticket[0]->status == 0)
                            {
                                echo '<span class="badge bg-success">Open</span>'.' ';
                            }
                            else if($ticket[0]->status == 2)
                            {
                                echo '<span class="badge bg-warning">Replied</span>'.' ';
                            }
                            
                            echo '[Ticket#'.$ticket[0]->ticket_id.']'.' '.$ticket[0]->subject;
                            ?>

                            
                           <?php if($ticket[0]->status != 1){?>

                            <a href="<?= base_url() ?>/support/ticket/close/<?php echo $ticket[0]->ticket_id;?>" class="btn btn-danger waves-effect waves-light mb-2" style="float:right;"><i class="mdi mdi-close"></i></a>

                           <?php } ?>     
                        
                        </h5>
                        
                    </div><br>
                    <form action="<?php echo base_url();?>/admin/tickets/view/<?php echo $ticket[0]->ticket_id;?>" class="signin-form" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="ticket_reply" id="" value="reply">
                    <div class="overflow-hidden">

                          <div class="form-group col-md-12">
                              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message" placeholder="Your Message"></textarea>
                              <small style="color:red;" class="text-danger">
                                <?php if (isset($validation)) {
                                            
                                        echo $validation->getError('message');
                                        } ?>
                                </small> 
                         </div><br>
                          
                         <div class="row">
                             <div class="col-md-6 ">
                             <label for="" class="form-label">Attachments </label>    
                            <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                <input type="file" class="form-control" name="attachments[]"><span class="input-group-btn input-group-append"><button class="btn btn-success bootstrap-touchspin-up addFile" type="button">+</button></span>
                            </div>
                            <div class="mt-3" id="appendContainer"></div>
                                    <small style="color:red;" class="text-danger">
                                <?php if (isset($validation)) {
                                            
                                        echo $validation->getError('attachments');
                                        } ?>
                                </small> 
                            </div>
                            <div class="col-md-3"></div>
                            <div class="col-md-3 mt-3" >
                                    <div class="form-group col-md-12">
                                        <button class="btn btn-warning waves-effect waves-light w-100" type="submit">Reply</button>
                                    </div>
                            </div>
                            
                        </div>
  
                     
                        <span class="ticket-attachments-message text-muted">
                        Allowed File Extensions: .jpg,
                        .jpeg, .png, .pdf,
                        .doc, .docx                                                    </span>
                         <br><br>
  
                    </div>

                     </form>
                
                    </div>
            </div>
        </div>

        <div class="col-md-12">
          <?php foreach($ticket as $tickets){?>  
           <div class="services-box p-4 bg-white mt-4  mb-4" style="height:30vh">
                        <div class="row" style="border-style: 1px; border-color: #0d6efd!important;">
                            <div class="col-md-4">

                                <h4><?php echo $tickets->full_name;?></h4>
                                <a href="<?= base_url() ?>/admin/all_users/details/<?php echo $tickets->user_id;?>">@<?php echo $tickets->full_name;?></a><br><br>
                                <a class="btn btn-danger" href="<?= base_url() ?>/admin/tickets/delete/<?php echo $tickets->id;?>">Delete</a>
                            </div>
                            <div class="col-md-8">
                               <p>Posted on <?php echo $tickets->created_at;?></p>
                               <p><?php echo $tickets->message?></p>
                               <p>

                                  <?php 
                                  if($tickets->attachments){
                                  $abc=explode(",",$tickets->attachments);
                                  foreach($abc as $key=>$attachment){?>
                                    <a class="text-warning" href='<?php echo base_url('/frontend/images/ticket/'.$attachment)?>'> <i class="mdi mdi-file"></i> Download CV <?php echo $key+1;?></a>
                                 <?php  }  }?> 
                                </p>
                            </div>
                        </div>        
           </div>
           <?php } ?>
        </div>


        </div> <!-- container-fluid -->

    </div> <!-- content -->
</div>
<script>
 
            $('.addFile').on('click', function(e) {
                e.preventDefault();
                $("#appendContainer").append(`
                <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected col-md-8">
                <input type="file" class="form-control" name="attachments[]"><span class="input-group-btn input-group-prepend"><button class="btn btn-danger bootstrap-touchspin-down remove-btn" type="button">-</button></span></div><br>`);
            });
            $(document).on('click', '.remove-btn', function() {
                $(this).closest('.input-group').remove();
            });

</script>

 <?= $this->endSection() ?>

