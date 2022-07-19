<?= $this->extend('admin/master'); ?>
<?= $this->section('content'); ?>


<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="d-flex">
                <h4>Email history</h4>
                <!-- <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#bugModal">Report a bug</button> -->
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
                                                <th>User</th>
                                                <th>Sent</th>
                                                <th>Mail Sender</th>
                                                <th>Subject</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <tr>
                                                <td class="text-muted text-center" colspan="100%">No data found</td>
                                            </tr>
                                            
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


<script>
    // $.toast({
    //     heading: 'Positioning',
    //     text: 'Use the predefined ones, or specify a custom position object.',
    //     position: 'top-right',
    //     stack: false
    // }); 
</script>

<?= $this->endSection() ?>