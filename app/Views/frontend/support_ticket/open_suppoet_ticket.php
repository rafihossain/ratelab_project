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
                        <h3 align="center" class="text-white">Support Tickets</h3>
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
                    <div class="card-header bg-dark">
                        <h5 class="text-white">My Support Tickets</h5>
                    </div><br>
                    <form action="<?php echo base_url();?>/support/ticket/new" class="signin-form" method="post" enctype="multipart/form-data">
                    <div class="overflow-hidden">
                       <div class="row">

                                <div class="col-md-6">
                                   <label>Full Name</label>
                                    <div class="form-group">
                                     
                                    <input id="fileinput" type="text" name="full_name" class="form-control" value="<?php echo $session_data['name']; ?>" readonly>

                                 </div><br>

                                  <div class="form-group" style="margin-top:10px;">
                                    <label>Priority</label>
                                    <select name="priority" id="" class="form-control">
                                        <option value="">choose----</option>
                                        <option value="high">High</option>
                                        <option value="medium">Medium</option>
                                        <option value="low">Low</option>
                                    </select>

                                 </div>
                                 <br>

                               </div>

                            <div class="col-md-6">
                                   <label>Email Address</label>
                                    <div class="form-group">
                                     
                                    <input id="fileinput" type="email" name="email_address" class="form-control" value="<?php echo $session_data['email'];?>" readonly>
                                 </div><br>

                                  <div class="form-group mt-2">
                                    <label>subject</label>
                                    <input type="text" name="subject" class="form-control" placeholder="write subject">
                                    <small style="color:red;" class="text-danger">
                                      <?php if (isset($validation)) {
                                                  
                                                echo $validation->getError('subject');
                                                } ?>
                                      </small> 
                                 </div>
                                 <br>

                               </div>
                               
                               </div>
                       </div>                           		 
                  
                          <div class="form-group col-md-12">
                             <label for="exampleFormControlTextarea1" class="form-label">Message </label>
                              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message" placeholder="write message"></textarea>
                              <small style="color:red;" class="text-danger">
                                <?php if (isset($validation)) {
                                            
                                        echo $validation->getError('message');
                                        } ?>
                                </small> 
                         </div><br>

                         <label for="" class="form-label">Attachments </label><br>
                         <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected col-md-8">
                             <input type="file" class="form-control" name="attachments[]"><span class="input-group-btn input-group-append"><button class="btn btn-warning bootstrap-touchspin-up addFile" type="button">+</button></span>
                        </div>
                        <small style="color:red;" class="text-danger">
                        <?php if (isset($validation)) {
                                    
                                echo $validation->getError('attachments');
                                } ?>
                        </small> 
                        <div class="mt-3" id="appendContainer"></div>
                        <span class="ticket-attachments-message text-muted">
                        Allowed File Extensions: .jpg,
                        .jpeg, .png, .pdf,
                        .doc, .docx                                                    </span>
                         <br><br>
                          <div class="form-group col-md-12">
                                <button class="btn btn-warning waves-effect waves-light w-100" type="submit">Submit</button>
                          </div>
                    </div>

                     </form>
                
                    </div>
            </div>
        </div>
      
    </div>
    <!-- end container-fluid -->
</section>
<!-- services end -->
<style>
    .input-group {
    position: relative;
    display: flex;
    flex-wrap: wrap;
    align-items: stretch;
    width: 100%;
}

.btn-base {
    background-color: rgb(var(--r), var(--g), var(--b));
    color: #fff;
}
</style>
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

