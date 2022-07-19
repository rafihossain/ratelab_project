<?= $this->extend('frontend/master'); ?>
<?= $this->section('content'); ?>
<!-- home start -->
<section class="bg-home bg-gradient" id="home">
  <div class="home-center">
    <div class="home-desc-center">
      <div class="container-fluid">
        <div class="row align-items-center">
          <h2 align="center" class="text-white"></h2>
        </div>
        <!-- end row -->

      </div>
      <!-- end container-fluid -->
    </div>
  </div>
</section>
<!-- home end -->

<?php
$name = $single_copany->first_name . ' ' . $single_copany->last_name;
?>

<!-- services start -->
<section class="bg-light">
  <div class="container-fluid">

    <div class="row mt-4">
      <div class="col-md-4">
        <div class="card  bg-white">

          <div class="card-body">

            <img src="<?php echo base_url('/frontend/images/company/' . $single_copany->image) ?>" height="150px" ; width="150px" align="center">

            <div class="row mt-2">

              <div class="col-md-6">
                <h2><b>5.00</b></h2>
              </div>

              <div class="col-md-6">
                <span class="text-warning">
                  <i class="mdi mdi-star mdi-24px"></i>
                  <i class="mdi mdi-star mdi-24px"></i>
                  <i class="mdi mdi-star mdi-24px"></i>
                  <i class="mdi mdi-star mdi-24px"></i>
                  <i class="mdi mdi-star mdi-24px"></i>
                  Based on 6 Reviews
                </span>
              </div>

            </div>

            <div class="row mt-2">

              <div class="col-md-6">

                5 <i class="mdi mdi-star mdi-24px text-warning"></i><br>
                4 <i class="mdi mdi-star mdi-24px text-warning"></i><br>
                3 <i class="mdi mdi-star mdi-24px text-warning"></i><br>
                2 <i class="mdi mdi-star mdi-24px text-warning"></i><br>
                1 <i class="mdi mdi-star mdi-24px text-warning"></i><br>

              </div>

              <div class="col-md-6">
                100.00%<br><br>
                0.00%<br><br>
                0.00%<br><br>
                0.00%<br><br>
                0.00%<br><br>
              </div>

            </div>

            <div class="about">
              <h4>About <?php echo $single_copany->company_name; ?></h4>
              <hr>
              <h4>Tags</h4>
              <p><?php echo $single_copany->tags; ?></p>
              <hr>
              <h4>Contact Info</h4>
              <a href=" <?php echo $single_copany->url; ?>"><i class="mdi mdi-link-variant mdi-18px"></i> <?php echo $single_copany->url; ?></a><br>
              <i class="mdi mdi-link-variant mdi-18px"></i><?php echo $single_copany->company_address; ?><br>
              <a href=""><i class="mdi mdi-link-variant mdi-18px"></i> <?php echo $single_copany->email_address; ?></a>
            </div>

          </div>


        </div>
      </div>

      <div class="col-md-8">
        <div class="row mt-4">

          <div class="col-md-6">
            <h4><?php echo $single_copany->company_name; ?></h4>
            <p><b>Address:</b> <?php echo $single_copany->company_address; ?></p>
          </div>

          <div class="col-md-6 bg-secondary text-white">
            <a href="<?php echo $single_copany->url; ?>"><?php echo $single_copany->url; ?></a>
          </div>
        </div><br>

        <?php if (empty($user_reviews[0])) { ?>
          <div class="review_submit">

            <div class="card  bg-white">

              <div class="card-body">
                <form action="<?php echo base_url(); ?>/user/company/review/<?php echo $single_copany->id ?>" class="signin-form" method="post" enctype="multipart/form-data">

                  <input type="hidden" name="user_id" value="<?php echo $single_copany->user_id; ?>">

                  <div class="row">
                    <div class="col-md-6">
                      <img src="https://script.viserlab.com/ratelab/assets/images/avatar.jpg" height="50px" width="50" class="rounded-circle"> <b><?php echo $name; ?></b>
                    </div>

                    <div class="col-md-6 give-rating" align="right">
                      <span>
                        <input id='str1' name='rating' type='radio' value='1' class="hidden">
                        <label for='str1'><i class="mdi mdi-star mdi-24px" id="star1"></i></label>
                      </span>
                      <span>
                        <input id='str2' name='rating' type='radio' value='2' class="hidden">
                        <label for='str2'><i class="mdi mdi-star mdi-24px" id="star2"></i></label>
                      </span>
                      <span>
                        <input id='str3' name='rating' type='radio' value='3' class="hidden">
                        <label for='str3'><i class="mdi mdi-star mdi-24px" id="star3"></i></label>
                      </span>
                      <span>
                        <input id='str4' name='rating' type='radio' value='4' class="hidden">
                        <label for='str4'><i class="mdi mdi-star mdi-24px" id="star4"></i></label>
                      </span>
                      <span>
                        <input id='str5' name='rating' type='radio' value='5' class="hidden">
                        <label for='str5'><i class="mdi mdi-star mdi-24px" id="star5"></i></label>
                      </span>
                      <small style="color:red;" class="text-danger">
                        <?php if (isset($validation)) {

                          echo $validation->getError('rating');
                        } ?>
                      </small>
                    </div>

                  </div><br>
                  <label> Write review</label>
                  <textarea class="form-control" row="5" name="reveiw">

                               </textarea>
                  <small style="color:red;" class="text-danger">
                    <?php if (isset($validation)) {

                      echo $validation->getError('reveiw');
                    } ?>
                  </small>

                  <br><button class="btn btn-warning" type="submit" style="float:right;">
                    Submit
                  </button>

                </form>

              </div>
            </div>
          </div>
        <?php } ?>


        <div class="show_allreview">
          <?php foreach ($all_review as $all_reviews) {

            $name = $all_reviews->first_name . ' ' . $all_reviews->last_name;

          ?>

            <div class="card  bg-white">

              <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                    <img src="https://script.viserlab.com/ratelab/assets/images/avatar.jpg" height="50px" width="50" class="rounded-circle">
                  </div>

                  <div class="col-md-9" style="background: #f2f2f5">
                    <div class="row">
                      <div class="col-md-3">
                        <h5><?php echo $name; ?></h5>
                        <p><?php echo $all_reviews->user_address; ?></p>
                      </div>

                      <div class="col-md-9 text-warning" align="right">
                        <?php
                        if ($all_reviews->company_rating == 1) {
                          echo '<i class="mdi mdi-star mdi-24px"></i>';
                        } else if ($all_reviews->company_rating == 2) {
                          echo '<i class="mdi mdi-star mdi-24px"></i>
                                                     <i class="mdi mdi-star mdi-24px"></i> 
                                                   ';
                        } else if ($all_reviews->company_rating == 3) {


                          echo '<i class="mdi mdi-star mdi-24px"></i>
                                                     <i class="mdi mdi-star mdi-24px"></i>
                                                     <i class="mdi mdi-star mdi-24px"></i>
                                                   ';
                        } else if ($all_reviews->company_rating == 4) {

                          echo '<i class="mdi mdi-star mdi-24px"></i>
                                                     <i class="mdi mdi-star mdi-24px"></i>
                                                     <i class="mdi mdi-star mdi-24px"></i>
                                                     <i class="mdi mdi-star mdi-24px"></i> 
                                                   ';
                        } else if ($all_reviews->company_rating == 5) {

                          echo '<i class="mdi mdi-star mdi-24px"></i>
                                                     <i class="mdi mdi-star mdi-24px"></i>
                                                     <i class="mdi mdi-star mdi-24px"></i>
                                                     <i class="mdi mdi-star mdi-24px"></i>
                                                     <i class="mdi mdi-star mdi-24px"></i>  
                                                   ';
                        }
                        ?>
                      </div>

                    </div>
                    <hr>
                    <p><?php echo $all_reviews->company_review; ?></p>
                    <?php if (isset($user_reviews[0]->user_id) && ($user_reviews[0]->user_id == $all_reviews->user_id)) { ?>
                      <hr>
                      <div class="row">
                        <div class="col-md-6">
                          <a class="p-2 reviews_edit" data-id="<?php echo $all_reviews->id ?>"><i class="mdi mdi-square-edit-outline  mdi-18px"></i> Edits Review</a>
                        </div>
                        <div class="col-md-6" align="right">
                          <a data-bs-target="#delete_modal" data-bs-toggle="modal" class="p-2" onclick="delete_review(<?= $all_reviews->id; ?>)"><i class="mdi mdi-delete-outline mdi-18px"></i>
                            Delete</a>

                        </div>
                      </div>
                    <?php } ?>
                  </div>
                </div>

              </div>

            </div>
          <?php } ?>

        </div>


      </div>

    </div>

  </div>
  <!-- end container-fluid -->
</section>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Review</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form method="post" action="<?php echo base_url(); ?>/user/company/reviews/edit" id="review_update_data">
          <div class="form-group give-rating1" align='right'>
            <span>
              <input id='str1' name='rating' type='radio' value='1' class="hidden">
              <label for='str1'><i class="mdi mdi-star mdi-24px" id="star1"></i></label>
            </span>
            <span>
              <input id='str2' name='rating' type='radio' value='2' class="hidden">
              <label for='str2'><i class="mdi mdi-star mdi-24px" id="star2"></i></label>
            </span>
            <span>
              <input id='str3' name='rating' type='radio' value='3' class="hidden">
              <label for='str3'><i class="mdi mdi-star mdi-24px" id="star3"></i></label>
            </span>
            <span>
              <input id='str4' name='rating' type='radio' value='4' class="hidden">
              <label for='str4'><i class="mdi mdi-star mdi-24px" id="star4"></i></label>
            </span>
            <span>
              <input id='str5' name='rating' type='radio' value='5' class="hidden">
              <label for='str5'><i class="mdi mdi-star mdi-24px" id="star5"></i></label>
            </span>
          </div><br>

          <label> Write review<span class="text--danger">*</span></label>
          <div class="input-group mb-3">
            <textarea class="form-control" row="5" name="reveiw" id="review_textarea">

           </textarea>
          </div>
          <span id="mgs2" style="color:red;"></span>
          <input type="hidden" name="new_review_id" id="review_id_set" value="">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="review_update">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!--Review Delete Modal-->
<!--Default Bootstrap Approved Modal-->
<!--===================================================-->
<div class="modal fade" id="delete_modal" role="dialog" tabindex="-1" aria-labelledby="delete_modal" aria-hidden="true">
  <div class="modal-dialog" style="width: 400px;">
    <div class="modal-content">
      <input type="hidden" name="delete_id" id="delete_review_id" value="">
      <!--Modal header-->
      <div class="modal-header">
        <h4 class="modal-title">Confirmation Alert</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>
      <!--Modal body-->
      <div class="modal-body">
        <p>Are you sure to delete this review?</p>
        <!-- <div class="text-right">
                <input type="hidden" id="approveMemberId">
                <input type="hidden" id="approveImageType">
                <input type="hidden" id="approveitemId">
              </div> -->
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-dark btn-sm" data-bs-dismiss="modal">No</button>
        <button type="submit" class="btn btn-warning btn-sm" id="review_delete">Yes</button>
      </div>

    </div>
  </div>
</div>

<!-- services end -->
<style type="text/css">
  ul {
    list-style: none;
  }

  a {
    color: black;
    text-decoration: none;

  }

  .give-rating span input {
    position: absolute;
    top: 0px;
    left: 0px;
    opacity: 0;
  }

  .give-rating1 span input {
    position: absolute;
    top: 0px;
    left: 0px;
    opacity: 0;
  }
</style>

<script type="text/javascript">
  //prime review Radio-box for insert-----------------
  $(".give-rating input:radio").attr("checked", false);

  $(".give-rating input").click(function(e) {

    $(this).parent().siblings().removeClass("checked");
    $(this).parent().addClass("checked");
    var abc = $(this).val();

    if (abc == 1) {
      $('#star1').addClass('text-warning');
      $('#star2').removeClass('text-warning');
    } else if (abc == 2) {
      $('#star1').addClass('text-warning');
      $('#star2').addClass('text-warning');
      $('#star3').removeClass('text-warning');
    } else if (abc == 3) {
      $('#star1').addClass('text-warning');
      $('#star2').addClass('text-warning');
      $('#star3').addClass('text-warning');
      $('#star4').removeClass('text-warning');
    } else if (abc == 4) {
      $('#star1').addClass('text-warning');
      $('#star2').addClass('text-warning');
      $('#star3').addClass('text-warning');
      $('#star4').addClass('text-warning');
      $('#star5').removeClass('text-warning');
    } else if (abc == 5) {
      $('#star1').addClass('text-warning');
      $('#star2').addClass('text-warning');
      $('#star3').addClass('text-warning');
      $('#star4').addClass('text-warning');
      $('#star5').addClass('text-warning');
    }




  });

  //update reveiw-----------------------  
  $(".give-rating1 input").click(function(e) {

    $(this).parent().siblings().removeClass("checked");
    $(this).parent().addClass("checked");
    var abc = $(this).val();

    if (abc == 1) {
      $('#star1').addClass('text-warning');
      $('#star2').removeClass('text-warning');
    } else if (abc == 2) {
      $('#star1').addClass('text-warning');
      $('#star2').addClass('text-warning');
      $('#star3').removeClass('text-warning');
    } else if (abc == 3) {
      $('#star1').addClass('text-warning');
      $('#star2').addClass('text-warning');
      $('#star3').addClass('text-warning');
      $('#star4').removeClass('text-warning');
    } else if (abc == 4) {
      $('#star1').addClass('text-warning');
      $('#star2').addClass('text-warning');
      $('#star3').addClass('text-warning');
      $('#star4').addClass('text-warning');
      $('#star5').removeClass('text-warning');
    } else if (abc == 5) {
      $('#star1').addClass('text-warning');
      $('#star2').addClass('text-warning');
      $('#star3').addClass('text-warning');
      $('#star4').addClass('text-warning');
      $('#star5').addClass('text-warning');
    }




  });


  //review edit-------------
  $('.reviews_edit').click(function() {
    $('#review_update_data')[0].reset();
    $('#editModal').modal('show');

    var review_id = $(this).attr('data-id');
    var url = '<?php echo base_url(); ?>/user/company/reviews/edit';
    $.ajax({
      url: url,
      type: 'get',
      async: false,
      data: {
        review_id: review_id
      },
      dataType: 'JSON',
      success: function(data) {
        //console.log(data.company_review)
        $('#review_textarea').val(data.edit_review['company_review']);
        $('#review_id_set').val(data.edit_review['id']);

        if (data.edit_review['company_rating'] == 1) {
          $('#star1').addClass('text-warning');
          $('#str1').attr('checked', true)
        } else if (data.edit_review['company_rating'] == 2) {
          $('#star1').addClass('text-warning');
          $('#star2').addClass('text-warning');
          $('#str2').attr('checked', true)
        } else if (data.edit_review['company_rating'] == 3) {
          $('#star1').addClass('text-warning');
          $('#star2').addClass('text-warning');
          $('#star3').addClass('text-warning');
          $('#str3').attr('checked', true)

        } else if (data.edit_review['company_rating'] == 4) {

          $('#star1').addClass('text-warning');
          $('#star2').addClass('text-warning');
          $('#star3').addClass('text-warning');
          $('#star4').addClass('text-warning');
          $('#str4').attr('checked', true);

        } else {
          $('#star1').addClass('text-warning');
          $('#star2').addClass('text-warning');
          $('#star3').addClass('text-warning');
          $('#star4').addClass('text-warning');
          $('#star5').addClass('text-warning');
          $('#str5').attr('checked', true);
        }


      }

    });

  });


  //review update---------
  $(document).on("click", "#review_update", function() {


    var url = $('#review_update_data').attr('action');

    var request = $('#review_update_data').serialize();

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
          $('#mgs2').html('');

          $('#review_update_data')[0].reset();

          $('#editModal').modal('hide');

        }

        //Error message show-------------
        if (data.success == false) {
          if (data.msg1 != '') {
            $('.mgs1').html(data.msg1);
          } else {
            $('.mgs1').html('');
          }
          if (data.msg2 != '') {
            $('#mgs2').html(data.msg2);
          } else {
            $('#mgs2').html('');
          }

        }

      }
    });


  });

  //Delete Reviews------------

  function delete_review(id) {

    $("#delete_review_id").val(id);

  }


  $("#review_delete").click(function() {

    $.ajax({
      url: "<?= base_url() ?>/user/company/reviews_delete/" + $("#delete_review_id").val(),

      success: function(response) {
        window.location.reload();
      },
      fail: function(error) {
        alert(error);
      }
    });
  })
</script>
<?= $this->endSection() ?>