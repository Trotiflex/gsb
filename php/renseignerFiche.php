<?php
session_start();





?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Renseigner-visiteurMedicale</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="acceuil">
    <nav>
        <div class="logo">
            <img src="logo.png" alt="Logo"> 
        </div>
        <ul>
            <li><a href="accueil_visi.php">Accueil</a></li> 
            <li><a href="renseignerFiche.php">Renseigner fiche frais</a></li> 
            <li><a href="consulter_Visiteur.php">Consulter fiche frais</a></li> 
            <li><a href="deco.php">Déconnexion</a></li> 
            
        </ul>
    </nav>
        <div class="containe">
            <div class="formulaire">
                <h2>Frais Forfaitaires</h2>
                <form action="traitementrenseigne.php" method="post">
                <label for="nuit">Nuit :</label>
                <input type="str" id="nuit" name="nuit" required>
                <label for="repas">Repas :</label>
                <input type="str" id="repas" name="repas" required>
                <label for="FraisKilo">Frais Kilométrique :</label>
                <input type="int" id="FraisKilo" name="FraisKilo" required>
                <label for="ForfaitEtape">Forfait Etape :</label>
                <input type="int" id="ForfaitEtape" name="ForfaitEtape" required>
                <button type="submit" class="bouton-renseigner" > renseigner votre fiche de frais</button>
                </form>
            </div>
            </br>
            <div class="formulaire">
                <h2>Autres frais</h2>
                <form action="traitementrenseignerhors.php" method="post">
                    <label for="libelle">Nom de la dépense :</label>
                    <input type="str" id="libelle" name="libelle" required>
                    <label for="Montant">Montant :</label>
                    <input type="str" id="Montant" name="Montant" required>
                    </br>
                    </br>
                    </br>
                    </br>
                    </br>
                    </br>
                    </br>
                    </br>
                    </br>
                    <button type="submit" class="bouton-renseigner" >renseigner autre frais</button>
                </form>
            </div>
        </div>
    
</body>
</html>