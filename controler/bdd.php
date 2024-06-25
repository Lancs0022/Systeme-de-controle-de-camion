<?php
class Database {
    private $pdo;
    private $host;
    private $dbname;
    private $username;
    private $password;

    public function __construct() {
        // Chemin absolu vers env.php
        $envPath = realpath(__DIR__ . '/../env.php');

       if (file_exists($envPath)) {
            include($envPath);
            $this->host = $HOTE;
            $this->dbname = $NOM_DE_LA_BASE;
            $this->username = $NOM_UTILISATEUR;
            $this->password = $MDP_UTILISATEUR;
            $this->connect();
        } else {
            die("Le fichier env.php est introuvable.");
        }
    }

    // public function __construct($host, $dbname, $username, $password) {
    //     $this->host = $host;
    //     $this->dbname = $dbname;
    //     $this->username = $username;
    //     $this->password = $password;
    //     $this->connect();
    // }

    private function connect() {
        $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
        try {
            $this->pdo = new PDO($dsn, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
    public function select($table, $constraints = []) {
        $sql = "SELECT * FROM $table";
        if (!empty($constraints)) {
            $sql .= " WHERE " . implode(" AND ", array_map(function($key) {
                return "$key = :$key";
            }, array_keys($constraints)));
        }

        $stmt = $this->pdo->prepare($sql);
        foreach ($constraints as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function select2($champ, $table, $constraints = []) {
        $sql = "SELECT $champ FROM $table";
        if (!empty($constraints)) {
            $sql .= " WHERE " . implode(" AND ", array_map(function($key) {
                return "$key = :$key";
            }, array_keys($constraints)));
        }

        $stmt = $this->pdo->prepare($sql);
        foreach ($constraints as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function insert($table, $data) {
        $keys = array_keys($data);
        $fields = implode(", ", $keys);
        $placeholders = implode(", ", array_map(function($key) {
            return ":$key";
        }, $keys));

        $sql = "INSERT INTO $table ($fields) VALUES ($placeholders)";
        $stmt = $this->pdo->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        return $stmt->execute();
    }
    public function getAllCamions() {
        $stmt = $this->pdo->query("SELECT numTracteurCamion FROM Camion");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Vérifie s'il y a déjà un chauffeur ou aide chauffeur qui occupe un camion
    public function countEmployesParFonctionEtCamion($numTracteurCamion, $poste) {
        $sql = "SELECT COUNT(*) as count FROM Employe WHERE numTracteurCamion = :numTracteurCamion AND typeEmploye = :typeEmploye";
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['numTracteurCamion' => $numTracteurCamion, 'typeEmploye' => $poste]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['count'];
        } catch (PDOException $e) {
            return false;
        }
    }
    public function getAllCamionsWithDetails() {
        $sql = "SELECT numTracteurCamion, numRemorqueCamion, marqueCamion, typeCamion, prixDuCamion, reservoirCamion, capaciteCamion, kilometrageCamion FROM Camion";
        try {
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {            
            echo "La récupération de la liste des camions a échoué !";
            return [];
        }
    }
    public function close() {
        $this->pdo = null;
    }
}

// // Utilisation de la classe Database
// $db = new Database('localhost', 'nom_de_la_base', 'utilisateur', 'mot_de_passe');

// // Exemple de sélection
// $result = $db->select('Employe', ['idEmploye' => 1]);
// print_r($result);

// // Exemple d'insertion
// $success = $db->insert('Employe', [
//     'nomEmploye' => 'Doe',
//     'prenomEmploye' => 'John',
//     'typeEmploye' => 'Permanent',
//     'CNEmploye' => '123456',
//     'telEmploye' => '0123456789',
//     'statutEmploye' => 'Actif',
//     'mtltMensSalaireEmploye' => 5000.00
// ]);

// if ($success) {
//     echo "Insertion réussie!";
// }
?>
