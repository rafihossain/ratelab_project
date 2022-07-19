<?= $this->extend('admin/master'); ?>
<?= $this->section('content'); ?>


<style>
    #extension .users {
        display: flex;
        align-items: center;
    }

    #extension .users .imgthumb img {
        width: 40px;
        height: 40px;
        border: 2px solid #fff;
        box-shadow: 0px 2px 13px 0px rgb(0 0 0 / 20%);
        border-radius: 50%;
    }

    #extension .users .name {
        margin-left: 10px;
    }

    #openHelpModal img {
        width: 100%;
    }

    .bodywrapper-inner .border-left {
        border-left: 5px solid #7367f0 !important;
    }

    .btn-group.btn-toggle {
        white-space: nowrap;
        border: 1px solid #ced4da;
        padding: 0px;
        border-radius: 5px;
        overflow: hidden;
        width: 100%;
    }
</style>

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="bodywrapper-inner">
                    <div class="row align-items-center mb-30 justify-content-between">
                        <div class="col-lg-6 col-sm-6">
                            <h4 class="page-title">Language Manager</h4>
                        </div>
                        <div class="col-lg-6 col-sm-6 text-end mb-2 mt-3">
                            <a class="btn btn-primary btn-sm" id="addLanguage">
                                <i class="fa fa-fw fa-plus"></i>Add New Language
                            </a>
                        </div>
                    </div>

                    <div class="row mb-30">
                        <div class="col-md-12 mb-30">
                            <div class="card border-left">
                                <div class="card-body">
                                    <p class="fw-bold text-info">While you are adding a new keyword, it will only add to this current language only. Please be careful on entering a keyword, please make sure there is no extra space. It needs to be exact and case-sensitive.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-30">
                            <div class="card">
                                <div class="card-body">

                                    <?php if (session()->getFlashdata('success')) : ?>
                                        <div class="alert alert-success" role="alert">
                                            <?= session()->getFlashdata('success') ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="table-responsive">
                                        <table id="extension" class="table" style="width:100%">
                                            <thead style="background-color: #7367F0; color: white">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Code</th>
                                                    <th>Default</th>
                                                    <th class="col-md-3">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php foreach($language as $lang) : ?>
                                                    <tr>
                                                        <td><?= $lang['name']; ?></td>
                                                        <td><strong><?= $lang['code']; ?></strong></td>

                                                        <td>
                                                            <?php if ($lang['is_default'] == 1) { ?>
                                                                <span class="btn btn-outline-success">Selectable</span>
                                                            <?php } else { ?>
                                                                <span class="btn btn-outline-warning">Unselectable</span>
                                                            <?php } ?>
                                                        </td>

                                                        <td>
                                                            <a href="javascript:void(0)" class="btn btn-warning btn-sm" title="Translate">
                                                                <i class="ti-split-v-alt"></i>
                                                            </a>
                                                            <a href="javascript:void(0)" class="btn btn-primary btn-sm editLang" data-id="<?= $lang['id']; ?>" data-name="<?= $lang['name']; ?>" data-default="<?= $lang['is_default']; ?>" title="Edit">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a href="javascript:void(0)" class="btn btn-danger btn-sm deleteLang" data-id="<?= $lang['id']; ?>" title="Delete">
                                                                <i class="fas fa-trash"></i>
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
            </div>

        </div>
    </div>
</div>



<div id="addLanguageModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Add New Language</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="" id="langForm">
                        <div class="mb-2">
                            <label for="">Language Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control lang_name" name="lang_name" placeholder="e.g. Japaneese, Portuguese">
                        </div>
                        <div class="mb-2">
                            <label for="">Language Code <span class="text-danger">*</span></label>
                            <input type="text" class="form-control lang_code" name="lang_code" placeholder="e.g. jp, pt-br">
                        </div>

                        <div class="mb-2">
                            <label for="" class="mb-2">Default Language <span class="text-danger">*</span></label> <br>
                            <input type="hidden" name="lang_default" value="0">

                            <input type="checkbox" class="lang_default" name="lang_default" value="1">
                        </div>
                    </form>

                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-12 d-flex">
                    <button class="btn btn-outline-danger btn-rounded btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary ms-auto btn-rounded btn-sm saveLang">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="editLanguageModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Edit Language</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="" id="langEditForm">
                        <div class="mb-2">
                            <input type="hidden" class="lang_id" name="lang_id">
                            <label for="">Language Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control lang_name" name="lang_name" placeholder="e.g. Japaneese, Portuguese">
                        </div>

                        <div class="mb-2">
                            <label for="" class="mb-2">Default Language <span class="text-danger">*</span></label> <br>
                            <input type="hidden" name="lang_default" value="0">

                            <input type="checkbox" class="lang_default" name="lang_default" value="1">

                        </div>
                    </form>

                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-12 d-flex">
                    <button class="btn btn-outline-danger btn-rounded btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary ms-auto btn-rounded btn-sm updateLang">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="deleteLanguageModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Remove Language</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="delete_id" id="delete_id" class="delete_id" value="0">
                <div class="modal-body">
                    <p class="text-muted">Are you sure to delete?</p>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-md-12 d-flex">
                    <button class="btn btn-outline-danger btn-rounded btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary ms-auto btn-rounded btn-sm delLang">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
    


<script src="<?= base_url() ?>/admin/assets/switch/bootstrap-switch.js"></script>

<script>

    var mystr;

    $(document).ready(function() {
        $('#addLanguage').click(function() {
            var modal = $('#addLanguageModal');
            modal.modal('show');

        });
        
        $('.saveLang').on('click',function() {
            var modal = $('#addLanguageModal');

            var serialize = $('#langForm').serialize();
            console.log(serialize);

            $.ajax({
                url: "<?= base_url() ?>/admin/settings/add_new_language",
                type: 'POST',
                data: serialize,
                success: function(response) {

                    modal.modal('hide');
                    window.location.reload();
                }
            });
        });
        
        $('.editLang').on('click',function() {

            var modal = $('#editLanguageModal');
            modal.modal('show');

            var langId = modal.find('.lang_id').val($(this).data('id'));
            var langName = modal.find('.lang_name').val($(this).data('name'));

            var langDefault = $(this).data('default');

            if(langDefault == 1){
                var checkTrue = modal.find('input[type="checkbox"]').prop("checked", true);
                // console.log(checkTrue);
                mystr.trigger('change');
            }else{
                var checkFalse = modal.find('input[type="checkbox"]').prop("checked", false);
                // console.log(checkFalse);
                mystr.trigger('change');
            }


        });

        mystr = $("[type='checkbox']").bootstrapSwitch({
            on: 'Set',
            off: 'Unset',
            onLabel: '&nbsp;&nbsp;&nbsp;',
            offLabel: '&nbsp;&nbsp;&nbsp;',
            same: true, //same labels for on/off states
            size: 'md',
            onClass: 'success',
            offClass: 'danger'
        });


        $('.updateLang').on('click',function() {
            var modal = $('#editLanguageModal');

            var serialize = $('#langEditForm').serialize();
            console.log(serialize);

            $.ajax({
                url: "<?= base_url() ?>/admin/settings/edit_language",
                type: 'POST',
                data: serialize,
                success: function(response) {

                    modal.modal('hide');
                    window.location.reload();
                }
            });
        });

        $('.deleteLang').on('click',function() {
            var modal = $('#deleteLanguageModal');
            modal.modal('show');
            modal.find('.delete_id').val(`${$(this).data('id')}`);
        });

        $('.delLang').on('click',function() {
            var modal = $('#deleteLanguageModal');
            var delete_id = modal.find('.delete_id').val();
            console.log(delete_id);
            
            $.ajax({
                url: "<?= base_url() ?>/admin/settings/delete_language",
                type: 'POST',
                data:{
                    delete_id : delete_id,
                },
                success: function(response) {
                    modal.modal('hide');
                    window.location.reload();
                }
            });

        });


    });
</script>


<?= $this->endSection() ?>