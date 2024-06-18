<?php
    if(isset($_GET["choix"]))
        $_SESSION["choix"] = $_GET["choix"];

    if(isset($_SESSION["choix"]) && 
    ($_SESSION["choix"] == 'ajouter' || $_SESSION["choix"] == 'consulter')) {
        $choix = $_SESSION["choix"];
        include("contenus/ajout/main.php");
        unset($_SESSION["choix"]);
    }
    // else if(isset($_SESSION["choix"]) && $_SESSION["choix"] == 'Gallerie') {
    //     include("function/getApi.php");
    // }
    else if(!isset($_SESSION["choix"])){
        include("contenus/acceuil.php");
    }
    else{
        include("html/404error.html");
        unset($_SESSION["choix"]);
    }