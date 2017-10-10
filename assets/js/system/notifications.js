		
		var base_url = "http://"+location.host+"/Apps/Tienda";
		var oldNumber = null;
		var audio = new Audio(base_url+'/assets/audio/notification_sound-1158595.mp3');
		var errors = 0;
		var active_notifications = true;

		function getNotificaciones(view  = ''){

			$.ajax({
				url: base_url + '/CPanel/Notificacion/getNotifications',
				type: 'post',
				data:{view:view},
				dataType: 'json',
			}).
			done(function(resp){
				errors = 0;
				//console.log("correcto");
				//$("#cart_list").html(resp);
				//console.log(resp);
				$('#notificaciones').html(resp.notificacion);
				if(resp.pendiente > 0){
					$('#no_read').text(resp.pendiente);
				}
				if(resp.pendiente > oldNumber & oldNumber != null){
					console.log("Notificac Nueva");
					audio.play();
					oldNumber = resp.pendiente;
				}else{
					oldNumber = resp.pendiente;
				}
				//alert(oldNumber);
			}).
			fail(function(error){
				console.log("error:" + error);
				errors += 1;
				console.log("N errores: " + errors)
			}).
			always(function(){
				//console.log("completado");
				if(errors == 5){
				  $.confirm({
				    title: 'Ocurrio un error',
				    content: 'Las notificaciones no funcionan bien... \n¿Apagar?',
				    type: 'red',
				    typeAnimated: true,
				    buttons: {
				        si: {
				            text: 'Si',
				            btnClass: 'btn-primary',
				            action: function(){
				            	active_notifications = false;
				            }
				        },
				        no: {
				        	text: 'No',
				        	btnClass: 'btn-red',
				        	action: function(){

				        	}
				        }
				    }
				});
				}
			})
		}

function Notificaciones() {
	if(active_notifications != false){
		getNotificaciones();
	}
}

$(document).ready(function(){
	getNotificaciones();
	setInterval(Notificaciones, 5000);
});