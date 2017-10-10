        <div class="container" style="padding-top:30px">
            <div class="row">
                <?php
                if($Productos != null){
                    foreach ($Productos as $Producto) {
                        if($Producto->imagen == ""){
                                $Imagen = "nodisponible.jpg";
                            }else{
                                $Imagen = $Producto->imagen;
                                }?>

                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                            <div class="card" style="margin-bottom: 20px">
                                <img class="card-img-top" src="<?php echo base_url() . "assets/uploads/products/" . $Imagen ?>" style="height: 180px; width: auto" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title"> <?php echo $Producto->nombre ?> </h4>
                                    <!--
                                    <p class="card-text" style="text-align: justify;">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                  -->
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <small class="text-muted">Last updated 3 mins ago</small>
                                        </div>
                                        <div class="col-sm-3">
                                            <?php if($Producto->stock == 0){?>
                                                <button class="btn btn-warning bmd-btn-fab bmd-btn-fab-sm"><i class="material-icons"></i></button>
                                            <?php }else{?>
                                                <button class="btn btn-info bmd-btn-fab bmd-btn-fab-sm" onclick="showDetails(<?php echo $Producto->id_Producto; ?>)"><i class="material-icons">info</i></button>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                }else{ ?>
                  <div  class="row">
                    <div class="col-xs-12">
                      <h2>Sin productos...</h2>
                    </div>
                  </div>
                <?php }
                 ?>
                <!--
                <div class="col-sm-4 col-lg-4 col-md-4">
                    <h4><a href="#">Like this template?</a>
                    </h4>
                    <p>If you like this template, then check out <a target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">this tutorial</a> on how to build a working review system for your online store!</p>
                    <a class="btn btn-primary" target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">View Tutorial</a>
                </div>
                -->
            </div>
        </div>
    </div>

</div>

<script>
      function showDetails(idProducto){
      var dialog = $.confirm({
                title: 'Detalles',
                theme: 'material',
                    buttons: {
                        agregar:{
                          btnClass: 'btn-success',
                          action: function(){
                        var id_producto = document.getElementById('id_producto').value;
                        var cantidad = document.getElementById('cantidad').value;
                        if(cantidad.length == 0){
                          alert("Selecciona cuantos quieres");
                        }else{
                          $.ajax({
                            url: '<?php echo base_url('/Tienda/Carrito/agregarProducto') ?>',
                            type: 'post',
                            data: {id_producto:id_producto, cantidad:cantidad}
                          }).
                          done(function(resp){
                            console.log("correcto");
                            //location.reload();
                            //console.log(resp);
                            getCart();
                            dialog.close();
                          }).
                          fail(function(error){
                            alert("Ocurrio un error\nIntente mas tarde");
                            console.log("error:" + error);
                          }).
                          always(function(){
                            console.log("completado");
                          })
                        }
                          }
                        },
                        cerrar:{
                          btnClass: 'btn-primary',
                          action: function(){
                            dialog.close();
                          }
                        }
                    },
                content: function () {
                    var self = this;
                      if('<?php echo $session_status ?>' != true){
                        self.buttons.agregar.hide();
                      }
                    return $.ajax({
                        url: '<?php echo base_url('/Detalle/') ?>'+idProducto,
                        dataType: 'html',
                        //method: 'post'
                    }).done(function (response) {
                        self.setContent(response);
                    }).fail(function(){
                      self.buttons.agregar.disable();
                        self.setContent('Algo salio mal... :-(');
                    });
                },
                columnClass: 'large',
            });
        dialog.open();
    }
</script>
