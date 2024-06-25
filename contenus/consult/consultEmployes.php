<?php
include("controler/bdd.php");
$db = new Database();

$employes = $db->select2("*", "Employe");
$db->close();
?>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Table des Employés</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12">
                    <table id="example2" class="table table-bordered table-striped dataTable dtr-inline"
                        aria-describedby="example2_info">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Poste</th>
                                <th>Numéro</th>
                                <th>CIN</th>
                                <th>Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($employes)): ?>
                                <tr>
                                    <td colspan="7">Aucun employé enregistré</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($employes as $employe): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($employe['idEmploye']) ?></td>
                                        <td><?= htmlspecialchars($employe['nomEmploye']) ?></td>
                                        <td><?= htmlspecialchars($employe['prenomEmploye']) ?></td>
                                        <td><?= htmlspecialchars($employe['typeEmploye']) ?></td>
                                        <td><?= htmlspecialchars($employe['telEmploye']) ?></td>
                                        <td><?= htmlspecialchars($employe['CINEmploye']) ?></td>
                                        <td><?= htmlspecialchars($employe['statutEmploye']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Poste</th>
                                <th>Numéro</th>
                                <th>CIN</th>
                                <th>Statut</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>