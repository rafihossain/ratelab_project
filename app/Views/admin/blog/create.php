<?= $this->extend('admin/master'); ?>
<?= $this->section('content'); ?>

<!-- Plugins css -->
<link href="<?= base_url() ?>/admin/assets/select2/select2.min.css" rel="stylesheet" type="text/css">


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

        <h4 class="d-flex">Blog Section Items<a href="<?= base_url() ?>/admin/frontend/blog_section" type="button" class="ms-auto btn btn-primary" style="background-color:#7367f0">
				  <i class="mdi mdi-skip-backward"></i> Go Back
            </a></h4>

            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success') ?>
                </div>

            <?php endif;?>


            <div class="col-lg-12 col-md-12 mb-30">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url() ?>/admin/frontend/blog/create" method="POST" enctype="multipart/form-data">
                            <!-- <input type="hidden" name="old_image" value=""> -->

                            <div class="row">

                                <div class="col-xl-4">
                                    <div class="form-group">
                                        <div class="image-upload">
                                            <div class="thumb">
                                                <div class="avatar-preview">
                                                    <div class="profilePicPreview" style="background-image: url(<?= base_url() ?>/admin/uploads/blog_section/830x460.jpg)">
                                                        <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                                    </div>
                                                </div>
                                                <div class="avatar-edit">
                                                    <input type="file" class="profilePicUpload" name="image_input" id="profilePicUpload1" accept=".png, .jpg, .jpeg" require="">
                                                    <label for="profilePicUpload1" class="select-logo">Image</label>
                                                    <small class="mt-2 text-facebook">Supported files: <b>jpeg, jpg, png</b>. Image will be resized into  830x460 px.</small>
                                                    <small style="color:red;" class="text-danger">
                                                    <?php if (isset($validation)) {
                                                                
                                                                echo $validation->getError('image_input');
                                                                } ?>
                                                    </small> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-8 mt-xl-0 mt-4">
                                    <div class="form-group ">
                                        <label class="form-control-label font-weight-bold">Title</label>

                                        <input type="text" class="form-control" name="title" placeholder="title">
                                        <small style="color:red;" class="text-danger">
                                            <?php if (isset($validation)) {
                                                    
                                                    echo $validation->getError('title');
                                                    } ?>
				                        </small> 
                                    </div><br>

                                    <div class="form-group">
                                        <label class="form-control-label  font-weight-bold">Description</label>

                                            <textarea name="description" id="" cols="30" rows="10" class="form-control">

                                            </textarea>

                                            <small style="color:red;" class="text-danger">
				                              <?php if (isset($validation)) {
				                              			
				                                        echo $validation->getError('description');
				                                        } ?>
				                              </small> 

                                        </div>

                                    </div>

                                </div>

                                <div class="form-group">
                                        <button type="submit" class="btn btn-primary w-100 mt-4" style="background-color:#7367f0">Submit</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div> <!-- container-fluid -->

    </div> <!-- content -->
</div>


<script>
    $(document).ready(function() {


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

        console.log(input.files);

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