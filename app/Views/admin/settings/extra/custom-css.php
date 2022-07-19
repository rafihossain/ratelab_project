<?= $this->extend('admin/master'); ?>
<?= $this->section('content'); ?>

<link rel="stylesheet" href="<?php echo base_url() ?>/admin/assets/codemirror/lib/codemirror.css">
<link rel="stylesheet" href="<?php echo base_url() ?>/admin/assets/codemirror/theme/monokai.css">

<style>
    .bodywrapper-inner .border-left {
        border-left: 5px solid #7367f0 !important;
    }

    .card-header {
        background-color: transparent;
        border-bottom: 1px solid rgba(140, 140, 140, 0.125);
    }
</style>

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="d-flex">
                <h4>Custom CSS</h4>
            </div>

            <div class="row">
                <div class="bodywrapper-inner">

                    <div class="row mb-none-30">
                        <div class="col-md-12 mb-30">
                            <div class="card border-left">
                                <div class="card-body">
                                    <p class="font-weight-bold text-info">From this page, you can add/update CSS for the user interface. Changing content on this page required programming knowledge.<br>Please do not change/edit/add anything without having proper knowledge of it. Any mistake may lead to misbehaving of the system.</p>
                                </div>
                            </div>
                        </div>

                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('success') ?>
                            </div>
                        <?php endif; ?>

                        <div class="col-md-12 mb-30">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Write Custom CSS</h4>
                                </div>
                                <div class="card-body">
                                    <form action="<?= base_url() ?>/admin/settings/custom_css" method="post">
                                        <textarea id="customCss" name="css"><?= $customcss->settings_value; ?></textarea>
                                        
                                        <div class="mt-4">
                                            <button type="submit" class="btn btn-primary w-100">Update</button>
                                        </div>
                                    </form>
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

<script src="<?php echo base_url() ?>/admin/assets/codemirror/lib/codemirror.js"></script>
<script src="<?php echo base_url() ?>/admin/assets/codemirror/mode/css/css.js"></script>
<script src="<?php echo base_url() ?>/admin/assets/codemirror/keymap/sublime.js"></script>

<script>
    $(function (){
        CodeMirror.fromTextArea(document.getElementById("customCss"), {
            lineNumbers: true,
            mode: "text/css",
            theme: "monokai",
            keyMap: "sublime",
            autoCloseBrackets: true,
            matchBrackets: true,
            showCursorWhenSelecting: true,
            matchBrackets: true
        });
    });
</script>

<?= $this->endSection() ?>