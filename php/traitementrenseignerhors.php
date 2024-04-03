<?php
session_start();
// Connexion à la base de données
$conn = new PDO('mysql:host=localhost;dbname=gsbv2', 'root', 'password');

// Récupération des données du formulaire

$libelle = $_POST['libelle'];
$montant = $_POST['Montant'];

$dateActuelle = date("m");
$sql = "SELECT id FROM visiteur WHERE login=:login";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':login', $_SESSION['login']);
$stmt->execute();
$donnees = $stmt->fetch();


    
    $req = $conn->prepare('INSERT INTO lignefraishorsforfait (idVisiteur,mois,libelle,date,montant) VALUES(:idVisiteur, :mois, :libelle, :date,:montant)');
    $req->execute(array('idVisiteur' => $donnees['id'],'mois' =>$dateActuelle,'libelle' => $libelle,'date' => date('d-m-y'),'montant' => $montant));






header("Location: accueil_visi.php");
exit;



?>