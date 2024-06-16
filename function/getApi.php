<?php
  if (isset($_GET['choix'])) {
      $_SESSION['choix'] = $_GET['choix'];
  }
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        <?=$_SESSION['choix']?>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?=$_SESSION['choix']?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            </div>
            <?php
/*
    Ce fichier contient les fonctions php nécessaires afin de recupérer 
    les informations nécessaires de l'API.
        - recupAPIInfo($cleApi, $date)  : S'occupe de récupérer et de 
            les informations de l'API et le renvoie dans un tableau
        - afficheAPIInfo($info)         : Est une fonction temporaire 
            qui récupère les données recoltés et les affiche
*/

function recupAPIInfo($cleApi, $date) {
    if(!isset($_COOKIE['title']) || !isset($_COOKIE['url']) || !isset($_COOKIE['explanation'])){
        // URL de l'API
        $api_url = 'https://api.nasa.gov/planetary/apod';

        // Construction de l'URL de la requête API
        $requeteUrl = $api_url . '?api_key=' . $cleApi . '&date=' . $date;

        // Lancement de la requête API en utilisant file_get_contents
        $reponse = file_get_contents($requeteUrl);

        // Vérification de requête
        if ($reponse === false) {
            return ['error' => 'Erreur lors de la récupération des données depuis l\'API APOD'];
        }

        // Décodage de la réponse JSON
        $donnees = json_decode($reponse, true);

        // Vérification de la réponse
        if (!$donnees) {
            return ['error' => 'Erreur lors du décodage de la réponse JSON'];
        }

        // Accès aux informations de l'API
        $title = $donnees['title'];
        $image_url = $donnees['url'];
        $explanation = $donnees['explanation'];
        
        // Définissez la date d'expiration à 1 jour à partir de maintenant
        $expirationTime = time() + (1 * 24 * 60 * 60); // 1 jour en secondes

        // Définissez les cookies avec la date d'expiration
        setcookie('title', $title, $expirationTime, '/');
        setcookie('url', $image_url, $expirationTime, '/');
        setcookie('explanation', $explanation, $expirationTime, '/');
    }
    return [
        'title' => $_COOKIE['title'],
        'image_url' => $_COOKIE['url'],
        'explanation'=> $_COOKIE['explanation'],
    ];
}

function afficheAPIInfo($info) {
    // Vérifiez s'il y a une erreur
    if (isset($info['error'])) {
        die($info['error']);
    }

    // Accédez aux informations renvoyées par la fonction
    $title = $info['title'];
    $image_url = $info['image_url'];
    $explanation = $info['explanation'];

    // Affichez les informations de l'APOD
    echo "<h2>$title</h2>";
    echo "<img src='$image_url' alt='$title'>";
    echo "<p>$explanation</p>";
}

function randomDateBetween($startDate, $endDate) {
    // Convertissez les chaînes de caractères en objets DateTime
    $startDateTime = new DateTime($startDate);
    $endDateTime = new DateTime($endDate);

    // Obtenez les timestamps Unix correspondants
    $startTimestamp = $startDateTime->getTimestamp();
    $endTimestamp = $endDateTime->getTimestamp();

    // Générez un timestamp aléatoire entre les deux dates
    $randomTimestamp = mt_rand($startTimestamp, $endTimestamp);

    // Créez un nouvel objet DateTime avec le timestamp aléatoire
    $randomDate = new DateTime();
    $randomDate->setTimestamp($randomTimestamp);

    // Renvoyez la date au format Y-m-d (format ISO 8601)
    return $randomDate->format('Y-m-d');
}


// Exemple d'utilisation de la génération de date aléatoire //

$startDate = '2023-01-01';
$endDate = '2023-12-31';
$randomDate = randomDateBetween($startDate, $endDate);
// echo "Date aléatoire entre $startDate et $endDate : $randomDate";

$cleApi = 'x8IdyDHLUTgGdXnr5UtSlHaCji9rTQm0jc3ICzh7';
$date = '2023-11-26';
$info = recupAPIInfo($cleApi, $randomDate);
afficheAPIInfo($info);

?>


        </div>
        <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->