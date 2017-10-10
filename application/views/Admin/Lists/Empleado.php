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
              <h3 class="box-title">Bordered Table</h3>
              <?php echo $this->pagination->create_links(); ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-responsive no-padding">
                <tr>
                  <th style="width: 10px">ID</th>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Esdado</th>
                  <th>Permisos</th>
                  <th>Control</th>
                </tr>
                <?php
                if($Empleados != null){
                    foreach($Empleados as $Empleado){ ?>
                  <tr>
                    <td><?php echo $Empleado->id_Empleado; ?></td>
                    <td><?php echo $Empleado->nombre." ".$Empleado->apellido ?></td>
                    <td>
                    <p><?php echo $Empleado->email ?></p>
                    </td>
                    <td>
                      <?php 
                        switch ($Empleado->status) {
                          case 'block':
                            echo '<span class="badge bg-yellow">Bloqueado</span>';
                            break;
                          case 'acepted':
                            echo '<span class="badge bg-green">Activo</span>';
                            break;
                          default:
                            echo '<span class="badge bg-red">Desconocido</span>';
                            break;
                        }
                       ?>
                    </td>
                    <td><?php
                        switch ($Empleado->permisos) {
                          case 'empleado':
                            echo '<span class="badge bg-green">Empleado</span>';
                            break;
                          case 'admin':
                            echo '<span class="badge bg-yellow">Admin</span>';
                            break;
                          default:
                            echo '<span class="badge bg-red">Desconocido</span>';
                            break;
                        }
                    ?></td>
                    <td>
                      <button class="btn btn-success" onclick="editar(<?php echo $Empleado->id_Empleado; ?>)"><i class="fa fa-edit"></i></button>
                      <button class="btn btn-primary" onclick="hide(<?php echo $Empleado->id_Empleado; ?>)"><i class="fa fa-eye-slash"></i></button>
                      <button class="btn btn-danger" onclick="delet(<?php echo $Empleado->id_Empleado; ?>)"><i class="fa fa-trash"></i></button>
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
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ficha de Empleado</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form role="form" name="add_empleado" id="add_empleado" action="<?php echo base_url('CPanel/Empleado/registro'); ?>" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="idE" id="idE" readonly>
                  <label for="nombre">Nombre</label>
                  <input type="text" name="nombre" id="nombre" class="form-control input-sm" id="nombre">
                </div>
                <div class="form-group">
                  <label for="apellidos">Apellidos</label>
                  <input type="text" name="apellidos" id="apellidos" class="form-control input-sm" id="apellidos">
                </div>
                <div class="form-group">
                  <label for="email">E-Mail</label>
                  <input type="email" name="email" id="email" class="form-control input-sm" id="email">
                </div>
                <div class="form-group">
                  <label for="pass">Contraseña</label>
                  <input type="password" name="pass" id="pass" class="form-control input-sm" id="pass">
                </div>
                <div class="row">
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>Permisos</label>
                      <select class="form-control" name="permisos" id="permisos">
                        <option value="">Permisos</option>
                        <option value="empleado">Empleado</option>
                        <option value="admin">Administrador</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>Estado</label>
                      <select class="form-control" name="status" id="status">
                        <option value="">Estado</option>
                        <option value="acepted">Activo</option>
                        <option value="block">Bloqueado</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
                <div class="row">
                  <div class="col-xs-12 col-md-4">
                    <button type="button" class="btn btn-primary btn-block" onclick="resetForm()">Limpiar</button>
                  </div>
                  <div class="col-xs-12 col-md-4"></div>
                  <div class="col-xs-12 col-md-4">
                    <button type="button" class="btn btn-success btn-block" id="btn-enviar" onclick="sendForm()">Registrar</button>
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
  function editar(idEmpleado){
    $("#btn-enviar").text("Actualizar");
    document.getElementById('oculto').style.display = 'block';
    $.ajax({
      url: '<?php echo base_url('CPanel/Empleado/detalleEmpleado') ?>',
      type: 'post',
      dataType: 'json',
      data: {idEmpleado: idEmpleado},
    })
    .done(function(response) {
      console.log("success");
      $("#add_empleado").attr('action', '<?php echo base_url('CPanel/Empleado/update'); ?>');
      $("#idE").val(response[0]['id_Empleado']);
      $("#nombre").val(response[0]['nombre']);
      $("#nombre").prop('readonly', true);
      $("#apellidos").val(response[0]['apellido']);
      $("#apellidos").prop('readonly', true);
      $("#email").val(response[0]['email']);
      $("#email").prop('readonly', true);
      $("#pass").val(response[0]['pass']);
      $("#pass").prop('readonly', true);
      $("#permisos").val(response[0]['permisos']);
      $("#status").val(response[0]['status']);
      //document.getElementById('oculto').style.display = 'none';
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
      document.getElementById('oculto').style.display = 'none';
    });
    
  }

    function resetForm(){
      $("#btn-enviar").text("Registrar");
      $("#add_empleado")[0].reset();
      $("#add_empleado").attr('action', '<?php echo base_url('CPanel/Empleado/registro'); ?>');
      $("#btn-enviar").text("Registrar");
      $("#pass").prop('readonly', false);
      $("#nombre").prop('readonly', false);
      $("#apellidos").prop('readonly', false);
      $("#email").prop('readonly', false);
    }

    function sendForm(){
      document.getElementById('oculto').style.display = 'block';
      $.ajax({
        url: $("#add_empleado").attr('action'),
        type: $("#add_empleado").attr('method'),
        dataType: 'json',
        data: $("#add_empleado").serialize(),
      })
      .done(function(response) {
        console.log("success");
        console.log(response['Respuesta']);
        if (response['Respuesta']) {
          if (response['Respuesta'] === 'Correcto') {
            location.reload(true);
          }else{
            if(response['Respuesta'] === 'Error'){
              mensaje("No se pudo registrar");
            }else{
              mensaje(response);
            }
          }
        }else{
          mensaje(response);
        }
      })
      .fail(function() {
        console.log("error");
        alert("Ocurrio un erro de conexción");
      })
      .always(function() {
        console.log("complete");
        document.getElementById('oculto').style.display = 'none';
      });
      
    }

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
                '<ul>{2}</ul>' +
              '</div>'
    });
  }

  </script>