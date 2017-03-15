<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="stylephp.css" />
        <title>Recherche simple</title>
    </head>
<body>
  <header></header>
  <div class="base">
    <h1>Résultats:</h1>
    <?php

    require 'connexionbibnum.php';

    $recherche=($_POST['recherche']);
    $recherche=trim($recherche);


    if ($recherche=="")
    {
      echo "Veuillez saisir une requête";
      echo "<br/>";
      echo "<a href='formrechavanc.php'>Retour à la recherche avancée</a>";
      echo "<br/>";
      echo "<a href='accueil.php'>Retour à la recherche simple en page d'accueil</a>";
    }

    else{
      $resultats=$idcom->query ("SELECT * FROM manuscrits WHERE titre LIKE '%$recherche%'
        OR date_ms LIKE '%$recherche%'
        OR mots_cles LIKE '%$recherche%'
        OR langue_ms LIKE '%$recherche%'
        OR provenance_ms LIKE '%$recherche%'
        OR sujet_ms LIKE '%$recherche%'");

        if ($resultats->num_rows==0)
        {
          echo "Aucune réponse !";
        }

        else{
          echo "<table>";
          while ($ligne=$resultats->fetch_array(MYSQLI_ASSOC))
          {
            echo "<tr>";
            echo "<td class='titre'>";
            echo "<a href=\" ";
            echo $ligne['titre'];
            echo ".php\"> ";
            echo $ligne['titre'];
            echo "</a>";
            echo "</td>";
            echo "</tr>";
            echo"<tr>";
            echo "<td class='metadonnees'>";
            echo $ligne['date_ms'];
            echo ", ";
            echo $ligne['cote_ms'];
            echo ", ";
            echo $ligne['langue_ms'];
            echo ".";
            echo "</td>";
          }
          echo "</table>";
        }
    }
      $idcom->close();
      ?>
    </div>
    <footer></footer>
</body>
</html>
