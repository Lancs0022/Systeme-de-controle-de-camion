<?php
    include("controler/bdd.php");
    $db = new Database();

    $camions = $db->getAllCamions();

    $db->close();
?>
<!--general form elements -->
</general><div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Ajout d'un nouveau camion</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="controler/CCamion.php?action=ajout">
      <div class="card-body">
        
        <div class="form-group">
          <label for="numTracteurC">Numéro du tacteur</label>
          <input type="text" class="form-control" id="numTracteurC" placeholder="Numéro de série" name="numTracteurC" required>
        </div>
        <div class="form-group">
          <label for="marqueC">Marque du camion</label>
          <input type="text" class="form-control" id="marqueC" placeholder="Entrez la marque du camion" name="marqueC">
        </div>
        <div class="form-group">
          <label>Type du camion</label>
          <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" name="typeC">
            <option selected="selected" data-select2-id="3">Remorque</option>
            <option data-select2-id="39">Semi-remorque</option>
            <option data-select2-id="40">Pick up</option>
            <option data-select2-id="41">Van</option>
            <option data-select2-id="42">Forgon</option>
            <option data-select2-id="43">Plateau</option>
          </select>
        </div>
        <div class="form-group">
            <label for="prixC">Prix du camion</label>
            <input type="number" class="form-control" id="prixC" placeholder="Entrez le prix d'achat du camion" name="prixC" required>
        </div>
        <div class="form-group">
            <label for="capaC">Capacité du réservoir</label>
            <input type="number" class="form-control" id="capaC" placeholder="Entrez la capacité du réservoir du camion" name="capaReservoirC" required>
        </div>
        <div class="form-group">
          <label for="chargeC">Charge supporté par le camion</label>
          <input type="number" class="form-control" id="chargeC" placeholder="Entrez la charge utile du camion" name="chargeC" required>
      </div>
        <div class="form-group">
            <label for="kmC">kilometrage du camion</label>
            <input type="number" class="form-control" id="kmC" placeholder="Entrez le kilométrage du camion" name="kmC">
        </div>
        <div class="form-group">
          <label for="remorqueC">Numéro de la remorque</label>
          <input type="number" class="form-control" id="remorqueC" placeholder="Entrez le numéro de la remorque du camion" name="remorqueC">
        </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
      </div>
    </form>
  </div>