<?= $this->extend('admin/master'); ?>
<?= $this->section('content'); ?>



<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <h4 class="d-flex">Company list Section</h4>

            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success') ?>
                </div>

            <?php endif;?>


            <div class="col-lg-12 col-md-12 mb-30">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url() ?>/admin/frontend/company_list_section" method="POST" enctype="multipart/form-data">

                            <div class="row">

                                <div class="col-xl-12 mb-2">
                                    <div class="form-group">
                                        <label for="heading">title</label>
                                        <input class="form-control" type="text" name="title" id="heading" value="<?php echo $company_list_section[0]['settings_value'];?>">
                                    </div>
                                </div>

                                <div class="col-xl-12 mb-2">
                                    <div class="form-group">
                                        <label for="heading">Button name</label>
                                        <input class="form-control" type="text" name="button_name" id="heading" value="<?php echo $company_list_section[1]['settings_value'];?>">
                                    </div>
                                </div><br>

                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label for="heading">Link</label>
                                        <input class="form-control" type="text" name="link" id="heading" value="<?php echo $company_list_section[2]['settings_value'];?>">
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