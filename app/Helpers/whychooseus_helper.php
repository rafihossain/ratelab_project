<?php

if (!function_exists("whychooseus_section")) {
    function whychooseus_section($chooseushead, $chooseuscontent)
    { ?>

        <section class="glass-overlay pt-100 pb-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="section-header text-center">
                                    <div class="col-md-8 m-auto">
                                        <div class="section-subtitle border-left-right text--base">
                                            <?= $chooseushead['subheading']; ?>
                                        </div>
                                        <h2 class="section-title style--two"><?= $chooseushead['heading']; ?></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-12">
                                    <div class="row mt-5">

                                        <?php foreach ($chooseuscontent as $choose) : ?>
                                            <div class="col-md-4">
                                                <div class="card">
                                                    <div class="card-body box-shadow">
                                                        <div class="cta-card__icon">
                                                            <i class="<?= $choose['icon']; ?> fa-3x"></i>
                                                        </div>
                                                        <div class="cta-card__content">
                                                            <div class="choose-card__title">
                                                                <h2><?= $choose['title']; ?></h2>
                                                            </div>
                                                            <div class="choose-card__description">
                                                                <p><?= $choose['description']; ?></p>
                                                            </div>
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
