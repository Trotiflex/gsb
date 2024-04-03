<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Consulterfichefrais</title>
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
    <form method="POST" action="">
    <select id="mois" name=mois >
        <option value="01">Janvier</option>
        <option value="02">Février</option>
        <option value="03">Mars</option>
        <option value="04">Avril</option>
        <option value="05">Mai</option>
        <option value="06">Juin</option>
        <option value="07">Juillet</option>
        <option value="08">Août</option>
        <option value="09">Septembre</option>
        <option value="10">Octobre</option>
        <option value="11">Novembre</option>
        <option value="12">Décembre</option>
    </select>
    <input type="submit" name="submit" value="Consulter">
    <div class="principale">
    <?php
        $conn = new PDO('mysql:host=localhost;dbname=gsbv2', 'root', 'password');
        
        // Récupérer le mois sélectionné
        $mois = $_POST['mois'];
        
        // Requête SQL pour récupérer la fiche de frais pour le mois sélectionné
        $query = "SELECT * FROM lignefraisforfait WHERE mois = :mois";
        $statement = $conn->prepare($query);
        $statement->execute(array('mois' => $mois));
        $query1 = "SELECT * FROM lignefraishorsforfait WHERE mois = :mois";
        $statement1 = $conn->prepare($query1);
        $statement1->execute(array('mois' => $mois));
        
        // Affichage des résultats
        echo "<h2>Fiche Frais pour le  " . $mois . "</h2>";
        echo "<h4>Les frais forfait du " . $mois . "</h4>";
        echo "<table border='1'>
            <tr>
                <th>Votre Id de visiteur: </th>
                <th>Date: </th>
                <th>l'ID de votre frais: </th>
                <th>Quantité renseigné: </th>
                
            </tr>";
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>" . $row['idVisiteur'] . "</td>
                    <td>" . $row['mois'] . "</td>
                    <td>" . $row['idFraisForfait'] . "</td>
                    <td>" . $row['quantite'] . "</td>
                    
                </tr>";
        }
        echo "</table>";
        echo "<h4>Les frais hors forfait du " . $mois . "</h4>";
        echo "<table border='1'>
            <tr>
                <th>Id de la fiche </th>
                <th>L'id du visiteur: </th>
                <th>le mois de la fiche: </th>
                <th>Quantité renseigné: </th>
                <th>la date a laquelle elle a été mise: </th>
                <th>le montant en euros: </th>
                
                
                
            </tr>";
            while ($row1 = $statement1->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                        <td>" . $row1['id'] . "</td>
                        <td>" . $row1['idVisiteur'] . "</td>
                        <td>" . $row1['mois'] . "</td>
                        <td>" . $row1['libelle'] . "</td>
                        <td>" . $row1['date'] . "</td>
                        <td>" . $row1['montant'] . "</td>
                        
                    </tr>";
            }
    
    ?>


    
        
    </div>
</body>
</html>