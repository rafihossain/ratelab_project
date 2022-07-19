<?= $this->extend('frontend/master'); ?>
<?= $this->section('content'); ?>
<!-- home start -->
<section class="bg-home bg-gradient" id="home">
  <div class="home-center">
    <div class="home-desc-center">
      <div class="container-fluid">
        <div class="row align-items-center">
          <h2 align="center" class="text-white">All Companies</h2>
        </div>
        <!-- end row -->

      </div>
      <!-- end container-fluid -->
    </div>
  </div>
</section>
<!-- home end -->



<!-- services start -->
<section class="pt-50 pb-50 section--bg">
  <div class="container-fluid">

    <div class="row mt-4">

      <div class="col-md-3">
        <div class="card">
          <div class="card-header bg-warning text-white">
            Filter
          </div>
          <div class="card-body">

            <div class="company-search">
              <h4>Company or Tag</h4>
              <form class="search-form-inline" action="<?php echo base_url(); ?>/user/company/search" method="post" id="search_company_submit">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search..." id="top-search" name="search_company">
                  <button class="btn btn-success input-group-text" type="button" id="search_company">
                    search
                  </button>
                </div>
              </form>

            </div>
            <hr>

            <div class="all-categories">
              <h4>By Categories</h4>
              <ul>
                <li><a href="" class="text-warning">All (<?php echo count($all_copany); ?>)</a></li><br>
                <?php foreach ($all_category as $key => $all_cetegories) { ?>

                  <li><a href="#" class="category_company_search" data-id="<?php echo $all_cetegories->id; ?>"><?php echo $all_cetegories->category_name; ?> (<?php echo $number_of_categories[$key]; ?>)</a></li><br>
                <?php } ?>

              </ul>
            </div>
            <hr>

            <div class="by_star_search">
              <h4>By Rating</h4>

              <ul>
                <li><input checked type="radio" name="all" class="text-warning take_rating" value="all"> All</li>

                <li><input type="radio" name="all" class="text-warning
                                    take_rating" value="5">
                  <span class="text-warning">
                    <i class="mdi mdi-star mdi-24px"></i>
                    <i class="mdi mdi-star mdi-24px"></i>
                    <i class="mdi mdi-star mdi-24px"></i>
                    <i class="mdi mdi-star mdi-24px"></i>
                    <i class="mdi mdi-star mdi-24px"></i>
                  </span>

                </li>
                <li><input type="radio" name="all" class="text-warning take_rating" value="4">
                  <span class="text-warning">
                    <i class="mdi mdi-star mdi-24px"></i>
                    <i class="mdi mdi-star mdi-24px"></i>
                    <i class="mdi mdi-star mdi-24px"></i>
                    <i class="mdi mdi-star mdi-24px"></i>

                  </span>

                </li>
                <li><input type="radio" name="all" class="text-warning take_rating" value="3">
                  <span class="text-warning">
                    <i class="mdi mdi-star mdi-24px"></i>
                    <i class="mdi mdi-star mdi-24px"></i>
                    <i class="mdi mdi-star mdi-24px"></i>

                  </span>

                </li>

                <li><input type="radio" name="all" class="text-warning take_rating" value="2">
                  <span class="text-warning">
                    <i class="mdi mdi-star mdi-24px"></i>
                    <i class="mdi mdi-star mdi-24px"></i>

                  </span>

                </li>

                <li><input type="radio" name="all" class="text-warning take_rating" value="1">
                  <span class="text-warning">
                    <i class="mdi mdi-star mdi-24px"></i>
                  </span>

                </li>

              </ul>

            </div>

            <div class="by_review_time">
              <h4>By Review Time</h4>
              <?php
              $last_month = date("m", strtotime("-1 month"));
              $last_month = date("m", strtotime("-1 month"));

              ?>
              <ul>
                <li class="mb-1"><input checked type="radio" name="all_new" class="text-warning review_time" value="all"> All</li>

                <li class="mb-1">
                  <input type="radio" name="all_new" class="text-warning
                                    review_time" value="last_1">
                  Last Month
                </li>
                <li class="mb-1">
                  <input type="radio" name="all_new" class="text-warning review_time" value="last_2">
                  Last 2 Months

                </li>
                <li class="mb-1">
                  <input type="radio" name="all_new" class="text-warning review_time" value="last_3">
                  Last 3 Months

                </li>

                <li class="mb-1">
                  <input type="radio" name="all_new" class="text-warning review_time" value="last_6">
                  Last 6 Months

                </li>

                <li>
                  <input type="radio" name="all_new" class="text-warning review_time" value="last_year">
                  Last year
                </li>

              </ul>

            </div>

          </div>


        </div>
      </div>

      <div class="col-md-9">
        <div class="row">

          <?php
          $i = 1;
          foreach ($all_copany as $all_copanies) { ?>
            <div class="col-lg-6 mb-3">
              <div class="company-review has--link">
                <a href="<?php echo base_url(); ?>/user/company/review/<?php echo $all_copanies->id ?>" class="item--link"></a>
                <div class="company-review__top">
                  <div class="thumb">
                    <img src="<?php echo base_url('/frontend/images/company/' . $all_copanies->image) ?>" alt="company logo">
                  </div>
                  <div class="content">
                    <div class="company-review__name d-flex">
                      <div class="left-side">
                        <h6>
                          <a href="<?php echo base_url(); ?>/user/company/review/<?php echo $all_copanies->id ?>"><?php echo $all_copanies->company_name; ?></a>
                        </h6>
                        <p class="cate-name"><i class="fas fa-certificate"></i> <?php echo $all_copanies->category_name; ?></p>
                        </p>
                      </div>
                      <div class="text-end text-warning">
                        <i class="mdi mdi-star"></i>
                        <i class="mdi mdi-star"></i>
                        <i class="mdi mdi-star"></i>
                        <i class="mdi mdi-star"></i>
                        <i class="mdi mdi-star"></i>
                        <p class="text-muted"> &nbsp; 5
                          (9
                          ratings)
                        </p>
                      </div>
                    </div>
                    <span class="mt-2 lh-1">
                      <i class="fas fa-map-marker-alt"></i> <?php echo $all_copanies->company_address; ?>
                    </span>
                  </div>
                </div>
                <div class="company-review__ratings mt-3 text--base">
                  <div class="d-flex justify-content-between">
                    <span class="fs--14px text-muted d-block">Registered On : <?php echo $all_copanies->created_at; ?></span>
                  </div>
                </div>
                <div class="company-review__tags mt-2">
                  <i class="fas fa-tags"></i>
                  <?php echo $all_copanies->tags; ?>

                </div>
              </div>
            </div>

            <?php if($i % 4 == 0) { 
              $x = 1;
              for($j = 0; $j < count($ads); $j++) { 
                if($j == $x) { ?>
                <div class="__add text-center mb-3" data-id="">
                  
                  <?php impression($ads[$j]->id); ?>

                  <a href="<?= $ads[$j]->redirect.'/'.$ads[$j]->id; ?>" target="_blank">
                    <img src="<?= base_url() ?>/admin/uploads/<?= $ads[$j]->image; ?>" alt="Ads">
                  </a>
                  
                </div>
              <?php }
                }
              $x++;
            } ?>


          <?php $i++; } ?>


        </div>
      </div>



    </div>

  </div>
  <!-- end container-fluid -->
</section>

<script type="text/javascript">
  $(document).on("click", "#search_company", function(e) {

    e.preventDefault();

    var url = $('#search_company_submit').attr('action');

    var request = $('#search_company_submit').serialize();

    $.ajax({
      url: url,
      type: 'post',
      async: false,
      data: request,
      dataType: 'JSON',
      success: function(data) {


        //$('.hide_all_company').hide();

        var i = 0;
        var html = '';

        for (i = 0; i < data.length; i++) {

          var img_url = '<?php echo base_url() ?>/frontend/images/company/' + data[i].image + '';
          html += '<div class="col-md-6"><div class="card"><a href="<?php echo base_url(); ?>/user/company/review/' + data[i].id + '"><div class="card-body"><div class="image"><div class="row" style="background: #f2f2f5"><div class="col-md-4"><img src="' + img_url + '" height="50px"; width="50px"><p>Location: ' + data[i].company_address + '</p></div><div class="col-md-8"><p>' + data[i].company_name + '</p><p><b>Category name: ' + data[i].category_name + '</b></p></div></div><p><b>Registered On:</b></p><p>Tags:  ' + data[i].tags + '</p></div></div> </a></div></div>';
        }

        $('.show_all_company').html(html);

      }

    });


  });

  $(document).on("click", ".category_company_search", function(e) {

    e.preventDefault();

    var cat_id = $(this).attr('data-id');

    var url = '<?php echo base_url(); ?>/user/category_company_search';

    $.ajax({
      url: url,
      type: 'get',
      async: false,
      data: {
        cat_id: cat_id
      },
      dataType: 'JSON',
      success: function(data) {


        var i = 0;
        var html = '';

        for (i = 0; i < data.length; i++) {

          var img_url = '<?php echo base_url() ?>/frontend/images/company/' + data[i].image + '';
          html += '<div class="col-md-6"><div class="card"><a href="<?php echo base_url(); ?>/user/company/review/' + data[i].id + '"><div class="card-body"><div class="image"><div class="row" style="background: #f2f2f5"><div class="col-md-4"><img src="' + img_url + '" height="50px"; width="50px"><p>Location: ' + data[i].company_address + '</p></div><div class="col-md-8"><p>' + data[i].company_name + '</p><p><b>Category name: ' + data[i].category_name + '</b></p></div></div><p><b>Registered On:</b></p><p>Tags:  ' + data[i].tags + '</p></div></div> </a></div></div>';
        }

        $('.show_all_company').html(html);


        if (data.length == 0) {
          $('.show_no_data').empty();
          $('.show_no_data').append('<h4 clas="mt-3" align="center">No Data found</h4>');

        }


      }

    });
  })
  $(document).on("click", ".take_rating", function() {

    //e.preventDefault();
    var num_review = $(this).val();

    var url = '<?php echo base_url(); ?>/user/review_search';

    $.ajax({
      url: url,
      type: 'get',
      async: false,
      data: {
        review_id: num_review
      },
      dataType: 'JSON',
      success: function(data) {
        //console.log(data.length); 
        var i = 0;
        var html = '';

        for (i = 0; i < data.length; i++) {
          var img_url = '<?php echo base_url() ?>/frontend/images/company/' + data[i].image + '';
          html += '<div class="col-md-6"><div class="card"><a href="<?php echo base_url(); ?>/user/company/review/' + data[i].id + '"><div class="card-body"><div class="image"><div class="row" style="background: #f2f2f5"><div class="col-md-4"><img src="' + img_url + '" height="50px"; width="50px"><p>Location: ' + data[i].company_address + '</p></div><div class="col-md-8"><p>' + data[i].company_name + '</p><p><b>Category name: ' + data[i].category_name + '</b></p></div></div><p><b>Registered On:</b></p><p>Tags:  ' + data[i].tags + '</p></div></div> </a></div></div>';

        }
        $('.show_all_company').html(html);

        if (data.length == 0) {
          $('.show_no_data').empty();
          $('.show_no_data').append('<h4 clas="mt-3" align="center">No Data found</h4>');

        }

      }

    });


  });

  $(document).on("click", ".review_time", function() {

    var review_month = $(this).val();

    var url = '<?php echo base_url(); ?>/user/review_by_time';

    $.ajax({
      url: url,
      type: 'get',
      async: false,
      data: {
        review_month: review_month
      },
      dataType: 'JSON',
      success: function(data) {

        var i = 0;
        var html = '';

        for (i = 0; i < data.length; i++) {
          var img_url = '<?php echo base_url() ?>/frontend/images/company/' + data[i].image + '';
          html += '<div class="col-md-6"><div class="card"><a href="<?php echo base_url(); ?>/user/company/review/' + data[i].id + '"><div class="card-body"><div class="image"><div class="row" style="background: #f2f2f5"><div class="col-md-4"><img src="' + img_url + '" height="50px"; width="50px"><p>Location: ' + data[i].company_address + '</p></div><div class="col-md-8"><p>' + data[i].company_name + '</p><p><b>Category name: ' + data[i].category_name + '</b></p></div></div><p><b>Registered On:</b></p><p>Tags:  ' + data[i].tags + '</p></div></div> </a></div></div>';

        }
        $('.show_all_company').html(html);

        if (data.length == 0) {
          $('.show_no_data').empty();
          $('.show_no_data').append('<h4 clas="mt-3" align="center">No Data found</h4>');

        }
      }
    });

  });
</script>
<!-- services end -->
<style type="text/css">
  ul {
    list-style: none;
  }

  a {
    color: black;
    text-decoration: none;

  }
</style>
<?= $this->endSection() ?>