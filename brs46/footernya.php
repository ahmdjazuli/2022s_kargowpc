<footer class="main-footer">
    <strong>Copyright &copy; 2022</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      Muhammad Apryanandy <b>Azhari</b>
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="../assets/plugins/datatables-select/js/dataTables.select.min.js"></script>
<script src="../assets/plugins/datatables-select/js/select.bootstrap4.min.js"></script>
<script src="../assets/plugins/pace-progress/pace.min.js"></script>
<script src="../assets/js/adminlte.min.js"></script>
<script src="../assets/js/tables.js"></script>
<script src="../assets/plugins/sweetalert2/sweetalert2.min.js"></script>

<script>
   $(function(){
      var path = window.location.href; // mengambil data pada url
      var laman = "http://localhost/pkl_kargowpc/brs46/";
      $('nav a').each(function(){ 
         // jika url pada menu ini sama dgn path
         if(this.href === path){
            $(this).addClass('active');
         }
      });
   });
</script>
</body>
</html>
