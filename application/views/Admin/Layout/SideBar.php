  </header>
  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url(). "assets/images/site/" . $this->session->userdata('empleado_data')['avatar'];?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('empleado_data')['nombre']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Empleados</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('CPanel/Empleado');?>"><i class="fa fa-circle-o"></i> Lista de Empleados</a></li>
            <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Clientes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('CPanel/Cliente'); ?>"><i class="fa fa-circle-o"></i> Lista de Clientes</a></li>
            <li><a href="../UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-glass"></i> <span>Inventario</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('CPanel/Producto'); ?>"><i class="fa fa-circle-o"></i> Todo</a></li>
            <li>
              <a href="#"><i class="fa fa-circle-o"></i> Categorias
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
              <?php
                if($Categorias != null){
                    foreach ($Categorias as $Categoria) { ?>
                        <li><a href="<?php echo site_url('CPanel/Producto/porCategoria/') . $Categoria->id_Categoria;?>"><i class="fa fa-circle-o"></i><?php echo $Categoria->nombre ?></a></li>
                       <?php }
                }else{ ?>
                    Sin Categorias
                <?php }?>
              </ul>
            </li>
          </ul>
        </li>
        <li>
          <a href="<?php echo base_url('CPanel/Categoria'); ?>">
            <i class="fa fa-puzzle-piece"></i> <span>Categorias</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('CPanel/Files'); ?>">
            <i class="fa fa-folder"></i> <span>Archivos</span>
          </a>
        </li>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>



