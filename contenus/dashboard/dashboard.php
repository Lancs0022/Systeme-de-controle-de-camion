<?php
  if (isset($_GET['choix'])) {
      $_SESSION['choix'] = $_GET['choix'];
  } else if (isset($_GET['mode'])) {
    $_SESSION['mode'] = $_GET['mode'];
  }
?>
<div class="content-wrapper" style="min-height: 1345.6px;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-sm-6">
                    <h1><?=$_SESSION['choix']?></h1>
                </div>
                <!-- <div class="btn-group btn-group-toggle col-sm-6" data-toggle="buttons">
                  <label class="btn bg-olive active">
                    <input type="radio" name="options" id="option_b1" autocomplete="off" checked=""> Active
                  </label>
                  <label class="btn bg-olive">
                    <input type="radio" name="options" id="option_b2" autocomplete="off"> Radio
                  </label>
                  <label class="btn bg-olive">
                    <input type="radio" name="options" id="option_b3" autocomplete="off"> Radio
                  </label>
                </div> -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?=$_SESSION['choix']?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

        <!-- Navigation -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <a href="index.php?mode=Ajouter" class="nav-link">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-plus"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Ajouter</span>
                </div>
                <!-- /.info-box-content -->
              </div>
            </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
          <a href="index.php?mode=Lister" class="nav-link">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Lister</span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
          <a href="index.php?mode=Modifier" class="nav-link">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-edit"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Modifier</span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
          <a href="index.php?mode=Supprimer" class="nav-link">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Supprimer</span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.Navigation-->

        <?php
          include("controleur/chooser2.php");
        ?>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>