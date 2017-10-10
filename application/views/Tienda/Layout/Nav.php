<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="<?php echo base_url(); ?>">
        <img src="https://fezvrasta.github.io/bootstrap-material-design/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
        Mi Negocio
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
           <!--
            <li class="nav-item active">
                <a class="nav-link" href="">Home <span class="sr-only">(current)</span></a>
            </li>
            -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Servicios'); ?>">Servicios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Contacto'); ?>">Contacto</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Categorias</a>
                <div class="dropdown-menu">
              <?php
              $numProd = 0;
                if($Categorias != null){
                    foreach ($Categorias as $Categoria) { ?>
                        <a class="dropdown-item" href="<?php echo base_url('Categoria/') . $Categoria->id_Categoria;?>"><?php echo $Categoria->nombre ?></a>
                       <?php }
                }else{ ?>
                    Sin Categorias
                <?php }?>
                </div>
            </li>
        </ul>
        <!--
        <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        -->
        <?php if($session_status != true){?>
        <a class="btn btn-outline-success my-2 my-sm-0" onclick="login_modal()" href="#">Acceder</a>
        <button class="btn btn-outline-success my-2 my-sm-0" href="#" data-toggle="modal" data-target="#modal_registro">Registro</button>
        <?php }else{?>
            <ul class="navbar-nav">
                <!-- Notificaciones -->
                <!--
                <li class="nav-item dropdown">
                    <a class="nav-item nav-link dropdown-toggle mr-md-2 material-icons" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        shopping_cart
                        <div class="ripple-container"></div></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
                        <a class="dropdown-item active" href="/bootstrap-material-design/docs/4.0/">Latest (4.x)</a>
                        <a class="dropdown-item" href="https://cdn.rawgit.com/FezVrasta/bootstrap-material-design/gh-pages-v3/index.html">v3.x</a>
                    </div>
                </li>
                -->
                <!-- Carrito AJAXs -->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-item nav-link dropdown-toggle mr-md-2 material-icons" data-toggle="dropdown" role="button" aria-expanded="false">shopping_cart<span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-cart" role="menu">
                        <li id="cart_list">
                            <div id="cart_content">

                            </div>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $username; ?></a>
                    <div class="dropdown-menu">
                         <div class="row">
                            <div class="col-md-12 col-md-12 col-lg-12" style="text-align:center;">
                                <?php if($session_status === true){ ?>
                                    <h4><?php echo $username ." " . $this->session->userdata('client_data')['apellido']; ?></h4>
                            </div>
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <div class="row">
                                    <div class="col-xs-6 col-md-6 col-lg-6">
                                        <a href="<?php echo base_url('Perfil'); ?>" role="button" class="btn btn-primary btn-sm btn-block"><i class="fa fa-user"></i> Perfil</a>
                                    </div>
                                    <div class="col-xs-6 col-md-6 col-lg-6">
                                        <a href="<?php echo base_url('Usuario/Usuario/logOut'); ?>" role="button" class="btn btn-danger btn-sm btn-block"><i class="fa fa-power-off"></i> Salir</a>
                                    </div>
                                </div>                                
                            </div>
                                <?php } ?>
                        </div>
                    </div>
                </li>
            </ul>
        <?php } ?>
    </div>
</nav>

  <style type="text/css">
  .back-link a {
    color: #4ca340;
    text-decoration: none;
    border-bottom: 1px #4ca340 solid;
  }
  .back-link a:hover,
  .back-link a:focus {
    color: #408536;
    text-decoration: none;
    border-bottom: 1px #408536 solid;
  }
  h1 {
    height: 100%;
    /* The html and body elements cannot have any padding or margin. */
    margin: 0;
    font-size: 14px;
    font-family: 'Open Sans', sans-serif;
    font-size: 32px;
    margin-bottom: 3px;
  }
  .entry-header {
    text-align: left;
    margin: 0 auto 50px auto;
    width: 80%;
        max-width: 978px;
    position: relative;
    z-index: 10001;
  }
  #demo-content {
    padding-top: 100px;
  }
  #carbonads-container {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 1000000;
  }
  </style>
    <!-- Page Content -->
    <div id="content" class="cotainer">
