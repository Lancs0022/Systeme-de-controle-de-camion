<?php
    var_dump($_SESSION["ind"]);
    if(isset($_SESSION["ind"])){
        if($_SESSION["choix"] == "ajouter"){
            if($_SESSION["ind"] == "camions"){
                include("contenus/ajout/navCamions.html");
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
                include("contenus/ajout/forms/ajoutVoyage.html");
                unset($_SESSION["ind"]);
            }
            else{
                echo "ind not set & choix = ajouter & else";
                include("html/404error.html");
                unset($_SESSION["choix"]);
            }
        }
        if($_SESSION["choix"] == "consulter"){
            if($_SESSION["ind"] == "camions"){
                include("contenus/consult/consultCamion.html");
                unset($_SESSION["ind"]);
            }
            else if($_SESSION["ind"] == "employes"){
                include("contenus/navEmployes.html");
                include("contenus/consult/consultEmployes.html");
                unset($_SESSION["ind"]);
            }
            else if($_SESSION["ind"] == "salaire"){
                include("contenus/consult/consultSalaireE.html");
                unset($_SESSION["ind"]);
            }
            else if($_SESSION["ind"] == "repas"){
                include("contenus/consult/consultRepas.html");
                unset($_SESSION["ind"]);
            }
            else if($_SESSION["ind"] == "voyage"){
                include("contenus/consult/consultVoyage.html");
                unset($_SESSION["ind"]);
            }
            else{
                echo "ind not set & choix = consulter & else";
                include("html/404error.html");
                unset($_SESSION["choix"]);
            }
        }
    }
    else{
        echo "ind ? & choix = ? & else";
        include("html/404error.html");
        unset($_SESSION["choix"]);
    }
