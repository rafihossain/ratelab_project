<?php

if (!function_exists("cta_section")) {
    function cta_section($ctasectionhead, $ctacontents)
    { ?>

        <section class="cta-section pt-100 pb-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="section-header">
                                    <div class="col-md-8">
                                        <h2 class="section-title style--two"><?= $ctasectionhead['heading']; ?></h2>
                                        <p class="mt-3 section-subtitle">
                                            <?= $ctasectionhead['subheading']; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="row mt-5">

                                        <?php foreach ($ctacontents as $ctacontent) : ?>
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-body box-shadow">
                                                        <div class="cta-card__icon">
                                                            <i class="<?= $ctacontent['icon']; ?> fa-3x"></i>
                                                        </div>
                                                        <div class="cta-card__content">
                                                            <div class="choose-card__title">
                                                                <h2><?= $ctacontent['title']; ?></h2>
                                                            </div>
                                                            <div class="choose-card__description">
                                                                <p><?= $ctacontent['description']; ?></p>
                                                            </div>

                                                            <a href="<?= base_url(); ?>/admin/<?= $ctacontent['url']; ?>" class="btn btn--base mt-4"><?= $ctacontent['button_name']; ?></a>
                                                        </div>
                                                    </div>
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
