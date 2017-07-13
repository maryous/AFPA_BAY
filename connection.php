<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
    session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="style.css">

    <h1>connectez-vous!!</h1>
    </head>
    <body>
        <form action='' method='post' name='connecter'>
        <label>votre pseudo ou email <input name='connecter' type='text' class='connecter'placeholder="rentrez votre pseudo!"/></label></br>
        <label>entrez mot de passe <input name='password' type='password' placeholder="entrez votre mot de passe!"></input></label></br>
        <input name='submit' type='submit' value='se connecter'/>
    </body>
</html>

<?php 
 if(isset($_POST['connecter']) && isset($_POST['password']) ) {
     
     //connexion a la base ddd
    $bdd = new PDO('mysql:host=localhost;dbname=afpa-bay;charset=utf8', 'root', 'aase89');
    
    //preparation de la requet
    
    $reponse = $bdd->prepare('SELECT * FROM users WHERE username =:username OR email =:email  ');
                    $reponse->bindValue(':username', $_POST['connecter']);
                    $reponse->bindValue(':email', $_POST['connecter']);
                    $reponse->execute();
                    $utilisateur=$reponse->fetch();
                    
                            if (password_verify($_POST['password'], $utilisateur['password'])) {
      echo'vous etes connecté';
      $_SESSION['login']=$utilisateur['username'];
      //redirection vers la page index.php si le login est ok 
      header("Location: index.php", true);
    } else {
      echo'mot de passe incorect!';
    }
                            
 }










?>