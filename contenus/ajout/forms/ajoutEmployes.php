<?php
    include("controler/bdd.php");
    $db = new Database();

    $camions = $db->getAllCamions();

    $db->close();
?>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Ajout d'un nouvel employé</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="controler/CEmploye.php?action=ajout">
        <div class="card-body">

            <div class="form-group">
                <label>Camion</label>
                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1"
                    tabindex="-1" aria-hidden="true" aria-placeholder="id du camion" name="numTracteurCamion" required>
                    <?php foreach ($camions as $camion): ?>
                        <option value="<?= htmlspecialchars($camion['numTracteurCamion']) ?>"><?= htmlspecialchars($camion['numTracteurCamion']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Poste</label>
                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1"
                    tabindex="-1" aria-hidden="true" name="poste">
                    <option selected="selected" data-select2-id="3">Chauffeur</option>
                    <option data-select2-id="33">Aide chauffeur</option>
                </select>
            </div>

            <div class="form-group">
                <label for="nomE">Nom</label>
                <input type="text" class="form-control" id="nomE" placeholder="Nom de l'employé"
                    name="nomE" required>
            </div>
            <div class="form-group">
                <label for="prenomE">Prenom</label>
                <input type="text" class="form-control" id="prenomE" placeholder="Prénom de l'employé"
                    name="prenomE">
            </div>
            <div class="form-group">
                <label for="CINE">CIN</label>
                <input type="number" class="form-control" id="CINE" placeholder="CIN de l'employé" name="CINE">
            </div>
            <div class="form-group">
                <label for="numE">Numéro de téléphone</label>
                <input type="number" class="form-control" id="numE" placeholder="Entrez le numéro de téléphone de l'employé" name="numE">
            </div>
            <div class="form-group">
                <label for="salaireE">Salaire</label>
                <input type="text" class="form-control" id="salaireE" placeholder="Entrez le salaire mensuel de l'employé" name="salaireE">
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>
</div>
