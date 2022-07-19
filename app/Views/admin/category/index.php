 <?= $this->extend('admin/master'); ?>
 <?= $this->section('content'); ?>

 <div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
 
 
  

        	<h4 class="d-flex">Manage Category <button type="button" class="ms-auto btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
				  <i class="fa fa-fw fa-plus"></i>Add Category
				</button></h4>
        
        	
        	     <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        		   <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                            <thead class="bg-info">
                                            <tr>
                                                <th>Name</th>
                                                <th>Icon</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                               
                                            </tr>
                                            </thead>
                                            <tbody>
    										<?php foreach($all_category as $row){?>	
                                              <tr>
                                                <td><?php echo $row->category_name; ?></td>
                                                <td>
                                                	<i class="<?php echo $row->category_icon?>"></i>;
                                                </td>
                                                <td>
                                                	<?php if($row->status == 0)
                                                	{
                                                		echo '<p class="badge bg-success">Active</p>';
                                                	}
                                                	else
                                                	{
                                                		echo '<p class="badge bg-danger">Deactive</p>';
                                                	}
                                                	?>

                                                </td>
                                          
                                                <td> <a href="#" data-id="<?php echo $row->id ?>" class="catgegory_edit">
			                                        <i class="mdi mdi-square-edit-outline mdi-36px"></i>
			                                    </a>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	 <span id="success_message" style="color:green;"></span> 
      	<form method="post" action="<?= base_url() ?>/admin/category" id="category_insert">
            <div class="form-group">
            <label>Name<span class="text--danger">*</span></label>
            <input type="text" name="category_name" class="form-control" placeholder="category Name">
            <span id="mgs1" style="color:red;"></span> 
           </div><br>
      
		   <label>Icon<span class="text--danger">*</span></label>
		    <div class="input-group mb-3">
			<input data-placement="bottomRight"  type="text" class="form-control  icp demo" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2" value="fas fa-archive" name="category_icon">

			<span class="input-group-text" id="basic-addon2"> <span class="input-group-addon"></span></span>
			</div>
			<span id="mgs2" style="color:red;"></span>
		</form>	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="category_submit">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Category Edit modal-->
<div class="modal fade editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	<form method="post" action="<?= base_url() ?>/admin/category/edit" id="category_update_data">
            <div class="form-group">
            <label>Name <span>*</span></label>
            <input type="text" name="category_name" class="form-control category1" placeholder="category Name">
             <small style="color:red;" class="text-danger">
            <span class="mgs1" style="color:red;"></span> 
           </div><br>
      
		   <label>Icon <span>*</span></label>
		    <div class="input-group mb-3">
			<input data-placement="bottomRight"  type="text" class="form-control  icp demo category2" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2" value="fas fa-archive" name="category_icon">

			<span class="input-group-text" id="basic-addon2"> <span class="input-group-addon"></span></span>
			</div>
			<span class="mgs2" style="color:red;"></span>
			<input type="hidden" name="id" class="category3">

             <label>Status <span>*</span></label>
			 <div class="form-group">
			 	
              <div class="toggle_button">
              		<input type="checkbox" checked data-toggle="toggle" data-on="Active" data-off="Deactive" data-onstyle="success" data-offstyle="danger" name="status" id="capture">
              </div>
              <!-- <div class="toggle_button1">
              		<input type="checkbox"  data-toggle="toggle" data-on="Active" data-off="Deactive" data-onstyle="success" data-offstyle="danger" name="status">
              </div> -->

           </div>

		</form>	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="category_update">Save changes</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">

	 $(document).ready(function() {

	 		
	    	$(document).on("click","#category_submit",function() {
	    
	    	 var url = $('#category_insert').attr('action');
	   
             var request = $('#category_insert').serialize();	
 
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

                        $('#category_insert')[0].reset();
                   
                          $('#exampleModal').modal('hide'); 
                          window.location.reload();
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
	 

	//category edit-------------
	$('.catgegory_edit').click(function(){
		$('.toggle_button').hide();
		$('.toggle_button1').hide();

		  $('#mgs1').html('');
	      $('#mgs2').html('');
	      $('.mgs1').html('');
	      $('.mgs2').html('');
		$('.editModal').modal('show'); 
		var cat_id=$(this).attr('data-id');
		var url='<?php echo base_url() ?>/admin/category/edit';
		  $.ajax({
	          url: url,
	          type: 'get',
	          async: false,
	          data: {cat_id:cat_id},
	          dataType: 'JSON',
	          success: function(data) {
	          	
	          	$('.category1').val(data.category_name);
	          	$('.category2').val(data.category_icon);
	          	$('.category3').val(data.id);

	          	
                    if(data.status == 0) {
                    
		                $('.toggle_button').show();
                   
                       
                     }
                     else
                     {
                     	$('.toggle_button').show();
                       //$("#capture").removeAttr('checked');
                       $("#capture").prop('checked', false);
                     }	
                 
	          }

	          });

	}); 

	//category update---------
	   $(document).on("click","#category_update",function() {
	        
	    	 var url = $('#category_update_data').attr('action');
	   
             var request = $('#category_update_data').serialize();	
 
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

                        $('#category_update_data')[0].reset();
                   
                          $('.editModal').modal('hide'); 
                          window.location.reload();
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
	 }); 

</script>

<style type="text/css">
	.iconpicker-popover.popover{
		opacity: 1 !important;
	}
</style>
 <?= $this->endSection() ?>

