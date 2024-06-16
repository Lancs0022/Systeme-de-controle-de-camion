<!-- 
    
-->
<?php
    session_start();
    ob_start();
    include ("html/entete.html");
    include ("html/navSuperieur.html");
    include ("html/sideBar.html");

    include ("controleur/chooser.php");

    include ("html/footer.html");