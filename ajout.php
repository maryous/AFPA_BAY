<?php 

//ouvertured'une connexion a la bdd

 $bdd = new PDO('mysql:host=localhost;dbname=afpa-bay;charset=utf8', 'root', 'aase89');
 
 //aficher les erreurs
 $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 //preparer ma requet
 
 $pdoStat= $bdd->prepare("INSERT INTO film VALUES (NULL, :titre,:acteur,:date_de_sortie,:SYNOPSIS,:miniature)");

//on lie chaque marqueur a une valeur 
 $titre=$_POST['titre'];
 $acteur=$_POST['acteur'];
 $date=$_POST['date'];
 $synopsis=$_POST['synop'];
 $miniature="0";
 //echo $titre.$acteur.$date.$synopsis.$miniature; 
 $pdoStat->bindValue(':titre', $titre ,PDO::PARAM_STR) ;
 $pdoStat->bindValue(':acteur', $acteur,PDO::PARAM_STR) ;
 $pdoStat->bindValue(':date_de_sortie',$date ,PDO::PARAM_STR) ;
 $pdoStat->bindValue(':SYNOPSIS', $synopsis,PDO::PARAM_STR) ;
 $pdoStat->bindValue(':miniature', $miniature ,PDO::PARAM_STR) ;
 
 //execution de la requete préparée
 
 $insertIsok=$pdoStat->execute();
 
 //les message a aficher 
      if ($insertIsok) 
          {
         //tout va bien
         echo 'cool!, film ajouté à la liste <a href="index.php">retour à la liste</a>';
        }
       
        




 
?>








