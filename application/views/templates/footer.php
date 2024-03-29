</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white mt-3 border-top">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>&copy; <?= date('Y'); ?><i class="fa fa-heart ml-2 text-danger"></i></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

<?php if ($this->session->userdata('role_id') == 1) : ?>
    </div>
    <!-- End of Page Wrapper -->
<?php endif; ?>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded-circle" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="logoutLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutLabel">Konfirmasi Hapus</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda yakin ingin menghapus data ini ?</div>
            <div class="modal-footer">
                <?= form_open('', 'class="d-inline" id="formLinkDelete"') ?>
                <input type="hidden" name="id" id="valueId">
                <button type="submit" class="btn btn-danger"> Ya </button>
                <?= form_close(); ?>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
            </div>
        </div>
    </div>
</div>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutLabel">Apa anda yakin?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Logout" jika anda akan mengakhiri sesi ini.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>

<?php if ($this->session->userdata('role_id') == 1) : ?>
    <!-- Page level plugins -->
    <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>
<?php endif; ?>

<!-- My custom scripts -->
<script src="<?= base_url(); ?>assets/js/script.js"></script>

</body>

</html>