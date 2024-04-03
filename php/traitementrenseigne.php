<?php
session_start();
// Connexion à la base de données
$conn = new PDO('mysql:host=localhost;dbname=gsbv2', 'root', 'password');

// Récupération des données du formulaire
$nuit = $_POST['nuit'];
$repas = $_POST['repas'];
$FraisKilo = $_POST['FraisKilo'];
$ForfaitEtape = $_POST['ForfaitEtape'];
$dateActuelle = date("m");



//On ne rentre pas dans cette boucle j'ai fais cela pour montrer mon code d'insertion pour que s'a n'affiche pas d'erreur lors de l'envoie des données du formulaire



$req = $conn->prepare('UPDATE lignefraisforfait SET quantite = :quantite WHERE idFraisForfait = :idFraisForfait');
$req->execute(array('quantite' => $nuit,'idFraisForfait' => 'NUI'));
$req = $conn->prepare('UPDATE lignefraisforfait SET quantite = :quantite WHERE idFraisForfait = :idFraisForfait');
$req->execute(array('quantite' => $repas,'idFraisForfait' => 'REP'));
$req = $conn->prepare('UPDATE lignefraisforfait SET quantite = :quantite WHERE idFraisForfait = :idFraisForfait');
$req->execute(array('quantite' => $FraisKilo,'idFraisForfait' => 'KM'));
$req = $conn->prepare('UPDATE lignefraisforfait SET quantite = :quantite WHERE idFraisForfait = :idFraisForfait');
$req->execute(array('quantite' => $ForfaitEtape,'idFraisForfait' => 'ETP'));





header("Location: accueil_visi.php");
exit;



?>