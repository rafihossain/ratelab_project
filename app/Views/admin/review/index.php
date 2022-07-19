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
                                            <thead style="background-color: #7367f0" class="text-white">
                                            <tr>
                                                <th>S.N.</th>
                                                <th>Review</th>
                                                <th>Company</th>
                                                <th>Username</th>
                                                <th>Rating</th>
                                                <th>Action</th>
                                               
                                            </tr>
                                            </thead>
                                            <tbody>
    											<?php foreach($all_review as $key=>$all_reviews){?>
    												<tr>
    													<td><?php echo $key+1;?></td>
    													<td><?php echo $all_reviews->company_review;?></td>
    													<td><?php echo $all_reviews->company_name;?></td>
    													<td><?php echo $all_reviews->user_name;?></td>
    													<td>
														    <?php 
				                                               if($all_reviews->company_rating == 1)
				                                               {
				                                                   echo '<i class="mdi mdi-star mdi-24px text-warning"></i>
				                                                     <i class="mdi mdi-star mdi-24px"></i>
				                                                     <i class="mdi mdi-star mdi-24px"></i>
				                                                     <i class="mdi mdi-star mdi-24px"></i>
				                                                     <i class="mdi mdi-star mdi-24px"></i>';
				                                               }
				                                               else if($all_reviews->company_rating == 2)
				                                               {
				                                                     echo '<i class="mdi mdi-star mdi-24px text-warning"></i>
				                                                     <i class="mdi mdi-star mdi-24px text-warning"></i>
				                                                     <i class="mdi mdi-star mdi-24px"></i>
				                                                     <i class="mdi mdi-star mdi-24px"></i>
				                                                     <i class="mdi mdi-star mdi-24px"></i>';
				                                               }
				                                               else if($all_reviews->company_rating ==3)
				                                               {


				                                                    echo '<i class="mdi mdi-star mdi-24px text-warning"></i>
				                                                     <i class="mdi mdi-star mdi-24px text-warning"></i>
				                                                     <i class="mdi mdi-star mdi-24px text-warning"></i>
				                                                     <i class="mdi mdi-star mdi-24px"></i>
				                                                     <i class="mdi mdi-star mdi-24px"></i>';
				                                               }
				                                               else if($all_reviews->company_rating == 4)
				                                               {

				                                                echo '<i class="mdi mdi-star mdi-24px text-warning"></i>
				                                                     <i class="mdi mdi-star mdi-24px text-warning"></i>
				                                                     <i class="mdi mdi-star mdi-24px text-warning"></i>
				                                                     <i class="mdi mdi-star mdi-24px text-warning"></i>
				                                                     <i class="mdi mdi-star mdi-24px"></i>';
				                                               }
				                                               else if ($all_reviews->company_rating == 5)
				                                               {

				                                                echo '<i class="mdi mdi-star mdi-24px text-warning"></i>
				                                                     <i class="mdi mdi-star mdi-24px text-warning"></i>
				                                                     <i class="mdi mdi-star mdi-24px text-warning"></i>
				                                                     <i class="mdi mdi-star mdi-24px text-warning"></i>
				                                                     <i class="mdi mdi-star mdi-24px text-warning"></i>';  
				                                               }
				                                               ?>
				    															
    													</td>
    													<td>
    														<a class="p-1 review_view" data-id="<?php echo $all_reviews->id;?>" href="#" style="background-color: #7367f0" data-bs-toggle="modal" data-bs-target="#review_view"><i class="mdi mdi-eye mdi-18px"></i></a>

    														<a href="" class="p-1 bg-danger"  data-bs-toggle="modal" data-bs-target="#review_delete" onclick="review_delete(<?= $all_reviews->id; ?>)"><i class="mdi mdi-delete mdi-18px"></i></a>
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
<div class="modal fade" id="review_view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="review_view">Review</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    		<div class="show_review">
    			
    		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

      </div>
    </div>
  </div>
</div>

<!-- Category Edit modal-->
<div class="modal fade" id="review_delete" tabindex="-1" aria-labelledby="review_delete" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="review_delete">Review Delete Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="" value="" id="review_delete_id">
          <p>Are you sure to delete this review?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">No</button>
        <button type="submit" class="btn btn-primary" id="delete_review">Yes</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">

   function review_delete(id){
      $("#review_delete_id").val(id);
      
    }

    $( document ).ready(function() {
          
          $('.review_view').click(function(){

               var review_id=$(this).attr('data-id');


              var url='<?php echo base_url();?>/admin/reviews/view';

              $.ajax({
                url: url,
                type: 'get',
                async: false,
                data: {review_id:review_id},
                dataType: 'JSON',
                success: function(data) {

                    $('.show_review').html(data.company_review);
        
                }

                });

          });

      //reject company----------
       $("#delete_review").click(function(){ 

          $.ajax({
            url: "<?=base_url()?>/admin/reviews/delete/"+$("#review_delete_id").val(),

            success: function(response) {
               window.location.href = "<?=base_url()?>/admin/reviews";
            },
          fail: function (error) {
              alert(error);
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

