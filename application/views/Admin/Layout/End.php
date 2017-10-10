  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

	<!-- jQuery 2.2.3 -->
	<script src="<?php echo base_url();?>assets/js/jquery.js"></script>
	<!-- Bootstrap 3.3.6 -->
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<!-- SlimScroll -->
	<script src="<?php echo base_url();?>assets/js/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="<?php echo base_url();?>assets/js/fastclick.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url();?>assets/js/app.min.js"></script>
	<!-- Forms -->
	<script src="<?php echo base_url();?>assets/js/forms.js"></script>
	 <!-- Notify JS -->
	<script src="<?php echo base_url();?>assets/js/bootstrap-notify.min.js"></script>
	<!-- FileInput -->
	<script src="<?php echo base_url();?>assets/js/fileinput.min.js"></script>
	<!-- Notificaciones -->
	<script src="<?php echo base_url('assets/js/system/notifications.js'); ?>"></script>
	<!-- jQuery Confirm JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.3/jquery-confirm.min.js"></script>
	<!-- jQuer QR Code -->
	<script src="<?php echo base_url('assets/js/jquery.qrcode.js') ?>"></script>
	<script type="text/javascript">
      $("#imagen").fileinput({
          overwriteInitial: true,
          maxFileSize: 2048,
          showClose: false,
          showCaption: false,
          browseLabel: '',
          removeLabel: '',
          browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
          removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
          removeTitle: 'Cancelar o reiniciar cambios',
          elErrorContainer: '#kv-avatar-errors-1',
          msgErrorClass: 'alert alert-block alert-danger',
          defaultPreviewContent: '<img src="https://www.varlixprepaga.com.uy/img/noimage.png" id="preview" name="preview" alt="Preview" style="height:200px">',
          layoutTemplates: {main2: '{preview} ' + ' {remove} {browse}'},
          allowedFileExtensions: ["jpg", "png", "gif"]
      });
      jQuery(document).ready(function($) {
		$(function(){
		    $('#inner-content-div').slimScroll({
		        height: '100%'
		    });
		    $('.sidebar-menu').tree();
		});
      });
	</script>
</body>
</html>