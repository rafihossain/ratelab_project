<?= $this->extend('admin/master'); ?>
 <?= $this->section('content'); ?>
<style>
    .card-header:first-child {
         border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
    }
    .card-header {
        background-color: transparent;
        border-bottom: 1px solid rgba(140, 140, 140, 0.125);
    }
    .card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: rgba(0,0,0,.03);
    border-bottom: 1px solid rgba(0,0,0,.125);
   }
   card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1.25rem;
  }
  ol.vertical {
    margin: 0 0 9px 0;
    min-height: 10px;
  }
  ol {
    display: block;
    list-style-type: decimal;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
  }

  ol.sec-item li {
    margin: 10px 0;
    padding: 10px;
    color: #fff;
    background: #2e49cc;
    font-size: 24px;
    font-weight: 600;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
}
.sec-item li i.fa-times {
    color: #ea5455;
    padding-right: 15px;
}
ol.sec-item li i.remove-icon {
    float: right!important;
}
h1, h2, h3, h4, h5, h6 {
    font-weight: 500;
    color: #34495e;
    margin: 0;
    line-height: 1.4;
}
ol.vertical li {
    display: block;
    margin: 10px 0;
    padding: 10px;
    color: #e0e0e0;
    background: #7f7ff7;
    font-size: 16px;
    font-weight: 600;
}
.vertical li i {
    color: #000000;
    padding-right: 15px;
}
.float-right {
    float: right!important;
}
.btn--primary {
    background-color: #7367f0 !important;
    color:white;
}
.btn-block {
    display: block;
    width: 100%;
}

#simple_drop .manage-content{
    display:none !important;
}

#simple_drop_new .remove-icon{
    display:none !important;
}

</style>

 <div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
 

  

        	<h4 class="d-flex">Manage Section of HOME<a href="<?= base_url() ?>/admin/frontend/manage_pages" class="ms-auto btn btn-primary">
				  <i class="mdi mdi-skip-backward"></i>Go Back
</a></h4>
        
                <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif;?>

          
            <div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">HOME Page</h3>
                <small class="text--primary">If you face any issue with removing sections, Please click the update button and then remove unnecessary sections and click the update button again.</small>
            </div>

            <div class="card-body">
                <form action="<?= base_url() ?>/admin/new_page_edit/<?php echo $pages['id'];?>" method="post">
                    <ol class="simple_with_drop vertical sec-item" id="simple_drop">
                      <?php 
                         if($pages['selected_section']){
                          $all_data=explode(',',$pages['selected_section']);
                            //   echo '<pre>';
                            //    print_r($all_data);
                            //    die();
                        
                      ?>
                    <?php foreach($all_data as $rows){?> 
                        <li class="highlight icon-move item">
                            <i class=" fa fa-arrows-alt"></i>
                            <span class="d-inline-block text-white mr-auto ml-2"> <?php echo $rows;?></span>
                            <i class="ml-auto d-inline-block remove-icon fa fa-times"></i>
                            <input type="hidden" name="secs[]" value="<?php echo $rows;?>">
                        </li>
                     <?php }  }?>   

                        <!-- // <li class="highlight icon-move item">
                        //     <i class=" fa fa-arrows-alt"></i>
                        //     <span class="d-inline-block text-white mr-auto ml-2"> Why Choose Us</span>
                        //     <i class="ml-auto d-inline-block remove-icon fa fa-times"></i>
                        //     <input type="hidden" name="secs[]" value="choose_reason">
                        // </li>
                        // <li class="highlight icon-move item">
                        //     <i class=" fa fa-arrows-alt"></i>
                        //     <span class="d-inline-block text-white mr-auto ml-2"> Review</span>
                        //     <i class="ml-auto d-inline-block remove-icon fa fa-times"></i>
                        //     <input type="hidden" name="secs[]" value="review">
                        // </li>
                        // <li class="highlight icon-move item">
                        //     <i class=" fa fa-arrows-alt"></i>
                        //     <span class="d-inline-block text-white mr-auto ml-2"> CTA Section</span>
                        //     <i class="ml-auto d-inline-block remove-icon fa fa-times"></i>
                        //     <input type="hidden" name="secs[]" value="cta">
                        // </li>
                        // <li class="highlight icon-move item">
                        //     <i class=" fa fa-arrows-alt"></i>
                        //     <span class="d-inline-block text-white mr-auto ml-2"> Testimonial</span>
                        //     <i class="ml-auto d-inline-block remove-icon fa fa-times"></i>
                        //     <input type="hidden" name="secs[]" value="testimonial">
                        // </li>
                        // <li class="highlight icon-move item">
                        //     <i class=" fa fa-arrows-alt"></i>
                        //     <span class="d-inline-block text-white mr-auto ml-2"> Blog Section</span>
                        //     <i class="ml-auto d-inline-block remove-icon fa fa-times"></i>
                        //     <input type="hidden" name="secs[]" value="blog">
                        // </li> -->
                    </ol>
                    <button type="submit" class="btn btn--primary btn-block btn-lg ">Update Now</button>
                </form>

            </div>
        </div>



    </div>
    <div class="col-md-5 mt-md-0 mt-3">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Sections</h3>
                <small class="text--primary">Drag the section to the left side you want to show on the page.</small>
            </div>



            <div class="card-body">

                <ol class="simple_with_no_drop vertical" id="simple_drop_new">
                                                                                                    <li class="highlight icon-move clearfix">
                            <i class=" fa fa-arrows-alt mt-2"></i>
                            <span class="d-inline-block text-white mr-auto ml-2 mt-2"> Blog Section</span>
                            <i class="ml-auto d-inline-block remove-icon fa fa-times"></i>
                            <input type="hidden" name="secs[]" value="Blog Section">
                                <div class="float-right d-inline-block manage-content">
                                    <a href="" target="_blank" class="btn btn-outline-light text-center text-white cog-btn"  data-toggle="tooltip" data-original-title="Manage Content">
                                        <i class="fa fa-cog p-0 m-0"></i>
                                    </a>
                                </div>
                </li>
                                                                                                    <li class="highlight icon-move clearfix">
                    <i class=" fa fa-arrows-alt mt-2"></i>
                    <span class="d-inline-block text-white mr-auto ml-2 mt-2"> Category Section</span>
                    <i class="ml-auto d-inline-block remove-icon fa fa-times"></i>
                    <input type="hidden" name="secs[]" value="Category Section">
                    <div class="float-right d-inline-block manage-content">
                        <a href="" target="_blank" class="btn btn-outline-light text-center text-white cog-btn"  data-toggle="tooltip" data-original-title="Manage Content">
                            <i class="fa fa-cog p-0 m-0"></i>
                        </a>
                    </div>
                </li>
            <li class="highlight icon-move clearfix">
                <i class=" fa fa-arrows-alt mt-2"></i>
                <span class="d-inline-block text-white mr-auto ml-2 mt-2"> Why Choose Us</span>
                <i class="ml-auto d-inline-block remove-icon fa fa-times"></i>    
                <input type="hidden" name="secs[]" value="Why Choose Us">
                <div class="float-right d-inline-block manage-content">
                <a href="" target="_blank" class="btn btn-outline-light text-center text-white cog-btn"  data-toggle="tooltip" data-original-title="Manage Content">
                    <i class="fa fa-cog p-0 m-0"></i>
                </a>
              </div>
           </li>
                                                                                               <li class="highlight icon-move clearfix">
                <i class=" fa fa-arrows-alt mt-2"></i>
                <span class="d-inline-block text-white mr-auto ml-2 mt-2"> CTA Section</span>
                <i class="ml-auto d-inline-block remove-icon fa fa-times"></i>
                <input type="hidden" name="secs[]" value="CTA Section">
                <div class="float-right d-inline-block manage-content">
                <a href="" target="_blank" class="btn btn-outline-light text-center text-white cog-btn"  data-toggle="tooltip" data-original-title="Manage Content">
                <i class="fa fa-cog p-0 m-0"></i>
                </a>
            </div>
         </li>
                                                                                            <li class="highlight icon-move clearfix">
            <i class=" fa fa-arrows-alt mt-2"></i>
            <span class="d-inline-block text-white mr-auto ml-2 mt-2"> FAQ&#039;s</span>
            <i class="ml-auto d-inline-block remove-icon fa fa-times"></i>        
            <input type="hidden" name="secs[]" value="FAQ's">
            <div class="float-right d-inline-block manage-content">
                <a href="" target="_blank" class="btn btn-outline-light text-center text-white cog-btn"  data-toggle="tooltip" data-original-title="Manage Content">
                    <i class="fa fa-cog p-0 m-0"></i>
                </a>
            </div>
    </li>
                                                                                      <li class="highlight icon-move clearfix">
        <i class=" fa fa-arrows-alt mt-2"></i>
        <span class="d-inline-block text-white mr-auto ml-2 mt-2"> Review</span>
        <i class="ml-auto d-inline-block remove-icon fa fa-times"></i>
        <input type="hidden" name="secs[]" value="Review">
            <div class="float-right d-inline-block manage-content">
                <a href="" target="_blank" class="btn btn-outline-light text-center text-white cog-btn"  data-toggle="tooltip" data-original-title="Manage Content">
                    <i class="fa fa-cog p-0 m-0"></i>
                </a>
            </div>
    </li>
                                                                                        <li class="highlight icon-move clearfix">
        <i class=" fa fa-arrows-alt mt-2"></i>
        <span class="d-inline-block text-white mr-auto ml-2 mt-2"> Testimonial</span>
        <i class="ml-auto d-inline-block remove-icon fa fa-times"></i>
        <input type="hidden" name="secs[]" value="Testimonial">
        <div class="float-right d-inline-block manage-content">
            <a href="" target="_blank" class="btn btn-outline-light text-center text-white cog-btn"  data-toggle="tooltip" data-original-title="Manage Content">
                <i class="fa fa-cog p-0 m-0"></i>
            </a>
        </div>
    </li>
                                                                                            </ol>
        </div>
    </div>

    </div>
</div>
            </div><!-- bodywrapper__inner end -->
        </div><!-- body-wrapper end -->
    </div>    
              

        </div> <!-- container-fluid -->

    </div> <!-- content -->
</div>

 <script src="<?= base_url() ?>/admin/assets/js/sortable.js"></script>
<script>
    (function($) {
        "use strict";
        $("ol.simple_with_drop").sortable({
            group: 'no-drop',
            handle: '.icon-move',
            onDragStart: function ($item, container, _super) {
                    // Duplicate items of the no drop area
                    if(!container.options.drop){
                        $item.clone().insertAfter($item);
                    }
                    _super($item, container);
                }
            });
        $("ol.simple_with_no_drop").sortable({
            group: 'no-drop',
            drop: false
        });
        $("ol.simple_with_no_drag").sortable({
            group: 'no-drop',
            drag: false
        });
        $(".remove-icon").on('click',function(){
            $(this).parent('.highlight').remove();
        });

    })(jQuery);
</script>

 <?= $this->endSection() ?>

