<?= $this->extend('admin/master'); ?>
<?= $this->section('content'); ?>

<!-- Plugins css -->
<link href="<?= base_url() ?>/admin/assets/select2/select2.min.css" rel="stylesheet" type="text/css">




<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <h4 class="d-flex">Review</h4>

            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success') ?>
                </div>

            <?php endif;?>


            <div class="col-lg-12 col-md-12 mb-30">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url() ?>/admin/frontend/review" method="POST" enctype="multipart/form-data">

                            <div class="row">

                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label for="heading">Heading</label>
                                        <input class="form-control" type="text" name="heading" id="heading" value="<?php
                                        echo $review[0]['settings_value'];?>">
                                    </div>
                                </div>


                                <div class="form-group">
                                        <button type="submit" class="btn btn-primary w-100 mt-4 bg-dark">Submit</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div> <!-- container-fluid -->

    </div> <!-- content -->
</div>



<?= $this->endSection() ?>