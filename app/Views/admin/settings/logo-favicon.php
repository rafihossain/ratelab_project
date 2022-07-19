<?= $this->extend('admin/master'); ?>
<?= $this->section('content'); ?>

<script src="<?= base_url() ?>/admin/assets/libs/jquery/jquery.min.js"></script>

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

    .image-upload .thumb .profilePicPreview.logoPicPrev {
        background-size: contain !important;
        background-position: center;
    }

    .bodywrapper-inner .border-left{
        border-left: 5px solid #7367f0 !important;
    }

</style>

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <form action="<?= base_url() ?>/admin/settings/logo_favicon" method="post" enctype="multipart/form-data">

                <div class="row">
                    <div class="bodywrapper-inner">
                        <div class="row align-items-center mb-30 justify-content-between">
                            <div class="col-lg-6 col-sm-6">
                                <h6 class="page-title">Logo &amp; Favicon</h6>
                            </div>
                            <div class="col-lg-6 col-sm-6 text-sm-right mt-sm-0 mt-3 right-part">
                            </div>
                        </div>
                        <div class="row mb-none-30">
                            <div class="col-md-12 mb-30">
                                <div class="card border-left">
                                    <div class="card-body">
                                        <p class="font-weight-bold text-info">If the logo and favicon are not changed after you update from this page, please clear the cache from your browser. As we keep the filename the same after the update, it may show the old image for the cache. usually, it works after clear the cache but if you still see the old logo or favicon, it may be caused by server level or network level caching. Please clear them too.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-30">
                                <div class="card">
                                    <div class="card-body">

                                    <?php if(session()->getFlashdata('success')) : ?>
                                        <div class="alert alert-success" role="alert">
                                            <?= session()->getFlashdata('success') ?>
                                        </div>
                                    <?php endif; ?>
                                    
                                        <div class="row">
                                            <div class="mb-2 col-md-6">
                                                <div class="image-upload">
                                                    <div class="thumb">
                                                        <div class="avatar-preview">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="profilePicPreview logoPicPrev" style="background-image:url('<?= base_url() ?>/admin/uploads/<?= $logoandfav['logo']; ?>');">
                                                                        <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 mt-sm-0 mt-4">
                                                                    <div class="profilePicPreview logoPicPrev bg-dark" style="background-image:url('<?= base_url() ?>/admin/uploads/<?= $logoandfav['logo']; ?>');">
                                                                        <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="avatar-edit">
                                                            <input type="file" class="profilePicUpload" id="profilePicUpload1" accept=".png, .jpg, .jpeg" name="logo">
                                                            <label for="profilePicUpload1" class="select-logo">Select Logo </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-2 col-md-6">
                                                <div class="image-upload">
                                                    <div class="thumb">
                                                        <div class="avatar-preview">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="profilePicPreview logoPicPrev" style="background-image:url('<?= base_url() ?>/admin/uploads/<?= $logoandfav['favicon']; ?>');">
                                                                        <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 mt-sm-0 mt-4">
                                                                    <div class="profilePicPreview logoPicPrev bg-dark" style="background-image:url('<?= base_url() ?>/admin/uploads/<?= $logoandfav['favicon']; ?>');">
                                                                        <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="avatar-edit">
                                                            <input type="file" class="profilePicUpload" id="profilePicUpload2" accept=".png" name="favicon">
                                                            <label for="profilePicUpload2" class="select_favicon">Select Favicon</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-2 col-md-12">
                                            <button type="submit" class="btn select_favicon w-100 btn-lg">Update</button>    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>

        </div> <!-- container-fluid -->

    </div> <!-- content -->
</div>



<script>
    $(document).ready(function() {
        $('#openAdvertisementModal').click(function() {
            $('#advertisementModal').modal('show');
        });

        $(document).on('change', '.profilePicUpload', function(e) {
            readUrl(this);
        });

        $('.remove-image').on('click', function(e) {
            $(this).parents('.profilePicPreview').css('background-image', 'none');
            $(this).parents('.profilePicPreview').removeClass('has-image');
            $(this).parents('.thumb').find('input[type=file]').val('');
        });

    });

    function changeImagePreview() {
        var selected = $(document).find('#size').val();
        var size = selected.split('x');

        $(document).find('.profilePicPreview').css({
            "width": size[0],
            "height": size[1],
        });
    }

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