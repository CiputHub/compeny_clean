 </div>
  <script src="../../template-admin/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../../template-admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../template-admin/assets/js/sidebarmenu.js"></script>
  <script src="../../template-admin/assets/js/app.min.js"></script>
  <script src="../../template-admin/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../../template-admin/assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../../template-admin/assets/js/dashboard.js"></script>
  <!-- solar icons -->
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
  
<!-- jQuery & DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<!-- DataTables Export Buttons -->
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

<!-- Aktifkan DataTables ke semua tabel -->
<script>
$(document).ready(function() {
    $("table").DataTable({
        pageLength: 5, // default tampil 5 data per halaman
        lengthMenu: [5, 10, 20, 50, 100],
        dom: 'Bfrtip',
        buttons: [
            { extend: 'copy', className: 'btn btn-secondary' },
            { extend: 'csv', className: 'btn btn-info' },
            { extend: 'excel', className: 'btn btn-success' },
            { extend: 'pdf', className: 'btn btn-danger' },
            { extend: 'print', className: 'btn btn-primary' }
        ]
    });
});
</script>
</body>

</html>