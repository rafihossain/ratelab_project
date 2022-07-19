<?= $this->extend('admin/master'); ?>
<?= $this->section('content'); ?>

<script src="<?= base_url() ?>/admin/assets/libs/jquery/jquery.min.js"></script>

<style>

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


</style>

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <h4 class="d-flex">All Advertisement
                <button type="button" class="ms-auto btn btn-primary" id="openAdvertisementModal">
                    <i class="fa fa-fw fa-plus"></i> Add New Advertisement
                </button>
            </h4>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap text-center">
                                <thead class="">
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Type</th>
                                        <th>Size</th>
                                        <th>Impression</th>
                                        <th>Click</th>
                                        <th>Redirect</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($getAdvertisement as $advertisement) : ?>
                                        <tr>
                                            <td><?= $advertisement->id; ?></td>
                                            <td><?= $advertisement->type; ?></td>
                                            <td><?= $advertisement->size; ?></td>
                                            <td>
                                                <span class="badge rounded-pill bg-secondary pe-2 ps-2"><?= $advertisement->impression; ?></span>
                                            </td>
                                            <td>
                                                <span class="badge rounded-pill bg-secondary pe-2 ps-2"><?= $advertisement->click; ?></span>
                                            </td>
                                            <td>
                                                <a target="_blank" class="" href="<?= $advertisement->redirect; ?>">
                                                    <i class="fa fa-external-link" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <span class="badge rounded-pill bg-primary pe-2 ps-2">Active</span>
                                            </td>
                                            <td>
                                                <a href="<?= base_url(); ?>/admin/advertisement_update/<?= $advertisement->id;?>" class="btn btn-warning icon-btn ml-1">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container-fluid -->

    </div> <!-- content -->
</div>

<!-- Add Advertisement Modal -->
<div class="modal fade" id="advertisementModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= base_url() ?>/admin/advertisement" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Advertisement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-2">
                                <label class="font-weight-bold">Advertisement Type <span class="text-danger">*</span></label>
                                <select class="form-control" id="type" name="type">
                                    <option value="" selected="" disabled="">Select One</option>
                                    <option value="image">Image</option>
                                    <option value="script">Script</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-2">
                                <div class="image-size">
                                    <label for="" class="font-weight-bold">Size <strong class="text-danger">*</strong></label>
                                    <select class="form-control" id="size" name="size">
                                        <option value="" selected="">Select One</option>
                                        <option value="728x90">728x90</option>
                                        <option value="300x250">300x250</option>
                                        <option value="300x600">300x600</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12" id="image" style="display: none;">
                            <div class="mb-2">

                                <div class="image-upload mt-3" style="display: none;">
                                    <div class="thumb">
                                        <div class="avatar-preview">
                                            <label for="" class="font-weight-bold">Image <strong class="text-danger">*</strong></label>
                                            <div class="profilePicPreview" style="background-position: center center; width: 300px; height: 250px;">
                                                <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                        <div class="avatar-edit">
                                            <input type="file" size-validation="728x90" class="profilePicUpload d-none" name="image" id="imageUpload" accept=".png, .jpg, .jpeg">
                                            <label for="imageUpload" class="btn btn-primary mt-3 w-100">Upload Image</label>
                                            <small class="mt-2 text-facebook">Supported files:
                                                <b>jpeg,jpg,png,gif <span id="image_size">, Upload Image Size Must Be 728x90 px</span></b>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="" class="font-weight-bold">Redirect Url <strong class="text-danger">*</strong> </label>
                                <input type="text" class="form-control" name="redirect_url" placeholder="Redirect Url">
                            </div>
                        </div>
                        <div class="col-lg-12" id="script" style="display: none;">
                            <div class="mb-2">
                                <label for="" class="font-weight-bold">Script <strong class="text-danger">*</strong> </label>
                                <textarea name="script" class="form-control" id="" cols="30" rows="10" style="height: 100px;"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Advertisement Modal -->
<div class="modal fade" id="editAdvertisementModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Advertisement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-2">
                                <label class="font-weight-bold">Advertisement Type <span class="text-danger">*</span></label>
                                <select class="form-control" id="type" name="type">
                                    <option value="" selected="" disabled="">Select One</option>
                                    <option value="image">Image</option>
                                    <option value="script">Script</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-2">
                                <div class="image-size">
                                    <label for="" class="font-weight-bold">Size <strong class="text-danger">*</strong></label>
                                    <select class="form-control" id="size" name="size">
                                        <option value="" selected="">Select One</option>
                                        <option value="728x90">728x90</option>
                                        <option value="300x250">300x250</option>
                                        <option value="300x600">300x600</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12" id="image" style="display: block;">
                            <div class="mb-2">

                                <div class="image-upload mt-3" style="display: block;">
                                    <div class="thumb">
                                        <div class="avatar-preview">
                                            <label for="" class="font-weight-bold">Image <strong class="text-danger">*</strong></label>
                                            <div class="profilePicPreview" style="background-position: center center; width: 300px; height: 250px;">
                                                <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                        <div class="avatar-edit">
                                            <input type="file" size-validation="728x90" class="profilePicUpload d-none" name="image" id="imageUpload" accept=".png, .jpg, .jpeg">
                                            <label for="imageUpload" class="btn btn-primary mt-3 w-100">Upload Image</label>
                                            <small class="mt-2 text-facebook">Supported files:
                                                <b>jpeg,jpg,png,gif <span id="image_size">, Upload Image Size Must Be 728x90 px</span></b>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="" class="font-weight-bold">Redirect Url <strong class="text-danger">*</strong> </label>
                                <input type="text" class="form-control" name="redirect_url" placeholder="Redirect Url">
                            </div>
                        </div>
                        <div class="col-lg-12" id="script" style="display: none;">
                            <div class="mb-2">
                                <label for="" class="font-weight-bold">Script <strong class="text-danger">*</strong> </label>
                                <textarea name="script" class="form-control" id="" cols="30" rows="10" style="height: 100px;"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#openAdvertisementModal').click(function() {
            $('#advertisementModal').modal('show');
        });

        $(document).on('change','#type',function(){
            var value = $(this).val();
            if(value == 'script'){
                $(document).find('#image').css("display","none");
                $(document).find('#script').css("display","block");
            }else{
                $(document).find('#script').css("display","none");
            }
            // console.log($(this).val());

            // image
            
        });

        $(document).on('change', '#size', function(e) {

            
            let size = $(this);
            // console.log(size);

            let type = $("#type").val();
            if (type == null || type.length <= 0) {
                alert("Please Type Select First")
                $("#type").focus();
                size.val("");
                return;
            }
            // console.log(type);

            if (type == "image") {
                let placeholderImageUrl = '<?= base_url() ?>/admin/assets/images/placeholder-image/:size';
                
                $(document).find('#image').css("display","block");
                $(document).find('.image-upload').css('display', 'block');

                $(document).find('.profilePicPreview').css('background-image',
                    `url(${placeholderImageUrl.replace(':size',size.val()+'.jpg')})`);
                
                // console.log(check);
                
                $(document).find('#image_size').text(`, Upload Image Size Must Be ${size.val()} px`);
                $(document).find("#imageUpload").attr('size-validation', size.val())

                changeImagePreview();
            }

        });

        $(document).on('change', '.profilePicUpload', function(e) {
            readUrl(this);
        });

        $('.remove-image').on('click', function(e) {
            $(this).parents('.profilePicPreview').css('background-image', 'none');
            $(this).parents('.profilePicPreview').removeClass('has-image');
            $(this).parents('.thumb').find('input[type=file]').val('');
        });

        $('.editBtn').on('click', function(e) {
            // alert('hello');
            $('#editAdvertisementModal').modal('show');
            var dataImage = $(this).attr('data-image');
            console.log(dataImage);
            
            var id = $(this).attr('data-id');
            console.log(id);

            let action = "<?= base_url() ?>/admin/advertisement_update/:id";
            $('#editAdvertisementModal').find('form').attr('action', action.replace(":id", id));
        });




    });

    function changeImagePreview(){
        var selected = $(document).find('#size').val();
        var size = selected.split('x');

        $(document).find('.profilePicPreview').css({
            "width" : size[0],
            "height" : size[1],
        });
    }

    function readUrl(input){
        
        console.log(input.files);

        if(input.files && input.files[0]){
            // console.log('hello');
            var reader = new FileReader();
            reader.onload = function(e){
                var preview = $(input).parents('.thumb').find('.profilePicPreview');
                var check = $(preview).css('background-image', 'url('+e.target.result+')');

                $(preview).addClass('has-image');
            }
            reader.readAsDataURL(input.files[0]);
        }

        
    }
</script>


<?= $this->endSection() ?>