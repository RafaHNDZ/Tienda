<div class="row">
    <div class="col-md-6 product_img">
        <img src="<?php echo base_url() . "assets/uploads/products/" . $producto[0]->imagen ?>" class="img-responsive">
    </div>
    <div class="col-md-6 product_content">
        <div class="container-fluid">
            <div class="row">
               <div class="col-md-12 col-xs-12 product_content">   
                    <h3>Product Id: <span><?php echo $producto[0]->id_Producto;?></span></h3>
               </div>
                <br>
                <div class="col-md-12 col-xs-12">
                    <p><?php echo $producto[0]->descripcion;?></p>
                </div>
                <br>
                <h4 class="cost">$ <?php echo number_format($producto[0]->precio, 2); ?></h4>
                    <div class="col-xs-12 col-md-6">
                        <input type="hidden" readonly value="<?php echo $producto[0]->id_Producto;?>" name="id_producto" id="id_producto">
                        <select class="form-control" name="cantidad" id="cantidad">
                            
                        <?php 
                            for($i=1; $i<=$producto[0]->stock; $i++){ 
                        ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                        <?php
                            }
                         ?>
                        </select>
                    </div>
            </div>
            <br>
            <div class="row">
                <div class="btn-ground">
                    <!--
                    <button type="button" class="btn btn-primary" onclick="addToCart()"><span class="glyphicon glyphicon-shopping-cart"></span>Añadir al carrito</button>
                    
                    <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-heart"></span> Add To Wishlist</button>
                    -->
                </div>
            </div>
        </div>
    </div>
</div>