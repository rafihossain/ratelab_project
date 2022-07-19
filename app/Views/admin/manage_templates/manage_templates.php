<?= $this->extend('admin/master'); ?>
 <?= $this->section('content'); ?>

 <div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
 
        	<h4 class="d-flex">Templates</h4>
        
                <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif;?>

                <div class="row">
                    <div class="card">
                        <div class="card-body">
                          <div class="col-4">
                            <form action="<?= base_url() ?>/admin/frontend/manage_templates" method="post">
                                    <div class="from-group">
                                        <label for="theme4">Theme 1</label>
                                            <?php if($manage_templates[0]['settings_value'] == 'theme1'){?> 
                                                <div class="theme_box">
                                                    <input type="radio" name="new_theme" id="theme1" value="theme1"  class="theme5_set" checked>
                                                    <label for="theme1">
                                                        <img src="<?php echo base_url();?>/admin/uploads/theme/theme1.JPG" class="form-control">
                                                    </label>   
                                                </div>
                                            <?php } else {?> 
                                                <div class="theme_box">
                                                    <input type="radio" name="new_theme" id="theme1" value="theme1"  class="theme5_set">
                                                    <label for="theme1">
                                                        <img src="<?php echo base_url();?>/admin/uploads/theme/theme1.JPG" class="form-control">
                                                    </label>   
                                                </div>
                                                
                                            <?php } ?>     
                                    </div> 
                                <button class="btn btn-primary" type="submit">Update</button>     
                             </form>
                             </div>
                        </div>
                   </div>
                 
                </div>

        </div> <!-- container-fluid -->

    </div> <!-- content -->
</div>




 <?= $this->endSection() ?>

