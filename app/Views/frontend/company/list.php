<?= $this->extend('frontend/master'); ?>
<?= $this->section('content'); ?>
<!-- home start -->
<section class="bg-home bg-gradient" id="home">
    <div class="home-center">
        <div class="home-desc-center">
            <div class="container-fluid">
                <div class="row align-items-center">
                      <h2 align="center" class="text-white">My Companies</h2>
                </div>
                <!-- end row -->
                
            </div>
            <!-- end container-fluid -->
        </div>
    </div>
</section>
<!-- home end -->



<!-- services start -->
<section class="bg-light" style="height:100vh;">
    <div class="container-fluid">
   
 
        <table class="table table-bordered dt-responsive table-responsive nowrap mt-5">
                <thead class="bg-black">
                        <tr>
                            <th>S.N.</th>
                            <th>NAME</th>
                            <th>ADDRESS</th>
                            <th>Rating</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                                
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($all_company as $key=>$companies){?>
                            <tr>
                                <td><?php echo $key+1;?></td>
                                <td class="text-warning"><?php echo $companies->company_name;?></td>
                                <td><?php echo $companies->company_address;?></td>
                                <td>
                                    <span class="text-warning">
                                        <i class="mdi mdi-star-outline mdi-24px"></i>
                                        <i class="mdi mdi-star-outline mdi-24px"></i>
                                        <i class="mdi mdi-star-outline mdi-24px"></i>
                                        <i class="mdi mdi-star-outline mdi-24px"></i>
                                        <i class="mdi mdi-star-outline mdi-24px"></i>
                                    </span>(0)</td>
                                <td>
                                    <?php if($companies->status == 0){?>
                                        <span class="badge bg-warning">Pending</span>
                                     <?php } else if($companies->status == 1){?>
                                        <span class="badge bg-success">Approve</span>
                                     <?php } else {?>
                                        <span class="badge bg-danger">Rejected</span>
                                     <?php } ?>   
                                </td>
                                <td> 
                                    <a href="<?= base_url() ?>/user/company/edit/<?php echo $companies->id;?>">
			                        <i class="mdi mdi-desktop-mac mdi-24px"></i>
			                         </a>
			                  </td>
                            </tr>
                         <?php } ?>   
                
                    </tbody>
         </table>
      
    </div>
    <!-- end container-fluid -->
</section>
<!-- services end -->

<?= $this->endSection() ?>

