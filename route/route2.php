<?php
    var_dump($_SESSION["ind"]);
    if(isset($_SESSION["ind"])){
        if($_SESSION["ind"] == "camions"){
            include("contenus/ajout/forms/ajoutCamion.html");
            unset($_SESSION["ind"]);
        }
        else if($_SESSION["ind"] == "employes"){
            include("contenus/ajout/navEmployes.html");
            include("contenus/ajout/forms/ajoutEmployes.html");
            unset($_SESSION["ind"]);
        }
        else if($_SESSION["ind"] == "salaire"){
            include("contenus/ajout/forms/ajoutSalaireE.html");
            unset($_SESSION["ind"]);
        }
        else if($_SESSION["ind"] == "repas"){
            include("contenus/ajout/forms/ajoutRepas.html");
            unset($_SESSION["ind"]);
        }
        else if($_SESSION["ind"] == "voyage"){
            include("contenus/ajout/ajoutVoyage.html");
            unset($_SESSION["ind"]);
        }

        else{
            include("html/404error.html");
            unset($_SESSION["choix"]);
        }
    }
