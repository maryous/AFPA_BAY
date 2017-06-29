<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form class="form1" method="post" name='saisie' action="ajout.php">
              <p><label>titre: <input name='titre' class="input1" placeholder="entrez le titre du film" type="text" required></label></p>
              <p><label>acteur: <input name='acteur' class="acteur1" placeholder="entrez acteur" type="text" required></label></p>
              
              <p><label>date de sortie: <input name='date' class="date1" placeholder="entrez une date" type="number" required></p></label>
               <p><label> SYNOPSIS: </label></p>
               <textarea name="synop" id="ameliorer"></textarea>
               <input type="submit" name="valider" value="ajouter"/>
               <a href="index.php">retour à la liste</a>
               
          </form>
    </body>
</html>
