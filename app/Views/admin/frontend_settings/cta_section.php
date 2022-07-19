<?= $this->extend('admin/master'); ?>
 <?= $this->section('content'); ?>

 <div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
 

  

        	<h4 class="d-flex">CTA Section<button type="button" class="ms-auto btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color:#7367f0">
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
                            <form action="<?= base_url() ?>/admin/frontend/cta_section" method="POST" enctype="multipart/form-data">
                                  <div class="form-group ">
                                        <label class="form-control-label font-weight-bold">Heading</label>

                                        <input type="text" class="form-control" name="heading" value="<?php echo $cta_section[0]['settings_value'];?>">
                                    </div><br>

                                    <div class="form-group">
                                        <label class="form-control-label  font-weight-bold">Subheading</label>
                                        <textarea name="sub_heading" class="form-control" id="" cols="30" rows="10"><?php echo $cta_section[1]['settings_value'];?></textarea>
                                    </div>
                                    
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary w-100 mt-4 bg-dark">Submit</button>
                                    </div>
                            </form>
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
                                                <th>Title</th>
                                                <th>Icon</th>
                                                <th>Url</th>
                                                <th>Button name</th>
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
        <h5 class="modal-title" id="exampleModalLabel">Add New Cta Item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	<form method="post" action="<?= base_url() ?>/admin/cta_item_insert" id="cta_item">
            <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title">

            <span id="mgs1" style="color:red;"></span> 
           </div><br>

           <div class="form-group">
            <label>Description</label>
             <textarea name="description" id="" cols="30" rows="5" class="form-control" placeholder="Description"></textarea>       

            <span id="mgs2" style="color:red;"></span> 
           </div><br>

		   <label>Icon</label>
		    <div class="input-group mb-3">
			<input data-placement="bottomRight"  type="text" class="form-control  icp demo" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2" value="fas fa-archive" name="icon">
			<span class="input-group-text" id="basic-addon2"> <span class="input-group-addon"></span></span>
			</div>

            <div class="form-group">
            <label>Url</label>
            <input type="text" name="url" class="form-control" placeholder="Url">

            <span id="mgs3" style="color:red;"></span> 
           </div><br>

           <div class="form-group">
            <label>Button name</label>
            <input type="text" name="button_name" class="form-control" placeholder="Button name">
            <span id="mgs4" style="color:red;"></span> 
           </div><br>

		</form>	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="cta_item_submit">Save</button>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Choose reason Item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?= base_url() ?>/admin/cta_item_update" id="cta_item_update_data">
           <input type="hidden" name="cta_id" id="cta_id">       
            <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title" id="title_show">

            <span class="mgs1" style="color:red;"></span> 
           </div><br>

           <div class="form-group">
            <label>Description</label>
             <textarea name="description" cols="30" rows="5" class="form-control" placeholder="Description" id="description_show"></textarea>       

            <span class="mgs2" style="color:red;"></span> 
           </div><br>

		   <label>Icon</label>
		    <div class="input-group mb-3">
			<input data-placement="bottomRight"  type="text" class="form-control  icp demo" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2" value="fas fa-archive" name="icon" id="icon_show">
			<span class="input-group-text" id="basic-addon2"> <span class="input-group-addon"></span></span>
			</div>

            <div class="form-group">
            <label>Url</label>
            <input type="text" name="url" class="form-control" placeholder="Url" id="url_show">

            <span class="mgs3" style="color:red;"></span> 
           </div><br>

           <div class="form-group">
            <label>Button name</label>
            <input type="text" name="button_name" class="form-control" placeholder="Button name" id="button_show">
            <span class="mgs4" style="color:red;"></span> 
           </div><br>

		</form>		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="cta_item_update">Save</button>
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
                    url: '<?= base_url() ?>/admin/cta_item_index',
                    dataType: 'json',
                    success: function(data) {
                       
                      var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            var j=i;
                            j=j+1;
                            html += '<tr>'+
                            '<td>' + j + '</td>' +
                            '<td>' + data[i].title + '</td>' +
                            '<td style="">'+'<i class="fa '+ data[i].icon +'"></i>'+'</td>' +
                            '<td>' + data[i].url + '</td>' +
                            '<td>' + data[i].button_name + '</td>' +
                            '<td style="text-align:left;">' +
                            '<a href="#" class="btn btn-primary btn-sm edit  mr-2" id="" data-id="' + data[i].id + '"><i class="fas fa-edit"></i></a>' + 
                            '<a href="#" class="btn btn-danger btn-sm cta_item_delete" data_id="' + data[i].id + '"><i class="fas fa-trash"></i></a>' +
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


       	$(document).on("click","#cta_item_submit",function() {
           

	    
        var url = $('#cta_item').attr('action');
   
        var request = $('#cta_item').serialize();	

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
                    $('#mgs3').html('');
                    $('#mgs4').html('');

                    $('#cta_item')[0].reset();
            
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
                 if (data.msg3 != '') {
                   $('#mgs3').html(data.msg3);
                   }
                else {
                   $('#mgs3').html('');
                 }
                 if (data.msg4 != '') {
                   $('#mgs4').html(data.msg4);
                   }
               else {
                   $('#mgs4').html('');
                 }

               }

         }

         });

        
      });

   $(document).on('click', '.cta_item_delete', function(e){
        e.preventDefault();
        var id=$(this).attr('data_id');
        $.ajax({  
              url: '<?php echo base_url() ?>/admin/cta_item_delete',
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
         $('.mgs3').html('');
         $('.mgs4').html('');

      $('#editModal').modal('show'); 
        e.preventDefault();
        let id=$(this).attr('data-id');
        $.ajax({  
              url: '<?php echo base_url() ?>/admin/cta_item_edit',
              data:{
                  id:id
              },
              success: function(data) {
               var all_data=JSON.parse(data);
                console.log(all_data);
               $('#title_show').val(all_data[0].title);
               $('#description_show').val(all_data[0].description);
               $('#icon_show').val(all_data[0].icon);
               $('#url_show').val(all_data[0].url);
               $('#button_show').val(all_data[0].button_name);
               $('#cta_id').val(all_data[0].id); 

              }
        });
      });  
  
      $(document).on("click","#cta_item_update",function() {
	    
            var url = $('#cta_item_update_data').attr('action');
      
            var request = $('#cta_item_update_data').serialize();	
   
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
                       $('.mgs3').html('');
                       $('.mgs4').html('');

                       $('#cta_item_update_data')[0].reset();
               
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
                 if (data.msg3 != '') {
                   $('.mgs3').html(data.msg3);
                   }
                else {
                   $('.mgs3').html('');
                 }
                 if (data.msg4 != '') {
                   $('.mgs4').html(data.msg4);
                   }
               else {
                   $('.mgs4').html('');
                 }

               }
   
            }
   
            });
   
           
         });

</script>

 <?= $this->endSection() ?>

