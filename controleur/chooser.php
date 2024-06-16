<?php
    // echo '<pre>';
    // print_r($_GET);
    // echo '</pre>'; 

if(isset($_GET['choix']) && 
($_GET['choix'] == 'Astronautes' || $_GET['choix'] == 'Missions' || 
 $_GET['choix'] == 'Vaisseaux' || $_GET['choix'] == 'Planètes')) {
    
    $choix = $_GET['choix'];
    include("contenus/dashboard/dashboard.php");
}
else if(isset($_GET['choix']) && $_GET['choix'] == 'Gallerie') {
    include("function/getApi.php");
}
else 
    include("contenus/acceuil.php");