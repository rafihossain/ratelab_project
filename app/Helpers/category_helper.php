<?php

if (!function_exists("category_section")) {
    function category_section($category, $categorymodel){ ?>

    <section class="category-section pt-100 pb-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="section-header text-center mb-4">
                                    <h2 class="section-title style--two"><?= $category[0]['settings_value']; ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="category-list d-flex">
                                    <?php foreach ($categorymodel as $category) : ?>
                                        <a href="<?= base_url() ?>/admin/companies/category/<?= $category->id; ?>" class="category-list__single">
                                            <i class="<?= $category->category_icon; ?>"></i> <span><?= $category->category_name; ?></span>
                                        </a>
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
