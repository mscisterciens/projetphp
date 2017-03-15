<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="stylephp.css" />
        <title>Recherche avancée</title>
    </head>
<body>
<header></header>
<div class="base">
<h1>Résultats:</h1>
<!--TODO Retirer les valeur NULL de la BDD pour que les requêtes suivantes fonctionnent correctement-->
<?php

/*À mettre au debut du code*/
require 'connexionbibnum.php';

/* Déclaration de toutes les variables qui correspondent aux différents champs de recherche */
$titre=$_POST['titre'];
$titre=trim($titre);
$sujet=$_POST['sujet'];
$sujet=trim($sujet);
$provenance=$_POST['provenance'];
$provenance=trim($provenance);
$type=$_POST['type'];
$type=trim($type);
$auteur=$_POST['auteur'];
$auteur=trim($auteur);
$cote=$_POST['cote'];
$cote=trim($cote);
$date=$_POST['date'];
$date=trim($date);
$siecle=$_POST['siecle'];
$siecle=trim($siecle);
$booleen=$_POST['booleen'];

if ($titre=='' and $sujet=='' and $provenance=='' and $type=='' and $auteur=='' and $cote=='' and $date=='' and $siecle=='')
/*Si l'utilisateur ne remplit aucun champ, il sera invité à saisir une requête en retournant sur une des pages de recherche */
  {
    echo "Veuillez saisir une requête";
    echo "<br/>";
    echo "<a href='formrechavanc.php'>Retour à la recherche avancée</a>";
    echo "<br/>";
    echo "<a href='accueil.php'>Retour à la recherche simple en page d'accueil</a>";
  }
elseif ($booleen=='') {
  /*Nécessaire pour ne pas à avoir à remplir tous les champs /!\ valeurs NULL dans la BDD*/
  if ($titre=='') {
    $titre="%";
  }
  if ($sujet=='') {
    $sujet="%";
  }
  if ($provenance=='') {
    $provenance="%";
  }

  if ($type=='') {
    $type="%";
  }

  if ($auteur=='') {
    $auteur="%";
  }

  if ($cote=='') {
    $cote="%";
  }

  if ($date=='') {
    $date="%";
  }

  if ($siecle=='') {
    $siecle="%";
  }
  $reponse=$idcom->query(
    "SELECT * FROM manuscrits WHERE titre LIKE '%$titre%'
    AND sujet_ms LIKE '%$sujet%'
    AND provenance_ms LIKE '%$provenance%'
    AND type_ms LIKE '%$type%'
    AND auteur LIKE '%$auteur%'
    AND cote_ms LIKE '%$cote%'
    AND date_ms LIKE '%$date%'
    AND siecle_ms LIKE '%$siecle%'
    ORDER BY titre"
  );
  if ($reponse->num_rows==0)
  {
    echo "Il n'y a pas de résultat pour votre recherche";
  }
  if ($reponse->num_rows==1) {
    $row=$reponse->fetch_array(MYSQLI_ASSOC);
    echo "Il y a un résultat pour votre recherche :";
    echo "<br />";
    echo "<a href='";
    echo $row['cote_ms'];
    echo ".php'>";
    echo $row['titre'];
    echo "</a>";
    echo ", ";
    echo $row['date_ms'];
    echo ", ";
    echo $row['cote_ms'];
    echo ", ";
    echo $row['langue_ms'];
    echo ".";
  }
  if ($reponse->num_rows>1) {
    // Calcule le nombre de résulats
    $num_rows = $reponse->num_rows;
    echo "Il y a ";
    echo $num_rows;
    echo " résultats :";
    while ($row=$reponse->fetch_array(MYSQLI_ASSOC)) {
      echo "<br />";
      echo "<a href='";
      echo $row['cote_ms'];
      echo ".php'>";
      echo $row['titre'];
      echo "</a>";
      echo ", ";
      echo $row['date_ms'];
      echo ", ";
      echo $row['cote_ms'];
      echo ", ";
      echo $row['langue_ms'];
      echo ".";
    }
  }
}

/*RMQ il doit être possible d'ajouter le OU à la recherche avec une checkbox et de tester avec un autre elseif
testé rapidement :
fonctionne avec la prise en compte de deux critères mais pas avec plus => TODO faire un nouvel essai à tête reposée*/
elseif ($booleen=='ou') {
  if ($titre=='') {
    $titre="nonRenseigne"; /*problème résolu en retirant le modulo et en donnant une valeur qui ne match pas dans la BDD*/
  }
  if ($sujet=='') {
    $sujet="nonRenseigne";
  }
  if ($provenance=='') {
    $provenance="nonRenseigne";
  }

  if ($type=='') {
    $type="nonRenseigne";
  }

  if ($auteur=='') {
    $auteur="nonRenseigne";
  }

  if ($cote=='') {
    $cote="nonRenseigne";
  }

  if ($date=='') {
    $date="nonRenseigne";
  }

  if ($siecle=='') {
    $siecle="nonRenseigne";
  }
$reponse=$idcom->query(
  "SELECT * FROM manuscrits WHERE (titre LIKE '%$titre%')
  UNION SELECT * FROM manuscrits WHERE (sujet_ms LIKE '%$sujet%')
  UNION SELECT * FROM manuscrits WHERE (provenance_ms LIKE '%$provenance%')
  UNION SELECT * FROM manuscrits WHERE (type_ms LIKE '%$type%')
  UNION SELECT * FROM manuscrits WHERE (auteur LIKE '%$auteur%')
  UNION SELECT * FROM manuscrits WHERE (cote_ms LIKE '%$cote%')
  UNION SELECT * FROM manuscrits WHERE (date_ms LIKE '%$date%')
  UNION SELECT * FROM manuscrits WHERE (siecle_ms LIKE '%$siecle%')
  ORDER BY titre"
);
if ($reponse->num_rows==0)
{
  echo "Il n'y a pas de résultat pour votre recherche";
}
if ($reponse->num_rows==1) {
  $row=$reponse->fetch_array(MYSQLI_ASSOC);
  echo "Il y a un résultat pour votre recherche :";
  echo "<br />";
  echo "<a href='";
  echo $row['cote_ms'];
  echo ".php'>";
  echo $row['titre'];
  echo "</a>";
  echo ", ";
  echo $row['date_ms'];
  echo ", ";
  echo $row['cote_ms'];
  echo ", ";
  echo $row['langue_ms'];
  echo ".";
}
if ($reponse->num_rows>1) {
  // Calcule le nombre de résulats
  $num_rows = $reponse->num_rows;
  echo "Il y a ";
  echo $num_rows;
  echo " résultats :";
  while ($row=$reponse->fetch_array(MYSQLI_ASSOC)) {
    echo "<br />";
    echo "<a href='";
    echo $row['cote_ms'];
    echo ".php'>";
    echo $row['titre'];
    echo "</a>";
    echo ", ";
    echo $row['date_ms'];
    echo ", ";
    echo $row['cote_ms'];
    echo ", ";
    echo $row['langue_ms'];
    echo ".";
  }
}
}
$idcom->close();
?>


</div>
<footer></footer>
</body>
</html>
