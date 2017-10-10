    </div><!-- /.container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url('assets/js/vendor/jquery.min.js') ?>"><\/script>')</script>
    <!--
    <script src="<?php echo base_url('assets/js/vendor/popper.min.js') ?>"></script>
    -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('assets/js/jquery.slimscroll.min.js') ?>"></script>
    <!--
    <script src="<?php echo base_url('assets/js/bootstrap-material-design.min.js'); ?>"></script>
    -->
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="<?php echo base_url('assets/js/vendor/holder.min.js') ?>"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url('assets/js/ie10-viewport-bug-workaround.js') ?>"></script>
    <script src="<?php echo base_url();?>assets/js/fileinput.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.2.3/jquery-confirm.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <?php if($session_status === true){ ?>
    <script src="<?php echo base_url();?>assets/js/cart.js"></script>
    <?php } ?>
	<script type="text/javascript">

        $(function(){
            $('#inner-content-div').slimScroll({
                height: '450px'
            });
        });

		function add_person(){
		    save_method = 'add';
		    $('#form')[0].reset(); // reset form on modals
		    $('.form-group').removeClass('has-error'); // clear error class
		    $('.help-block').empty(); // clear error string
		    $('#modal_register').modal('show'); // show bootstrap modal
		    $('.modal-title').text('Nuevo Usuario'); // Set Title to Bootstrap modal title
		}

		function login_modal(){
			$('#form_login')[0].reset(); // reset form on modals
			$('.form-group').removeClass('has-error'); // clear error class
			$('.help-block').empty(); // clear error string
			$('#modal_login').modal('show'); // show bootstrap modal
			$('.modal-title').text('Acceder'); // Set Title to Bootstrap modal title
		}

        function save(){
            $('#btnSave').text('Guardando...'); //change button text
            $('#btnSave').attr('disabled',true); //set button disable
            // ajax adding data to database
            $.confirm({
                title: '¿Acepta nuestros terminos y condiciones?',
                content: 'Al hacer clic en Si nos da a entender que ha leido y esta deacuerdo con nuestros termimos y condiciones de uso',
                    buttons:{
                        aceptar:{
                            text: "Si",
                            action: function(){
                                $.ajax({
                                    url : '<?php echo site_url('Usuario/Usuario/ajax_add')?>',
                                    type: "POST",

                                    data: $('#form_registro').serialize(),
                                    success: function(data){
                                        $.alert({
                                            title: 'Alert!',
                                            content: data,
                                        });
                                        $('#btnSave').text('Guardar'); //change button text
                                        $('#btnSave').attr('disabled',false); //set button enable
                                    },
                                    error: function (data){
                                        alert(data);
                                        $('#btnSave').text('Guardar'); //change button text
                                        $('#btnSave').attr('disabled',false); //set button enable
                                    }
                                });
                            }
                        },
                        cancel:{
                            text: "No",
                            action: function(){
                                $('#btnSave').text('Guardar'); //change button text
                                $('#btnSave').attr('disabled',false); //set button enable
                            }
                        }
                    }
            });
        }

		function login(){
			$('#btnLogin').text('Validando...'); //change button text
		    $('#btnLogin').attr('disabled',true); //set button disable
				$.ajax({
		        url : "<?php echo site_url('Usuario/Usuario/ajax_login'); ?>",
		        type: "POST",
		        data: $('#form_login').serialize(),
		        dataType: "html",
		        success: function(data){
					if(data == 1){
						location.reload(true);
					}else{
						if (data == 2) {
							alert("Datos Incorrectos");
						}else{
							$.alert({
                                title: 'Atencion',
                                icon: 'fa fa-warning',
                                type: 'blue',
                                content: data
                            })
						}
					}
		          	$('#btnLogin').text('Acceder'); //change button text
		          	$('#btnLogin').attr('disabled',false); //set button enable

		        },
		        error: function (data)
		        {
		            alert(data);
		            $('#btnLogin').text('Acceder'); //change button text
		            $('#btnLogin').attr('disabled',false); //set button enable

		        }
		    });
		}

	</script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			//$(".button-collapse").sideNav();

			var btnCust = ''; 
			$("#avatar").fileinput({
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
			    defaultPreviewContent: '<img src="<?php echo base_url('/assets/uploads/avatars/default.png')?>" alt="Your Avatar" style="width:160px">',
			    layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
			    allowedFileExtensions: ["jpg", "png", "gif"]
			});

    setTimeout(function(){
        $('body').addClass('loaded');
        $('h1').css('color','#222222');
    }, 3000);

		});
	</script>
</body>

</html>
