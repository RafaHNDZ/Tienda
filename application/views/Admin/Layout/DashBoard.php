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
        <li><a href=""><i class="fa fa-dashboard"></i> <?php echo $titulo; ?></a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-blue"><i class="fa fa-glass"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Inventario</span>
            <span class="info-box-number"><?php echo $numProductos; ?></span>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-blue"><i class="fa fa-bookmark-o"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Categorias</span>
            <span class="info-box-number"><?php echo $numCategorias ?></span>
              <span class="progress-description">
                  
              </span>
           </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-blue"><i class="fa fa-user"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Clientes</span>
            <span class="info-box-number"><?php echo $numClientes ?></span>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->