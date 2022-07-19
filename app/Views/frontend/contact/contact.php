<?= $this->extend('frontend/master'); ?>
<?= $this->section('content'); ?>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<!-- home start -->
<section class="bg-home bg-gradient" id="home">
    <div class="home-center">
        <div class="home-desc-center">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <h2 align="center" class="text-white"><?php echo $contact_heading[0]['settings_value']; ?></h2>
                </div>
                <!-- end row -->

            </div>
            <!-- end container-fluid -->
        </div>
    </div>
</section>
<!-- home end -->



<!-- services start -->
<section class="bg-light" style="height:100vh;">
    <div class="container-fluid">

        <div class="row">

            <div class="col-md-12">
                <div class="services-box p-4 bg-white mt-4">
                    <form action="<?php echo base_url(); ?>/contact" class="signin-form" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="contact" value="contact">
                        <div class="overflow-hidden">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <label>Full Name *</label>
                                            <div class="form-group">

                                                <input id="fileinput" type="text" name="full_name" class="form-control" placeholder="Full name">

                                                <small style="color:red;" class="text-danger">
                                                    <?php if (isset($validation)) {
                                                        echo $validation->getError('full_name');
                                                    } ?>
                                                </small>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label>Email Address *</label>
                                            <div class="form-group">

                                                <input id="fileinput" type="text" name="email_address" class="form-control" placeholder="Email address">

                                                <small style="color:red;" class="text-danger">
                                                    <?php if (isset($validation)) {

                                                        echo $validation->getError('email_address');
                                                    } ?>
                                                </small>
                                            </div>

                                        </div>

                                        <div class="form-group mt-2 mb-2">
                                            <label>Subject *</label>
                                            <input type="text" name="subject" class="form-control" placeholder="write subject">
                                            <small style="color:red;" class="text-danger">
                                                <?php if (isset($validation)) {

                                                    echo $validation->getError('subject');
                                                } ?>
                                            </small>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="exampleFormControlTextarea1" class="form-label">Message *</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message" placeholder="write message"></textarea>
                                            <small style="color:red;" class="text-danger">
                                                <?php if (isset($validation)) {

                                                    echo $validation->getError('message');
                                                } ?>
                                            </small>
                                        </div>
                                        
                                        <?php if($recaptcha['status'] == 1) : ?>
                                        <div class="form-group col-md-12 mt-2">
                                            <div class="g-recaptcha" data-sitekey="<?php echo $recaptcha['value']; ?>"></div>
                                            <small style="color:red;" class="text-danger">
                                                <?php if (isset($validation)) {
                                                    echo $validation->getError('g-recaptcha-response');
                                                } ?>
                                            </small>
                                        </div>
                                        <?php endif; ?>

                                        <!--custome captch-->

                                        <div class="form-group col-md-12 mt-2 d-flex align-item-center">

                                            <input type="text" class="form-control" name="captcha_text">
                                            <img src="<?php echo $image; ?>" />
                                            
                                            <small style="color:red;" class="text-danger">
                                                <?php if (isset($validation)) {
                                                    echo $validation->getError('captcha_text');
                                                } ?>
                                            </small>
                                        </div>

                                        <div class="form-group col-md-12 mt-2">
                                            <button class="btn btn-warning waves-effect waves-light w-100" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 bg-dark">
                                    <h4 class="text-white"><?php echo $contact_heading[0]['settings_value']; ?> </h5>
                                        <?php foreach ($all_contact as $all_contacts) {
                                        ?>
                                            <i class="<?php echo $all_contacts['icon']; ?> text-warning"></i> <b class="text-white"><?php echo $all_contacts['content']; ?><br><br>
                                            <?php } ?>
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

<?= $this->endSection() ?>