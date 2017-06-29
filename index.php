<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>

        <h1>  LISTE DE FILM  <h1>
                
        </header>
        <section class='add'>
            <h2>ajouter un film</h2>
            <form class="form2" method="post" name='saisie' action="form2.php">
              
               <input type="submit" name="valider" value="ajouter"/>
               
          </form>
          
        </section>

        <main>

            <ul class ="list">
                
                
                <?php
try
{
    //connexion a la base ddd
    $bdd = new PDO('mysql:host=localhost;dbname=afpa-bay;charset=utf8', 'root', 'aase89');

}catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
//preparation de la requet
  $reponse =  $bdd->query('SELECT * FROM film');
  
  //la boucle qui va nous selectionner nos elements/ligne par ligne
   while ($donnees = $reponse -> fetch())
   {
      echo '<div class= "case">';
      
      echo'<h3>'. $donnees['titre'].'</h3>';
      echo '<img  src = "'.$donnees['miniature'].'" width="200" height="200" >';
      echo '<p class="auteur" > ACTEUR: '.' ' . $donnees['auteur'].'</p>';
      echo '<P class=date> Date de sortie:' .' '.$donnees['date_realisation'].'</p>';
      echo'<p class=com > SYNOPSIS:'.' '.$donnees['synopsis'].'</p>';
      echo ' <a href="delet.php?numfilm='.$donnees['id'].'">supprimer le film </a>';
      echo '</div>';

}

                    ?>



            </ul>

        </main>
        <footer>
            
        </footer>
    </body>
</html>
