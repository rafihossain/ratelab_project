<?= $this->extend('admin/master'); ?>
<?= $this->section('content'); ?>


<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="d-flex">
                <h4>Your Listed Report & Request</h4>
                <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#bugModal">Report a bug</button>
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
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table id="extension" class="table" style="width:100%">
                                        <thead style="background-color: #7367F0; color: white">
                                            <tr>
                                                <th>Type </th>
                                                <th>Message</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($reportandreq as $reandreq) : ?>
                                                <tr>
                                                    <td><?= $reandreq->settings_name; ?></td>
                                                    <td><?= $reandreq->settings_value; ?></td>
                                                    <td>
                                                        <?php if ($reandreq->settings_value == 1) { ?>
                                                            <span class="btn btn-outline-success">Active</span>
                                                        <?php } else { ?>
                                                            <span class="btn btn-outline-warning">Deactive</span>
                                                        <?php } ?>
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

<div id="bugModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Report & Request</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url(); ?>/admin/settings/request_report" method="POST">
                <div class="modal-body">
                    <div class="mb-2">
                        <label>Type</label>
                        <select class="form-control" name="type">
                            <option value="bug">Report Bug</option>
                            <option value="feature">Feature Request</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <div class="form-group">
                            <label>Message</label>
                            <textarea class="form-control" name="message"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Report</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    // $.toast({
    //     heading: 'Positioning',
    //     text: 'Use the predefined ones, or specify a custom position object.',
    //     position: 'top-right',
    //     stack: false
    // }); 
</script>

<?= $this->endSection() ?>