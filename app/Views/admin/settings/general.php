<?= $this->extend('admin/master'); ?>
<?= $this->section('content'); ?>

<!-- Plugins css -->
<link href="<?= base_url() ?>/admin/assets/libs/spectrum-colorpicker2/spectrum.min.css" rel="stylesheet" type="text/css">
<link href="<?= base_url() ?>/admin/assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />


<style>
    .btn-group.btn-toggle {
        white-space: nowrap;
        border: 1px solid #ced4da;
        padding: 0;
        border-radius: 5px;
        overflow: hidden;
        margin-left: 13px;
    }
</style>

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <h4 class="d-flex">General Settings</h4>

            <?php if(session()->getFlashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?= base_url(); ?>/admin/settings/general" method="POST">
                                <div class="row mb-4">
                                    <div class="col-md-3 mb-2">
                                        <label for="" class="mb-2">Site Title</label>
                                        <input type="text" class="form-control" name="site_title" value="<?= $general_settings['site_title']; ?>">
                                    </div>
                                    <div class="col-md-3 mb-2">
                                        <label for="" class="mb-2">Timezone</label>
                                        <select name="timezone" class="form-control" id="">
                                            <option value="UTC" <?= ($general_settings['timezone'] == 'UTC' ? 'selected' : ''); ?>
                                            >UTC</option>
                                            <option value="Dhaka" <?= ($general_settings['timezone'] == 'Dhaka' ? 'selected' : ''); ?> 
                                            >Dhaka</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-2 row">
                                        <label for="" class="form-label mb-2">Site Base Color</label>
                                        <input type="text" class="form-control" id="colorpicker-showintial" value="<?= $general_settings['base_color']; ?>" name="base_color">
                                    </div>

                                    <div class="col-md-3 mb-2 row">
                                        <label for="" class="mb-2">Site Secondary Color</label>
                                        <input type="text" class="form-control" id="colorpicker-default" value="<?= $general_settings['secondary_color']; ?>" name="secondary_color">
                                    </div>
                                </div>

                                <div class="row mb-4 ms-2">
                                    <div class="col-md-3 row">
                                        <label for="" class="mb-2">Force Secure Password</label>
                                        <input type="hidden" name="secure_password" value="0">

                                        <input type="checkbox" name="secure_password" <?= ($general_settings['secure_password'] == 1 ? 'checked' : ''); ?> value="1">
                                    </div>
                                    <div class="col-md-3 row">
                                        <label for="" class="mb-2">Agree policy</label>
                                        <input type="hidden" name="agree_policy" value="0">

                                        <input type="checkbox" name="agree_policy" <?= ($general_settings['agree_policy'] == 1 ? 'checked' : ''); ?> value="1">
                                    </div>
                                    <div class="col-md-3 row">
                                        <label for="" class="mb-2">User Registration</label>
                                        <input type="hidden" name="user_registration" value="0">

                                        <input type="checkbox" name="user_registration" <?= ($general_settings['user_registration'] == 1 ? 'checked' : ''); ?> value="1">
                                    </div>
                                    <div class="col-md-3 row">
                                        <label for="" class="mb-2">Force SSL</label>
                                        <input type="hidden" name="force_ssl" value="0">

                                        <input type="checkbox" name="force_ssl" <?= ($general_settings['force_ssl'] == 1 ? 'checked' : ''); ?> value="1">
                                    </div>
                                </div>
                                <div class="row mb-4 ms-2">
                                    <div class="col-md-3 row">
                                        <label for="" class="mb-2">Email Verification</label>
                                        <input type="hidden" name="email_verification" value="0">

                                        <input type="checkbox" name="email_verification" <?= ($general_settings['email_verification'] == 1 ? 'checked' : ''); ?> value="1">
                                    </div>
                                    <div class="col-md-3 row">
                                        <label for="" class="mb-2">Email Notification</label>
                                        <input type="hidden" name="email_notification" value="0">

                                        <input type="checkbox" name="email_notification" <?= ($general_settings['email_notification'] == 1 ? 'checked' : ''); ?> value="1">
                                    </div>
                                    <div class="col-md-3 row">
                                        <label for="" class="mb-2">SMS Verification</label>
                                        <input type="hidden" name="sms_verification" value="0">

                                        <input type="checkbox" name="sms_verification" <?= ($general_settings['sms_verification'] == 1 ? 'checked' : ''); ?> value="1">
                                    </div>
                                    <div class="col-md-3 row">
                                        <label for="" class="mb-2">SMS Notification</label>
                                        <input type="hidden" name="sms_notification" value="0">

                                        <input type="checkbox" name="sms_notification" <?= ($general_settings['sms_notification'] == 1 ? 'checked' : ''); ?> value="1">
                                    </div>

                                </div>

                                <div class="mb-2">
                                    <button type="submit" class="btn btn-primary btn-lg w-100">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- container-fluid -->

    </div> <!-- content -->
</div>


<script src="<?= base_url() ?>/admin/assets/boostrap-toggle/bootstrap4-toggle.js"></script>

<script src="<?= base_url() ?>/admin/assets/switch/bootstrap-switch.js"></script>
<script src="<?= base_url() ?>/admin/assets/minicolor/jquery.minicolors.js"></script>

<script src="<?= base_url() ?>/admin/assets/libs/flatpickr/flatpickr.min.js"></script>
<script src="<?= base_url() ?>/admin/assets/libs/spectrum-colorpicker2/spectrum.min.js"></script>

<!-- Init js-->
<script src="<?= base_url() ?>/admin/assets/js/pages/form-pickers.init.js"></script>

<script>

    $("[type='checkbox']").bootstrapSwitch({
        on: 'Enable',
        off: 'Disabled ',
        onLabel: '&nbsp;&nbsp;&nbsp;',
        offLabel: '&nbsp;&nbsp;&nbsp;',
        same: true, //same labels for on/off states
        size: 'md',
        onClass: 'success',
        offClass: 'danger'
    });

</script>


<?= $this->endSection() ?>