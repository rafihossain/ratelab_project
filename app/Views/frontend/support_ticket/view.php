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
                        <h3 align="center" class="text-white">View Support Ticket</h3>
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
            $session_data = $this->session->get('login_info');
            ?>

            <?php if (session()->getFlashdata('mgs')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('mgs') ?>
                </div>
            <?php endif;?>

            <div class="col-md-12">
                <div class="services-box p-4 bg-white mt-4">
                    <div class="card-header bg-dark">
                        <h5 class="text-white">
                            <?php
                            if ($ticket[0]->status == 0) {
                                echo '<span class="badge bg-success">Open</span>' . ' ';
                            } else if ($ticket[0]->status == 2) {
                                echo '<span class="badge bg-warning">Replied</span>' . ' ';
                            }

                            echo '[Ticket#' . $ticket[0]->ticket_id . ']' . ' ' . $ticket[0]->subject;
                            ?>


                            <a href="<?= base_url() ?>/support/ticket/close/<?php echo $ticket[0]->ticket_id; ?>" class="btn btn-danger waves-effect waves-light mb-2" style="float:right;"><i class="mdi mdi-close"></i></a>

                        </h5>

                    </div><br>
                    <form action="<?php echo base_url(); ?>/support/ticket/view/<?php echo $ticket[0]->ticket_id; ?>" class="signin-form" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="ticket_reply" id="" value="reply">
                        <div class="overflow-hidden">

                            <div class="form-group col-md-12">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message" placeholder="Your Reply"></textarea>
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
                                .doc, .docx </span>
                            <br><br>
                            <div class="form-group col-md-12">
                                <button class="btn btn-warning waves-effect waves-light w-100" type="submit">Reply</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-12">
            <?php foreach ($ticket as $tickets) { ?>
                <div class="services-box p-4 bg-white mt-4  mb-4" style="height:30vh">
                    <div class="row" style="border-style: 1px; border-color: #0d6efd!important;">
                        <div class="col-md-4">
                            <?php
                            $session_data = $this->session->get('login_info');
                            ?>
                            <h4><?php echo $tickets->full_name; ?></h4>
                        </div>
                        <div class="col-md-8">
                            <p>Posted on <?php echo $tickets->created_at; ?></p>
                            <p><?php echo $tickets->message ?></p>
                            <p>

                                <?php
                                if ($tickets->attachments) {
                                    $abc = explode(",", $tickets->attachments);
                                    foreach ($abc as $key => $attachment) { ?>
                                        <a class="text-warning" href='<?php echo base_url('/frontend/images/ticket/' . $attachment) ?>'> <i class="mdi mdi-file"></i> Download CV <?php echo $key + 1; ?></a>
                                <?php  }
                                } ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>


    </div>
    <!-- end container-fluid -->
</section>
<!-- services end -->

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