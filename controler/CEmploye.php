<?php
// controler/CEmploye.php

include("bdd.php");

$db = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_GET['action'] == 'ajout') {
    $numTracteurCamion = $_POST['numTracteurCamion'];
    $poste = $_POST['poste'];
    $nom = $_POST['nomE'];
    $prenom = $_POST['prenomE'];
    $cin = $_POST['CINE'];
    $telephone = $_POST['numE'];
    $salaire = $_POST['salaireE'];

    // Vérification du nombre d'employés par type et par camion
    $count = $db->countEmployesParFonctionEtCamion($numTracteurCamion, $poste);

    if (($poste == 'Chauffeur' && $count >= 1) || ($poste == 'Aide chauffeur' && $count >= 1)) {
        header("Location: ../index.php?message=Il y a déjà un $poste pour ce camion");
    } else {
        $data = [
            'numTracteurCamion' => $numTracteurCamion,
            'typeEmploye' => $poste,
            'nomEmploye' => $nom,
            'prenomEmploye' => $prenom,
            'CINEmploye' => $cin,
            'telEmploye' => $telephone,
            'salaireMensuelEmploye' => $salaire,
            'statutEmploye' => 'Actif', // Par défaut, on peut mettre le statut à 'Actif'
            'dateEnregistrementEmploye' => date('Y-m-d H:i:s') // Ajout de la date actuelle
        ];

        $result = $db->insert('Employe', $data);

        if ($result) {
            echo "L'employé a été ajouté avec succès!\n";
            header("Location: ../index.php?msg=enregOk");
        } else {
            echo "Une erreur est survenue lors de l'ajout de l'employé.";
            header("Location: ../index.php?msg=enregNOTOk");
        }
    }
}
$db->close();
?>
