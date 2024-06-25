<?php
include("controler/bdd.php");
$db = new Database();

$camions = $db->select2("*", "Camion");
$db->close();
?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">DataTable avec des fonctionnalités par défaut</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                        aria-describedby="example1_info">
                        <thead>
                            <tr>
                                <th>Numéro</th>
                                <th>Remorque</th>
                                <th>Marque</th>
                                <th>Type</th>
                                <th>Prix</th>
                                <th>Réservoir</th>
                                <th>Charge utile</th>
                                <th>Kilométrage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($camions as $camion): ?>
                                <tr>
                                    <td><?= htmlspecialchars($camion['numTracteurCamion']) ?></td>
                                    <td><?= htmlspecialchars($camion['numRemorqueCamion']) ?></td>
                                    <td><?= htmlspecialchars($camion['marqueCamion']) ?></td>
                                    <td><?= htmlspecialchars($camion['typeCamion']) ?></td>
                                    <td><?= htmlspecialchars($camion['prixDuCamion']) ?></td>
                                    <td><?= htmlspecialchars($camion['reservoirCamion']) ?></td>
                                    <td><?= htmlspecialchars($camion['capaciteCamion']) ?></td>
                                    <td><?= htmlspecialchars($camion['kilometrageCamion']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Numéro</th>
                                <th>Remorque</th>
                                <th>Marque</th>
                                <th>Type</th>
                                <th>Prix</th>
                                <th>Réservoir</th>
                                <th>Charge utile</th>
                                <th>Kilométrage</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>