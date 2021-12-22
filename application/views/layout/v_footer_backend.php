</div>
<!-- /.content-wrapper -->
<!-- Main Footer -->
<footer class="main-footer" style="background:#F0EDE5;">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        Jakarta. UBSI cengkareng
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021 <a href="#">enyayur</a>.</strong> All rights reserved.
</footer>

<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000)
</script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
</body>

</html>