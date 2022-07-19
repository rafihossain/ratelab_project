<?= $this->extend('admin/master'); ?>
<?= $this->section('content'); ?>

<style>
    .btn-group.btn-toggle {
        white-space: nowrap;
        border: 1px solid #ced4da;
        padding: 0;
        border-radius: 5px;
        overflow: hidden;
        width: 100%;
    }
</style>


<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="d-flex">
                <h4><?= $editTemps->name; ?></h4>
                <a href="<?= base_url() ?>/admin/settings/sms_template/index" class="btn btn-primary ms-auto">
                    <i class="ti-control-backward"></i> Go Back
                </a>
            </div>

            <div class="col-lg-12 col-md-12 mb-30">

                <div class="row">
                    <div class="col-12">

                        <div class="card mt-4">
                            <div class="card-body p-0">
                                <div class="table-responsive">


                                    <table id="extension" class="table" style="width:100%">
                                        <thead style="background-color: #7367F0; color: white">
                                            <tr>
                                                <th>Short Code </th>
                                                <th class="col-md-3">Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($editTemps->id == 1) : ?>
                                                <tr>
                                                    <td>{{code}}</td>
                                                    <td>Password Reset Code</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ip}}</td>
                                                    <td>IP of User</td>
                                                </tr>
                                                <tr>
                                                    <td>{{browser}}</td>
                                                    <td>Browser of User</td>
                                                </tr>
                                                <tr>
                                                    <td>{{operating_system}}</td>
                                                    <td>Operating System of User</td>
                                                </tr>
                                                <tr>
                                                    <td>{{time}}</td>
                                                    <td>Request Time</td>
                                                </tr>
                                            <?php endif; ?>
                                            <?php if ($editTemps->id == 2) : ?>
                                                <tr>
                                                    <td>{{ip}}</td>
                                                    <td>IP of User</td>
                                                </tr>
                                                <tr>
                                                    <td>{{browser}}</td>
                                                    <td>Browser of User</td>
                                                </tr>
                                                <tr>
                                                    <td>{{operating_system}}</td>
                                                    <td>Operating System of User</td>
                                                </tr>
                                                <tr>
                                                    <td>{{time}}</td>
                                                    <td>Request Time</td>
                                                </tr>
                                            <?php endif; ?>
                                            <?php if ($editTemps->id == 3 || $editTemps->id == 4) : ?>
                                                <tr>
                                                    <td>{{code}}</td>
                                                    <td>Verification code</td>
                                                </tr>
                                            <?php endif; ?>
                                            <?php if ($editTemps->id == 5) : ?>
                                                <tr>
                                                    <td>{{ticket_id}}</td>
                                                    <td>Support Ticket ID</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ticket_subject}}</td>
                                                    <td>Subject Of Support Ticket</td>
                                                </tr>
                                                <tr>
                                                    <td>{{reply}}</td>
                                                    <td>Reply from Staff/Admin</td>
                                                </tr>
                                                <tr>
                                                    <td>{{link}}</td>
                                                    <td>Ticket URL For reply</td>
                                                </tr>
                                            <?php endif; ?>
                                            <?php if ($editTemps->id == 6 || $editTemps->id == 7) : ?>
                                                <tr>
                                                    <td>{{Name}}</td>
                                                    <td>Company Name</td>
                                                </tr>
                                                <tr>
                                                    <td>{{Site}}</td>
                                                    <td>Website name</td>
                                                </tr>
                                                <tr>
                                                    <td>{{feedback}}</td>
                                                    <td>Admin feedback</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('success') ?>
                            </div>
                        <?php endif; ?>


                        <div class="card mt-4">
                            <div class="card-header bg-dark">
                                <h5 class="card-title text-white"><?= $editTemps->name; ?></h5>
                            </div>
                            <div class="card-body">
                                <form id="identifier" action="<?= base_url() ?>/admin/settings/sms_template/edit/<?= $editTemps->id; ?>" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="mb-4">
                                                <label for="">Status <span class="text-danger">*</span></label><br>

                                                <input type="hidden" name="sms_status" value="0">
                                                <input type="checkbox" name="sms_status" <?= ($editTemps->sms_status == 1 ? 'checked' : ''); ?> value="1">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="">Message <span class="text-danger">*</span></label>
                                        <textarea name="sms_body" class="form-control" id="" rows="10"><?= $editTemps->sms_body; ?></textarea>
                                    </div>

                                    <div class="mb-4">
                                        <button type="submit" class="btn btn-primary w-100">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div> <!-- container-fluid -->

    </div> <!-- content -->
</div>

<script src="<?= base_url() ?>/admin/assets/switch/bootstrap-switch.js"></script>

<script>
    $(document).ready(function() {

        $("[type='checkbox']").bootstrapSwitch({
            on: 'Send Sms',
            off: "Don't Send",
            onLabel: '&nbsp;&nbsp;&nbsp;',
            offLabel: '&nbsp;&nbsp;&nbsp;',
            same: true, //same labels for on/off states
            size: 'md',
            onClass: 'success',
            offClass: 'danger'
        });

    });
</script>


<?= $this->endSection() ?>