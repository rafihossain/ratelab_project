 <?= $this->extend('admin/master'); ?>
 <?= $this->section('content'); ?>

 <div class="content-page">
   <div class="content">

     <!-- Start Content-->
     <div class="container-fluid">
       <h4>Send Email To: <?php echo $user->user_name; ?></h4>
       <div class="row">
         <div class="col-12">
           <div class="card">
             <div class="card-body">
               <form id="identifier" method="post" action="<?php echo base_url(); ?>/admin/user/send-email/<?php echo $user->tbl_user_id ?>">
                 <div class="form-group">
                   <label>Subject <span class="text-danger">*</span></label>
                   <input type="text" name="subject" class="form-control" placeholder="Email Subject">
                   <small style="color:red;" class="text-danger">
                     <?php if (isset($validation)) {
                        echo $validation->getError('subject');
                      } ?>
                   </small>
                 </div><br>


                 <div class="form-group">
                   <label>Message <span class="text-danger">*</span></label>
                   <div id="snow-editor" style="height: 200px;">
                      
                    </div>
                    <textarea name="message" style="display:none;" id="hiddenArea"></textarea>

                   <small style="color:red;" class="text-danger">
                     <?php if (isset($validation)) {
                        echo $validation->getError('message');
                      } ?>
                   </small>
                 </div><br>

                 <div class="form-group col-md-12">
                   <button class="btn btn-info waves-effect waves-light w-100" type="submit">Send Email</button>
                 </div>
               </form>

             </div>
           </div>
         </div>
       </div>

     </div> <!-- container-fluid -->

   </div> <!-- content -->
 </div>

 <script>
    $(document).ready(function() {

      $("#identifier").on("submit", function() {

          var abc=$("#hiddenArea").val($("#snow-editor").html());
          console.log($("#snow-editor").html());

      });

    });
 </script>

 <?= $this->endSection() ?>