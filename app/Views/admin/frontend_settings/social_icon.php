<?= $this->extend('admin/master'); ?>
 <?= $this->section('content'); ?>

 <div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
 

  

        	<h4 class="d-flex">Social Icon<button type="button" class="ms-auto btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
				  <i class="fa fa-fw fa-plus"></i>Add New
				</button></h4>
        
                <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif;?>

          

                <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                            <thead class="text-white" style="background-color:#7367f0">
                                            <tr>
                                                <th>SL</th>
                                                <th>Title</th>
                                                <th>Social icon</th>
                                                <th>Url</th>
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
        <h5 class="modal-title" id="exampleModalLabel">Add New Social icon Item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	<form method="post" action="<?= base_url() ?>/admin/social_icon_submit" id="social_icon">
            <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title">
            <span id="mgs1" style="color:red;"></span> 
           </div><br>

            <label>Icon</label>
		    <div class="input-group mb-3">
			<input data-placement="bottomRight"  type="text" class="form-control  icp demo" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2" value="fas fa-archive" name="icon">
			<span class="input-group-text" id="basic-addon2"> <span class="input-group-addon"></span></span>
			</div>        

           <div class="form-group">
              <label>Icon</label>
              <input type="text" placeholder="Url" class="form-control" name="url">
              <span id="mgs2" style="color:red;"></span> 
           </div><br>

		</form>	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="social_icon_submit">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Social icon Item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?= base_url() ?>/admin/social_icon_update" id="social_icon_update_data">
      <input type="hidden" id="social_id" name="social_id">
            <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title" id="title_show">
            <span class="mgs1" style="color:red;"></span> 
           </div><br>

            <label>Icon</label>
		    <div class="input-group mb-3">
			<input data-placement="bottomRight"  type="text" class="form-control  icp demo" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2" value="fas fa-archive" name="icon" id="icon_show">
			<span class="input-group-text" id="basic-addon2"> <span class="input-group-addon"></span></span>
			</div>        

           <div class="form-group">
              <label>Url</label>
              <input type="text" placeholder="Url" class="form-control" name="url" id="url_show">
              <span class="mgs2" style="color:red;"></span> 
           </div><br>

		</form>		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="social_icon_update">Update</button>
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
                    url: '<?= base_url() ?>/admin/social_icon_index',
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
                            '<td>' + data[i].title + '</td>' +
                            '<td style="">'+'<i class="fa '+ data[i].social_icon +'"></i>'+'</td>' +
                            '<td>' + data[i].url + '</td>' +
                            '<td style="text-align:left;">' +
                            '<a href="#" class="btn btn-primary btn-sm edit payment_editModal mr-2" id="" data-id="' + data[i].id + '"><i class="fas fa-edit"></i></a>' + 
                            '<a href="#" class="btn btn-danger btn-sm social_icon_delete" data_id="' + data[i].id + '"><i class="fas fa-trash"></i></a>' +
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


       	$(document).on("click","#social_icon_submit",function() {
            
	    
        var url = $('#social_icon').attr('action');
   
        var request = $('#social_icon').serialize();	

         $.ajax({
         url: url,
         type: 'post',
         async: false,
         data: request,
         dataType: 'JSON',
         success: function(data) {

             //success message show----------
            if (data.success == true) {

                    $('#mgs1').html('');
                    $('#mgs2').html('');

                    $('#social_icon')[0].reset();
            
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

   $(document).on('click', '.social_icon_delete', function(e){
        e.preventDefault();
        var id=$(this).attr('data_id');
        $.ajax({  
              url: '<?php echo base_url() ?>/admin/social_icon_delete',
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
              url: '<?php echo base_url() ?>/admin/social_icon_edit',
              data:{
                  id:id
              },
              success: function(data) {
               var all_data=JSON.parse(data);
              
               $('#title_show').val(all_data[0].title);
               $('#icon_show').val(all_data[0].social_icon);
               $('#url_show').val(all_data[0].url);
               $('#social_id').val(all_data[0].id);  

              }
        });
      });  
  
      $(document).on("click","#social_icon_update",function() {

            var url = $('#social_icon_update_data').attr('action');
      
            var request = $('#social_icon_update_data').serialize();	
   
            $.ajax({
            url: url,
            type: 'post',
            async: false,
            data: request,
            dataType: 'JSON',
            success: function(data) {
   
                //success message show----------
               if (data.success == true) {
   
                       $('.mgs1').html('');
                       $('.mgs2').html('');
   
                       $('#social_icon_update_data')[0].reset();
               
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
      

        var quill = new Quill('#snow_new', {
        theme: 'snow'
      });

        $(document).on('change', '.profilePicUpload', function(e) {
            //console.log(this);
            readUrl(this);
        });

        $('.remove-image').on('click', function(e) {
            $(this).parents('.profilePicPreview').css('background-image', 'none');
            $(this).parents('.profilePicPreview').removeClass('has-image');
            $(this).parents('.thumb').find('input[type=file]').val('');
        });

    });


    function readUrl(input) {


        if (input.files && input.files[0]) {
            // console.log('hello');
            var reader = new FileReader();
            reader.onload = function(e) {

                var preview = $(input).parents('.thumb').find('.profilePicPreview');
                var check = $(preview).css('background-image', 'url(' + e.target.result + ')');

                $(preview).addClass('has-image');
            }
            reader.readAsDataURL(input.files[0]);
        }


    }

</script>
 <?= $this->endSection() ?>

