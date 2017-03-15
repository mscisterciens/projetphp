<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="stylephp.css" />
        <title>Bibliothèque numérique de l'abbaye de Sénanque</title>
    </head>

    <body>
    
        <!--éléments à ajouter: liens vers les différentes pages, image -->
    
        <div> 
                    <form action="recherchesimple.php" method="post"> 
                        <!-- création d'un formulaire -->
                        <input id="research" type="text" name="recherche" placeholder="Rechercher"/>
                        <!-- placeholder pour avoir en gris la nature ce que l'utilisateur doit inscrire dans le formulaire  -->
                        <input class="cacher" type="submit" /> 
                        <!-- pour des raisons esthétiques je cache le bouton envoyer avec la class cacher et display: none en css-->
                    </form>   
         </div>   
         <div class="avancee">
         <a href="formrechavanc.php">Accéder à la recherche avancée</a>
         <!-- renvoi vers la parge de recherche avancée -->
         </div>  
            <footer>
            <!-- logos d'instutions etc. au format php pour une application automatique à toutes les pages des modifications -->
            </footer>
        </div>
    </body>
</html>
