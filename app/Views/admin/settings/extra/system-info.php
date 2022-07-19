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

<?php
    // echo "<pre>";
    // print_r($_SERVER);
?>


<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="d-flex">
                <h4>System Information</h4>
            </div>

            <div class="col-lg-12 col-md-12 mb-30">

                <div class="row">
                    <div class="col-12">

                        <div class="card mt-4">
                            <div class="card-body p-0">
                                <div class="table-responsive">


                                    <table id="extension" class="table" style="width:100%">
                                        <tbody>

                                            <tr>
                                                <td>PHP Version</td>
                                                <td><?= phpversion(); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Codeigniter Version</td>
                                                <td>4</td>
                                            </tr>
                                            <tr>
                                                <td>Server Software</td>
                                                <td><?= $_SERVER['SERVER_SOFTWARE']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Server IP Address</td>
                                                <td><?= $_SERVER['SERVER_ADDR']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Server Protocol</td>
                                                <td><?= $_SERVER['SERVER_PROTOCOL']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>HTTP Host</td>
                                                <td><?= $_SERVER['HTTP_HOST']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Database Port</td>
                                                <td>3306</td>
                                            </tr>
                                            <tr>
                                                <td>App Environment</td>
                                                <td><?= $_SERVER['CI_ENVIRONMENT']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>App Debug</td>
                                                <td>true</td>
                                            </tr>
                                            <tr>
                                                <td>Timezone</td>
                                                <td><?= date_default_timezone_get(); ?></td>
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

<?= $this->endSection() ?>