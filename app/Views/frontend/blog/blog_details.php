<?= $this->extend('frontend/master'); ?>
<?= $this->section('content'); ?>

<!-- home start -->
<section class="bg-home bg-gradient" id="home">
    <div class="home-center">
        <div class="home-desc-center">
            <div class="container-fluid">
                <div class="row align-items-center">
                      <h2 align="center" class="text-white">Blog Details</h2>
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
    <div class="container-fluid mt-5 mb-3">
       <div class="row">

                <div class="col-md-8 w-30">

                    <!-- Simple card -->
                    <div class="card">                
                        <img class="card-img-top img-fluid" src="<?php echo base_url()?>/admin/uploads/blog_section/<?php echo $single_blog['image'];?>" alt="Card image cap" height="100px">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $single_blog['title'];?></h4>
                            <p>
                               <?php
                                   $show_date = date('Y-M-d', strtotime($single_blog['created_at'])); 
                                   echo $show_date;
                                ?>
                            </p>

                            <p class="card-text"><?php 
                            echo $single_blog['description'];?></p>
                         
                        </div>
                    </div>

                </div>

                <div class="col-md-4 w-30">
                    <h3>Latest Posts</h3>
                    <!-- Simple card -->
                    <?php foreach($blog as $blogs){?> 
                    <a href="<?php echo base_url();?>/blog_details/<?php echo $blogs->id;?>">     
                    <div class="card" style="background-color:#FFF8DC;">
                        <div class="row">
                            <div class="col-md-4">
                                    <img class="card-img-top img-fluid avatar-xs" src="<?php echo base_url()?>/admin/uploads/blog_section/<?php echo $blogs->image;?>" alt="Card image cap">
                            </div>
                            <div class="col-md-8">
                                <h6><?php 
                            echo substr_replace($blogs->title, "...", 40);?></h6>
                            <p class="text-warning">
                               <?php
                                   $show_date = date('Y-M-d', strtotime($blogs->created_at)); 
                                   echo $show_date;
                                ?>
                            </p>
                            </div>
                        </div>
                    </div>
                    </a>
                    <?php } ?>

                </div>

        </div>
    </div>
    <!-- end container-fluid -->
</section>


<!-- services end -->
<style type="text/css">
        ul{
            list-style: none;
        }
        a{
            color: black;
            text-decoration: none;

        }
</style> 
 
<?= $this->endSection() ?>

