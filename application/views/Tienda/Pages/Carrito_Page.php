<?php 
	if ($carrito) {
		//echo var_dump($carrito);
		$total = 0;
		?>
	<table class="table table-responsive table-hover table-bordered">
		<thead>
			<tr>
				<th>ID Producto</th>
				<th>Nombre</th>
				<th>Disponibilidad</th>
				<th>Precio</th>
				<th>Cantidad</th>
				<th>Sub Total</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			foreach($carrito as $item){	
				if ($item['disponible']) {
					$class = "";
				}else{
					$class = "danger";
				}
			 ?>
			<tr class="<?php echo $class; ?>">
				<td>
					<?php echo $item['id']; ?>
				</td>
				<td>
					<?php echo ucfirst($item['name']); ?>
				</td>
				<td>
					<?php if($item['disponible']){ ?>
							Si
					<?php }else{ ?>
							No
					<?php } ?>
				</td>
				<td>
					$ <?php echo number_format($item['price'],2); 
							if ($item['disponible']) {
								$total += $item['price'] * $item['qty'];
							}
						?>
				</td>
				<td>
					<?php echo $item['qty']; ?>
				</td>
				<td>
					$ <?php echo number_format(($item['price'] * $item['qty']),2); ?>
				</td>
			<?php 
				}
			 ?>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>
					Total: $ <?php echo number_format($total,2); ?>
				</td>
			</tr>
		</tbody>
		<tfoot>
			
		</tfoot>
	</table>
	<div>
		<button class="btn btn-success pull-right" onclick="compra()">
			Realizar encargo
		</button>
	</div>
		<?php
	}else{
		echo "Sin carrito";
	}
 ?>

 <script>
 	function compra(){

		$.confirm({
		    title: '¡Atencion!',
		    content: 'Simple confirm!',
		    icon: 'fontawesome fa fa-warning',
		    theme: 'material',
		    buttons: {
		        confirmar:{
		            btnClass: 'btn-primary',
		            action: function(){
				 		$.ajax({
				 			url: '<?php echo base_url();?>/Tienda/Carrito/Compra',
				 			type: 'POST',
				 			dataType: 'json',
				 			//data: {param1: 'value1'},
				 		})
				 		.done(function(data) {
				 			console.log(data);
				 		})
				 		.fail(function(e) {
				 			console.log("error");
				 			console.log(e.responseText);
				 		})
				 		.always(function() {
				 			console.log("complete");
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
 </script>