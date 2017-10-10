$(document).ready(function() {

	$("#form_register").submit(function(event) {
		document.getElementById('oculto').style.display = 'block';
		event.preventDefault();
		var formData = new FormData($("#form_register")[0]);
		$.ajax({
			url: $("#form_register").attr('action'),
			type: $("#form_register").attr('method'),
			dataType: 'JSON',
			data: formData,
			cache: false,
			contentType: false,
			processData: false
		})
		.done(function(data) {
			console.log("success");
			if(data['Erros']){
				mensaje(data['Erros']);
			}else{
				if(data['Msg']){
					if(data['Msg'] == "Ok"){
						location.reload(true);
					}else{
						mensaje(data['Msg']);
					}
				}
			}
		})
		.fail(function(error) {
			console.log(error);
		})
		.always(function() {
			console.log("complete");
			document.getElementById('oculto').style.display = 'none';
		});

	});

	$("#form_update").submit(function(event) {
		document.getElementById('oculto').style.display = 'block';
		event.preventDefault();
		var formData = new FormData($("#form_register")[0]);
		$.ajax({
			url: $("#form_register").attr('action'),
			type: $("#form_register").attr('method'),
			dataType: 'JSON',
			data: formData,
			cache: false,
			contentType: false,
			processData: false
		})
		.done(function(data) {
			console.log("success");
			if(data['Erros']){
				mensaje(data['Erros']);
			}else{
				if(data['Msg']){
					if(data['Msg'] == "Ok"){
						location.reload(true);
					}else{
						mensaje(data['Msg']);
					}
				}
			}
		})
		.fail(function(error) {
			console.log(error);
		})
		.always(function() {
			console.log("complete");
			document.getElementById('oculto').style.display = 'none';
		});

	});

	function mensaje(data){
		$.notify({
			//Options
			icon:'fa fa-exclamation',
			message: data
		},{
			//Config
			type: 'info',
			allow_dismiss: true,
			placement:{
				from: "bottom",
				align: "right"
			},
			template: '<div class="alert alert-info alert-dismissible">' +
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
                '<h4><i class="icon fa fa-warning"></i> ¡Atencion!</h4>' +
                '<p>{2}</p>' +
              '</div>'
		});
	}

	$("#form_login").submit(function(e){
		$("#btn_submit").attr("disabled", true);
		e.preventDefault();
		$.ajax({
				url: $("#form_login").attr("action"),
				type: $("#form_login").attr("method"),
				//dataType: "html",
				data: $("#form_login").serialize(),
				success: function (data) {
					if(data == 1){
						location.reload(true);
					}else{
						if(data == 2){
							alertify.warning("Datos incorrectos");
						}else{
							alertify.warning(data);
						}
					}
					console.log(data);
				},error: function(data){
					alertify.warning("Sin respuesta del servidor");
				},complete: function(){
					//location.reload(true);
					console.log("Done");
					$("#btn_submit").attr("disabled", false);
				}
			});
	});
});
