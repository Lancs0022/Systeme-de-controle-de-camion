<!-- 
    
-->
<?php
    session_start();
    ob_start();
    include ("html/entete.html");
    include ("html/navSuperieur.html");
    include ("html/sideBar.html");

    include ("route/route.php");

    include ("html/footer.html");