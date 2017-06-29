
        <?php 

//ouvertured'une connexion a la bdd

 $bdd = new PDO('mysql:host=localhost;dbname=afpa-bay;charset=utf8', 'root', 'aase89');
 
 //aficher les erreurs
 $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 //preparer ma requet
 
 $pdoStat= $bdd->prepare( 'DELETE FROM film WHERE id=:numf LIMIT 1 ' );
 
 //liaison au parametre nommé
 
 $pdoStat->bindValue(':numf',$_GET['numfilm'],PDO::PARAM_INT);
 
 //execution de la requet
 
 $executeIsok=$pdoStat->execute();
 
         
 if($executeIsok)
     
     { 
     
   echo 'le film a été suprimer avec suces <a href="index.php">retour à la liste</a>';
     
     }
             else
                 
                 {
                 
        echo 'echec de la suppresion <a href="index.php">retour à la liste</a>';
        
            }
     
 

       
        




 
?>
