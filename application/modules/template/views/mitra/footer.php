<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 0.0.1
    </div>
    <strong>Copyright &copy; 2021.</strong> All rights
    reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/js/adminlte/adminlte.min.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/js/adminlte/demo.js') ?>"></script>
<!-- Sweet Alert 2-->
<script src="<?php echo base_url('assets/sweetalert2/sweetalert2.min.js') ?>"></script>
<!-- bs-custom-file-input -->
<script src=" <?php echo base_url('assets/bs-custom-file-input/bs-custom-file-input.min.js') ?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables-bs4/js/dataTables.bootstrap4.js') ?>"></script>
<script>
    $(function() {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        bsCustomFileInput.init();
    });
</script>
<script>
    var $flashData = $('.flash-data').data('flashdata');
    if ($flashData) {
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: 'Berhasil ' + $flashData,
        })
    }
    $('.tombol-hapus').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data pengguna akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        })
    });
</script>
</body>

</html>