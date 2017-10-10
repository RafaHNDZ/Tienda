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
        <li><a href="#" class="active"></a><?php echo $titulo; ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12 col-md-8">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
              <?php echo $this->pagination->create_links(); ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-responsive no-padding">
                <tr>
                  <th style="width: 10px">ID</th>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Registrado</th>
                  <th>Control</th>
                </tr>
                <?php
                if($Clientes != null){
                    foreach($Clientes as $Cliente){ ?>
                  <tr>
                    <td><?php echo $Cliente->id_Cliente; ?></td>
                    <td><?php echo $Cliente->nombre ?></td>
                    <td><p><?php echo $Cliente->email ?></p></td>
                    <td><?php echo $Cliente->fechaRegistro ?></td>
                    <td>
                      <button class="btn btn-success" onclick="editar(<?php echo $Cliente->id_Cliente; ?>)"><i class="fa fa-edit"></i></button>
                      <button class="btn btn-danger" onclick="delet(<?php echo $Cliente->id_Cliente; ?>)"><i class="fa fa-trash"></i></button>
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
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Ficha de Cliente</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form role="form" id="form_cliente" action="<?php echo base_url(''); ?>" method="POST">
              <div class="box-body">
                <div class="row">
                  <div class="form-group col-xs-12 col-md-6">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control input-sm" id="nombre" name="nombre" readonly>
                    <input type="number"hidden readonly name="idClient" id="idClient" value="">
                  </div>
                  <div class="form-group col-xs-12 col-md-6">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control input-sm" id="apellidos" name="apellidos" readonly>
                  </div>
              </div>
              <div class="row">
                <div class="form-group col-xs-12 col-md-6">
                  <label for="email">E-Mail</label>
                  <input type="email" name="email" id="email" class="form-control input-sm" readonly>
                </div>
                <div class="form-group col-xs-12 col-md-6">
                  <label for="pwd">Contraseña</label>
                  <input type="password" name="pwd" id="pwd" class="form-control input-sm" readonly>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-xs-12 col-md-6">
                  <label for="fdr">Fecha de registro</label>
                  <input type="date" name="fdr" id="fdr" class="form-control input-sm" readonly>
                </div>
                <div class="form-group col-xs-12 col-md-6">
                  <label for="fdn">Fecha de Nacimiento</label>
                  <input type="date" name="fdn" id="fdn" class="form-control input-sm" readonly>
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
  <script type="text/javascript">
    function editar(idCliente){
      document.getElementById('oculto').style.display = 'block';
      $("#form_register").attr('action', '<?php echo base_url('CPanel/Producto/updateProducto') ?>');

      $.ajax({
        url: '<?php echo base_url('CPanel/Cliente/detalleCliente') ?>',
        type: 'post',
        dataType: 'json',
        data: {idCliente: idCliente},
      })
      .done(function(data) {
        console.log("success");
        if (data['clientData']) {
          $("#nombre").val(data['clientData'][0]['nombre']);
          $("#apellidos").val(data['clientData'][0]['apellido']);
          $("#email").val(data['clientData'][0]['email']);
          $("#pwd").val(data['clientData'][0]['pass']);
          $("#fdr").val(data['clientData'][0]['fechaRegistro']);
          $("#fdn").val(data['clientData'][0]['fecha_nacimiento']);
          console.log(data['clientData']);
        }else{
          console.log(data);
        }
      })
      .fail(function(error) {
        console.log(error);
        alert("error");
      })
      .always(function() {
        console.log("complete");
        document.getElementById('oculto').style.display = 'none';
      });

    }

    function resetForm(){
      $("#preview").attr('src', 'https://www.varlixprepaga.com.uy/img/noimage.png');
      $("#form_register")[0].reset();
      $("#form_register").attr('action', '<?php echo base_url('CPanel/Producto/addProducto') ?>');
      $("#btn-enviar").text("Registrar");
    }
  </script>
