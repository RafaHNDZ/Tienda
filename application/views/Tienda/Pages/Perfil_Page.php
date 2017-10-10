<div class="container" style="padding-top: 30px;">
  <div class="row">
      <!-- left column -->
      <div class="col-md-3 col-sm-6 col-xs-12 user_card card">
          <ul class="list-group">
              <li class="list-group-item">
                  <h5><?php echo $userData[0]->nombre." ".$userData[0]->apellido; ?></h5>
              </li>
              <li class="list-group-item">
                  <img title="profile image" class="img-circle img-responsive" src="<?php echo base_url('/assets/uploads/avatars/').$userData[0]->avatar ?>" style="max-width: 165px; max-height: 165px;">
              </li>
              <li class="list-group-item" contenteditable="false">Perfil</li>
              <li class="list-group-item"><span class="pull-left"><strong class="">Registrado</strong></span> <?php echo $userData[0]->fechaRegistro ?></li>
              <li class="list-group-item"><span class="pull-left"><strong class="">Last seen</strong></span> Yesterday</li>
              <li class="list-group-item"><span class="pull-left"><strong class="">Real name</strong></span> Joseph
                  Doe</li>
              <li class="list-group-item"><span class="pull-left"><strong class="">Role: </strong></span> Pet Sitter

              </li>
          </ul>
      </div>
      <!-- edit form column -->
      <div class="col-md-8 col-sm-6 col-xs-12 personal-info user_card card">
          <h3>Personal info</h3>
          <nav class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
              <a class="nav-item nav-link active" id="nav-history-tab" data-toggle="tab" href="#nav-history" role="tab" aria-controls="nav-history" aria-expanded="true">Compreas recientes</a>
              <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile">Información</a>
          </nav>
          <!-- TABS CONTENT -->
          <div class="tab-content" id="nav-tabContent">
              <!-- Tab History -->
              <div class="tab-pane fade show active" id="nav-history" role="tabpanel" aria-labelledby="nav-history-tab">
                  <h5>Proximamente...</h5>
              </div>
              <!-- Tab Info -->
              <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                  <br>
                  <form class="form form-vertical" name="formUserData" id="formUserData" action="<?php echo base_url('Usuario/Usuario/updateUserData') ?>" method="post" enctype="multipart/form-data">
                      <div class="form-row">
                          <div class="col-sm-4">
                              <div class="kv-avatar center-block text-center" style="width:200px">
                                  <input id="avatar" name="avatar" type="file" class="file-loading">
                                  <div class="help-block"><small>Maximo 2 MB</small></div>
                              </div>
                          </div>
                          <div class="col-sm-8">
                              <div class="row">
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <label for="email">E-Mail<span class="kv-reqd">*</span></label>
                                          <input type="email" class="form-control" id="email" name="email" value="<?php echo $userData[0]->email?>" readonly>
                                          <input type="hidden" class="form-control" id="idUser" name="idUser" value="<?php echo $userData[0]->id_Cliente?>" readonly>
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <label for="pwd">Contraseña<span class="kv-reqd">*</span></label>
                                          <input type="password" class="form-control" id="pwd" name="pwd" value="<?php echo $userData[0]->pass?>">
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <label for="nombre">Nombre</label>
                                          <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $userData[0]->nombre?>">
                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <label for="apellidos">Apellidos</label>
                                          <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $userData[0]->apellido?>">
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <hr>
                                  <div class="text-right">
                                      <button type="button" onclick="updateData()" class="btn btn-primary">Actualizar</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </form>
                  <div id="kv-avatar-errors-1" class="center-block" style="width:800px;display:none"></div>
              </div>
          </div>
      </div>
  </div>
</div>
<script type="text/javascript">
  function updateData(){
    var formData = new FormData($("#formUserData")[0]);
    $.ajax({
      url: $("#formUserData").attr('action'),
      type: $("#formUserData").attr('method'),
      dataType: 'JSON',
      data: formData,
      cache: false,
      contentType: false,
      processData: false
    })
    .done(function(resp) {
      console.log("success");
      if(resp['Errors']){
        alert(resp['Errors']);
      }else{
        if(resp['Msg']){
          if(resp['Msg']=="Ok"){
            location.reload(true);
          }else{
            alert(resp['Msg']);
          }
        }
      }
    })
    .fail(function() {
      console.log("error");
      alert("Error al conectar al servidor \nIntente m'as tarde");
    })
    .always(function() {
      console.log("complete");
    });

  }
</script>
