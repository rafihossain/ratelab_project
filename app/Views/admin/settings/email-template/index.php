<?= $this->extend('admin/master'); ?>
<?= $this->section('content'); ?>

<!-- Plugins css -->
<link href="<?= base_url() ?>/admin/assets/libs/quill/quill.core.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/admin/assets/libs/quill/quill.bubble.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url() ?>/admin/assets/libs/quill/quill.snow.css" rel="stylesheet" type="text/css" />

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <h4 class="d-flex">Email Templates</h4>

            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>


            <div class="col-lg-12 col-md-12 mb-30">

                <div class="row">
                    <div class="col-12">

                        <div class="card mt-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="extension" class="table" style="width:100%">
                                        <thead style="background-color: #7367F0; color: white">
                                            <tr>
                                                <th>Name</th>
                                                <th>Subject</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($emailTemps as $temps) : ?>
                                                <tr>
                                                    <td><?= $temps->name; ?></td>
                                                    <td><?= $temps->mail_subject; ?></td>
                                                    <td>
                                                        <?php if ($temps->mail_status == 1) { ?>
                                                            <span class="btn btn-outline-success">Active</span>
                                                        <?php } else { ?>
                                                            <span class="btn btn-outline-warning">Deactive</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url() ?>/admin/settings/email_template/edit/<?= $temps->id; ?>" class="btn btn-primary btn-sm" title="Edit">
                                                            <i class="ti-pencil-alt"></i>
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
                </div>
            </div>


        </div> <!-- container-fluid -->

    </div> <!-- content -->
</div>

<!-- Plugins js -->
<script src="<?= base_url() ?>/admin/assets/libs/quill/quill.min.js"></script>

<!-- Init js-->
<script src="<?= base_url() ?>/admin/assets/js/pages/form-quilljs.init.js"></script>

<script>
    $(document).ready(function() {
        $("#identifier").on("submit", function() {
            $("#hiddenArea").val($("#snow-editor").html());
        })
    });
</script>


<?= $this->endSection() ?>