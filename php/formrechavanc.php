<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="stylephp.css" />
        <title>Recherche avancée</title>
    </head>

    <body>
        <div class="rechavanc">
                    <h1>Recherche avancée:</h1>
                    <form action="rechercheAvancee.php" method="post">

                        <input class="rechavanc" type="text" name="titre" placeholder="Chercher par titre"/>
                        <input class="rechavanc" type="text" name="provenance" placeholder="Chercher par provenance"/>
                        <input class="rechavanc" type="text" name="sujet" placeholder="Chercher par sujet"/>
                        <input class="rechavanc" type="text" name="auteur" placeholder="Chercher par auteur"/>
                        <input class="rechavanc" type="text" name="type" placeholder="Chercher par type"/>
                        <input class="rechavanc" type="text" name="cote" placeholder="Chercher par cote"/>
                        <input class="rechavanc" type="text" name="date" placeholder="Chercher par date"/>
                        <input class="rechavanc" type="text" name="siecle" placeholder="Chercher par siecle"/>
                        <input class="checkbox" type="checkbox" name="booleen" value="ou">OU</input>
                        <input class="cacher" type="submit"><button>Envoyer</button></input>

                    </form>
         </div>
         <div class="avancee">
         <a href="accueil.php">Retourner à la recherche simple en page d'accueil</a>
         <!-- retour vers la recherche simple -->
         </div>
            <footer></footer>
        </div>
    </body>
</html>
