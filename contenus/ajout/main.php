<?php
  if (isset($_GET['choix'])) {
    $_SESSION['choix'] = $_GET['choix'];
  } 
  if (isset($_GET['ind'])) {
    $_SESSION['ind'] = $_GET['ind'];
  }
  else $_SESSION['ind'] = '';
?>

<div class="content-wrapper" style="min-height: 1345.6px;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-sm-6">
                    <h1><?= $_SESSION['ind']?></h1>
                </div>
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

        <?php
          include("route/route2.php");
        ?>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div><?php
    