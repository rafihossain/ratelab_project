<?= $this->extend('frontend/master'); ?>
<?= $this->section('content'); ?>
<!-- home start -->
<section class="bg-home bg-gradient" id="home">
    <div class="home-center">
        <div class="home-desc-center">
            <div class="container-fluid">
                <div class="row align-items-center">
                      <h2 align="center" class="text-white">Blogs</h2>
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
    <div class="container-fluid mt-3 mb-3">
       <div class="row">
       <?php foreach($blog as $blogs){
           ?> 
                <div class="col-md-4 w-30">

                    <!-- Simple card -->
                    <div class="card">
                        <a href="<?php echo base_url();?>/blog_details/<?php echo $blogs['id'];?>">
                        <img class="card-img-top img-fluid" src="<?php echo base_url()?>/admin/uploads/blog_section/<?php echo $blogs['image'];?>" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $blogs['title'];?></h4>
                        </a>
                            <p class="card-text"><?php 
                            echo substr_replace($blogs['description'], "...", 100);?></p>
                            <a href="<?php echo base_url();?>/blog_details/<?php echo $blogs['id'];?>" class="btn btn-primary">Read More<i class="las la-long-arrow-alt-right"></i></a>
                        </div>
                    </div>

                </div>
           
        <?php } ?>
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


