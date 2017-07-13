<?php 
session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
        
    </head>
    <body>
        <header>

        <h1>  LISTE DE FILM  <h1>
                
                <a href='connection.php'>se connecter</a>
                <a href='lougout.php'>se déconnecter</a>
                <?php 
                if(isset($_SESSION['login'])){
                    echo'bonjour :'.$_SESSION['login'];
                    
                }
                ?>

        </header>
        <section class='add'>
             <h2>ajouter un film</h2>
             <form class="form3" method="post" name='saisie' action="USER.php">
              
              
               <input type="submit" name="new_user" value="s'inscrir"/>
            </form>
             
           <form class="form2" method="post" name='saisie' action="form2.php">
              
              
               <input type="submit" name="valider" value="ajouter"/>
            </form>
            <form action='index.php' method='post' name='search'>
                
                <input type='search' name='search' placeholder="recherche par titre ">
               
                <input type='submit' value='Rechercher' name='submit'>
                
                
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
//requet pour la recherche
            $search = filter_input(INPUT_POST, "search", FILTER_SANITIZE_STRING);

            //si on poste quelque chose

            if (isset($search)){
 
                $error = [];
                if (empty($search)) {
                    $error[] = 'veuillez saisir une recherche ou <a href="index.php">retour à la liste</a> ';
                } else if (strlen($search) < 2) {
                    $error[] = 'veuillez saisir une recherche qui depasse les 2 caractere';
                }
                if (empty($error)) {
                    $reponse = $bdd->prepare('SELECT * FROM film WHERE titre LIKE "%" :titre1 "%" ');
                    $reponse->bindValue(':titre1', $search);
                    $reponse->execute();
                }else{
                     foreach ($error as $errors) {
                        echo $errors . "<br/>";
                     }
                     exit();
                }
               
                
            }else{
                
                //preparation de la requet 
                //2 inner join on pour la clée etrangere qu'on a ajouter sur notre table film et table genre
                $reponse= $bdd->query('SELECT * FROM film INNER JOIN genre ON film.genre= genre.id ');
                
                
                
            }

  //la boucle qui va nous selectionner nos elements/ligne par ligne
   while ($donnees = $reponse -> fetch())
   {
      echo '<div class= "case">';
      
      echo'<h3>'. $donnees['titre'].'</h3>';
      echo '<img  src = "'.$donnees['miniature'].'" width="200" height="200" >';
      echo '<p class="auteur" > ACTEUR: '.' ' . $donnees['auteur'].'</p>';
      echo '<P class= "date"> Date de sortie:' .' '.$donnees['date_realisation'].'</p>';
      
      echo'<p class= "com" > SYNOPSIS:'.' '.$donnees['synopsis'].'</p>';
      echo ' <a href="delet.php?numfilm='.$donnees['id'].'">supprimer le film </a>';
      //3-ajouter l'option genre
      echo'<p class= "genre" > genre:'.' '.$donnees['genre'].'</p>';
      echo '</div>';
      

}

                    ?>



            </ul>

        </main>

        <footer>
            
        </footer>
    </body>
</html>
