-- Créer la base de données SuiviCamion
CREATE DATABASE SuiviCamion;

-- Utiliser la base de données SuiviCamion
USE SuiviCamion;

CREATE TABLE Utilisateur (
    idUser INT PRIMARY KEY AUTO_INCREMENT,
    nomUser VARCHAR(255),
    mdpUser VARCHAR(255),
    typeUser VARCHAR(50)
);

CREATE TABLE Carburant (
    idCarburant INT PRIMARY KEY AUTO_INCREMENT,
    dateCarburant DATETIME,
    quantiteCarburant DECIMAL(10, 2),
    prixCarburant DECIMAL(10, 2),
    numTracteurCamion CHAR(25),
    FOREIGN KEY (numTracteurCamion) REFERENCES Camion(numTracteurCamion)
);

CREATE TABLE Charge (
    idCharge INT PRIMARY KEY AUTO_INCREMENT,
    typeCharge VARCHAR(255),
    coutCharge DECIMAL(10, 2),
    dateCharge DATETIME,
    numTracteurCamion CHAR(25),
    FOREIGN KEY (numTracteurCamion) REFERENCES Camion(numTracteurCamion)
);

CREATE TABLE Maintenance (
    idMaintenance INT PRIMARY KEY AUTO_INCREMENT,
    dateMaintenance DATETIME,
    coutMaintenance DECIMAL(10, 2),
    numTracteurCamion CHAR(25),
    dateEnregistrementMaintenance DATETIME,
    FOREIGN KEY (numTracteurCamion) REFERENCES Camion(numTracteurCamion)
);

CREATE TABLE Achats (
    numFactureAchat VARCHAR(25) PRIMARY KEY,
    designationAchat VARCHAR(255),
    prixUnitaireAchat DECIMAL(10, 2),
    dateAchat DATETIME,
    qtAchat INT,
    tvaAchat DECIMAL(10, 2),
    horsTaxeAchat DECIMAL(10, 2),
    fournisseur VARCHAR(255),
    referenceAchat VARCHAR(255),
    idMaintenance INT,
    FOREIGN KEY (idMaintenance) REFERENCES Maintenance(idMaintenance)
);

CREATE TABLE Camion (
    numTracteurCamion CHAR(25) PRIMARY KEY,
    marqueCamion VARCHAR(255),
    typeCamion VARCHAR(255),
    numRemorqueCamion VARCHAR(255),
    prixDuCamion DECIMAL(10, 2),
    reservoirCamion DECIMAL(10, 2),
    kilometrageCamion INT,
    capaciteCamion DECIMAL(10, 2),
    dateAjoutCamion DATETIME
);

CREATE TABLE Employe (
    idEmploye INT PRIMARY KEY AUTO_INCREMENT,
    nomEmploye VARCHAR(255),
    prenomEmploye VARCHAR(255),
    typeEmploye VARCHAR(50),
    CINEmploye VARCHAR(255),
    telEmploye VARCHAR(50),
    statutEmploye VARCHAR(50),
    salaireMensuelEmploye DECIMAL(10, 2),
    numTracteurCamion CHAR(25),
    dateEnregistrementEmploye DATETIME,
    FOREIGN KEY (numTracteurCamion) REFERENCES Camion(numTracteurCamion)
);

CREATE TABLE Voyage (
    idVoyage INT PRIMARY KEY AUTO_INCREMENT,
    fretVoyage DECIMAL(10, 2),
    zoneVoyage VARCHAR(255),
    dateVoyage DATETIME,
    numTracteurCamion CHAR(25),
    dateEnregistrementVoyage DATETIME,
    FOREIGN KEY (numTracteurCamion) REFERENCES Camion(numTracteurCamion)
);

CREATE TABLE RepasPaye (
    idRepas INT PRIMARY KEY AUTO_INCREMENT,
    dateDebutRepas DATETIME,
    dateFinRepas DATETIME,
    shiftRepas VARCHAR(50),
    montantRepas DECIMAL(10, 2),
    idEmploye INT,
    FOREIGN KEY (idEmploye) REFERENCES Employe(idEmploye)
);

CREATE TABLE SalairePaye (
    idSalaire INT PRIMARY KEY AUTO_INCREMENT,
    montantSalaire DECIMAL(10, 2),
    dateSalaire DATETIME,
    idEmploye INT,
    dateEnregistrementSalaire DATETIME,
    FOREIGN KEY (idEmploye) REFERENCES Employe(idEmploye)
);

CREATE TABLE BonusPaye (
    idBonus INT PRIMARY KEY AUTO_INCREMENT,
    montantBonus DECIMAL(10, 2),
    dateBonus DATETIME,
    salaireId INT,
    FOREIGN KEY (salaireId) REFERENCES SalairePaye(idSalaire)
);

CREATE TABLE Cargaison (
    idCargaison INT PRIMARY KEY AUTO_INCREMENT,
    poidsCargaison DECIMAL(10, 2),
    typeCargaison VARCHAR(255),
    categorieCargaison VARCHAR(255),
    navireCargaison VARCHAR(255),
    bonEnlevementCargaison VARCHAR(255),
    idVoyage INT,
    FOREIGN KEY (idVoyage) REFERENCES Voyage(idVoyage)
);