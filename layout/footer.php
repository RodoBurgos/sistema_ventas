    <footer class="main-footer">
      <div class="float-right d-none d-sm-inline">
        Anything you want
      </div>
      <strong>Copyright &copy; 2023 <a href="https://adminlte.io">SistemaVentas</a>.</strong> Todos los derechos reservados.
    </footer>

    <aside class="control-sidebar control-sidebar-dark">
    </aside>
  </div>

  <!-- jQuery -->
  <script src="<?php echo $url;?>/public/template/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo $url;?>/public/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Select2 -->
  <script src="<?php echo $url;?>/public/template/plugins/select2/js/select2.full.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo $url;?>/public/template/dist/js/adminlte.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="<?php echo $url;?>/public/template/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo $url;?>/public/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo $url;?>/public/template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?php echo $url;?>/public/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?php echo $url;?>/public/template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?php echo $url;?>/public/template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?php echo $url;?>/public/template/plugins/jszip/jszip.min.js"></script>
  <script src="<?php echo $url;?>/public/template/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="<?php echo $url;?>/public/template/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="<?php echo $url;?>/public/template/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?php echo $url;?>/public/template/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?php echo $url;?>/public/template/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

  <!--Select2-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

  <script>
    $(function ()
    {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      });
    });
  </script>
</body>
</html>