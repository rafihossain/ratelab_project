<?= $this->extend('admin/master'); ?>
 <?= $this->section('content'); ?>

 <div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
 
 
  

        	<h4 class="d-flex">Blog Section<a href="<?= base_url() ?>/admin/frontend/blog/create" type="button" class="ms-auto btn btn-primary">
				  <i class="fa fa-fw fa-plus"></i>Add New
            </a></h4>
        
                <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif;?>

        	<div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?= base_url() ?>/admin/frontend/blog_section" method="POST" enctype="multipart/form-data">
                                  <div class="form-group ">
                                        <label class="form-control-label font-weight-bold">Heading</label>

                                        <input type="text" class="form-control" name="heading" value="<?php echo $frontend_manager[0]['settings_value'];?>">
                                    </div><br>

                                    <div class="form-group">
                                        <label class="form-control-label  font-weight-bold">Subheading</label>
                                        <input type="text" class="form-control" name="sub_heading" value="<?php echo $frontend_manager[1]['settings_value'];?>" required="">
                                    </div>
                                    
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary w-100 mt-4 bg-dark">Submit</button>
                                    </div>
                            </from>
                       </div>
                   </div>
                  </div>
                </div>

                <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                            <thead class="text-white" style="background-color:#7367f0">
                                            <tr>
                                                <th>SL</th>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Action</th>
                                               
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($all_blog as $key=>$all_blogs){ ?>
                                                <tr>
                                                    <td><?php echo $key+1;?></td>
                                                    <td><img src="<?= base_url() ?>/admin/uploads/blog_section/<?= $all_blogs['image'];?>" alt="" height="50px" width="50px"></td>
                                                    <td><?php echo $all_blogs['title'];?></td>
                                                    <td>
                                                        <a href="<?= base_url()?>/admin/frontend/blog/edit/<?php echo $all_blogs['id'];?>"><i  class="mdi mdi-square-edit-outline mdi-36px"></i></a>
                                                        <a href="<?= base_url()?>/admin/frontend/blog/delete/<?php echo $all_blogs['id'];?>" class=""><i class="mdi mdi-delete mdi-36px"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>    
                                           </tbody>
                                 </table>
                        </div>
                   </div>
                  </div>
                </div>

        </div> <!-- container-fluid -->

    </div> <!-- content -->
</div>


 <?= $this->endSection() ?>

