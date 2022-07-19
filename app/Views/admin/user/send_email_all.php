 <?= $this->extend('admin/master'); ?>
 <?= $this->section('content'); ?>

 <div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
        	<h4>Send Email To All Users</h4>
        	     <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        		                      <form method="post" action="<?php echo base_url();?>/admin/user/send_email_all">
                                          <div class="form-group">
                                            <label>Subject <span class="text--danger">*</span></label>
                                            <input type="text" name="subject" class="form-control" placeholder="Email Subject">
                                           <small style="color:red;" class="text-danger">
                                                  <?php if (isset($validation)) {
                                                    echo $validation->getError('subject');
                                                    } ?>
                                          </small> 
                                          </div><br>

                                          
                                        <div class="form-group">
                                                <label>Message <span class="text--danger">*</span></label>
                                                 <textarea class="form-control" row="3" name="message">
                                                     
                                                 </textarea>
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

 <?= $this->endSection() ?>