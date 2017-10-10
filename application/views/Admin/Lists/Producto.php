  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $titulo; ?>
        <small>información general</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('ControlPanel'); ?>"><i class="fa fa-dashboard"></i>Panel de Control</a></li>
        <li><a href="#" class="active">Empleados</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12 col-md-8">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Lista de productos</h3>
              <?php echo $this->pagination->create_links(); ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-responsive no-padding">
                <tr>
                  <th style="width: 10px">ID</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Disponibles</th>
                  <th>Precio</th>
                  <th>Control</th>
                </tr>
                <?php
                if($Productos != null){
                    foreach($Productos as $Producto){ ?>
                  <tr>
                    <td><?php echo $Producto->id_Producto; ?></td>
                    <td><?php echo $Producto->nombre ?></td>
                    <td>
                    <p><?php echo $Producto->descripcion ?></p>
                    </td>
                    <td>
						<span class="badge bg-primary"><?php echo $Producto->stock ?></span>
					</td>
                    <td><?php echo money_format('%n', $Producto->precio); ?></td>
                    <td>
                      <button class="btn btn-success" onclick="editar(<?php echo $Producto->id_Producto; ?>)"><i class="fa fa-edit"></i></button>
                      <button class="btn btn-primary" onclick="generate_QR(<?php echo $Producto->id_Producto; ?>)"><i class="fa fa-qrcode"></i></button>
                      <button class="btn btn-danger" onclick="delete_producto(<?php echo $Producto->id_Producto; ?>)"><i class="fa fa-trash"></i></button>
                    </td>
                  </tr>
                <?php }
                 }else{ ?>

                <?php } ?>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">

            </div>
          </div>
          <!-- /.box -->
        </div>
        <div class="col-xs-12 col-md-4">
          <div class="box box-primary box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Ficha de Producto</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form role="form" id="form_register" action="<?php echo base_url('CPanel/Producto/addProducto'); ?>" method="POST">
              <div class="box-body">
                <div class="row">
                  <div class="form-group col-xs-12 col-md-8">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
                    <input type="number"hidden readonly name="idProd" id="idProd" value="">
                  </div>
                  <div class="form-group col-xs-12 col-md-4">
                    <label for="precio">Precio</label>
                    <input type="text" class="form-control" id="precio" name="precio">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-xs-12 col-md-6">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" min="1" class="form-control" id="cantidad" name="cantidad">
                  </div>
                  <div class="form-group col-xs-12 col-md-6">
                    <label>Categoria</label>
                    <select class="form-control" name="categoria" id="categoria">
                    <option value="">Seleccione Una</option>
                    <?php
                      if($Categorias != null){
                        foreach($Categorias as $Categoria){
                     ?>
                      <option value="<?php echo $Categoria->id_Categoria; ?>"><?php echo $Categoria->nombre; ?></option>
                     <?php
                      }
                        }else{

                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="kv-avatar center-block text-center">
                      <input id="imagen" name="imagen" type="file" class="file-loading">
                      <div class="help-block">
                      <small>Maximo 2 MB</small>
                      <br>
                      <small>Resolución Maxima: 1024 x 1024</small>
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="pass">Descripción</label>
                  <textarea class="form-control" name="descripcion" id="descripcion"></textarea>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <div class="row">
                  <div class="col-xs-12 col-md-4">
                    <button type="button" class="btn btn-primary btn-block" onclick="resetForm()">Limpiar</button>
                  </div>
                  <div class="col-xs-12 col-md-4"></div>
                  <div class="col-xs-12 col-md-4">
                    <button type="submit" class="btn btn-success btn-block" id="btn-enviar">Registrar</button>
                  </div>
                </div>
              </div>
            </form>
            </div>
            <div class="overlay" id='oculto' style='display:none;'>
              <i class="fa fa-refresh fa-spin"></i>
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- QR Modal -->
  <div class="modal fade bd-example-modal-sm" id="QR_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="width: 150; height: 150;">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="qr_code"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    function editar(idProducto){
      document.getElementById('oculto').style.display = 'block';
      $("#form_register").attr('action', '<?php echo base_url('CPanel/Producto/updateProducto') ?>');

      $.ajax({
        url: '<?php echo base_url('CPanel/Producto/detalleProducto') ?>',
        type: 'post',
        dataType: 'json',
        data: {idProducto: idProducto},
      })
      .done(function(data) {
        console.log("success");
        $("#idProd").val(data['Producto'][0]['id_Producto']);
        $("#nombre").val(data['Producto'][0]['nombre']);
        $("#precio").val(data['Producto'][0]['precio']);
        $("#cantidad").val(data['Producto'][0]['stock']);
        $("#categoria").val(data['Producto'][0]['Categoria_id_Categoria']);
        $("#descripcion").val(data['Producto'][0]['descripcion']);
        $("#btn-enviar").text("Actualizar");
        $("#preview").attr('src', '<?php echo base_url('assets/uploads/products/') ?>' + data['Producto'][0]['imagen']);
        document.getElementById('oculto').style.display = 'none';
      })
      .fail(function(error) {
        console.log(error);
        alert("Ocurrio un error.\nIntente en un momento");
        resetForm();
      })
      .always(function() {
        console.log("complete");
      });

    }

    function resetForm(){
      $("#preview").attr('src', 'https://www.varlixprepaga.com.uy/img/noimage.png');
      //$("#form_register")[0].reset();
      $("#idProd").val("");
      $("#nombre").val("");
      $("#precio").val("");
      $("#cantidad").val("");
      $("#categoria").val("");
      $("#descripcion").val("");
      $("#form_register").attr('action', '<?php echo base_url('CPanel/Producto/addProducto') ?>');
      $("#btn-enviar").text("Registrar");
    }

    function generate_QR(id_Producto){
      var id = id_Producto.toString();
      $('#qr_code').qrcode({
       render: 'canvas',
       size: 250,
       fill: '#1D82AF',
       background: '#ffffff',
       text: id
      });
      $('#QR_Modal').modal('show');
      /*
      $.alert({
          title: 'Codido QR',
          content: '<div style="width: 150px; height: 150px;"><div id="qr_code"></div></div>',
      });
      */
    }

    function delete_producto(id_Producto){
      $.confirm({
          title: '¿Eliminar Producto?',
          type: 'red',
          content: 'Esta accion no se puede revertir\nCancelado en 10 segundos si no responde.',
          autoClose: 'cancelAction|10000',
          buttons: {
              deleteUser: {
                  text: 'Eliminar',
                  btnClass: 'btn-danger',
                  action: function () {
                    
                  }
              },
              cancelAction: {
                text: 'Cancelar',
                btnClass: 'btn-primary',
                action: function(){

                }
              }
          }
      });
    }
  </script>
