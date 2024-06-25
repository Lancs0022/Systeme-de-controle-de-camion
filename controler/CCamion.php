<?php
$action = $_GET['action'] ?? '';
echo "Ajout de camion";
var_dump($_POST);
require_once "bdd.php";

if ($action == "ajout") {
    // Vérifie si la requête est une méthode POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Récupère les données du formulaire
        $numTracteurC = $_POST['numTracteurC'];
        $marqueC = $_POST['marqueC'];
        $typeC = $_POST['typeC'];
        $prixC = $_POST['prixC'];
        $capaReservoirC = $_POST['capaReservoirC'];
        $chargeC = $_POST['chargeC'];
        $kmC = $_POST['kmC'];
        $remorqueC = $_POST['remorqueC'];

        // Crée une instance de la classe Database
        $db = new Database();

        // Prépare les données à insérer, y compris la date d'ajout
        $data = [
            'numTracteurCamion' => $numTracteurC,
            'marqueCamion' => $marqueC,
            'typeCamion' => $typeC,
            'prixDuCamion' => $prixC,
            'capaciteCamion' => $chargeC,
            'reservoirCamion' => $capaReservoirC,
            'kilometrageCamion' => $kmC,
            'numRemorqueCamion' => $remorqueC,
            'dateAjoutCamion' => date('Y-m-d H:i:s') // Ajout de la date actuelle
        ];

        // Insère les données dans la table Camion
        $success = $db->insert('Camion', $data);

        // Vérifie si l'insertion a réussi
        if ($success) {
            echo "Le camion a été ajouté avec succès!\n";
            echo realpath(__DIR__);
            header("location: ../index.php?choix=ajouter&ind=camions&msg=enregOk");
        } else {
            echo "Une erreur est survenue lors de l'ajout du camion.";
            header("location: ../index.php?choix=ajouter&ind=camions&msg=enregNOTOk");
        }
    } else {
        echo "Méthode de requête non valide.";
    }
} elseif ($action == 'modif') {
    // Logique pour modifier un camion
} elseif ($action == 'supp') {
    // Logique pour supprimer un camion
} elseif ($action == 'list') {
    // Logique pour lister les camions
}
?>
