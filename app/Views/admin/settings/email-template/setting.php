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

            <h4 class="d-flex">Email Configuration</h4>

            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>


            <div class="col-lg-12 col-md-12 mb-30">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form action="<?= base_url() ?>/admin/settings/email_template/setting" method="POST">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="col-md-6">
                                            <label class="mb-4">Email Send Method</label>
                                            <select name="email_method" class="form-control">
                                                <option value="php" selected>PHP Mail</option>
                                                <option value="smtp">SMTP</option>
                                                <option value="sendgrid">SendGrid API</option>
                                                <option value="mailjet">Mailjet API</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <h6 class="mb-4">&nbsp;</h6>
                                            <button type="button" data-bs-target="#testMailModal" data-bs-toggle="modal" class="btn btn-info">Send Test Mail</button>
                                        </div>
                                    </div>
                                    <div class="row mt-4 configForm" id="smtp">
                                        <div class="col-md-12">
                                            <h6 class="mb-2">SMTP Configuration</h6>
                                        </div>
                                        <div class="row">
                                            <div class="mb-2 col-md-4">
                                                <label class="mb-1">Host <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="e.g. smtp.googlemail.com" name="host" value="<?= $tempSetVal['host']; ?>" />
                                            </div>
                                            <div class="mb-2 col-md-4">
                                                <label class="mb-1">Port <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Available port" name="port" value="<?= $tempSetVal['port']; ?>" />
                                            </div>
                                            <div class="mb-2 col-md-4">
                                                <label class="mb-1">Encryption</label>
                                                <select class="form-control" name="enc">
                                                    <option value="ssl" <?= $tempSetVal['enc'] == 'ssl' ? 'selected' : '' ?>>SSL</option>
                                                    <option value="tls" <?= $tempSetVal['enc'] == 'tls' ? 'selected' : '' ?>>TLS</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="mb-1">Username <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Normally your email address" name="username" value="<?= $tempSetVal['username']; ?>" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="mb-1">Password <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Normally your email password" name="password" value="<?= $tempSetVal['password']; ?>" />
                                        </div>
                                    </div>
                                    <div class="row mt-4 configForm" id="sendgrid">
                                        <div class="col-md-12">
                                            <h6 class="mb-2">SendGrid API Configuration</h6>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="mb-2">App Key <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="SendGrid App key" name="appkey" value="<?= $tempSetVal['appkey']; ?>" />
                                        </div>
                                    </div>
                                    <div class="row mt-4 configForm" id="mailjet">
                                        <div class="col-md-12">
                                            <h6 class="mb-2">Mailjet API Configuration</h6>
                                        </div>
                                        <div class="mb-2 col-md-6">
                                            <label class="mb-1">Api Public Key <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Mailjet Api Public Key" name="public_key" value="<?= $tempSetVal['public_key']; ?>" />
                                        </div>
                                        <div class="mb-2 col-md-6">
                                            <label class="mb-1">Api Secret Key <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Mailjet Api Secret Key" name="secret_key" value="<?= $tempSetVal['secret_key']; ?>" />
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



    <div id="testMailModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Test Mail Setup</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="https://script.viserlab.com/ratelab/admin/email-template/send-test-mail" method="POST">
                    <input type="hidden" name="_token" value="3eLSI0xHf8ZnmkN2HhExMqdAch8TM7XfPjnhVT0d"> <input type="hidden" name="id">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Sent to <span class="text-danger">*</span></label>
                                <input type="text" name="email" class="form-control" placeholder="Email Address">
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

            var method = 'php';
            emailMethod(method);
            
            $('select[name=email_method]').on("change", function (){
                method = $(this).val();
                emailMethod(method);
            });

            function emailMethod(method){
                $('.configForm').addClass('d-none');
                if(method != 'php'){
                    $(`#${method}`).removeClass('d-none');
                }
            }

        });
    </script>


    <?= $this->endSection() ?>