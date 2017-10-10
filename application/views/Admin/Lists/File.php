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
        <div class="col-xs-12 col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Archivos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="btn-group breadcrumb">
                <div id="file_navigation_menu"></div>
                <?php //echo "Sub Paths: ". print_r($Archivos['sub_path']); ?>
                <!--
                <button class="btn btn-flat btn-xs" onclick="open_folder('<?php echo $Archivos['path'] ?>')">
                  <?php echo $Archivos['route'] ?>
                  <span class="fa fa-arrow-right"></span>
                </button>
              -->
              </div>
            <div id="file_windows_content">
            <?php
            //echo print_r($Archivos);
              foreach ($Archivos['content'] as $archivo) {
            ?>
              <button class="btn btn-app" onclick="<?php echo $archivo['action'] ?>">
                <i class="<?php echo $archivo['file_icon'] ?>"></i>
                <?php echo $archivo['name']; ?>
              </button>
            <?php
              }
            ?>
            </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">

            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>

    function open_folder(folder){
      $.ajax({
        url: '<?php echo base_url('CPanel/Files/open_folder') ?>',
        type: 'POST',
        dataType: 'json',
        data: {folder: folder},
      })
      .done(function(response) {
        $('#file_windows_content').html(response['window_content']);
        $('#file_navigation_menu').html(response['navigation_content']);
        console.log(response);
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
      
    }
  </script>
