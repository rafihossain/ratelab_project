<?= $this->extend('admin/master'); ?>
<?= $this->section('content'); ?>

<script src="<?= base_url() ?>/admin/assets/libs/jquery/jquery.min.js"></script>

<style>
    #extension .users {
        display: flex;
        align-items: center;
    }

    #extension .users .imgthumb img {
        width: 40px;
        height: 40px;
        border: 2px solid #fff;
        box-shadow: 0px 2px 13px 0px rgb(0 0 0 / 20%);
        border-radius: 50%;
    }

    #extension .users .name {
        margin-left: 10px;
    }

    #openHelpModal img {
        width: 100%;
    }
</style>

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="bodywrapper-inner">
                    <div class="row align-items-center mb-30 justify-content-between">
                        <div class="col-lg-6 col-sm-6">
                            <h4 class="page-title">Extensions</h4>
                        </div>
                        <div class="col-lg-6 col-sm-6 text-sm-right mt-sm-0 mt-3 right-part">
                        </div>
                    </div>
                    <div class="row mb-none-30">
                        <div class="col-md-12 mb-30">
                            <div class="card">
                                <div class="card-body">

                                    <?php if (session()->getFlashdata('success')) : ?>
                                        <div class="alert alert-success" role="alert">
                                            <?= session()->getFlashdata('success') ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="table-responsive">
                                        <table id="extension" class="table" style="width:100%">
                                            <thead style="background-color: #7367F0; color: white">
                                                <tr>
                                                    <th>Extension</th>
                                                    <th>Status</th>
                                                    <th class="col-md-3">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // echo "<pre>";
                                                // print_r($result_extensions);
                                                // die();
                                                ?>

                                                <?php foreach ($extensions as $extension) : ?>
                                                    <tr>
                                                        <td>
                                                            <div class="users">
                                                                <div class="imgthumb">
                                                                    <img src="<?= base_url() ?>/admin/uploads/<?= $extension->image; ?>" alt="">
                                                                </div>
                                                                <span class="name"><?= $extension->name; ?></span>
                                                            </div>
                                                        </td>

                                                        <td>
                                                            <?php if ($extension->status == 1) { ?>
                                                                <span class="btn btn-outline-success">Enabled</span>
                                                            <?php } else { ?>
                                                                <span class="btn btn-outline-warning">Disabled</span>
                                                            <?php } ?>
                                                        </td>

                                                        <td>
                                                            <button type="button" class="btn btn-primary btn-sm openSetting" data-name="<?= $extension->name; ?>" data-id="<?= $extension->id; ?>" data-action="<?= base_url() ?>/admin/settings/extensions/<?= $extension->id; ?>" data-original-title="Configure" title="Configure">
                                                                <i class="ti-settings"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-warning btn-sm openHelp" data-description="<?= $extension->help_txt; ?>" data-support="<?= $extension->help_img; ?>" title="Help">
                                                                <i class="ti-help"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-info btn-sm openEye" data-name="<?= $extension->name; ?>" data-status="<?= $extension->status; ?>" data-id="<?= $extension->id; ?>" title="Extension Active">
                                                                <i class="ti-eye"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-danger btn-sm closeEye" data-name="<?= $extension->name; ?>" data-status="<?= $extension->status; ?>" data-id="<?= $extension->id; ?>" title="Extension Deactive">
                                                                <i class="fas fa-eye-slash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container-fluid -->

    </div> <!-- content -->
</div>



<div id="openSettingModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content append_setting">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Update Extension: <span class="extension-name"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <div class="col-md-12 d-flex">
                    <button class="btn btn-outline-danger btn-rounded btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary ms-auto btn-rounded btn-sm saveSetting">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="openHelpModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Need Help?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <span>Key location is shown bellow</span>
                    <img src="<?= base_url() ?>/admin/assets/images/settings/twak.png" alt="" class="mt-2">
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-12 d-flex">
                    <button class="btn btn-outline-danger btn-rounded btn-sm" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="openEyeModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Extension Activation Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="extension_id"></div>
                <p>Are you sure to activate <strong><span class="extension-name"></span></strong> extension?</hp>

            </div>
            <div class="modal-footer">
                <div class="col-md-12 d-flex">
                    <button class="btn btn-outline-danger btn-rounded btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary ms-auto btn-rounded btn-sm openEyeSetting">Activate</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="closeEyeModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Extension Activation Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="extension_id"></div>
                <p>Are you sure to Deactivate <strong><span class="extension-name"></span></strong> extension?</hp>

            </div>
            <div class="modal-footer">
                <div class="col-md-12 d-flex">
                    <button class="btn btn-outline-danger btn-rounded btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger ms-auto btn-rounded btn-sm closeEyeSetting">Deactivate</button>
                </div>
            </div>
        </div>
    </div>
</div>




<script>
    $(document).ready(function() {

        $('.openSetting').on('click', function() {

            var modal = $('#openSettingModal');
            modal.modal('show');

            var id = $(this).data('id');

            $.ajax({
                url: "<?= base_url() ?>/admin/settings/get_specific_extension",
                type: 'POST',
                data: {
                    id: id
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    var result = data.settings_value;
                    var results = JSON.parse(result);
                    // console.log(results);

                    modal.find('.extension-name').text(results.name);

                    var str = '<input type="hidden" class="setting_id" name="setting_id" value="' + results.id + '"><div class="container"><label for="">' + results.title + ' <span class="text-danger">*</span></label><input type="text" class="form-control setting_val" name="app_key" value="' + results.value + '" placeholder="- -"></div>';

                    modal.find('.modal-body').html(str);
                }
            });

        });

        $('.saveSetting').on('click', function() {

            var modal = $('#openSettingModal');

            var setting_val = modal.find('.setting_val').val();
            var setting_id = modal.find('.setting_id').val();

            $.ajax({
                url: "<?= base_url() ?>/admin/settings/update_specific_extension",
                type: 'POST',
                data: {
                    setting_val: setting_val,
                    setting_id: setting_id
                },
                success: function(response) {

                    modal.modal('hide');
                }
            });

        });


        $('.openHelp').on('click', function() {

            var modal = $('#openHelpModal');

            modal.find('.modal-body').html(`<div class="mb-2">${$(this).data('description')}</div>`);

            var path = "<?= base_url() ?>/admin/uploads/";

            modal.find('.modal-body').html(`<div class="mb-2">${$(this).data('description')}</div>`);
            if ($(this).data('support') != 'na') {
                // modal.find('.modal-body').append(`<img src="${path}/${$(this).data('support')}">`);
                var img = $(this).data('support');
                modal.find('.modal-body').append('<img src="' + path + '/' + img + '">');
            }


            modal.modal('show');
        });

        $('.openEye').on('click', function() {
            var modal = $('#openEyeModal');

            modal.find('.extension-name').html(`${$(this).data('name')}`);
            modal.find('.extension_id').html(`<input type="hidden" class="setting_id" name="setting_id" value="${$(this).data('id')}">`);

            modal.modal('show');
        });

        $('.openEyeSetting').on('click', function() {
            var modal = $('#openEyeModal');
            var setting_id = modal.find('.setting_id').val();

            $.ajax({
                url: "<?= base_url() ?>/admin/settings/activated_extension",
                type: 'POST',
                data: {
                    setting_id: setting_id,
                },
                success: function(response) {

                    modal.modal('hide');
                    window.location.reload();
                }
            });

        });

        $('.closeEye').on('click', function() {
            var modal = $('#closeEyeModal');

            modal.find('.extension-name').html(`${$(this).data('name')}`);
            modal.find('.extension_id').html(`<input type="hidden" class="setting_id" name="setting_id" value="${$(this).data('id')}">`);

            modal.modal('show');
        });

        $('.closeEyeSetting').on('click', function() {
            var modal = $('#closeEyeModal');
            var setting_id = modal.find('.setting_id').val();

            $.ajax({
                url: "<?= base_url() ?>/admin/settings/deactivated_extension",
                type: 'POST',
                data: {
                    setting_id: setting_id,
                },
                success: function(response) {

                    modal.modal('hide');
                    window.location.reload();
                }
            });

        });
        

    });
</script>


<?= $this->endSection() ?>