<?php
session_start();

// Vérifier si l'utilisateur est connecté


// Si l'utilisateur est connecté, afficher la page d'accueil
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Accueil-visiteurMedicale</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="acceuil">
    <nav>
        <div class="logo">
            <img src="logo.png" alt="Logo"> 
        </div>
        <ul>
            <li><a href="renseignerFiche.php">Renseigner fiche frais</a></li> 
            <li><a href="consulter_Visiteur.php">Consulter fiche frais</a></li> 
            <li><a href="deco.php">Déconnexion</a></li> 
        </ul>
    </nav>
    <div class="principale">
        <p>Bonjour, bienvenue sur votre page de visiteur Médicale, les seuls onglets disponibles pour vous sont la consultation de vos fiches de frais et la possibilité de renseigner une fiche de frais</p>
    </div>
</body>
</html>