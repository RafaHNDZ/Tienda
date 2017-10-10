		
		var base_url = "http://"+location.host+"/Apps/Tienda";



	function addToCart(){
		var id_producto = document.getElementById('id_producto').value;
		var cantidad = document.getElementById('cantidad').value;
			$.ajax({
				url: base_url + "/Tienda/Carrito/agregarProducto",
				type: 'post',
				data: {id_producto:id_producto, cantidad:cantidad}
			}).
			done(function(resp){
				console.log("correcto");
				//location.reload();
				//console.log(resp);
				getCart();
				d.close();
			}).
			fail(function(error){
				alert("Ocurrio un error\nIntente mas tarde");
				console.log("error:" + error);
			}).
			always(function(){
				console.log("completado");
			}) 
	}

	function removeItem(id){
		e.preventDefault();
		$.ajax({
			url: base_url + "/Tienda/Carrito/eliminarProducto",
			type: post,
			data: {id:id},
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	}

	function vaciarCarrito(){
		$.confirm({
		    title: '¡Atencion!',
		    content: 'El carrito quedara vacio',
		    icon: 'fontawesome fa fa-warning',
		    theme: 'material',
		    buttons: {
		        confirmar:{
		            btnClass: 'btn-primary',
		            action: function(){
						$.ajax({
							url: base_url + "/Tienda/Carrito/vaciarCarrito",
						})
						.done(function() {
							console.log("success");
						})
						.fail(function() {
							console.log("error");
						})
						.always(function() {
							console.log("complete");
							//location.reload(true);
							getCart();
						});
		            }
		        },
		        cancelar: {
		            btnClass: 'btn-danger',
		            action: function(){

		            }
		        },
		    }
		}); 
	}

	function getCart(){
		$.ajax({
			url: base_url + '/Tienda/Carrito/getCarrito',
			//type: 'default GET (Other values: POST)',
			dataType: 'json',
			//data: {param1: 'value1'},
		})
		.done(function(data) {
			//console.log(data)
			$('#cart_content').html(data.productos);
			$('#num_prod').text(data.num_productos);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	}

jQuery(document).ready(function($) {
	getCart();
});
