<?php

if (!function_exists("testimonial_section")) {
    function testimonial_section($titemhead, $titemcontents)
    { ?>

        <section class="testimonial-section pt-100 pb-100 bg_img" style="background-image: url('<?php echo base_url(); ?>/admin/uploads/testimonial/<?= $titemhead['image']; ?>');">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="section-header text-center">
                                    <div class="col-md-8 m-auto mt-5">
                                        <div class="section-subtitle border-left-right text--base">
                                            <?= $titemhead['subheading']; ?>
                                        </div>
                                        <h2 class="section-title style--two mb-2"><?= $titemhead['heading']; ?></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="testimonial-slider">
                                        <?php foreach ($titemcontents as $contents) : ?>
                                            <div class="single-slide">
                                                <div class="testimonial-card">
                                                    <div class="testimonial-card__thumb">
                                                        <img src="<?= base_url() ?>/admin/uploads/testimonial/<?= $contents['image']; ?>" alt="Nirob 11">
                                                    </div>
                                                    <h6 class="testimonial-card__name text-white"><?= $contents['name']; ?></h6>
                                                    <span class="testimonial-card__location"><?= $contents['address']; ?></span>
                                                    <p class="testimonial-card__text"><?= $contents['quote']; ?></p>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php }
}
