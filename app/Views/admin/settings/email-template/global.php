<?= $this->extend('admin/master'); ?>
<?= $this->section('content'); ?>

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <h4 class="d-flex">Global Email Template</h4>

            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>


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
                                                <th class="col-md-2">Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{fullname}}</td>
                                                <td>User Fullname</td>
                                            </tr>
                                            <tr>
                                                <td>{{username}}</td>
                                                <td>User Name</td>
                                            </tr>
                                            <tr>
                                                <td>{{message}}</td>
                                                <td>Message</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-4">
                            <div class="card-body">
                                <form id="identifier" action="<?= base_url() ?>/admin/settings/email_template/global" method="post" enctype="multipart/form-data">
                                    <div class="mb-4">
                                        <label for="">Email Sent From <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="email_sent_from" value="<?= $tempglobals['email_sent_from']; ?>">
                                    </div>

                                    <div class="mb-4">
                                        <label for="">Email Body <span class="text-danger">*</span></label>

                                        <div id="snow-editor" style="height: 300px;">
                                            <?= $tempglobals['email_body']; ?>
                                        </div>
                                        <textarea name="email_body" style="display:none" id="hiddenArea"></textarea>

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