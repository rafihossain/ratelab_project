<?= $this->extend('admin/master'); ?>
<?= $this->section('content'); ?>

<style>
    .card-footer {
        background-color: #ffffff;
        border-top: 1px solid #e8e8e8;
    }
</style>

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <h4 class="d-flex">SMS Setting</h4>

            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>


            <div class="col-lg-12 col-md-12 mb-30">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form action="<?= base_url() ?>/admin/settings/sms_template/setting" method="POST">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="col-md-6">
                                            <label class="mb-4">Email Send Method</label>
                                            <select name="sms_method" class="form-control">
                                                <option value="clickatell" selected>Clickatell</option>
                                                <option value="infobip">Infobip</option>
                                                <option value="messageBird">Message Bird</option>
                                                <option value="nexmo">Nexmo</option>
                                                <option value="smsBroadcast">Sms Broadcast</option>
                                                <option value="twilio">Twilio</option>
                                                <option value="textMagic">Text Magic</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <h6 class="mb-4">&nbsp;</h6>
                                            <button type="button" data-bs-target="#testSmsModal" data-bs-toggle="modal" class="btn btn-info">Send Test Sms</button>
                                        </div>
                                    </div>
                                    <div class="row mt-4 configForm" id="clickatell">
                                        <div class="col-md-12">
                                            <h4 class="mb-2">Clickatell Configuration</h4>
                                        </div>
                                        <div class="mb-2 col-md-12">
                                            <label class="mb-1">Api Key <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Api Key" name="clickatell_api_key" 
                                            value="<?= $smsTempSetting['clickatell_api_key']; ?>" />
                                        </div>
                                    </div>
                                    <div class="row mt-4 configForm" id="infobip">
                                        <div class="col-md-12">
                                            <h4 class="mb-2">Infobip Configuration</h4>
                                        </div>
                                        <div class="mb-2 col-md-6">
                                            <label class="mb-1">Username <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Username" name="infobip_username"
                                            value="<?= $smsTempSetting['infobip_username']; ?>" />
                                        </div>
                                        <div class="mb-2 col-md-6">
                                            <label class="mb-1">Password <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Password" name="infobip_password" 
                                            value="<?= $smsTempSetting['infobip_password']; ?>" />
                                        </div>
                                    </div>
                                    <div class="row mt-4 configForm" id="messageBird">
                                        <div class="col-md-12">
                                            <h4 class="mb-2">Message Bird Configuration</h4>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="mb-1">Api Key <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Api Key" name="message_bird_api_key"
                                            value="<?= $smsTempSetting['message_bird_api_key']; ?>" />
                                        </div>
                                    </div>
                                    <div class="row mt-4 configForm" id="nexmo">
                                        <div class="col-md-12">
                                            <h4 class="mb-2">Nexmo Configuration</h4>
                                        </div>
                                        <div class="mb-2 col-md-6">
                                            <label class="mb-1">Api Key <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Api Key" name="nexmo_api_key"
                                            value="<?= $smsTempSetting['nexmo_api_key']; ?>" />
                                        </div>
                                        <div class="mb-2 col-md-6">
                                            <label class="mb-1">Api Secret <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Api Secret" name="nexmo_api_secret" 
                                            value="<?= $smsTempSetting['nexmo_api_secret']; ?>" />
                                        </div>
                                    </div>
                                    <div class="row mt-4 configForm" id="smsBroadcast">
                                        <div class="col-md-12">
                                            <h4 class="mb-2">Sms Broadcast Configuration</h4>
                                        </div>
                                        <div class="mb-2 col-md-6">
                                            <label class="mb-1">Username <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Username" name="sms_broadcast_username"
                                            value="<?= $smsTempSetting['sms_broadcast_username']; ?>" />
                                        </div>
                                        <div class="mb-2 col-md-6">
                                            <label class="mb-1">Password <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Password" name="sms_broadcast_password"
                                            value="<?= $smsTempSetting['sms_broadcast_password']; ?>" />
                                        </div>
                                    </div>
                                    <div class="row mt-4 configForm" id="twilio">
                                        <div class="col-md-12">
                                            <h4 class="mb-2">Twilio Configuration</h4>
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <label class="mb-1">Account SID <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Account SID" name="account_sid"
                                            value="<?= $smsTempSetting['account_sid']; ?>" />
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <label class="mb-1">Auth Token <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Auth Token" name="auth_token"
                                            value="<?= $smsTempSetting['auth_token']; ?>" />
                                        </div>
                                        <div class="mb-2 col-md-4">
                                            <label class="mb-1">From Number <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="From Number" name="from"
                                            value="<?= $smsTempSetting['from']; ?>" />
                                        </div>
                                    </div>
                                    <div class="row mt-4 configForm" id="textMagic">
                                        <div class="col-md-12">
                                            <h4 class="mb-2">Text Magic Configuration</h4>
                                        </div>
                                        <div class="mb-2 col-md-6">
                                            <label class="mb-1">Username <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Username" name="text_magic_username"
                                            value="<?= $smsTempSetting['text_magic_username']; ?>" />
                                        </div>
                                        <div class="mb-2 col-md-6">
                                            <label class="mb-1">Apiv2 Key <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Apiv2 Key" name="apiv2_key"
                                            value="<?= $smsTempSetting['apiv2_key']; ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-block btn-primary w-100 mr-2">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <div id="testSmsModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Test Sms Setup</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="https://script.viserlab.com/ratelab/admin/email-template/send-test-mail" method="POST">
                    <input type="hidden" name="_token" value="3eLSI0xHf8ZnmkN2HhExMqdAch8TM7XfPjnhVT0d"> <input type="hidden" name="id">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label class="mb-1">Sent to <span class="text-danger">*</span></label>
                                <input type="number" name="sms" class="form-control" placeholder="Mobile">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            var method = 'clickatell';
            smsMethod(method);

            $('select[name=sms_method]').on("change", function() {
                method = $(this).val();
                smsMethod(method);
            });

            function smsMethod(method) {
                $('.configForm').addClass('d-none');
                if (method != 'php') {
                    $(`#${method}`).removeClass('d-none');
                }
            }

        });
    </script>


    <?= $this->endSection() ?>