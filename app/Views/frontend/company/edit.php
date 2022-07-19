<?= $this->extend('frontend/master'); ?>
<?= $this->section('content'); ?>
<!-- home start -->
<section class="bg-home bg-gradient" id="home">
    <div class="home-center">
        <div class="home-desc-center">
            <div class="container-fluid">
                <div class="row align-items-center">
                  <h2 align="center" class="text-white">Edit Company</h2>
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
    <div class="container-fluid">
   
        <div class="row">

            <div class="col-md-8">
                     <div class="services-box p-4 bg-white mt-4">
                    <div class="card-header bg-dark">
                        <h5 class="text-white">Provide Your Company Information</h5>
                    </div><br>
                    <form action="<?php echo base_url();?>/user/company/edit/<?php echo $company->id?>" class="signin-form" method="post" enctype="multipart/form-data">
                    <div class="overflow-hidden">
                       <div class="row">
                               <div class="col-md-6">
                                   <label>Image<span class="text--danger">*</span></label>
                                    <div class="form-group col-md-12" style="height: 36%;">
                                    <img class="" id="picture" alt="Cinque Terre" src="<?php echo base_url('/frontend/images/company/'.$company->image) ?>" alt="" height="150px" width="150px" style="float:left;margin-right:50px;">   
                                    <input id="fileinput" type="file" name="company_image" class="d-none"/>
                                    <input type="hidden" name="old_company_image" value="<?php echo $company->image; ?>">
                                    <small style="color:red;" class="text-danger">
                                      <?php if (isset($validation)) {
                                                  
                                                echo $validation->getError('company_image');
                                                } ?>
                                      </small> 
                                 </div><br>
                                  <div class="form-group col-md-12" style="margin-top:10px;">
                                    <label>URL <span class="text--danger">*</span></label>
                                    <input type="text" name="company_url" class="form-control" placeholder="" value="<?php echo $company->url;?>">
                                    <small style="color:red;" class="text-danger">
                                      <?php if (isset($validation)) {
                                                  
                                                echo $validation->getError('company_url');
                                                } ?>
                                      </small> 
                                 </div>
                                 <br>
                                  <div class="form-group col-md-12"  style="margin-top:22px;">
                                    <label>Address<span class="text--danger">*</span></label>
                                    <input type="text" name="company_address" class="form-control" placeholder="" value="<?php echo $company->company_address;?>">
                                    <small style="color:red;" class="text-danger">
                                      <?php if (isset($validation)) {
                                                  
                                                echo $validation->getError('company_address');
                                                } ?>
                                      </small> 
                                 </div>
                                 <br>

                               </div>
                               <div class="col-md-6" style="margin-top:20px;">
                                     <div class="form-group col-md-12">
                                    <label>Company Name <span class="text--danger">*</span></label>
                                    <input type="text" name="company_name" class="form-control" placeholder="" value="<?php echo $company->company_name;?>">
                                     <small style="color:red;" class="text-danger">
                                      <?php if (isset($validation)) {
                                                  
                                                echo $validation->getError('company_name');
                                                } ?>
                                      </small> 
                                 </div><br>
                                 <div class="form-group col-md-12">
                                    <label>Category <span class="text--danger">*</span></label>
                                   
                                    <select name="categroy_id" id="" class="form-control">
                                        <option value="">select ----</option>
                                        <?php foreach($category as $categories){?>
                                          <option value="<?php echo $categories->id;?>" <?php if($categories->id == $company->category_id){echo 'selected';}?>><?php echo $categories->category_name;?></option> 
                                         <?php } ?>          
                                    </select>
                                     <small style="color:red;" class="text-danger">
                                      <?php if (isset($validation)) {
                                                  
                                                echo $validation->getError('categroy_id');
                                                } ?>
                                      </small> 
                                 </div><br>
                                 <div class="form-group col-md-12">
                                    <label>Email <span class="text--danger">*</span></label>
                                    <input type="email" name="company_email" class="form-control" placeholder="" value="<?php echo $company->email_address;?>">
                                    <small style="color:red;" class="text-danger">
                                      <?php if (isset($validation)) {
                                                  
                                                echo $validation->getError('company_email');
                                                } ?>
                                      </small> 
                                 </div><br>
                                 <div class="form-group col-md-12">
                                    <label>Tags <span class="text--danger">*</span></label>
                                    <input type="text" name="tags" class="form-control" placeholder="" value="<?php echo $company->tags;?>">
                                    <small style="color:red;" class="text-danger">
                                      <?php if (isset($validation)) {
                                                  
                                                echo $validation->getError('tags');
                                                } ?>
                                      </small> 
                                 </div><br>
                                
                               </div>
                       </div>
                         <br>                             		 
                  
                          <div class="form-group col-md-12">
                             <label for="exampleFormControlTextarea1" class="form-label">Description </label>
                              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"><?php echo $company->description;?></textarea>
                         </div><br>
                          <div class="form-group col-md-12">
                                <button class="btn btn-warning waves-effect waves-light w-100" type="submit">Submit</button>
                          </div>
                    </div>

                     </form>
                
                    </div>
            </div>
        </div>
      
    </div>
    <!-- end container-fluid -->
</section>
<!-- services end -->
<script>
$( document ).ready(function() {
     $('#picture').on('click', function() {
            $('#fileinput').trigger('click');
            // $('#image_update').trigger('submit');
    });

       //for image show-----
       window.addEventListener('load', function() {
          document.querySelector('#fileinput').addEventListener('change', function() { 
          if (this.files && this.files[0]) {
                    var img = document.querySelector('#picture');       
                    img.src = URL.createObjectURL(this.files[0]);

                 
          }
          });
          
      });

});   
</script>
<?= $this->endSection() ?>

