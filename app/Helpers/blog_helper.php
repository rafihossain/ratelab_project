<?php

if (!function_exists("blog_section")) {
    function blog_section($blog_section, $blog)
    { ?>

        <section class="section bg-light" id="contact">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="title text-center mb-5">
                            <h5 class="text-warning small-title"><?php echo $blog_section[1]['settings_value']; ?></h5>
                            <h1><?php echo $blog_section[0]['settings_value']; ?></h1>

                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="testimonial-slider-new">

                            <?php foreach ($blog as $blogs) { ?>
                                <div class="single-slide">
                                    <div class="col-md-12">
                                        <div class="testimonial-card">
                                            <div class="card">
                                                <a href="<?php echo base_url(); ?>/blog_details/<?php echo $blogs['id']; ?>">
                                                    <img class="card-img-top img-fluid" src="<?php echo base_url() ?>/admin/uploads/blog_section/<?php echo $blogs['image']; ?>" alt="Card image cap">
                                                </a>
                                                <div class="card-body">
                                                    <h4 class="card-title"><?php echo $blogs['title']; ?></h4>
                                                    <p class="card-text"><?php echo substr_replace($blogs['description'], "...", 100); ?></p>
                                                    <a href="<?php echo base_url(); ?>/blog_details/<?php echo $blogs['id']; ?>" class="text-warning">
                                                        Read More <i class="mdi mdi-arrow-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php }
}
