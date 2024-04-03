<?php
session_start();
// Connexion à la base de données
$conn = new PDO('mysql:host=localhost;dbname=gsbv2', 'root', 'password');

// Récupération des données du formulaire
$login = $_POST['login'];
$password = $_POST['password'];
$dateActuelle=date('m');

// Requête SQL pour vérifier les informations de connexion
$sql = "SELECT id FROM visiteur WHERE login='$login' AND mdp='$password'";
$result = $conn->query($sql);
$donnees = $result->fetch();

$sql1 = "SELECT * FROM fichefrais WHERE mois=:mois AND idVisiteur=:idVisiteur";
$stmt1 = $conn->prepare($sql1);
$stmt1->bindParam(':mois', $dateActuelle);
$stmt1->bindParam(':idVisiteur', $donnees['id']);
$stmt1->execute();
if ($result->rowCount() > 0) {
    // Authentification réussie, ouverture de session
    
    $_SESSION['login'] = $login;
    if ($stmt1->rowCount() == 0) {
        $req = $conn->prepare('INSERT INTO fichefrais (idVisiteur,mois,nbJustificatifs,montantValide,dateModif,idEtat) VALUES(:idVisiteur,:mois,:nbJustificatifs,:montantValide,:dateModif,:idEtat)');
        $req->execute(array('idVisiteur' => $donnees['id'],'mois' =>$dateActuelle,'nbJustificatifs' => 0,'montantValide' => 0,'dateModif' => date('d-m-y'),'idEtat' =>'CR'  ));
        $req = $conn->prepare('INSERT INTO lignefraisforfait (idVisiteur,mois,idFraisForfait,quantite) VALUES(:idVisiteur, :mois, :idFraisForfait, :quantite)');
        $req->execute(array('idVisiteur' =>  $donnees['id'],'mois' =>$dateActuelle,'idFraisForfait' => 'ETP','quantite' => 0));
        $req = $conn->prepare('INSERT INTO lignefraisforfait (idVisiteur,mois,idFraisForfait,quantite) VALUES(:idVisiteur, :mois, :idFraisForfait, :quantite)');
        $req->execute(array('idVisiteur' =>  $donnees['id'],'mois' =>$dateActuelle,'idFraisForfait' => 'KM','quantite' => 0));
        $req = $conn->prepare('INSERT INTO lignefraisforfait (idVisiteur,mois,idFraisForfait,quantite) VALUES(:idVisiteur, :mois, :idFraisForfait, :quantite)');
        $req->execute(array('idVisiteur' => $donnees['id'],'mois' =>$dateActuelle,'idFraisForfait' => 'NUI','quantite' => 0));
        $req = $conn->prepare('INSERT INTO lignefraisforfait (idVisiteur,mois,idFraisForfait,quantite) VALUES(:idVisiteur, :mois, :idFraisForfait, :quantite)');
        $req->execute(array('idVisiteur' =>  $donnees['id'],'mois' =>$dateActuelle,'idFraisForfait' => 'REP','quantite' => 0));

    }
    

    header("Location: accueil_visi.php"); // Redirection vers la page d'accueil
    exit;
} else {
    echo "Login ou mot de passe incorrect";
}


?>