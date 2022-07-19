<?= $this->extend('admin/master'); ?>
 <?= $this->section('content'); ?>

 <style>
    .image-upload .thumb .profilePicUpload {
        opacity: 0;
    }

    .image-upload .thumb .profilePicPreview {
        width: 100%;
        height: 310px;
        display: block;
        border: 3px solid #f1f1f1;
        box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.25);
        border-radius: 10px;
        background-size: cover !important;
        background-position: top;
        background-repeat: no-repeat;
        position: relative;
        overflow: hidden;
    }

    .image-upload .thumb .profilePicPreview .remove-image {
        position: absolute;
        top: -9px;
        right: -9px;
        text-align: center;
        width: 55px;
        height: 55px;
        font-size: 24px;
        border-radius: 50%;
        background-color: #df1c1c;
        color: #fff;
        display: none;
    }

    .image-upload .thumb .profilePicPreview.has-image .remove-image {
        display: block;
    }

    .image-upload .thumb .select-logo,
    .select_favicon {
        display: block;
        width: 100%;
        background-color: #624bdf;
        padding: 12px;
        border-radius: 5px;
        color: #fff;
        text-align: center;
        font-weight: 200;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #7367f0;
        border-color: #7367f0;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__display, .select2-container--default .select2-selection--multiple .select2-selection__choice__remove span {
        color: #ffffff;
        font-size: 12px;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
        background-color: #5e50ee;
    }


</style>
 <div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
 

  

        	<h4 class="d-flex">Testimonial<button type="button" class="ms-auto btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
				  <i class="fa fa-fw fa-plus"></i>Add New
				</button></h4>
        
                <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif;?>

            <div class="col-lg-12 col-md-12 mb-30">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url() ?>/admin/frontend/testimonial" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="old_image" value="<?php echo $testimonial[2]['settings_value'];?>">
                            <div class="row">

                                   <div class="form-group mb-2 ml-1">
                                        <label class="form-control-label font-weight-bold"><b>Heading</b></label>

                                        <input type="text" class="form-control" name="heading" value="<?php echo $testimonial[0]['settings_value'];?>">
                                    </div><br>

                                    <div class="form-group ml-1">
                                        <label class="form-control-label  font-weight-bold"><b>Subheading</b></label>
                                        <input type="text" name="sub_heading" class="form-control" value="<?php echo $testimonial[1]['settings_value'];?>">
                                    </div>
                                <div class="col-xl-4">
                                    <div class="form-group">
                                        <div class="image-upload">
                                            <div class="thumb">
                                                <div class="avatar-preview">
                                                    <div class="profilePicPreview profilePicPreview1" style="background-image: url(<?= base_url() ?>/admin/uploads/testimonial/<?php echo $testimonial[2]['settings_value'];?>)">
                                                        <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                                    </div>
                                                </div>
                                                <div class="avatar-edit">
                                                    <label for="">Image</label>
                                                    <input type="file" class="profilePicUpload profilePicUpload1" name="image_input" id="profilePicUpload1" accept=".png, .jpg, .jpeg" require="">
                                                    <label for="profilePicUpload1" class="select-logo">Image</label>
                                                    <small class="mt-2 text-facebook">Supported files: <b>jpeg, jpg, png</b>. Image will be resized into 1920x840 px.</small>
                                                </div>
                                            </div>
                                        </div>
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

                <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                            <thead class="text-white" style="background-color:#7367f0">
                                            <tr>
                                                <th>SL</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Action</th>
                                               
                                            </tr>
                                            </thead>
                                            <tbody id="showdata">
                                        
                                           </tbody>
                                 </table>
                        </div>
                   </div>
                  </div>
                </div>

        </div> <!-- container-fluid -->

    </div> <!-- content -->
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Testimonial Item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

          <form method="post" action="<?= base_url() ?>/admin/testimonial_item_submit" id="testimonial_item" enctype="multipart/form-data">

            <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name">
            <span id="mgs1" style="color:red;"></span> 
           </div><br>

           <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" class="form-control" placeholder="Address">
            <span id="mgs2" style="color:red;"></span> 
           </div><br>

           <div class="form-group">
            <label>Quote</label>
             <textarea id="" cols="30" rows="5" class="form-control" placeholder="Quote" name="quote"></textarea>       
           </div>

           <div class="form-group">
                    <div class="image-upload">
                        <div class="thumb">
                            <div class="avatar-preview">
                            <label for="">Image</label><br>
                                <div class="profilePicPreview profilePicPreview_new" style="background-image: url(<?= base_url() ?>/admin/uploads/testimonial/)">
                                    <button type="button" class="remove-image remove_image"><i class="fa fa-times"></i></button>
                                </div>
                            </div>
                            <div class="avatar-edit">
                                <input type="file" class="profilePicUpload profilePicUpload_new" name="image" id="profilePicUpload_new" accept=".png, .jpg, .jpeg" require="">
                                <label for="profilePicUpload_new" class="select-logo">Image</label>
                                <small class="mt-2 text-facebook">Supported files: <b>jpeg, jpg, png</b>. Image will be resized into 1920x840 px.</small>
                            </div>
                        </div>
                    </div>
                </div>
		</form>	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="testimonial_item_submit">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FAQ's Items</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?= base_url() ?>/admin/testimonial_item_update" id="testimonial_item_update_data" enctype="multipart/form-data">
        <input type="hidden" id="testimonial_id" name="testimonial_id">            
        <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" placeholder="Name" id="name_show">
        <span class="mgs1" style="color:red;"></span> 
        </div><br>

        <div class="form-group">
        <label>Address</label>
        <input type="text" name="address" class="form-control" placeholder="Address" id="address_show">
        <span class="mgs2" style="color:red;"></span> 
        </div><br>

        <div class="form-group">
        <label>Quote</label>
        <textarea cols="30" rows="5" class="form-control" placeholder="Quote" name="quote" id="quote_show"></textarea>       
        </div>

        <div class="form-group">
            <div class="image-upload">
                <div class="thumb">
                    <div class="avatar-preview">
                    <label for="">Image</label><br>
                        <div class="profilePicPreview profilePicPreview_new1" style="background-image: url(<?= base_url() ?>/admin/uploads/testimonial/)">
                            <button type="button" class="remove-image remove_image"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="avatar-edit">
                        <input type="file" class="profilePicUpload profilePicUpload_new1" name="image" id="profilePicUpload_new1" accept=".png, .jpg, .jpeg" require="">
                        <label for="profilePicUpload_new1" class="select-logo">Image</label>
                        <small class="mt-2 text-facebook">Supported files: <b>jpeg, jpg, png</b>. Image will be resized into 1920x840 px.</small>
                    </div>
                </div>
            </div>
            </div>
        </form>	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="testimonial_item_update">Update</button>
      </div>
    </div>
  </div>
</div>

<style type="text/css">
	.iconpicker-popover.popover{
		opacity: 1 !important;
	}
</style>

<script>
        showAll_tax_setting(); 

        function showAll_tax_setting() {
              $.ajax({
                    url: '<?= base_url() ?>/admin/testimonial_item_index',
                    dataType: 'json',
                    success: function(data) {
                       
                        //var abc=JSON.parse(data);
                       
                      var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            var j=i;
                            j=j+1;
                            html += '<tr>'+
                            '<td>' + j + '</td>' +
                            '<td>' +'<img src="<?= base_url() ?>/admin/uploads/testimonial/'+data[i].image+'" alt="" height="50px" width="50px" class="rounded-circle">'+'</td>' +
                            '<td>' + data[i].name + '</td>' +
                            '<td>' + data[i].address + '</td>' +
                            '<td style="text-align:left;">' +
                            '<a href="#" class="btn btn-primary btn-sm edit mr-2" id="" data-id="' + data[i].id + '"><i class="fas fa-edit"></i></a>' + 
                            '<a href="#" class="btn btn-danger btn-sm testimonial_delete" data_id="' + data[i].id + '"><i class="fas fa-trash"></i></a>' +
                            '</td>' +
                            '</tr>';
                        }
                        $('#showdata').html(html); 
                        
                    },
                    error: function() {
                        alert('Could not get Data from Database');     
                    }
                    
                });
            }


       $(document).on("click","#testimonial_item_submit",function() {

        var url = $('#testimonial_item').attr('action');
   
        var element = new FormData(document.getElementById("testimonial_item"));	

         $.ajax({
         url: url,
         type: 'post',
         async: false,
         data: element,
         processData: false,  
         contentType: false,
         dataType: 'JSON',
         success: function(data) {

             //success message show----------
            if (data.success == true) {

                    $('#mgs1').html('');
                    $('#mgs2').html('');

                    $('#testimonial_item')[0].reset();
            
                    $('#exampleModal').modal('hide'); 
                    showAll_tax_setting(); 
                }

            //Error message show-------------
              if (data.success == false) {
                    $('#success_message').html('');
               if (data.msg1 != '') {
                   $('#mgs1').html(data.msg1);
                   }
               else {
                   $('#mgs1').html('');
                 } 
                 if (data.msg2 != '') {
                   $('#mgs2').html(data.msg2);
                   }
               else {
                   $('#mgs2').html('');
                 }

               }

         }

         });

        
      });

   $(document).on('click', '.testimonial_delete', function(e){
        e.preventDefault();
        var id=$(this).attr('data_id');
        $.ajax({  
              url: '<?php echo base_url() ?>/admin/testimonial_item_delete',
              data: {
                    id:id
              },
              type: 'post',
              dataType: 'json',
              success: function(data) {

                 showAll_tax_setting(); 
              }
        });
      });

          //tax edit------
    $('#showdata').on('click', '.edit', function(e){
        $('.mgs1').html('');
         $('.mgs2').html('');
      
      $('#editModal').modal('show'); 
        e.preventDefault();
        let id=$(this).attr('data-id');
        $.ajax({  
              url: '<?php echo base_url() ?>/admin/testimonial_item_edit',
              data:{
                  id:id
              },
              success: function(data) {
               var all_data=JSON.parse(data);
               var imageUrl="<?= base_url() ?>/admin/uploads/testimonial/"+all_data[0].image;
               $('#name_show').val(all_data[0].name);
               $('#address_show').val(all_data[0].address);
               $('#quote_show').val(all_data[0].quote);
               $('#testimonial_id').val(all_data[0].id); 
               $('.profilePicPreview_new1').css("background-image",'url("' + imageUrl + '")') 
              }
        });
      });  
  
      $(document).on("click","#testimonial_item_update",function() {
	    
            var url = $('#testimonial_item_update_data').attr('action');
      
            //var request = $('#testimonial_item_update_data').serialize();	
            var request = new FormData(document.getElementById("testimonial_item_update_data"));

            $.ajax({
            url: url,
            type: 'post',
            async: false,
            data: request,
            processData: false,  
            contentType: false,
            dataType: 'JSON',
            success: function(data) {
   
                //success message show----------
               if (data.success == true) {
   
                       $('.mgs1').html('');
                       $('.mgs2').html('');
   
                       $('#testimonial_item_update_data')[0].reset();
               
                       $('#editModal').modal('hide'); 
                       showAll_tax_setting(); 
                   }
   
               //Error message show-------------
                 if (data.success == false) {
                       $('#success_message').html('');
                  if (data.msg1 != '') {
                      $('.mgs1').html(data.msg1);
                      }
                  else {
                      $('.mgs1').html('');
                    } 
                    if (data.msg2 != '') {
                      $('.mgs2').html(data.msg2);
                      }
                  else {
                      $('.mgs2').html('');
                    }
   
                  }
   
            }
   
            });
   
           
         });

</script>
<script>
    $(document).ready(function() {


        $(document).on('change', '.profilePicUpload1', function(e) {
            readUrl(this);
        });

        $('.remove-image').on('click', function(e) {
            $(this).parents('.profilePicPreview1').css('background-image', 'none');
            $(this).parents('.profilePicPreview1').removeClass('has-image');
            $(this).parents('.thumb').find('input[type=file]').val('');
        });


        $(document).on('change', '#profilePicUpload_new', function(e) {
            readUrl_new(this);
        });

        $('.remove_image').on('click', function(e) {
            $(this).parents('.profilePicPreview_new').css('background-image', 'none');
            $(this).parents('.profilePicPreview_new').removeClass('has-image');
            $(this).parents('.thumb').find('input[type=file]').val('');
        });

        $(document).on('change', '#profilePicUpload_new1', function(e) {
            readUrl_new1(this);
        });

        $('.remove_image').on('click', function(e) {
            $(this).parents('.profilePicPreview_new1').css('background-image', 'none');
            $(this).parents('.profilePicPreview_new1').removeClass('has-image');
            $(this).parents('.thumb').find('input[type=file]').val('');
        });

    });


    function readUrl(input) {


        if (input.files && input.files[0]) {
            // console.log('hello');
            var reader = new FileReader();
            reader.onload = function(e) {

                var preview = $(input).parents('.thumb').find('.profilePicPreview1');
                var check = $(preview).css('background-image', 'url(' + e.target.result + ')');

                $(preview).addClass('has-image');
            }
            reader.readAsDataURL(input.files[0]);
        }


    }

    function readUrl_new(input) {


        if (input.files && input.files[0]) {
            // console.log('hello');
            var reader = new FileReader();
            reader.onload = function(e) {

                var preview = $(input).parents('.thumb').find('.profilePicPreview_new');
                var check = $(preview).css('background-image', 'url(' + e.target.result + ')');

                $(preview).addClass('has-image');
            }
            reader.readAsDataURL(input.files[0]);
        }


    }

    function readUrl_new1(input) {
        console.log(input);
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var preview = $(input).parents('.thumb').find('.profilePicPreview_new1');
                var check = $(preview).css('background-image', 'url(' + e.target.result + ')');

                $(preview).addClass('has-image');
            }
            reader.readAsDataURL(input.files[0]);
        }

        }

</script>
 <?= $this->endSection() ?>

