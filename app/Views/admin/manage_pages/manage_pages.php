<?= $this->extend('admin/master'); ?>
 <?= $this->section('content'); ?>

 <div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
 

  

        	<h4 class="d-flex">Manage Section<button type="button" class="ms-auto btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                                                <th>Name</th>
                                                <th>Slug</th>
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
        <h5 class="modal-title" id="exampleModalLabel">Add New Page</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	<form method="post" action="<?= base_url() ?>/admin/new_page_submit" id="new_page">
            <div class="form-group">
            <label>Page Name</label>
            <input type="text" name="page_name" class="form-control" placeholder="Page Name">
            <span id="mgs1" style="color:red;"></span> 
           </div><br>    

           <div class="form-group">
              <label>Slug</label>
              <input type="text" placeholder="Slug" class="form-control" name="slug">
              <span id="mgs2" style="color:red;"></span> 
           </div><br>

		</form>	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="new_page_submit">Save</button>
      </div>
    </div>
  </div>
</div>

<script>
        showAll_tax_setting(); 

        function showAll_tax_setting() {
              $.ajax({
                    url: '<?= base_url() ?>/admin/new_page_index',
                    dataType: 'json',
                    success: function(data) {
                       
                        //var abc=JSON.parse(data);
                       
                      var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            var j=i;
                            j=j+1;
                            html += '<tr>'+

                            '<td>' + data[i].page_name + '</td>' +
                            '<td>' + data[i].slug + '</td>' +
                            '<td style="text-align:left;">' +
                            '<a href="<?= base_url() ?>/admin/new_page_edit/'+ data[i].id +'" class="btn btn-primary btn-sm edit payment_editModal mr-2" id="" data-id=""><i class="fas fa-edit"></i></a>' + 
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


       	$(document).on("click","#new_page_submit",function() {
            
	    
        var url = $('#new_page').attr('action');
   
        var request = $('#new_page').serialize();	

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

                    $('#new_page')[0].reset();
            
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


</script>

 <?= $this->endSection() ?>

