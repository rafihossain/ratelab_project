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
                <h4>GDPR Cookie</h4>
            </div>

            <div class="col-lg-12 col-md-12 mb-30">

                <div class="row">
                    <div class="col-12">

                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('success') ?>
                            </div>
                        <?php endif; ?>


                        <div class="card mt-4">
                            <div class="card-body">
                                <form id="identifier" action="<?= base_url() ?>/admin/settings/cookie" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="mb-1" for="">Policy Link</label>
                                                <input type="text" class="form-control" name="policy_link" value="<?= $cookie['policy_link']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="mb-1" for="">Status</label><br>

                                                <input type="hidden" name="status" value="0">
                                                <input type="checkbox" name="status" value="1" <?= ($cookie['status'] == 1 ? 'checked' : ''); ?>>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="mb-4">
                                        <label class="mb-1" for="">Description</label>

                                        <div id="snow-editor" style="height: 200px;">
                                            <?= $cookie['description']; ?>
                                        </div>
                                        <textarea name="description" style="display:none" id="hiddenArea"></textarea>

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

<!-- Init js-->
<script src="<?= base_url() ?>/admin/assets/js/pages/form-quilljs.init.js"></script>

<script>
    $(document).ready(function() {

        $("#identifier").on("submit", function() {
            $("#hiddenArea").val($("#snow-editor").html());
        });

        $("[type='checkbox']").bootstrapSwitch({
            on: 'Enable',
            off: "Disabled",
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