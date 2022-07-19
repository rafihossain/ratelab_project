<!-- Footer Start -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <script>
                    document.write(new Date().getFullYear())
                </script> &copy; Adminto theme by <a href="">Coderthemes</a>
            </div>
            <div class="col-md-6">
                <div class="text-md-end footer-links d-none d-sm-block">
                    <a href="javascript:void(0);">About Us</a>
                    <a href="javascript:void(0);">Help</a>
                    <a href="javascript:void(0);">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end Footer -->

</div>
<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


</div>
<!-- END wrapper -->


<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- Vendor -->

<script src="<?= base_url() ?>/admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>/admin/assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?= base_url() ?>/admin/assets/libs/node-waves/waves.min.js"></script>
<script src="<?= base_url() ?>/admin/assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="<?= base_url() ?>/admin/assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
<script src="<?= base_url() ?>/admin/assets/libs/feather-icons/feather.min.js"></script>

<!-- knob plugin -->
<script src="<?= base_url() ?>/admin/assets/libs/jquery-knob/jquery.knob.min.js"></script>

<!-- App js-->
<script src="<?= base_url() ?>/admin/assets/js/app.min.js"></script>

 <!-- third party js -->
<script src="<?= base_url() ?>/admin/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/admin/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="<?= base_url() ?>/admin/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/admin/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="<?= base_url() ?>/admin/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>/admin/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
<script src="<?= base_url() ?>/admin/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>/admin/assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?= base_url() ?>/admin/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>/admin/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?= base_url() ?>/admin/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

 <!-- summernote -->
    <script src="<?= base_url() ?>/admin/assets/summernote/summernote-bs4.min.js"></script>
<!-- Font-awesome js -->
<script src="<?= base_url() ?>/admin/assets/js/fontawesome-iconpicker.js"></script>

<!-- Plugins js -->
<script src="<?= base_url() ?>/admin/assets/libs/quill/quill.min.js"></script>

 <!-- Init js -->
<script src="<?= base_url() ?>/admin/assets/js/pages/form-quilljs.init.js"></script>

<script type="text/javascript">
  //for summernote-------
  if( $('.textarea').length ) { 
    $('.textarea').summernote({
        height: 250,
    });
}

$('#datatable').DataTable(
    {
        order:[[0,"desc"]]
    }
);

   $('.demo').iconpicker(); 

 
</script>
</body>

</html>