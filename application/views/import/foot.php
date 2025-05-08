</div>

<!-- function js -->
<script src="<?= base_url(); ?>public/dist/js/function.js"></script>
<!-- jQuery -->
<script src="<?= base_url(); ?>public/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url(); ?>public/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url(); ?>public/plugins/chart.js/Chart.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url(); ?>public/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- Ekko Lightbox -->
<script src="<?= base_url(); ?>public/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- Filterizr-->
<script src="<?= base_url(); ?>public/plugins/filterizr/jquery.filterizr.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>public/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url(); ?>public/dist/js/demo.js"></script>
<!-- BS-Stepper -->
<script src="<?= base_url(); ?>public/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url(); ?>public/plugins/select2/js/select2.full.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?= base_url(); ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>public/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>public/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>public/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>public/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url(); ?>public/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>public/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>public/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>public/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>public/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- custum js -->
<script src="<?= base_url(); ?>public/dist/js/custom.js"></script>


<script>
$('.evaluateurs').val(evaluateurs);
$('#id_activite').val("<?= $assessment->id_activite ?>").change();
$('#matricule_paf').val('<?= $assessment->matricule_paf ?>').change();
$('#email_responsable').val('<?= $assessment->email_responsable ?>').change();
</script>
</body>

</html>